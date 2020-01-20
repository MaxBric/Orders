<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $fillable = ['name', 'email', 'active', 'subscription_id'];

    public function getSubscription()
    {
        return $this->hasOne('App\Subscription');
    }

    public function getOrders()
    {
        return $this->hasMay('App\Order');
    }
}
