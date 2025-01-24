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

    public function mount()
    {
        $this->attendanceRecorded = Attendance::where('employee_id', Auth::user()->employee->id)
            ->whereDate('created_at', Carbon::today())
            ->exists();
    }

    public function clockIn()
    {
        Attendance::create([
            'employee_id' => Auth::user()->employee->id,
            'clock_in_time' => now(),
        ]);

        $this->attendanceRecorded = true;
        Notification::make()
        ->title('Clock In successfully.')
        ->success();
    }

    public function clockOut()
    {
        $attendance = Attendance::where('employee_id', Auth::user()->employee->id)
            ->whereDate('created_at', Carbon::today())
            ->first();

        if ($attendance) {
            $attendance->update([
                'clock_out_time' => now(),
            ]);
            session()->flash('message', 'Clocked out successfully.');
            Notification::make()
            ->title('Clocked out successfully.')
            ->success();
        }

        $this->attendanceRecorded = false;
    }

    public function render()
    {
        return view('livewire.clock-in-button');
    }
}
