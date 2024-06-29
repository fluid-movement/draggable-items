<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemList extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function sortableItems()
    {
        return $this->hasMany(SortableItem::class);
    }
}
