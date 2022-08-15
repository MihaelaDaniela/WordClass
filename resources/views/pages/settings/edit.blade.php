<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
           Edit Profile
        </h2>
    </x-slot>
    <div class="row">
        <div class="col-6 offset-3">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Edit Profile</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('update-profile',$user->id)}}" enctype="multipart/form-data">
                        @CSRF
                        @method('put')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp" value="{{$user->name}}">
                            <div id="nameHelp" class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" name="email" class="form-control" id="email" rows="4" aria-describedby="emailHelp" value="{{$user->email}}">
                            <div id="emailHelp" class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="birth_date" class="form-label">Birthday date</label>
                            <input type="date" name="birth_date" class="form-control" id="birth_date" aria-describedby="birth_dateHelp" >
                            <div id="birth_dateHelp" class="form-text">Previously birth date:{{$user->profile->birth_date->format('d.m.Y')}}</div>
                        </div>
                        <div class="mb-3"> 
                        <label for="gender" class="form-label">Gender</label>
                                    <select id="gender" name="gender" class="form-select" value="{{$user->profile->gender}}">
                                        
                                            <option value="Male">
                                                Male
                                            </option>
                                            <option value="Female">
                                                Female
                                            </option>
                                        
                                    </select>           
                        </div>
                        
                        <div class="mb-3">
                            <label for="adress" class="form-label">Adress</label>
                            <input type="text" name = "adress" class="form-control" id="adress" aria-describedby="adressHelp" value="{{$user->profile->adress}}">
                            <div id="adressHelp" class="form-text"></div>
                        </div> 
                        <div class="mb-3">
                            <label for="user_type" class="form-label">User type</label>
                            <input type="user_type" name="user_type"  class="form-control" id="user_type" aria-describedby="user_typeHelp" value="{{$user->profile->user_type}}">
                            <div id="user_typeHelp" class="form-text"></div>
                        </div>
                        

                        <div class="mb-3">
                      
                            <label for="uploadFile" class="form-label">Upload image</label>
                            <input type="file" id="uploadFileHelp" class="form-control" name="uploadFile" >
                        </div>
                        
                        
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary text-white">Save</button>
                        </div>
                        <div class="mb-3">
                            <a href="{{route('get-user-profile')}}" class="btn float-end"><img src="https://icon-library.com/images/return-button-icon/return-button-icon-17.jpg" width="50px" height="50px"></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>