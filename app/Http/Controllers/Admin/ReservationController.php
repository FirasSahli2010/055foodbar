<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ReservationDataTable;
use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use View;

class ReservationController extends Controller
{
    public function index(ReservationDataTable $dataTable)
    {
        return $dataTable->render('admin.reservation.reservation-klant');
    }

    public function update(Request $request){
        $reservation = Reservation::findOrFail($request->id);
        $reservation->status = $request->status;
        $reservation->save();
        return response(['status' => 'success', 'message' => 'updated successfully!']);

    }

    public function destroy(string $id){
        $reservation = Reservation::findOrFail($id);
        {
            $reservation->delete();
              return response(['status'=> 'success', 'message' =>'Deleted successufully']);}
          }

}
