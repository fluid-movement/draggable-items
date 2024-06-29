<?php

namespace Database\Seeders;

use App\Models\ItemList;
use App\Models\SortableItem;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        foreach (ItemList::factory(2)->create() as $itemList) {
            $itemList->sortableItems()->createMany(
                SortableItem::factory(5)->make()->toArray()
            );
        }
    }
}
