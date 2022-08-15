<?php

namespace App\Http\Controllers;

use App\General\Concretes\ClientGender;
use App\Http\Requests\AddClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\ClientModel;
use App\Models\Clubs;
use App\Models\InstructorModel;
use App\Models\SubscriptionModel;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index(){
        $subscription=SubscriptionModel::all();
        $club=Clubs::all();
        $client=ClientModel::paginate(4); //aduce toate randurile din tabel 
        
        return view('pages.client.index',[
            "clients"=> $client,
            "subscriptions"=>$subscription,
            "club_id"=>$club
            
        ]);
    }



    public function search(Request $request)
    {
       
            $name=$request->post('search_client');
            $client = ClientModel::where('name','like','%'.$name.'%')
        
            ->paginate(4);


        
        return view('pages.client.index',[
            'clients' => $client
        ]);
    }



    public function add(Request $request) {
        $subscription= SubscriptionModel::all();
        $instructors=InstructorModel::all();
        $gender= ClientGender::getGender();
        $club=Clubs::all();

        return view ("pages.client.add",[
            'subscription'=>$subscription,
            'gender'=> $gender,
            'instructor'=>$instructors,
            'club_id'=>$club
        ]);
    }



    public function store (AddClientRequest $request) {
        if($request ->validated()) {
            $args = $request -> only([
                "name",
                "gender",
                "adress",
                "birth_date",
                "email",
                "phone_number",
                "trainer_name",
                "subscription_type"
            ]);

        $client = new ClientModel($args);

        if ($client ->save()) {

            $client->subscription()->attach($request->only(['subscription_id']));

            $client->clubs()->attach($request->only(['club_id']));

        return redirect()->route("get-clients") -> with("success", "Client added succesfully!");
            }
        }
        return redirect()-> route("add-client-subscription")->with("failed", "Something went wrong!");

    }


    public function view(ClientModel $client)

    {
        return view('pages.client.view',[
        'client'=>$client ]);
    
    }


public function destroy(ClientModel $client)
{
    if($client->delete())
    {
        return redirect()->route('get-clients')->with('success','Client deleted succesfully');
    }
}


public function edit(ClientModel $client){
    $club=Clubs::all();
    $instructor=InstructorModel::all();
    $subscription=SubscriptionModel::all();

    return view('pages.client.edit',[
        'client'=>$client,
        'gender'=> ClientGender::getGender(),
        'subscription'=>$subscription,
        'instructor'=>$instructor,
        'club_id'=>$club
    ]);
}



public function update(UpdateClientRequest $request, ClientModel $client )
{
    if($request->validated())
    {
        $args = $request->only([
            "name",
            "gender",
            "adress",
            "birth_date",
            "email",
            "phone_number",
            "trainer_name",
            "subscription_type"
        ]);


                $client->subscription()->detach();
                $client->clubs()->detach();

                $client->subscription()->attach($request->only(['subscription_id']));

                $client->clubs()->attach($request->only(['club_id']));

    
                if($client->update($args))
                {
                    return redirect()->route('edit-client',$client->id)->with('success','Client details updated succesfully!');
                }
                else{
                    return redirect()->route('get-clients',$client->id)->with('failed','Somethimg went wrong!');
                }
            }
        }


}

