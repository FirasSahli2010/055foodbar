<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AfspraakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
            'name' => ['required', 'max:255'],
            'phone' => ['required', 'max:50'],
            'date' => ['required','date'],
            'time' =>['required'],
            'persons' =>['required', 'numeric']

        ]);
        if(!Auth::check()){
            throw ValidationException::withMessages(['Please Login to Request reserveren']);
        }
        $reservation = new Reservation();
        $reservation->reservation_id = rand(0, 500000);
        $reservation->user_id = auth()->user()->id;
        $reservation->name = $request->name;
        $reservation->phone = $request->phone;
        $reservation->date = $request->date;
        $reservation->time = $request->time;
        $reservation->persons = $request->persons;
        $reservation->status = 'pending';
        $reservation->save();

        return response(['status' => 'success', 'message' => 'Reservering succesvol verzonden']);

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
        //
    }
}
