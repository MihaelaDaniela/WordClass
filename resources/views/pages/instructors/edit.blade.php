<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Edit: {{$instructors->name}}        
        </h2>
    </x-slot>
    <div class = "row">
        <div class = "col-6 offset-3">
            <div class = "card">
                <div class="card-header text-center">
                     <h2>Edit instructor</h2>
                </div>
    <div class="card-body">
                    <form method="POST" action="{{route('update-instructor',$instructors->id)}}"  enctype="multipart/form-data">
                        @CSRF
                        @method('put')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" value="{{$instructors->name}}">
                            <div id="nameHelp" class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="4" aria-describedby="descriptionHelp">{{$instructors->description}}</textarea>
                            <div id="descriptionHelp" class="form-text"></div>
                        </div>

                        <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                                    <select id="status" name="status" class="form-select" value="{{$instructors->status}}">
                                    @foreach($statuses as $value => $key)
                                            <option value="{{$value}}">{{strtoupper($value)}}</option>
                                    @endforeach
                                    </select>
                        </div>
                        <div class="mb-3"> 
                            <label for="workout_type" class="form-label">Service</label>
                                    <select id="workout_type" name="workout_type" class="form-select" value="{{$instructors->workout_type}}">
                                        @foreach($fitnesses as $fitness)
                                            <option value="{{$fitness->id}}" @if ($instructors->$fitness === $fitness->id) selected @endif)>
                                                 {{$fitness->name}} </option>
                                               
                                            
                        
                                        @endforeach
                                    </select>    
                                    </div>
                        <div class="mb-3"> 
                        <label for="club_id" class="form-label">Working on club</label>
                                    <select id="club_id" name="club_id" class="form-select" value="{{$instructors->clubs_id}}">
                                        @foreach($club_id as $club)
                                            <option value="{{$club->id}}" @if ($instructors->clubs_id === $club->id ) selected @endif>

                                                {{$club->name}} 
                                            </option>

                                        @endforeach
                                    </select>           
                        </div>

                        <div class="mb-3">
                      
                      <label for="upload_file" class="form-label">Upload photo</label>
                      <input type="file" id="upload_fileHelp" class="form-control" name="upload_file" >
                  </div>
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary text-white">Update</button>
                        </div>
                        
                        <div class="mb-3">
                            <a href="{{route('get-instructor')}}" class="btn float-end"><img src="https://icon-library.com/images/return-button-icon/return-button-icon-17.jpg" width="50px" height="50px"></a>
                        </div>
                           
            </form>
        </div>           
    </div>

</x-app-layout>