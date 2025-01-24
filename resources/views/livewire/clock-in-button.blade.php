<div class="p-4">
    @if (session()->has('message'))
        <div class="text-green-600 mb-2">
            {{ session('message') }}
        </div>
    @endif

    @if (!$attendanceRecorded)
        <button
            class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600"
            wire:click="clockIn"
        >
            Clock In
        </button>
    @else
        <button
            class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600"
            wire:click="clockOut"
        >
            Clock Out
        </button>
    @endif
</div>
