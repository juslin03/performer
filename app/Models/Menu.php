<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $table = 'menus';

    protected $fillable = ['menu', 'descmenu', 'status'];

    public function sous_menu()
    {
        return $this->hasMany('App\Models\SousMenu');
    }
}
