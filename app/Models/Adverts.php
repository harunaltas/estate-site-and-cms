<?php

namespace App\Models;

use EloquentFilter\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Adverts extends Model
{
    use HasFactory, Filterable;
   
    protected $fillable = ['title','city','town','address','status','type','isItem','number_rooms','price','buildingage','floorlocation','squaremeters','payment_methods','description','map'];
    public function images(){
        return $this->hasMany(AdvertsImages::class);
    }
    public function getImage(){
        return $this->hasOne(AdvertsImages::class);
    }
}
