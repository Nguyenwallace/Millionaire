<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
	public function stock(){
		
		return $this->hasOne('App\Stock');
	}
}
