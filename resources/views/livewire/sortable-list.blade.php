<div class="container">
    @foreach($lists as $list)
        <div class=" border-4 m-4">
            <h2 class="font-bold text-xl p-4">{{ $list->name }}</h2>
            <div wire:key="{{ $list->id }}" class="js-dropzone grid grid-cols-4">
                @foreach($list->sortableItems()->get() as $item)
                    <div wire:key="{{ $item->id }}"
                         class="js-draggable cursor-grab bg-white p-2 m-2 border border-gray-500"
                         draggable="true">
                            {{ $item->name }}
                    </div>
                @endforeach
            </div>
        </div>
    @endforeach
</div>
