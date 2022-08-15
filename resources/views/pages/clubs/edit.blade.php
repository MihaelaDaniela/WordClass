<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Edit club : {{$club->city}}        
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-6 offset-3">
            <div class="card">
                <div class="mb-3 text-center">
                    <h2 style="display:inline;">Edit club</h2>
                    
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('update-club',$club->id)}}">
                        @CSRF
                        @method('put')
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name = "name" class="form-control" value="{{$club->name}}" id="name" aria-describedby="nameHelp">
                                <div id="nameHelp" class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="country" class="form-label">Country</label>
                            <input type="text" name = "country" class="form-control" id="country" value="{{$club->country}}" aria-describedby="countryHelp">
                                <div id="countryHelp" class="form-text">{{$club->country}}</div>
                        </div>
                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" name = "city" class="form-control" id="city" value="{{$club->city}}" aria-describedby="cityHelp">
                                <div id="cityHelp" class="form-text"></div>
                        </div>
                               
                        <div class="mb-3">
                                    <label for="adress" class="form-label">Adress</label>
                                    <input type="text" name="adress" class="form-control" value="{{$club->adress}}" aria-describedby="adressHelp">
                                    <div id="adressesHelp" class="form-text"></div>
                        </div>
                        
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary text-white">Update</button>
                        </div>
                        <div class="mb-3">
                            <a href="{{route('get-clubs')}}" class="btn float-end"><img src="https://icon-library.com/images/return-button-icon/return-button-icon-17.jpg" width="50px" height="50px"></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>