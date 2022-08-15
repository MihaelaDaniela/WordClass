<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateProfileRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SettingsController extends Controller

{
    public function index()
    
    { 
        $user=Auth::user();
        return view('pages.settings.index',[
            'user'=>$user,
            
        ]);
    }





    public function edit()
    {   
        return view('pages.settings.edit', [
            'user'=>Auth::user()
        ]);
        
    }

    public function store(Request $request, User $user)
    {
        
        if($user->profile->save())
        {
            $file = $request->file('uploadFile');

            $file = $file->storeAs('public/profiles', 'uploadFile_'.$user->id.'.'.$file->extension());

            $pathArray = explode('/',$file);

            $filePath = 'storage/'.$pathArray[1].'/'.$pathArray[2];

            $user->file_upload = $filePath;
        }
    
    }

    public function update(UpdateProfileRequest $request, User $user )
    {
        if($request->validated())
        {
            $args = $request->only([
                "name",
                "email",
                "birth_date",
                "gender",
                "adress",
                "user_type",
                "uploadFile"
            ]);

            

            if ($user->update([
                'name'=>$args['name'],
                'email'=>$args['email'],
        
            ]))
            {
                if($user->profile()->update([
                    "birth_date"=>$args['birth_date'],
                    "gender"=>$args['gender'],
                    "adress"=>$args['adress'],
                    "user_type"=>$args['user_type'],
                    

                ]))
                {
                    $file = $request->file('uploadFile');

                    $file = $file->storeAs('public/profiles', 'uploadFile_'.$user->id.'.'.$file->extension());

                    $pathArray = explode('/',$file);

                    $filePath = 'storage/'.$pathArray[1].'/'.$pathArray[2];

                    $user->profile()->update(['uploadFile'=>$filePath]);

                    return redirect()->route('get-user-profile')->with('success','User profile updated!');
                }
                else{
                    return redirect()->route('get-user-profile',)->with('failed','Something went wrong!');
                }
            }
            else
            {
                return redirect()->route('get-user-profile',)->with('failed','Something went wrong!');
            }
        

        }
    }

    public function downloadProfileFile(Request $request)
    {
        $filepath=$request->get('filepath');
        return response()->download($filepath);

    }
    
  
    public function uploadFile(Request $request)
    {
            $imagePath = $request->get('imagePath');

            return response()->download($imagePath);
    }
   


    
}