<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\productDataTable;
use App\Models\product;
use App\Models\category;
use App\Models\productVariant;
use App\Models\ProductVariantItem;
use App\Models\productImageGallery;
use App\Traits\ImageUploadTrait;
use Auth;
use Str;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ImageUploadTrait; //opmerk
    public function index(productDataTable $dataTable)
    {
        return $dataTable->render('admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = category::all();
        return view('admin.product.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'thumb_image' => ['required', 'image', 'max:3000'],
            'name'=>['required', 'max:200'],
            'category'=>['required'],
            'price'=>['required'],
            'short_description'=>['required','max:250'],
            'long_description'=>['required'],
            'seo_title' => ['max:200', 'nullable'],
            'seo_description'=>['max:200','nullable'],
            'status'=>['required']
         ]);

         $product = new product();
          /** Handlle file upload تابع لملف تارتس بملف الأب* */
        $imagePath = $this->uploadImage($request, 'thumb_image', 'uploads');

         $product->thumb_image = $imagePath;
         $product->name = $request->name;
         $product->slug = Str::slug($request->name);
         $product->category_id = $request->category;
         $product->short_description = $request->short_description;
         $product->long_description = $request->long_description;
         $product->price = $request->price;
         $product->offer_price = $request->offer_price;
         $product->offer_start_date = $request->offer_start_date;
         $product->offer_end_date = $request->offer_end_date;
         $product->seo_title = $request->seo_title;
         $product->seo_description = $request->seo_description;
         $product->sku = $request->sku;
         $product->status = $request->status;
         $product->save();
         toastr()->success('created  successfully!', 'success');
         return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = product::findOrFail($id);

        $categories = Category::all();
       return view('admin.product.edit',compact('categories','product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'thumb_image' => ['nullable', 'image', 'max:3000'],
            'name'=>['required', 'max:200'],
            'category'=>['required'],
            'price'=>['required'],
            'short_description'=>['required'],
            'long_description'=>['required'],
            'seo_title' => ['max:200', 'nullable'],
            'seo_description'=>['max:200','nullable'],
            'status'=>['required']
         ]);
         $product = product::findOrFail($id);

       $imagePath = $this->updateImage($request, 'thumb_image', 'uploads',  $product->thumb_image);

       $product->thumb_image = empty(!$imagePath) ? $imagePath : $product->thumb_image;
       $product->name = $request->name;
       $product->slug = Str::slug($request->name);
       $product->category_id = $request->category;
       $product->short_description = $request->short_description;
       $product->long_description = $request->long_description;
       $product->price = $request->price;
       $product->offer_price = $request->offer_price;
       $product->offer_start_date = $request->offer_start_date;
       $product->offer_end_date = $request->offer_end_date;
       $product->seo_title = $request->seo_title;
       $product->seo_description = $request->seo_description;
       $product->sku = $request->sku;
       $product->status = $request->status;
       $product->save();
       toastr()->success('updated  successfully!', 'success');
       return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
    $product = product::findOrFail($id);

    $this->deleteImage($product->thumb_image);

    $galleryImages = ProductImageGallery::where('product_id', $product->id)->get();
       /** Delete product gallery images */
       foreach($galleryImages as $image){

         $this->deleteImage($image->image);
         $image->delete();
       }

        /** Delete product size if exist */

         $productsize = ProductVariantItem::where('product_id', $product->id)->get();

         foreach($productsize as $productsize){
             $productsize->productVariantItmes($productsize->productsize);
             $productsize->delete();
         }

        $product->delete();

        return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
        return redirect()->route('products.index');
    }








    public function changeStatus(Request $request)
    {
        $product = product::findOrFail($request->id);
        $product->status = $request->status == 'true' ? 1 : 0;
        $product->save();

        return response(['message' => 'Status has been updated!']);
    }
}
