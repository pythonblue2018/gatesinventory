<?php

namespace App;

use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user(){
    	return $this->belongsTo('App\User');
    }
    public function orders(){
        return $this->belongsTo('App\Order');
    }
}
