<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Delivery;
use App\Models\Reservation;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $deliveryAreas= Delivery::where('status', 1)->get();
        $userAddresses = Address::where('user_id', auth()->user()->id)->get();
        $reserveren = Reservation::where('user_id', auth()->user()->id)->get();
        return view('frontend.dashboard.index',compact('deliveryAreas','userAddresses','reserveren' ));


    }

    public function createAddress(Request $request){

        $request->validate([
        'area_name' => ['required','integer'],
        'first_name' => ['required', 'max:255'],
        'last_name' => ['nullable', 'max:255'],
        'phone' => ['required',  'max:255'],
        'email' =>['required', 'email', 'max:255'],
        'address' => ['required'],
        'type'=> ['required', 'in:home,office']

        ]);

        $address = new Address();

        $address->user_id = auth()->user()->id;
        $address->delivery_area_id = $request->area_name;
        $address->first_name = $request->first_name;
        $address->last_name= $request->last_name;
        $address->phone = $request-> phone;
        $address->email = $request-> email;
        $address->address = $request->address;
        $address->type = $request-> type;
        $address->save();
        toastr(' Adress created Successufly','success', 'Success');
        return redirect()->back();

    }

    public function updateAddress(string $id, Request $request )
    {
        $address = Address::findOrFail($id);
        $address->user_id = auth()->user()->id;
        $address->delivery_area_id = $request->area_name;
        $address->first_name = $request->first_name;
        $address->last_name= $request->last_name;
        $address->phone = $request-> phone;
        $address->email = $request-> email;
        $address->address = $request->address;
        $address->type = $request-> type;
        $address->save();
        toastr()->success('updated successfully');
        return redirect()->route('dashboard');
    }

    public function destroyAddress(string $id){
        $address = Address::findOrFail($id);
        if($address && $address->user_id === auth()->user()->id){
            $address->delete();
            return response(['status'=> 'success', 'message' => 'Deleted Successfully']);
        }

        return response(['status' => 'error', 'message'=>'Somthing went wrong!']);


    }



}
