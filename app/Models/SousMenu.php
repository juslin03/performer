<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SousMenu extends Model
{
    protected $table = 'sous_menus';
    protected $fillable = ['menu_id', 'submenu', 'descsubmenu'];

    public function menu()
    {
        return $this->belongsTo(Menu::class, 'menu_id', 'id');
    }
}
