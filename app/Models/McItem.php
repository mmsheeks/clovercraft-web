<?php namespace App\Models;

use Illuminate\Support\Facades\Storage;

class McItem {

    public $id;
    public $meta;
    public $name;
    public $slug;
    public $icon;

    public static function all() {
        $items = [];
        $json = McItem::load_items_list();
        foreach( $json as $item ) {
            $items[ $item->text_type ] = new McItem( $item );
        }
        ksort( $items );
        return array_values( $items );
    }

    public static function load_items_list() {
        $raw = Storage::get('mcdata/items.json');
        $json = json_decode( $raw );
        return $json;
    }

    public function __construct( $json_item ) {
        $this->id   = $json_item->type;
        $this->meta = $json_item->meta;
        $this->name = $json_item->name;
        $this->slug = $json_item->text_type;
        
        $icon_path_format = '/mcdata/icons/%s-%s.png';
        $this->icon = sprintf( $icon_path_format, $this->id, $this->meta );
    }
}