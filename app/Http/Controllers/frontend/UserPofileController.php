<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use App\Traits\ImageUploadTrait; //opmerk

class UserPofileController extends Controller
{
    use ImageUploadTrait; //opmerk

    public function index(){
        return view('frontend.dashboard.index');
       }
       public function updateProfile(Request $request){
        $request-> validate([
           'name' => ['required', 'max:100'],
           'email' => ['required', 'email', 'unique:users,email,'.Auth::user()->id], //opmerk
           'image' =>['image', 'max:2048']
        ]);
        $user = Auth::user();
        if($request->hasFile('image')){
           if(File::exists( public_path($user->image))){
              File::delete( public_path($user->image));
           }
           $image = $request->image;
           $imageName = rand().'_'.$image->getClientOriginalName();
           $image->move(public_path('uploads'), $imageName);
           $path = "/uploads/".$imageName;

           $user->image = $path;
        }
        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();
        toastr()->success('profile update  successfully!');
        return  redirect()->back();
     }

    /*update password*/
     public function updatePassword(Request $request){
        $request->validate([
           'current_password' => ['required', 'current_password'],
           'password' =>['required','confirmed','min:8']
          ]);
          $request->user()->update([
           'password'=>bcrypt($request->password)
          ]);
          toastr()->success('password update successfully!');
          return redirect()->back();
     }

     /*update image*/
     public function updateImage(Request $request){

        $imagePath = $this->uploadImage($request, 'image', 'uploads');

      $user = Auth::user();
      $user->image = $imagePath;
      $user->save();
      return response(['status'=>'success', 'massage' => 'image updated successfully']);




     }
}
