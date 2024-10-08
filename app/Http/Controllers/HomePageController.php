<?php

namespace App\Http\Controllers;

use App\Models\about;
use App\Models\Category;
use App\Models\coupon;
use App\Models\Slider;
use App\Models\product;
use App\Models\productImageGallery;
use App\Models\ProductOption;
use App\Models\Reservation;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $slider = Slider::where('status', 1)->orderBy('serial', 'asc')->get();
        $about = about::where('status', 1)->get();
        $categories = Category::where('status', 1)->get();
        return view('frontend.home.index', compact('slider', 'about', 'categories'));
    }
}
