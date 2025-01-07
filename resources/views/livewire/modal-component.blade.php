<section>
    <div class="container py-20 mx-auto relative">
        <!-- Open Modal Button -->
        <button wire:click="openModal"
            class="px-6 py-3 font-medium text-black dark:text-white rounded-full bg-blue-600 hover:bg-blue-700">
            Open Modal
        </button>

        <!-- Modal -->
        @if ($modalOpen)
            <div x-data
                x-show="$wire.modalOpen"
                x-transition
                @click.away="$wire.closeModal()"
                class="absolute top-full mt-2 left-0 bg-white dark:bg-dark-2 py-12 px-8 text-center shadow-lg border" style="width:500px; right:0px;">


                <h3 class="pb-[18px] text-xl font-semibold text-dark dark:text-white sm:text-2xl">
                    Your Message Sent Successfully
                </h3>
                <span class="mx-auto mb-6 inline-block h-1 w-[90px] rounded bg-primary"></span>
                <p class="mb-10 text-base leading-relaxed text-body-color dark:text-dark-6">
                    Lorem Ipsum is simply dummy text of the printing and typesetting
                    industry. Lorem Ipsum has been the industry's standard dummy text
                    ever since
                </p>
                <div class="flex flex-wrap -mx-3">
                    <div class="w-1/2 px-3">
                        <button wire:click="closeModal"
                            class="block w-full p-3 text-base font-medium text-center transition border rounded-md border-stroke text-dark dark:text-white hover:border-red-600 hover:bg-red-600 hover:text-white">
                            Cancel
                        </button>
                    </div>
                    <div class="w-1/2 px-3">
            
                        <a href="{{route('filament.admin.resources.positions.index')}}" class="block w-full p-3 text-black dark:text-white font-medium text-center transition border rounded-md border-primary bg-primary hover:bg-blue-dark"> link</a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</section>
