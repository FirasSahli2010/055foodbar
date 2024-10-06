<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\menu;
use Illuminate\Http\Request;
use Str;
class MenuController extends Controller
{

    public function index(){
        $products = menu::where('status', 1)->get();
        return view('frontend.home.components.menu',compact('products'));
    }

    public function showProduct(string $slug)
    {
        $product = menu::with(['category', 'ProductImageGalleries', 'productoption', 'productsize'])->where('slug', $slug)->where('status', 1)->first();

        return view('frontend.home.components.menu',compact('product'));
     }
}
