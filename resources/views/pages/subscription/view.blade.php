<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            {{$subscription->name}}
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-3">
            <div class="card">
                <div class="card-body">
                    <h3>{{$subscription->name}}</h3>
                    <ul>
                        <li>Name: {{$subscription->name}}</li>
                        <li> Services: 
                            <ul>
                            @foreach($subscription->fitnesses as $fitness)
                            <li>{{$fitness->name}}</li>
                            @endforeach
                            </ul>
                           
                        </li>
                        <li>Price: {{$subscription->price}} $/month</li>                        
                    </ul>
                </div>
            </div>
        </div>
        <div class="col-9">
            <div class="card">
                <div class="card-body">
                <div class="row">
                    <div class="col-7">
                            <h1>Description: </h1></br><h4><br>{{$subscription->description}}</h4>
                        </div>
                        <div class="col-5">
                        <a href="{{route('get-subscription')}}" class="btn float-end"><img src="https://icon-library.com/images/return-button-icon/return-button-icon-17.jpg" width="50px" height="50px"></a>                           
                            
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

