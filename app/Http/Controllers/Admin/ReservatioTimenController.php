<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\DataTables\ReservationTimeDataTable;
use App\Models\ReservationTime;
use Illuminate\Http\Request;

class ReservatioTimenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ReservationTimeDataTable $dataTable)
    {
        return $dataTable->render('admin.reservation.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.reservation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'start_time'=>['required'],
            'end_time'=>['required'],
            'status'=>['required','boolean']
        ]);

        $time =  new ReservationTime();
        $time->start_time = $request->start_time;
        $time->end_time = $request->end_time;
        $time->status = $request->status;
        $time->save();
        toastr()->success('Reservation-time created successfully!','success');
        return redirect()->route('reservation-time.index');



    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $time = ReservationTime::findOrFail($id);
       return view('admin.reservation.edit',compact('time'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'start_time'=>['required'],
            'end_time'=>['required'],
            'status'=>['required','boolean']
        ]);

        $time = ReservationTime::findOrFail($id);
        $time->start_time = $request->start_time;
        $time->end_time = $request->end_time;
        $time->status = $request->status;
        $time->save();
        toastr()->success('Reservation-time Updated successfully!','success');
        return redirect()->route('reservation-time.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coupon =  ReservationTime::findOrFail($id);
        $coupon->delete();
        return response(['status'=> 'success', 'message' =>'Deleted successufully']);
    }

    public function changeStatus(Request $request){

        $time = ReservationTime::findOrFail($request->id);
        $time->status = $request->status == 'true' ? 1 : 0;
        $time->save;
        return response(['message'=>'status has been succsufully']);

      }
}
