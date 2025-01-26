<div>
    @if (session()->has('message'))
        <div class="text-green-700 bg-green-100 border border-green-300 rounded-lg p-2 mb-4">
            {{ session('message') }}
        </div>
    @endif

    @if (!$attendanceRecorded)
        <!-- Clock-In Button -->
        <button
            class="bg-green-500 text-black px-6 py-3 rounded-lg shadow-md hover:shadow-lg transition duration-200 focus:ring-2 focus:ring-green-400 focus:outline-none"
            wire:click="showModal"
        >
            Clock In
        </button>
    @else
        <!-- Clock-Out Button -->
        <button
            class="bg-red-500 text-black px-6 py-3 rounded-lg shadow-md hover:shadow-lg transition duration-200 focus:ring-2 focus:ring-red-400 focus:outline-none"
            wire:click="clockOut"
        >
            Clock Out
        </button>
    @endif

    <!-- Modal -->
    @if ($showModal)
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center">
            <div class="bg-white rounded-lg shadow-lg p-6">
                <h2 class="text-lg font-bold mb-4">Where are you working from today?</h2>
                <button
                    class="bg-blue-500 text-white px-4 py-2 rounded-lg mr-4"
                    wire:click="clockIn('office')"
                >
                    Office
                </button>
                <button
                    class="bg-green-500 text-white px-4 py-2 rounded-lg"
                    wire:click="clockIn('remote')"
                >
                    Remote
                </button>
                <button
                    class="bg-gray-500 text-white px-4 py-2 rounded-lg mt-4"
                    wire:click="closeModal"
                >
                    Cancel
                </button>
            </div>
        </div>
    @endif
</div>
