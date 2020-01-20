<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'order';
    protected $fillable = ['customer_id', 'subscription_id', 'status', 'total', 'paid_date'];

    /**
     * Get the customer that owns the order.
     */
    public function getCustomer()
    {
        return $this->belongsTo('App\Customer');
    }

    /**
     * Get the subscription that owns the order.
     */
    public function getSubscription()
    {
        return $this->belongsTo('App\Subscription');
    }
}
