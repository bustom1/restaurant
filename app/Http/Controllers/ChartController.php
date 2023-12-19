<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Blade;
use App\Http\Requests\StoreOrderRequest;
use Gloudemans\Shoppingcart\Facades\Cart;


class ChartController extends Controller
{
    // untuk menambahkan item ke dalam chart
    public function listChart()
    {
        // $cartItems = Cart::count();
        $cartItems = Cart::content();
        return view('order.show', compact('cartItems'));
    }

    public function removeFromCart($rowId)
    {
        Cart::remove($rowId);
        $cartItems = Cart::content();
        return redirect()->route('listChart', compact('cartItems'))->with('success', 'Item removed from cart successfully');
    }

    public function store(Request $request)
    {
        $dataOrder = $request->cart_items;

        $orderFirst = Order::orderBy('id_orders', 'desc')->first();
        $noOrder = $orderFirst['id_orders'];

        if ($orderFirst == null) {
            $noOrder = 1;
            $newNoOrder = Carbon::now()->format('Ymd') . str_pad($noOrder, 3, '0', STR_PAD_LEFT);
        } else {
            $newNoOrder = Carbon::now()->format('Ymd') . str_pad($noOrder, 3, '0', STR_PAD_LEFT);
        }

        $order = new Order();
        $order->user_id = $request['user_id'];
        $order->no_order = $newNoOrder;
        $order->bayar = 0;
        $order->total_bayar = Cart::subtotal();
        $order->status = 'Proses';
        $order->save();

        $order_id = $order->id_orders;

        $dataOrderDetail = [];
        foreach ($dataOrder as $data) {
            $dataOrderDetail[] = [
                'produk_id' => $data['produk_id'],
                'order_id' => $order_id,
                'jumlah' => $data['jumlah'],
                'harga' => $data['harga'],
                'total_harga' => $data['total_harga']
            ];
        }

        OrderDetail::insert($dataOrderDetail);
        Cart::destroy();

        return redirect()->route('client.index')->with('success', 'Order successfully created.');
    }
}
