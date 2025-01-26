<?php
namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Models\Attendance;
use Filament\Notifications\Notification;

class ClockInButton extends Component
{
    public $attendanceRecorded = false;
    public $showModal = false;

    public function mount()
    {
        if (Auth::user() && Auth::user()->employee) {
            $this->attendanceRecorded = Attendance::where('employee_id', Auth::user()->employee->id)
                ->whereDate('created_at', Carbon::today())
                ->exists();
        } else {
            $this->attendanceRecorded = false;
        }
    }

    public function showModal()
    {
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->showModal = false;
    }

    public function clockIn($location)
    {
        $currentTime = now();
        $isLate = $currentTime->gt(Carbon::today()->setHour(10)); // Late if clocked in after 10 AM

        Attendance::create([
            'employee_id' => Auth::user()->employee->id,
            'clock_in_time' => $currentTime,
            'is_late' => $isLate,
            'location' => $location,
        ]);

        Notification::make()
            ->title('Clocked In Successfully')
            ->success()
            ->body("You have clocked in from {$location}.")
            ->send();

        $this->attendanceRecorded = true;
        $this->showModal = false;
    }

    public function clockOut()
    {
        $currentTime = now();
        $attendance = Attendance::where('employee_id', Auth::user()->employee->id)
            ->whereDate('created_at', Carbon::today())
            ->first();

        if ($attendance && !$attendance->clock_out_time) {
            $clockOutTime = $currentTime->gte(Carbon::today()->setHour(17)) ? Carbon::today()->setHour(17) : $currentTime;

            $workHours = $attendance->clock_in_time
                ? $clockOutTime->diffInHours(Carbon::parse($attendance->clock_in_time)) . ' hrs'
                : null;

            $attendance->update([
                'clock_out_time' => $clockOutTime,
                'work_hrs' => $workHours,
            ]);

            Notification::make()
                ->title('Clocked Out Successfully')
                ->success()
                ->body('You have successfully clocked out for today. Total Work Hours: ' . $workHours)
                ->send();
        } else {
            Notification::make()
                ->title('Clock-Out Failed')
                ->danger()
                ->body('You need to clock in first.')
                ->send();
        }

        $this->attendanceRecorded = false;
    }

    

    public function render()
    {
        return view('livewire.clock-in-button');
    }
}
