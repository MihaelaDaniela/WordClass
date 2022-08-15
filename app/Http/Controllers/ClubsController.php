<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddClubRequest;
use App\Http\Requests\UpdateClubRequest;
use App\Models\Clubs;
use Illuminate\Http\Request;

class ClubsController extends Controller

{   
    public function index(){
    $club=Clubs::paginate(5);   
        return view('pages.clubs.index',[
        'clubs'=>$club

        ]);
    }

    public function add(Request $request)
    {
        return view('pages.clubs.add');
    }

    public function store(AddClubRequest $request){
    if($request ->validated()) {
            $args = $request -> only([
                "name",
                "country",
                "city",
                "adress"
            ]);
            $club = new Clubs($args);

            if ($club ->save()) {
            return redirect()->route("add-club") -> with("success", "Club added succesfully!");
                }
            }
            return redirect()-> route("add-club")->with("failed", "Something went wrong!");
    
    }
    public function destroy(Clubs $club)
    {
        if($club->delete())
        {
            return redirect()->route('get-clubs')->with('success','Club deleted succesfully');
        }
        
    }
    
    public function edit(Clubs $club)
    {  
        return view('pages.clubs.edit',[
            'club' => $club
        ]);
    }
    
    public function update(UpdateClubRequest $request, Clubs $club)
    {
        if($request->validated())
        {
            $args = $request->only([
                'name',
                'country',
                'city',
                'adress'
            ]);
        
                    if($club->update($args))
                    {
                        return redirect()->route('edit-club',$club->id)->with('success','Club adress updated succesfully!');
                    }
                    else{
                        return redirect()->route('edit-club',$club->id)->with('failed','Adresses not updated!');
                    }
                }
            }
}

