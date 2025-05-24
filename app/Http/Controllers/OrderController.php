<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::paginate();
        $products = new Product();
        return view('orders.index', compact('orders', 'products'));
    }

    public function create()
    {
        $products = new Product();
        return view('orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'fio' => "required|unique:products",
            'product_id' => "required|string",
            'quality' => "numeric|decimal:0",
            'comment' => "max:1000",
        ]);

        $priceProduct = Product::findOrFail($data['product_id'])->price;
        $data['final_price'] = $data['quality'] * $priceProduct;
        $order = new Order();
        $order->fill($data);
        $order->save();

        flash("Заказ успешно создан")->success();

        return redirect()->route('orders.index');
    }


    public function edit(Order $order)
    {
        $product = Product::findOrFail($order->product_id);
        $countProduct = $order->final_price / $product->price;
        $productName = $product->name;
        return view('orders.edit', compact('order', 'productName', 'countProduct'));
    }

    public function update(Request $request, Order $order)
    {
        $order->status = "Выполнен";
        $order->save();

        flash("Заказ выполнен")->success();

        return redirect()->route('orders.index');
    }

    public function destroy(Order $order)
    {
        $order->delete();

        flash("Заказ успешно удален")->success();

        return redirect()->route('orders.index');
    }
}
