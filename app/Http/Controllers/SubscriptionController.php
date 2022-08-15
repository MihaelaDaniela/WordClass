<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddSubscriptionRequest;
use App\Http\Requests\UpdateSubscriptionRequest;
use App\Models\ClientModel;
use App\Models\Fitness;
use App\Models\SubscriptionModel;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function index() {
        $subscription= SubscriptionModel::all();
        return view("pages.subscription.index",[
            'subscription'=>$subscription
       ]);
    }
    public function add() {
        $fitnesses=Fitness::all();
        return view ("pages.subscription.add",[
            'fitnesses'=>$fitnesses,
            
        ]);
    }
/**
 * Functia care adauga un nou proiect in tabela "projects
 */
    public function store (AddSubscriptionRequest $request) {
        if($request ->validated()) {
            $args = $request -> only([
                "name",
                "description",
                "price",
                "services"
            ]);

            
        $subscription = new SubscriptionModel($args);

        if ($subscription ->save()) {
            $subscription->fitnesses()->attach($args["services"]);
        return redirect()->route("get-subscription") -> with("success", "Subscription added succesfully!");
            }
        }
        return redirect()-> route("add-subscription")->with("failed", "Something went wrong!");

    }


    public function view(SubscriptionModel $subscription)
{  $client=ClientModel::all();
   $fitnesses=Fitness::all();
    return view('pages.subscription.view',[
        'subscription' => $subscription,
        'fitnesses'=>$fitnesses,
        'client'=>$client
    ]);
}

public function destroy( SubscriptionModel $subscription)
{
    if($subscription->delete())
    {
        return redirect()->route('get-subscription')->with('success','Subscription deleted succesfully');
    }
}
public function edit(SubscriptionModel $subscription)
{
    $fitnesses=Fitness::all();
    return view('pages.subscription.edit',[
        'subscription' => $subscription,
        'fitnesses'=>$fitnesses
    ]);
}

public function update(UpdateSubscriptionRequest $request, SubscriptionModel $subscription)
{
    if($request->validated())
    
    {
        $args = $request->only([
            "name",
            "description",
            "price",
            "services"
            
        ]);
    
                if($subscription->update($args))
                {
                    $subscription->fitnesses()->detach();
                    $subscription->fitnesses()->attach($args['services']);
                    return redirect()->route('get-subscription')->with('success','Subscription updated succesfully!');
                }
                else{
                    return redirect()->route('edit-subscription',$subscription->id)->with('failed','Subscription not updated!');
                }
            }
        }
}

