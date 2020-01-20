<?php

namespace App\Http\Controllers;

use App\Subscription;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    /**
     * Create a new subscription
     *
     * @param Request $request
     * @return Subscription
     */
    public function addNewSubscription(Request $request)
    {
        $subscription = new Subscription();
        $subscription->customer_id = $request->input('customer_id');
        $subscription->start_date = $request->input('start_date');
        $subscription->nextorder_date = $request->input('nextorder_date');
        $subscription->day_iteration = $request->input('day_iteration');
        $subscription->active = $request->input('active');

        $subscription->save();

        $customerController = new CustomerController();
        $customerController->setSubscriptionId($subscription->customer_id, $subscription->id);

        return $subscription;
    }

    /**
     * Calculate and set next order date
     *
     * @param Subscription $subscription
     * @return Subscription
     */
    public function calculateNextOrderDate($subscription)
    {
        $subscription->calculateNextOrderDate();


        return $subscription;
    }

    /**
     * Change the order frequency of a subscription
     *
     * @param Request $request
     * @return Subscription
     */
    public function setFrequencyByCustomerId(Request $request)
    {
        $customer_id = $request->input('customer_id');
        $frequency = $request->input('frequency');

        $subscription = Subscription::where('customer_id', $customer_id)->first();
        $subscription->day_iteration = $frequency;

        $subscription->save();

        return $subscription;
    }
}
