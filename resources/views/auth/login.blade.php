@extends('layouts.app')

@section('title') Employee Login @endsection

@section('content')

    <div class="hidden md:flex md:bg-cover min-w-full min-h-screen bg-red-100 flex-col justify-center sm:px-6 lg:px-8 bg-fixed" style="background: #000;">

        <div class="sm:mx-auto sm:max-w-full sm:max-w-sm">
            <div class="border-4 border-white py-20 px-8 shadow sm:rounded-lg sm:px-10">
                <div class="sm:mx-auto sm:w-full sm:max-w-md">
                    <img class="mx-auto h-32  w-auto" src="{{ asset('images/khind-logo-white.svg') }}" style="height:70px;" alt="Khind Logo" />
                    <h2 class="mt-20 text-center text-xl leading-9 text-white">
                        Welcome back! Please login to continue.
                    </h2>
                </div>

                <span class="mt-16 block w-full rounded-md shadow-sm">
                    <a href="{{ route('signin') }}" class="login-btn w-full flex justify-center py-2 px-4 border-4 text-sm font-medium rounded-md text-white bg-green transition duration-150 ease-in-out">
                      AD Sign in
                    </a>
                </span>
            </div>
        </div>
    </div>



{{--@if(isset($userName))--}}
{{--    <li >--}}
{{--        <a>--}}
{{--            @if(isset($user_avatar))--}}
{{--                <img src="{{ $user_avatar }}">--}}
{{--            @else--}}
{{--                <i ></i>--}}
{{--            @endif--}}
{{--        </a>--}}
{{--        <div class="dropdown-menu dropdown-menu-right">--}}
{{--            <h5 >{{ $userName }}</h5>--}}
{{--            <p >{{ $userEmail }}</p>--}}
{{--            <div ></div>--}}
{{--            <a href="/signout" >Sign Out</a>--}}
{{--        </div>--}}
{{--    </li>--}}
{{--@else--}}
{{--    <li >--}}
{{--        <a href="/signin" >Sign In</a>--}}
{{--    </li>--}}
{{--@endif--}}

{{--@if(session('error'))--}}
{{--    <div >--}}
{{--        <p class="mb-3">{{ session('error') }}</p>--}}
{{--        @if(session('errorDetail'))--}}
{{--            <pre ><code>{{ session('errorDetail') }}</code></pre>--}}
{{--        @endif--}}
{{--    </div>--}}
{{--@endif--}}

{{--<div >--}}
{{--    <h1>PHP Graph </h1>--}}
{{--    <p >This sample app </p>--}}
{{--    @if(isset($userName))--}}
{{--        <h4>Welcome {{ $userName }}!</h4>--}}
{{--        <p>Use the navigation bar at the top of the page to get started.</p>--}}
{{--    @else--}}
{{--        <a href="/signin" >Click here to sign in</a>--}}
{{--    @endif--}}
{{--</div>--}}





    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="w-full max-w-sm">
                <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

{{--                    <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0"> --}}
{{--                        {{ __('Login') }} --}}
{{--                    </div> --}}

{{--                    <form class="w-full p-6" method="POST" action="{{ route('login') }}"> --}}
{{--                        @csrf --}}

{{--                        <div class="flex flex-wrap mb-6"> --}}
{{--                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2"> --}}
{{--                                {{ __('E-Mail Address') }}: --}}
{{--                            </label> --}}

{{--                            <input id="email" type="email" class="form-input w-full @error('email') border-red-500 @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus> --}}

{{--                            @error('email') --}}
{{--                                <p class="text-red-500 text-xs italic mt-4"> --}}
{{--                                    {{ $message }} --}}
{{--                                </p> --}}
{{--                            @enderror --}}
{{--                        </div> --}}

{{--                        <div class="flex flex-wrap mb-6"> --}}
{{--                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2"> --}}
{{--                                {{ __('Password') }}: --}}
{{--                            </label> --}}

{{--                            <input id="password" type="password" class="form-input w-full @error('password') border-red-500 @enderror" name="password" required> --}}

{{--                            @error('password') --}}
{{--                                <p class="text-red-500 text-xs italic mt-4"> --}}
{{--                                    {{ $message }} --}}
{{--                                </p> --}}
{{--                            @enderror --}}
{{--                        </div> --}}

{{--                        <div class="flex mb-6"> --}}
{{--                            <label class="inline-flex items-center text-sm text-gray-700" for="remember"> --}}
{{--                                <input type="checkbox" name="remember" id="remember" class="form-checkbox" {{ old('remember') ? 'checked' : '' }}> --}}
{{--                                <span class="ml-2">{{ __('Remember Me') }}</span> --}}
{{--                            </label> --}}
{{--                        </div> --}}

{{--                       <div class="flex flex-wrap items-center"> --}}
{{--                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"> --}}
{{--                                {{ __('Login') }} --}}
{{--                            </button> --}}

                            @if (Route::has('password.request'))
                                <a class="text-sm text-blue-500 hover:text-blue-700 whitespace-no-wrap no-underline ml-auto" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif

                            @if (Route::has('register'))
                                <p class="w-full text-xs text-center text-gray-700 mt-8 -mb-4">
                                    {{ __("New User?") }}
                                    <a class="text-blue-500 hover:text-blue-700 no-underline" href="{{ route('register') }}">
                                        {{ __('Sign Up') }}
                                    </a>
                                </p>
                            @endif
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

@endsection
