<x-app-layout>
    <x-slot name="header">
    
        <h2>
        Clients
        </h2>
        </x-slot>
        <div class="card my-4">
        <div class="card-body">
        <div class="row">
                <div class="col-8">
                    <form method="POST" action="{{route('search-client')}}">
                        @csrf
                        <div class="row">
                            <div class="col-4">
                            <input type="text" class="form-control" name="search_client" />
                            </div>
                            <div class="col-auto">
                            <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>

            <div class ="row">
                <div class ="col-12">
                    <a href = "{{route('add-client-subscription')}}"  class="float-end"><i class="bi bi-plus-circle" style="font-size: 2rem"></i></a>
                </div>
            </div>
            <br/>

            <div class ="row">
                <div class ="col-12">
                    <table class = "table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Adress</th>
                                <th>Date of birth</th>
                                <th>Email adress</th>
                                <th>Phone number</th>
                                <th>Apply for personal trainer</th>
                                <th>Subscription name</th>
                                <th>Subscription type</th>
                                <th>Subscription for city</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($clients as $client)
                            <tr>
                                <td>{{$client->name}}</td>
                                <td>{{(\App\General\Concretes\ClientGender::getValueById($client->gender))}}</td>
                                <td>{{$client->adress}}</td>
                                <td>{{$client->birth_date->format('d.m.Y')}}</td>
                                <td>{{$client->email}}</td>
                                <td>0{{$client->phone_number}}</td>
                                <td>{{$client->trainer_name}}</td>
                                <td>@foreach ($client->subscription as $subscription)
                                        {{$subscription->name}}
                                    @endforeach</td>
                                <td>{{$client->subscription_type}}</td>
                                <td>@foreach ($client->clubs as $club)
                                        {{$club->name}}
                                    @endforeach</td>
                        
                                <td>
                                <button type="button"class="btn btn-sm btn-sm"><a href="{{route('view-client',$client->id)}}"><i class="bi bi-binoculars"style="font-size: 1.5rem"></i></a></button>

                                <button type="button"class="btn btn-sm btn-sm"><a href="{{route('edit-client',$client->id)}}"><i class="bi bi-pencil" style="font-size: 1.5rem" ></i></a></button>

                                <form style="display: inline;" method="POST" action="{{route('delete-client' ,$client->id)}}">
                                        @csrf
                                        @method("delete")
                                        <button type="submit" class="btn btn-sm btn-sm"><i class="bi bi-x-square" style="font-size: 1.5rem"></i></button>
                                    </form>   

                                </td>
                            </tr>

                            @endforeach
                        </tbody>

                    </table>
                    {{ $clients->links() }}
                </div>
            </div>
        </div>
    </div>
 
</x-app-layout>