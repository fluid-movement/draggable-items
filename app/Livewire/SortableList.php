<?php

namespace App\Livewire;

use App\Models\ItemList;
use App\Models\SortableItem;
use Livewire\Attributes\On;
use Livewire\Component;

class SortableList extends Component
{
    public $lists;

    public function render()
    {
        return view('livewire.sortable-list');
    }

    public function mount()
    {
        $this->lists = ItemList::all();
    }

    #[On('itemDropped')]
    public function itemDropped($itemId, $listOrder, $listId)
    {
        $sort = 0;
        foreach ($listOrder as $itemId) {
            $item = SortableItem::find($itemId);
            $item->update(
                [
                    'position' => $sort,
                    'item_list_id' => $listId,
                ]
            );
            $sort++;
        }

        $list = ItemList::find($listId);
        //$list->sortableItems()->where('id', $itemId)->update(['order' => $order]);
    }
}
