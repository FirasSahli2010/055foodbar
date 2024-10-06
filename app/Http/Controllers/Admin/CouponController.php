<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\couponDataTable;
use App\Models\coupon;


class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(couponDataTable $dataTable)
    {
        return $dataTable->render('admin.product.coupon.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.product.coupon.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' =>['required','max:200'],
            'code' =>['required','max:200'],
            'quantity'=>['required','integer'],
            'max_use'=>['required','integer'],
            'start_date'=>['required'],
            'end_date' =>['required'],
            'discount_type' =>['required','max:200'],
            'discount' =>['required','integer'],
            'status' =>['required','integer'],
        ]);
        $coupon = new coupon();
        $coupon->name = $request->name;
        $coupon->code = $request->code;
        $coupon->quantity = $request->quantity;
        $coupon->max_use = $request->max_use;
        $coupon->start_date = $request->start_date;
        $coupon->end_date = $request->end_date;
        $coupon->discount_type = $request->discount_type;
        $coupon->discount = $request->discount;
        $coupon->total_used = 0;
        $coupon->status = $request->status;

        $coupon->save();
        toastr('created Successufly','success', 'Success');
        return redirect()->route('coupon.index');
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
        $coupon = coupon::findOrfail($id);
        return view('admin.product.coupon.edit',compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' =>['required','max:200'],
            'code' =>['required','max:200'],
            'quantity'=>['required','integer'],
            'max_use'=>['required','integer'],
            'start_date'=>['required'],
            'end_date' =>['required'],
            'discount_type' =>['required','max:200'],
            'discount' =>['required','integer'],
            'status' =>['required','integer'],
        ]);
        $coupon =  coupon::findOrFail($id);
        $coupon->name = $request->name;
        $coupon->code = $request->code;
        $coupon->quantity = $request->quantity;
        $coupon->max_use = $request->max_use;
        $coupon->start_date = $request->start_date;
        $coupon->end_date = $request->end_date;
        $coupon->discount_type = $request->discount_type;
        $coupon->discount = $request->discount;
        $coupon->status = $request->status;
        $coupon->save();
        toastr('Updated Successufly','success', 'Success');
        return redirect()->route('coupon.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coupon =  coupon::findOrFail($id);
        $coupon->delete();
        return response(['status'=> 'success', 'message' =>'Deleted successufully']);
    }

    public function changeStatus(Request $request)
    {
        $coupon = coupon::findOrFail($request->id);
        $coupon->status = $request->status == 'true' ? 1 : 0;
        $coupon->save();

        return response(['message' => 'Status has been updated!']);
    }
}
