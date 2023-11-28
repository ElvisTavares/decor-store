<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $orders = Order::where([
            'status' => 'RE', // reservado
            'user_id' => Auth::id()
        ])->get();
//dd($orders->order_products);

        return view('cart.index', compact('orders'));
    }

    public function add()
    {
//        $this->middleware('VerifyCsrfToken');

        $req = Request();

        $idProduct = $req->input('id');

        $product = Product::find($idProduct);

        if(empty($product->id)) {
            $req->session()->flash('message-failure', 'Produto não encontrado');
            return redirect()->route('cart.index');
        }

        $idUser = Auth::id();

        $idOrder = Order::queryId([
            'user_id' => $idUser,
            'status' => 'RE',
        ]);

        if (empty($idOrder)) {
            $order_new = Order::create([
                'user_id' => $idUser,
                'status' => 'RE',
            ]);

            $idOrder = $order_new->id;
        }

        OrderProduct::create([
            'order_id' => $idOrder,
            'product_id' => $idProduct,
            'value' => $product->price,
            'status' => 'RE',
        ]);

        $req->session()->flash('message-success', 'Produto adicionado com sucesso');

        return redirect()->route('cart.index');
    }

    public function update(Request $request)
    {
        dd($request);
    }

    public function delete()
    {
        $this->middleware('VerifyCsrfToken');

        $req = Request();
        $idOrder = $req->input('order_id');
        $idProduct = $req->input('product_id');
        $removeItemOnly = (boolean)$req->input('item');
        $idUser = Auth::id();

        $idOrder = Order::queryId([
            'id' => $idOrder,
            'user_id' => $idUser,
            'status' => 'RE',
        ]);

        if (empty($idOrder)) {
            $req->session()->flash('msg-failure', 'Pedido não encontrado');
            return redirect()->route('cart.index');
        }

        $whereProduct = [
            'order_id' => $idOrder,
            'product_id' => $idProduct,
        ];

        $product = OrderProduct::where($whereProduct)->orderBy('id', 'desc')->first();

        if (empty($product->id)) {
            $req->session()->flash('msg-failure', 'Produto não encontrado no carrinho');
            return redirect()->route('cart.index');
        }

        if ($removeItemOnly) {
            $whereProduct['id'] = $product->id;
        }

        OrderProduct::where($whereProduct)->delete();

        $checkOrder = OrderProduct::where([
            'order_id' => $product->order_id
        ])->exists;

        if(!$checkOrder) {
            Order::where([
                'id' => $product->order_id
            ])->delete();
        }

        $req->session()->flash('msg-success', 'Produto removido do carrinho com sucesso');

        return redirect()->route('cart.index');
    }
}
