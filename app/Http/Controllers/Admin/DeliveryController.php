<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\deliveryDataTable;
use App\Models\Delivery;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(deliveryDataTable $dataTable)
    {
        return $dataTable->render('admin.delivery.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

   return view('admin.delivery.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'area_name' =>['required','max:200'],
            'min_delivery_time'=>['required'],
            'max_delivery_time' =>['required'],
            'delivery_fee'=> ['required', 'numeric'],
            'status' =>['required','boolean'],
        ]);
        $area = new Delivery();
        $area->area_name = $request->area_name;
        $area->min_delivery_time = $request->min_delivery_time;
        $area->max_delivery_time = $request->max_delivery_time;
        $area->delivery_fee = $request->delivery_fee;
        $area->status = $request->status;
        $area->save();

        toastr('created Successufly','success', 'Success');
        return redirect()->route('delivery.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $area = Delivery::findorFail($id);

        return view('admin.delivery.edit',compact('delivery'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $request->validate([
            'area_name' =>['required','max:200'],
            'min_delivery_time'=>['required'],
            'max_delivery_time' =>['required'],
            'delivery_fee'=>['required','numeric'],
            'status' =>['required','boolean']
        ]);
        $area = Delivery::findOrFail($id);

        $area->area_name = $request->area_name;
        $area->min_delivery_time = $request->min_delivery_time;
        $area->max_delivery_time = $request->max_delivery_time;
        $area->delivery_fee =  $request->delivery_fee;
        $area->status = $request->status;
        $area->save();

        toastr('created Successufly','updated', 'Success');
        return redirect()->route('delivery.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
   $area = Delivery::findOrFail($id);
   $area->delete();
       return response(['status'=> 'success', 'message' =>'Deleted successufully']);
       return redirect()->route('delivery.index');
    }

    public function changeStatus(Request $request)
    {
         $area = Delivery::findOrFail($request->id);
         $area->status = $request->status == 'true' ? 1 : 0;
         $area->save();

        return response(['message' => 'Status has been updated!']);
    }
}
