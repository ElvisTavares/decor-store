<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $registros = Product::where([
           'active' => 'S'
        ])->get();

        return view ('home.index', compact('registros'));
    }

    public function product($id = null)
    {
        if (!empty($id)) {
            $registro = Product::where([
                'id' => $id,
                'active' => 'S'
            ])->first();

            if (!empty($registro)) {
                return view ('home.product', compact('registro'));
            }
        }

        return redirect()->route('index');
    }
}
