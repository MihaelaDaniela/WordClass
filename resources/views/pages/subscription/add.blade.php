<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 font-weight-bold">
            Add a new subscription
        </h2>
    </x-slot>

    <div class="row">
        <div class="col-6 offset-3">
            <div class="card">
                <div class="card-header text-center">
                    <h2>Add a new subscription</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('store-subscription') }}">
                        @CSRF
                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" class="form-control" id="name" aria-describedby="nameHelp">
                            <div id="nameHelp" class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" name="description" id="description" rows="4" aria-describedby="descriptionHelp"></textarea>
                            <div id="descriptionHelp" class="form-text"></div>
                        </div>

                        <div class="mb-3">
                            <label for="services" class="form-label">Services</label>
                            <select multiple id="services" name="services[]" class="form-control">
                                @foreach ($fitnesses as $fitness)
                                    <option value="{{$fitness->id}}">
                                       {{$fitness->name}}
                                    </option>

                                @endforeach

                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Price</label>
                            <input type="number" name="price" class="form-control" id="price" aria-describedby="priceHelp">
                            <div id="priceHelp" class="form-text"></div>
                        </div>
                        
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-primary text-white">Add</button>
                        </div>
                        <div class="mb-3">
                            <a href="{{route('get-subscription')}}" class="btn float-end"><img src="https://icon-library.com/images/return-button-icon/return-button-icon-17.jpg" width="50px" height="50px"></a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>