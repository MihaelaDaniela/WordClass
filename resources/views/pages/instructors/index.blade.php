<x-app-layout>
    <x-slot name="header">
       
            <h2>
                Instructors
            </h2>
        
        </x-slot>
        <div class="card my-4">
        <div class="card-body">

            <div class ="row">
                <div class ="col-12">
                    <a href = "{{route('add-instructor')}}"  class="float-end"><i class="bi bi-plus-circle" style="font-size: 2rem"></i></a>
                </div>
            </div>
            <br/>

            <div class ="row">
                <div class ="col-12">
                    <table class = "table">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Status</th>
                                <th>Service</th>
                                <th>Working on club</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($instructors as $instructor)
                            <tr>
                                <td>{{$instructor->name}}</td>
                                <td>{{strtoupper($instructor->status)}}</td>
                                <td>@foreach ($instructor->fitnesses as $fitness)
                                        {{$fitness->name}}
                                    @endforeach
                                </td>
                                <td>{{$instructor->club->name}}</td>
                        
                                <td>
                                <button type="submit"class="btn btn-sm btn-sm"><a href="{{route('view-instructor',$instructor->id)}}"><i class="bi bi-binoculars"style="font-size: 1.5rem"></i></a></button>

                                <button type="submit"class="btn btn-sm btn-sm"><a href="{{route('edit-instructor',$instructor->id)}}"><i class="bi bi-pencil" style="font-size: 1.5rem" ></i></a></button>

                                <form style="display: inline;" method="POST"action ="{{route('delete-instructor',$instructor->id)}}">
                                        @csrf
                                        @method("delete")
                                        <button type="submit" class="btn btn-sm btn-sm"><i class="bi bi-x-square" style="font-size: 1.5rem"></i></button>
                                    </form>   

                                </td>
                            </tr>

                            @endforeach
                        </tbody>

                    </table>
                    {{ $instructors->links() }}
                </div>
            </div>
        </div>
    </div>
 
</x-app-layout>