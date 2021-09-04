@extends('layouts.app')

@section('content')
    <div class="container mx-auto">
        <div class="flex flex-wrap justify-center">
            <div class="row justify-content-center">
              <div class="col-md-12">
                @if (session('error'))
                  <div class="alert alert-danger" style="padding: 10px; background-color: red; color: #fff;"> 
                      {{ session('error') }}
                  </div>
                @endif
                @if (session('success'))
                  <div class="alert alert-success" style="padding: 10px; background-color: green; color: #fff;">
                      {{ session('success') }}
                  </div>
                @endif
              </div>
            </div>
            <div class="w-full max-w-sm">
                <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md">

                    <div class="font-semibold bg-gray-200 text-gray-700 py-3 px-6 mb-0">
                        {{ __('Login') }}
                    </div>

                    <form class="w-full p-6" method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="col">
                          <p class="text-red-500 text-xs italic mt-4" id="msg"></p>
                        </div>

                        <div class="send-otp">

                            <div class="flex flex-wrap mb-6">
                                <label for="mobile" class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Mobile Number') }}:
                                </label>

                                <input id="mobile" type="number" class="form-input w-full @error('mobile') border-red-500 @enderror" name="mobile" value="{{ old('mobile') }}" placeholder="254xxxxxxxx" required autocomplete="mobile" autofocus>

                                @error('mobile')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="flex flex-wrap mb-6">
                                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
                                    {{ __('Password') }}:
                                </label>

                                <input id="password" type="password" class="form-input w-full @error('password') border-red-500 @enderror" name="password" required>

                                @error('password')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                        </div>
                            

                        <div class="otp">


                            <div class="flex mb-6">
                                <label class="inline-flex items-center text-sm text-gray-700" for="remember">
                                    <input type="checkbox" name="remember" id="remember" class="form-checkbox" {{ old('remember') ? 'checked' : '' }}>
                                    <span class="ml-2">{{ __('Remember Me') }}</span>
                                </label>
                            </div>

                         
                        </div>

                        <div class="flex flex-wrap items-center">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline otp">
                                {{ __('Login') }}
                            </button>

                            <a class="text-sm text-blue-500 hover:text-blue-700 whitespace-no-wrap no-underline ml-auto otp" href="/survey/view">
                                Participate in Survey
                            </a>

                           {{--  @if (Route::has('password.request'))
                                <a class="text-sm text-blue-500 hover:text-blue-700 whitespace-no-wrap no-underline ml-auto otp" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif --}}

                            
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
    
@endsection