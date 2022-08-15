<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <div class="col-12">
                    <div class="text-center">
                    <img src="https://bikefest.ro/wp-content/uploads/2014/08/Logo-World_Class.png"style= "width: 150px; high: 50px">
                    <div class="mb-3"></div>
                    </div>
                </div>
            </a>
        </x-slot>
        
        <style>
            body{
                background:url(https://img.freepik.com/free-photo/workout-concept-background-with-old-dumbbell_215990-562.jpg?w=2000) !important;
                background-size:cover;
            }
            h2{
                text-align: center;
                font-family:verdana;
            }
            
        </style>

        <div class="card-body">
            <!-- Validation Errors -->
            
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('register') }}">
                @csrf
            <div class="mb-3">
                <h2>Register</h2>
            </div>
                <!-- Name -->
                <div class="mb-3">
                    <x-label for="name" :value="__('Name')" />

                    <x-input id="name" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <!-- Email Address -->
                <div class="mb-3">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" type="email" name="email" :value="old('email')" required />
                </div>

                <!-- Password -->
                <div class="mb-3">
                    <x-label for="password" :value="__('Password')" />

                    <x-input id="password" type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <x-label for="password_confirmation" :value="__('Confirm Password')" />

                    <x-input id="password_confirmation" type="password"
                                    name="password_confirmation" required />
                </div>

                <div class="mb-0">
                    <div class="d-flex justify-content-end align-items-baseline">
                        <a class="text-muted me-3 text-decoration-none" href="{{ route('login') }}">
                            {{ __('Already registered?') }}
                        </a>

                        <x-button>
                            {{ __('Register') }}
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
        
    </x-auth-card>
</x-guest-layout>
