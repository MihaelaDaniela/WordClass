<x-app-layout>
    <x-slot name="header">
       
            <h2>
               User Profile
            </h2>
        
        </x-slot>
<body>
    <style></style>
</body>


<div class="container rounded bg-white mt-5 mb-5" style="width: 800px; height:auto">
    <div class="row">
        <div class="col-md-4 border-right">
            <div class="d-flex flex-column align-items-center text-center p-5 py-5"><img class="rounded-circle mt-5" width="150px" src="/{{$user->profile->uploadFile}}"><span class="font-weight-bold"></span></div>
            <span class="text-black-50"></span>
            
        </div>

        <div class="col-md-6 border-right">
            <div class="p-3 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Profile Settings</h4>
                </div>
              
                   
                <div class="row mt-2">
                    <div class="col-md-6"><label class="labels">Full Name</label><input type="text" class="form-control" placeholder="name" value="{{$user->name}}" disabled></div>
                    <div class="col-md-6"><label class="labels">Email</label><input type="text" class="form-control" value="{{$user->email}}" placeholder="email adress" disabled></div>
                </div>
                <div class="row mt-3">
                   
                    <div class="col-md-12"><label class="labels">Birth date</label><input type="text" class="form-control" placeholder="birth_date" value="@if($user->profile->birth_date !== null){{$user->profile->birth_date->format('d.m.Y')}}@endif" disabled></div>
                   
                    
                    <div class="col-md-12"><label class="labels">Gender</label><input type="text" class="form-control" placeholder="gender" value="{{$user->profile->gender}}" disabled></div>
                    <div class="col-md-12"><label class="labels">Adress</label><input type="text" class="form-control" placeholder="adress" value="{{$user->profile->adress}}" disabled></div>
                    <div class="col-md-12"><label class="labels">User type</label><input type="text" class="form-control" placeholder="user type" value="{{$user->profile->user_type}}" disabled></div>
                   
                </div>
                <div class="mt-2">
                <a href="{{route('edit-user')}}" class="btn btn-primary">Edit Profile</a>
                </div>
            </div>
            </form>
        </div>


    </div>

</div>
</div>
</div>
</x-app-layout>