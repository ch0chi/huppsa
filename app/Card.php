<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = 'cards';
    protected $fillable = ['name','image'];


    public function getAll(){
      return $this->get();
    }
}
