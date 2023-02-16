@extends('layouts.app')

@section('content')
    @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Home</a>
                <div style="display: flex; align-items: center; justify-content: center;">
                    <a href="login.html" class="btn btn-lg btn-primary">Login</a>
                </div>
            @else
                {{-- <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a> --}}



                <form class="form-signin">
                    <br>
                    <br>
                    <div class="text-center mb-4">
                        <img src="{{ asset('images/Ju_logo.png') }}" alt="Jimma Univercity Logo" alt="Jimma Univercity Logo" width="72" height="80">
                        <h1 class="h3 mb-3 font-weight-normal">Welcome To jimma Univecrcty Clinic System</h1>
                        <p>Login In to use this web <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline"><span class="h1 btn btn-primary btn-lg">Log in</span> </a></p>
                    </div>

                </form>

            @endauth
        </div>
    @endif
@endsection
