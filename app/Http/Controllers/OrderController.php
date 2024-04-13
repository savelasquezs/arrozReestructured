<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Customer;
use App\Models\DeliveryMethod;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $orders = Order::orderBy("id", "DESC")->with(
            "customer",
            "customer.addresses",
            "customer.phones",
            "delivery_person",
            "delivery_method",
            "order_items",
            "order_items.product",
            "payment_items",
            "payment_items.bank",
            "order_items.product.product_size",
            "order_status",
            "delivery_method"
        )


            ->get();
        $orders = OrderResource::collection($orders);
        return inertia("Orders/Index", compact('orders'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {

        $delivery_methods = DeliveryMethod::all();
        $toSend = ["delivery_methods" => $delivery_methods];

        $q = $request->q;
        if ($q) {
            $customers = Customer::where('name', 'like', "%$q%")
                ->orWhereHas('phones', function ($query) use ($q) {
                    $query->where('number', 'like', "%$q%");
                })
                ->orWhereHas('addresses', function ($query) use ($q) {
                    $query->where('address', 'like', "%$q%");
                })->with(

                    "addresses",
                    "phones",

                )
                ->get();
            $toSend["customers"] = $customers;

        }
        // dd($delivery_methods);
        return inertia("Orders/Create", $toSend);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
