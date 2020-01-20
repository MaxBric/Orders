<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DateTime;
use DateInterval;

class Subscription extends Model
{
    protected $table = 'subscription';
    protected $fillable = ['customer_id', 'start_date', 'nextorder_date', 'day_iteration', 'active'];

    /**
     * Get the customer that owns the subscription.
     */
    public function getCustomer()
    {
        return $this->belongsTo('App\Customer');
    }

    public function calculateNextOrderDate()
    {
        $newDate = new DateTime($this->start_date);
        $newDate->add(new DateInterval('P' . $this->day_iteration . 'D'));
        $newDate = $newDate->format('Y-m-d');
        $this->nextorder_date = $newDate;
    }
}
