<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopSize extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function shops(){
        return $this -> belongsToMany('App\Models\Shop');
    }
}
