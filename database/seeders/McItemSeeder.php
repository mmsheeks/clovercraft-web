<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

use App\Models\Item;

class McItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = Storage::get( 'mcdata/items.json' );
        $json_items = json_decode( $json );
        foreach( $json_items as $json_item ) {
            $item = new Item();
            $item->name = $json_item->name;
            $item->type = $json_item->type;
            $item->meta = $json_item->meta;
            $item->slug = $json_item->text_type;

            $icon_path_format = '/mcdata/icons/%s-%s.png';
            $item->icon = sprintf( $icon_path_format, $json_item->type, $json_item->meta );
            $item->save();
        }
    }
}
