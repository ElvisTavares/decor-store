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

//        dd($order[0]->order_products[0]->product);
        return view('cart.index', compact('orders'));
    }

    public function add()
    {
        $this->middleware('VerifyCsrfToken');

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
}
