<?php


namespace App\Http\Controllers;

use App\Delivery;
use App\Order;
use App\Customer;
use App\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Create a new subscription
     *
     * @param Request $request
     * @return Order
     */
    public function addNewOrder(Request $request)
    {
        $customer = Customer::find($request->input('customer_id'));
        $subscription = Subscription::find($customer->subscription_id);

        $order = new Order();
        $order->customer_id = $customer->id;
        $order->subscription_id = $subscription->id;
        $order->total = rand(10, 100);
        $order->status = 'paid';
        $order->paid_date = $subscription->nextorder_date;

        $order->save();

        // update next order date
        $subscriptionController = new SubscriptionController();
        $subscriptionController->calculateNextOrderDate($subscription);

        return $order;
    }

    /**
     * Retrieve last order for all customers
     *
     * @param
     * @return array(Order)
     */
    public function getLastOrderForAllCustomers()
    {
        $orders = Order::select(DB::raw('customer_id, max(paid_date) as last_paid_date'))
            ->groupBy('customer_id')
            ->get();

        return $orders;
    }

    /**
     * Retrieve last order for all customers
     *
     * @param Request $request
     * @return Delivery
     * @throws \Exception
     */
    public function setOrderToPaid(Request $request)
    {
        $order = Order::find($request->input('order_id'));
        $order->status = 'paid';

        $deliveryController = new DeliveryController();
        $delivery = $deliveryController->addNewDelivery($order->id);

        return $delivery;
    }
}
