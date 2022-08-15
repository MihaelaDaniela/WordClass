<x-app-layout>
    <x-slot name="header">
       
            <h2>
                Clubs
            </h2>
        
        </x-slot>
        <div class="card my-4">
        <div class="card-body">

            <div class ="row">
                <div class ="col-12">
                    <a href = "{{route('add-club')}}"  class="float-end"><i class="bi bi-plus-circle" style="font-size: 2rem"></i></a>
                </div>
            </div>
            <br/>

            <div class ="row">
                <div class ="col-12">
                    <table class = "table">
                        <thead>
                            <tr>

                                <th>Name</th>
                                <th>Country</th>
                                <th>City</th>
                                <th>Adress</th>
                                <th>Action</th>
                               
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($clubs as $club)
                            <tr>
                                <td>{{$club->name}}</td>
                                <td>{{$club->country}}</td>
                                <td>{{$club->city}}</td>
                                <td>{{$club->adress}}</td>
                                
                        
                                <td>
                                

                                <button type="submit"class="btn btn-sm btn-sm"><a href="{{route('edit-club',$club->id)}}"><i class="bi bi-pencil" style="font-size: 1.5rem" ></i></a></button>

                                <form style="display: inline;" method="POST"action ="{{route('delete-club',$club->id)}}">
                                        @csrf
                                        @method("delete")
                                        <button type="submit" class="btn btn-sm btn-sm"><i class="bi bi-x-square" style="font-size: 1.5rem"></i></button>
                                </form>   

                                </td>
                            </tr>

                            @endforeach
                        </tbody>

                    </table>
                    {{ $clubs->links() }}
                </div>
            </div>
        </div>
    </div>
 
</x-app-layout>