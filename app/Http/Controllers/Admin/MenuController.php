<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;
use App\DataTables\PageMenuDataTable;
use App\Models\category;
use App\Models\productImageGallery;
use App\Models\ProductVariantItem;
use App\Traits\ImageUploadTrait;
use Auth;
use Str;


class MenuController extends Controller

{
    use ImageUploadTrait;
    public function index(PageMenuDataTable $dataTable)
    {
        return $dataTable->render('admin.product.menu.index');
    }


    public function create()
    {
        $categories = category::all();
        return view('admin.product.menu.create',compact('categories'));
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

            'status'=>['required']
         ]);

         $product = new Menu();
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
         $product->status = $request->status;
         $product->save();
         toastr()->success('created  successfully!', 'success');
         return redirect()->route('menupage.index');
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
        $product = Menu::findOrFail($id);
        $categories = category::all();
        return view('admin.product.menu.edit',compact('categories','product'));
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
            'status'=>['required']
         ]);
         $product = Menu::findOrFail($id);

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
       $product->status = $request->status;
       $product->save();
       toastr()->success('updated  successfully!', 'success');
       return redirect()->route('menupage.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $product = Menu::findOrFail($id);

        $this->deleteImage($product->thumb_image);

        $galleryImages = productImageGallery::where('product_id', $product->id)->get();

        foreach($galleryImages as $image){
            $this->deleteImage($image->image);
            $image->delete();
           }

           $product->delete();
           return response(['status' => 'success', 'message' => 'Deleted Successfully!']);
           return redirect()->route('menupage.index');

    }

    public function changeStatus(Request $request)
    {
        $product = Menu::findOrFail($request->id);
        $product->status = $request->status == 'true' ? 1 : 0;
        $product->save();

        return response(['message' => 'Status has been updated!']);
    }


}
