<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    //
    protected $fillable=[
        'customer_id',
        'symbol',
        'name',
        'shares',
        'purchase_price',
        'purchased',

    ];
	
    // public function getPurchasedValue()
	// {
		// return date ('m/d/Y',strtotime($this->attributes['purchased']));
	// }
	
	// public function setPurchasedValue($value) 
	// {
    // $date_parts = explode('/', $value);
    // $this->attributes['purchased'] = $date_parts[2].'-'.$date_parts[0].'-'.$date_parts[1];
	// }
  
	
    public function customer() {
        return $this->belongsTo('App\Customer');
    }
}

