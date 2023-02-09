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
                    <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a>

                   
                @endauth
            </div>
        @endif

@endsection