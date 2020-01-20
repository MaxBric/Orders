<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Delivery extends Model
{
    protected $table = 'delivery';
    protected $fillable = ['order_id', 'delivery_date', 'status'];

}
