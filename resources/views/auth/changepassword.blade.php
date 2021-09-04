@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <div class="flex flex-wrap justify-center">
        <div class="w-full max-w-sm">
            <div class="flex flex-col break-words bg-white border border-2 rounded shadow-md" style="margin: -16vh auto; overflow: hidden;">
                <div class="panel-body">
                @if (session('error'))
                    <div class="alert alert-danger" style="color: #fff; padding: 1em;background: red;">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                <form class="w-full p-6" method="POST" action="{{ route('changePassword') }}">
                    {{ csrf_field() }}

                    <div class="flex flex-wrap mb-6{{ $errors->has('current-password') ? ' has-error' : '' }}">
                        <label for="new-password" class="block text-gray-700 text-sm font-bold mb-2">Current Password</label>

                        <input id="current-password" type="password" class="form-input w-full" name="current-password" required>

                        @if ($errors->has('current-password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('current-password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="flex flex-wrap mb-6{{ $errors->has('new-password') ? ' has-error' : '' }}">
                        <div class="text-gray-600 mt-2 mb-4">
                            <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Set up password</label>
                            Please create a secure password that has the following criteria.

                            <ul class="list-disc text-sm ml-4 mt-2" style="font-size: 1em;line-height: 1.4;">
                                <li>1 lowercase letter</li>
                                <li>1 number</li>
                                <li>1 capital letters</li>
                                <li>1 special character</li>
                                <li>6 characters minimum </li>
                            </ul>   
                        </div>
                        <label for="new-password" class="block text-gray-700 text-sm font-bold mb-2">New Password</label>

                        <input id="new-password" type="password" class="form-input w-full" name="new-password" required>

                        @if ($errors->has('new-password'))
                            <span class="help-block">
                                <strong>{{ $errors->first('new-password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="flex flex-wrap mb-6">
                        <label for="new-password-confirm" class="block text-gray-700 text-sm font-bold mb-2">Confirm New Password</label>

                        <input id="new-password-confirm" type="password" class="form-input w-full" name="new-password_confirmation" required>
                    </div>

                    <div class="flex flex-wrap items-center">
                        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-gray-100 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Change Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection


