<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\productImageGallery;
use App\Models\product;
use App\DataTables\productImageGalleryDataTable;
use App\Traits\ImageUploadTrait;

class ProductImageGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    use ImageUploadTrait; //opmerk
    public function index(Request $request,productImageGalleryDataTable  $dataTable)
    {
        $product = product::findOrFail($request->product);
        return $dataTable->render('admin.product.image-gallery.index',compact('product'));

    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'image.*' =>['required', 'image', 'max:2048'],
        ]);
        /** handel image upload  */
        $imagePaths = $this->uploadMultiImage($request, 'image', 'uploads');

        foreach($imagePaths as $path){
            $ProductImageGallery = new ProductImageGallery();
            $ProductImageGallery->image = $path;
            $ProductImageGallery->product_id = $request->product;
            $ProductImageGallery->save();
    }
    toastr('Uploaded successfuly');

    return redirect()->back();
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ProductImage = ProductImageGallery::findOrFail($id);
        $this->deleteImage($ProductImage->image);
        $ProductImage->delete();
        return response(['status'=> 'success', 'message' =>'Deleted successufully']);
    }
}
