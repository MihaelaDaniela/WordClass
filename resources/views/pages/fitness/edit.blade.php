<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Edit service : {{$fitness->name}}        
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-6 offset-3">
            <div class="card">
                <div class="mb-3 text-center">
                    <h2 style="display:inline;">Edit service</h2>
                    
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('update-fitness',$fitness->id)}}"  enctype="multipart/form-data">
                        @CSRF
                        @method('put')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" value="{{$fitness->name}}">
                            <div id="nameHelp" class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="4" aria-describedby="descriptionHelp">{{$fitness->description}}</textarea>
                            <div id="descriptionHelp" class="form-text"></div>
                        </div>
                            <div class="mb-3"> 
                            <label for="intensity_level" class="form-label">Intensity level</label>
                                        <select id="intensity_level" name="intensity_level" class="form-select">
                                                <option value="Easy">
                                                    Easy
                                                </option>
                                                <option value="Medium">
                                                    Medium
                                                </option>
                                                <option value="Hard">
                                                    Hard
                                                </option>
                                            
                                        </select>           
                            </div>
                            <div class="mb-3"> 
                            <label for="equipment" class="form-label">Equipment included</label>
                                        <select id="equipment" name="equipment" class="form-select">
                                                <option value="Included">
                                                Included
                                                </option>
                                                <option value="Not Included">
                                                    Not Included
                                                </option>
                                            
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
                            <a href="{{route('get-fitness')}}" class="btn float-end"><img src="https://icon-library.com/images/return-button-icon/return-button-icon-17.jpg" width="50px" height="50px"></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>