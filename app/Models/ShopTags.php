<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopTags extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function shops(){
        return $this -> belongsToMany('App\Models\Shop');
    }
}
