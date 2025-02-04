<span class="w-full inline-flex items-center">
    <!-- Text link -->
        <x-filament::link
            class="relative px-3"
            size="{{$getSize('xs')}}"
            :color="$getColor('primary')"
            :target="$getTarget()"
            :href="$getClonedUrl()">
            {{ $getState() }}
        </x-filament::link>
</span>

