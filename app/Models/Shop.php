<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function categories(){
        return $this -> belongsToMany('App\Models\ShopCategory');
    }

    public function tags(){
        return $this -> belongsToMany('App\Models\ShopTags');
    }

    public function colors(){
        return $this -> belongsToMany('App\Models\ShopColor');
    }

    public function sizes(){
        return $this -> belongsToMany('App\Models\ShopSize');
    }


    public function author(){
        return $this -> belongsTo('App\Models\User', 'user_id', 'id');
    }
}
