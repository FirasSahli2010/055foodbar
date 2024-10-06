<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DataTables\aboutDataTable;
use App\Models\about;
use Str;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(aboutDataTable $datTable)
    {
        return $datTable->render('admin.about.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'icon'=>['required','not_in:empty'],
            'type'=>['required', 'max:200'],
            'title'=>['required'],
            'status'=>['required']
           ]);

           $about = new about();
           $about->icon = $request->icon;
           $about->type = $request->type;
           $about->title = $request->title;
           $about->status = $request->status;
           $about->save();

           toastr()->success('gegeven toevoeged successfully!');
           return redirect()->route('about.index');

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
       $about = about::findOrFail($id);

       return view('admin.about.edite',compact('about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'icon'=>['required','not_in:empty'],
            'type'=>['required', 'max:200'],
            'title'=>['required'],
            'status'=>['required']
           ]);
           $about= about::findOrFail($id);
           $about->icon = $request->icon;
           $about->type = $request->type;
           $about->name = $request->name;
           $about->status = $request->status;
           $about->save();

           return redirect()->route('admin.category.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $about= about::findOrFail($id);
        $about->delete();
        return response(['status'=> 'success', 'message' =>'Deleted successufully']);
        return redirect()->route('about.index');
    }



    public function changeStatus(Request $request)
    {
        $about = about::findOrFail($request->id);
        $about->status = $request->status == 'true' ? 1 : 0;
        $about->save();
        return response(['message' => 'Status has been updated!']);

    }
}
