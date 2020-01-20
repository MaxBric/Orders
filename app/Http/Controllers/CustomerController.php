<?php


namespace App\Http\Controllers;


use App\Customer;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Create a new customer
     *
     * @param Request $request
     * @return Customer
     */
    public function addNewCustomer(Request $request)
    {
        $customer = new Customer();
        $customer->name = $request->input('name');
        $customer->email = $request->input('email');
        $customer->active = $request->input('active');

        $customer->save();

        return $customer;
    }

    /**
     * Get customer info by id.
     *
     * @param int $customer_id
     * @return array
     */
    public function getCustomerById($customer_id)
    {
        return Customer::find($customer_id);
    }

    public function setSubscriptionId($customer_id, $subscription_id)
    {
        $customer = Customer::find($customer_id);
        $customer->subscription_id = $subscription_id;

        $customer->save();

        return $customer;
    }

    /**
     * Retrieve customers who have more than 1 order
     *
     * @param
     * @return array(Customer)
     */
    public function getGoodCustomers()
    {
        $customers = DB::select('SELECT customer.id, count(orders.order.customer_id) as nb FROM customer JOIN orders.order ON orders.order.customer_id = customer.id GROUP BY customer.id HAVING nb > 1');

        return $customers;
    }

    /**
     * Retrieve customers who have more than 1 order and an active subscription
     *
     * @param
     * @return array(Customer)
     */
    public function getBetterCustomers()
    {
        $customers = DB::select('SELECT customer.id, count(orders.order.customer_id) as nb FROM customer JOIN orders.order ON orders.order.customer_id = customer.id JOIN subscription ON subscription.customer_id = customer.id WHERE subscription.active = 1 GROUP BY customer.id HAVING nb > 1');

        return $customers;
    }
}
