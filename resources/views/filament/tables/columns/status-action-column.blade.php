@use('\App\Enums\SubmissionStatus')
    @php
        $defaultAction = $getDefaultAction()
    @endphp
<div class="inline-flex divide-x dark:divide-gray-700 px-3">

    <x-filament::badge
        icon="{{$getState()->getIcon()}}"
        color="{{$getState()->getColor()}}"
        class="[&:has(_+_.action-button)]:rounded-r-none [&:has(_+_.action-button)]:border-r-0 !min-w-32 !justify-start !ring-0 border border-gray-200 dark:border-gray-700"
        onclick="Livewire.dispatch(
                        '{{ $defaultAction?->getEventName() }}',
                        {
                            component: '{{ $defaultAction?->getComponent() }}',
                            arguments: {{json_encode($defaultAction?->getArguments())}}
                        }
                        )">
        {{ $getState()->getLabel() }}
    </x-filament::badge>
    @foreach($getActions() as $action)
        @if($action->isVisible())
            <x-filament::icon-button
                tooltip="{{ $action->getTooltip() }}"
                size="{{ $action->getSize() }}" icon="{{$action->getIcon()}}"
                color="{{ $action->getColor() }}"
                class="action-button border-y last:!border-r !rounded-none last:!rounded-r-md bg-slate-50 dark:bg-gray-800 p-1 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-[rgb(45,45,45)] !m-0"
                onclick="Livewire.dispatch(
                        '{{ $action->getEventName() }}',
                        {
                            component: '{{ $action->getComponent() }}',
                        arguments: {{json_encode($action->getArguments())}}
                        })">
            </x-filament::icon-button>
        @endif
    @endforeach
</div>

