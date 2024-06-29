<?php

namespace App\Models;

use App\Models\Scopes\OrderByPosition;
use App\Models\Scopes\OrderByStartAsc;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SortableItem extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'position', 'item_list_id'];

    public function itemList()
    {
        return $this->belongsTo(ItemList::class);
    }

    protected static function booted()
    {
        static::addGlobalScope(new OrderByPosition());
    }
}
