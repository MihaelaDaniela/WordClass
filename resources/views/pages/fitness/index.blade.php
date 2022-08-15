<x-app-layout>
    <x-slot name="header">
            <h2>
                 Fitness
            </h2>
        </x-slot>

    <div class="card my-4">
        <div class="card-body" >
        
            <div class="row" >
                <div class="col-8">
                    <form method="POST" action="{{route('search-fitness')}}" >
                        @csrf
                        <div class="row">
                            <div class="col-4">
                            <input type="text" class="form-control" name="search_fitness" />
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-4">
                        <a href = "{{route('add-fitness')}}" class="float-end"><i class="bi bi-plus-circle" style="font-size: 2rem"></i></a> 
     
                </div>
            </div>
            <hr/>
            <div class="row mt-3">
                <div class="col-12">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Intensity level</th>
                                <th>Equipment</th>
                                <th>Action</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fitnesses as $fitness)
                                <tr>
                                    <td>{{$fitness->name}}</td>
                                    <td>{{$fitness->intensity_level}}</td>
                                    <td>{{$fitness->equipment}}</td>                                    
                                    <td>
                                            <button type="submit"class="btn btn-sm btn-sm"><a href="{{route('view-fitness',$fitness->id)}}"><i class="bi bi-binoculars" style="font-size: 1.5rem"></i></a></button>

                                            <button type="submit"class="btn btn-sm btn-sm"><a href="{{route('edit-fitness',$fitness->id)}}"><i class="bi bi-pencil" style="font-size: 1.5rem" ></i></a></button>
                                            
                                            <form style="display: inline;" method="POST"action ="{{route('delete-fitness',$fitness->id)}}" >
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-sm btn-sm"><i class="bi bi-x-square" style="font-size: 1.5rem"></i></button>
                                            </form>                 
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $fitnesses->links() }}
                </div>
            </div>
            
            
        </div>
    </div>

</x-app-layout>