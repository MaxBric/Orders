# Orders API
A PHP Laravel project to manage customers, orders and subscriptions entities.

##Why
This is my first project with Laravel.\
I tried using it to have my own opinion. 
It works like Symfony in a lot of aspects. I found it more relevant to try it because you use it.\
Laravel have a great community and support so it helps new developers to start and it evolves with PHP.

I followed Laravel documentation and best practices so it should be easy to understand the architecture

I should have wrote some units tests with more time to ensure quality...
 
## Requirements
See https://laravel.com/docs/5.8/installation#server-requirements

To access the application you can create a virtual host and add entry in /etc/hosts or run `php artisan serve` 

- In the project directory run `composer install` for dependencies
- In your MySQL client you have to run this command `CREATE DATABASE orders`
- Complete database information in env file
- Run this command to create tables in the in project folder: `php artisan migrate`
- Run SQL script to add some data in the database : `sample_data.sql` in the main folder

You can query the API with Postman for example, see below:

1 . Create an order based on subscription date\
Route: `orders.local/api/order`\
Verb: `POST`\
Parameters: `customer_id : 1`\
Expected return: \
```
{
       "customer_id": 4,
       "subscription_id": 4,
       "total": 100,
       "status": "paid",
       "paid_date": "2020-01-20",
       "updated_at": "2020-01-20 21:28:42",
       "created_at": "2020-01-20 21:28:42",
       "id": 9
   }
```

3 . Set iteration frequency \
Route: `orders.local/api/subscription/frequency`\
Verb: `POST`\
Parameters: 
```
customer_id : 1
frequency: 20
```
Expected return: 
 ```
{
    "id": 1,
    "customer_id": 1,
    "start_date": "2020-01-20",
    "nextorder_date": "2020-02-19",
    "day_iteration": "20",
    "active": 1,
    "created_at": "2020-01-20 20:04:47",
    "updated_at": "2020-01-20 22:23:05"
}
 ```

4 . Get last paid order date for all customers\
Route: `orders.local/api/order/latest`\
Verb: `GET`\
Expected return: 
 ```
[
    {
        "customer_id": 1,
        "last_paid_date": "2020-02-19"
    },
    {
        "customer_id": 2,
        "last_paid_date": "2020-02-12"
    },
    {
        "customer_id": 4,
        "last_paid_date": "2020-01-20"
    }
]
 ```

5 . Get all customers with more than 1 paid order\
Route: `orders.local/api/customer/good`\
Verb: `GET`\
Expected return: 
 ```
[
    {
        "id": 1,
        "nb": 3
    },
    {
        "id": 2,
        "nb": 5
    }
]
 ```

6 . Get all customers with more than 1 paid order and an active subscription\
Route: `orders.local/api/customer/better`\
Verb: `GET`\
Expected return: 
 ```
[
    {
        "id": 1,
        "nb": 3
    },
    {
        "id": 2,
        "nb": 5
    }
]
 ```

BONUS : Set paid status on an order and generate a delivery\
Route: `orders.local/api/order/paid`\
Verb: `POST`\
Parameters: `order_id : 1`\
Expected return: \
```
{
    "order_id": 1,
    "delivery_date": "2020-01-20",
    "status": "shipped",
    "updated_at": "2020-01-20 21:54:33",
    "created_at": "2020-01-20 21:54:33",
    "id": 3
}
```

BONUS CSV : Time's up...
