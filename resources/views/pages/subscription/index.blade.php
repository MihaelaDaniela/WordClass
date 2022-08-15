<x-app-layout>
    <x-slot name="header">
            <h2>
                Subscriptions
            </h2>
        
        </x-slot>
        <div class="card my-4">
        <div class="card-body">

            <div class ="row">
                <div class ="col-12">
                    <a href = "{{route('add-subscription')}}" class="float-end"><i class="bi bi-plus-circle" style="font-size: 2rem"></i></a>
                </div>
            </div>
            <br/>

            <div class ="row">
                <div class ="col-12">
                    <table class = "table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subscription as $subscription)
                            <tr>
                                <td>{{$subscription->name}}</td>
                                <td>{{$subscription->description}}</td>
                                <td>{{$subscription->price}} $/month</td>
                                
                        
                                <td>
                                <button type="submit"class="btn btn-sm btn-sm"><a href="{{route('view-subscription', $subscription->id)}}"><i class="bi bi-binoculars"style="font-size: 1.5rem"></i></a></button>

                                <button type="submit"class="btn btn-sm btn-sm"><a href="{{route('edit-subscription',$subscription->id)}}"><i class="bi bi-pencil" style="font-size: 1.5rem" ></i></a></button>

                                    <form style="display: inline;" method="POST" action="{{route('delete-subscription',$subscription->id)}}">
                                        @csrf
                                        @method("delete")
                                        <button type="submit" class="btn btn-sm btn-sm"><i class="bi bi-x-square" style="font-size: 1.5rem"></i></button>
                                    </form>   

                                </td>
                            </tr>

                            @endforeach
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
 
</x-app-layout>