<html>
    <head>
        
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
       
    </head>
    <body>
        <style>
            body{
                background-image:url(https://img.freepik.com/free-photo/workout-concept-background-with-old-dumbbell_215990-562.jpg?w=2000);
                background-size:cover; 
               
            }
            h2{
                text-align:center;
                font-family:"verdana";
            }
            
            form {
            width: 100%;
            max-width: 700px;
            padding : 15px;
            margin: 0 auto;                             
            }     
            </style>
  
        <div class="container">
            
            <div class="row justify-content-center.my-5">
            <div style="height: 200px; width:2000px">
                <div class="col-12">
                    <div class="text-center">
                    <img src="https://bikefest.ro/wp-content/uploads/2014/08/Logo-World_Class.png"style= "width: 150px; high: 50px">
                    <div class="mb-3"></div>
                    </div>
                </div>

                <div class="col-4 offset-4">
                    <div class="card" >
                     
                        <div class="card-body">
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-3" :status="session('status')" />
            
                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-3" :errors="$errors" />
            
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="mb-3">
                                    <h2>Sign in</h2>
                                </div>
                                <!-- Email Address -->
                                <div class="mb-3">
                                    <x-label for="email" :value="__('Email')" />
            
                                    <x-input id="email" type="email" name="email" :value="old('email')" required autofocus />
                                </div>
            
                                <!-- Password -->
                                <div class="mb-3">
                                    <x-label for="password" :value="__('Password')" />
            
                                    <x-input id="password" type="password"
                                            name="password"
                                            required autocomplete="current-password" />
                                </div>
            
                                <!-- Remember Me -->
                                <div class="mb-3">
                                    <div class="form-check">
                                        <x-checkbox id="remember_me" name="remember" />
            
                                        <label class="form-check-label" for="remember_me">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
            
                                <div class="mb-0">
                                    <div class="d-flex justify-content-end align-items-baseline">
                                        
                                        <a class="text-muted me-3" href="{{ route('register') }}">
                                            Register
                                        </a>
            
                                        <x-button>
                                            {{ __('Log in') }}
                                        </x-button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
        

        <script src="{{ asset('js/app.js')}}"></script>
    </body>
</html>