<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{$client->name}}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h3>{{$client->name}}</h3>
                    <ul>
                        <li>Name: {{$client->name}}</li>
                        <li>Gender: {{(\App\General\Concretes\ClientGender::getValueById($client->gender))}}</li>
                        <li>Adress: {{$client->adress}}</li>
                        <li>Birthdate: {{$client->birth_date->format('d.m.Y')}}</li>
                        <li>Email: {{$client->email}}</li>
                        <li>Phone number: 0{{$client->phone_number}}</li>
                        <li>Instructor name: {{$client->trainer_name}}</li>
                        <li>Client subscription: @foreach ($client->subscription as $subscription)
                                        {{$subscription->name}}
                                    @endforeach</li>
                        <li>Subscription type: {{$client->subscription_type}}</li>
                        <li>Subscription available for: @foreach ($client->clubs as $club)
                                        {{$club->name}}
                                    @endforeach</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-7">
                            <h1>Description:</h1>
                            <h3>Subscription started on: {{$client->created_at}}</h3>
                        </div>
                        <div class="col-5">
                            <a href="{{route('get-clients')}}" class="btn float-end"><img src="https://icon-library.com/images/return-button-icon/return-button-icon-17.jpg" width="50px" height="50px"></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
