@extends('layouts.main')

@section('content')
<div class="flex min-h-screen items-center justify-center bg-gray-100 px-6 py-12">
    <div class="w-full max-w-md space-y-8 bg-white p-8 rounded-lg shadow-md">
        <div class="text-center">
            <img class="mx-auto h-12 w-auto" src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=600" alt="MovieDB Logo">
            <h2 class="mt-6 text-3xl font-bold tracking-tight text-gray-900">Sign in to your account</h2>
            <p class="mt-2 text-sm text-gray-600">Welcome back! Please enter your credentials.</p>
        </div>

        <form class="mt-8 space-y-6" action="/login" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
                    <input type="email" name="email" id="email" required autocomplete="email"
                        class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" name="password" id="password" required autocomplete="current-password"
                        class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2 shadow-sm placeholder-gray-400 focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="text-sm">
                    <a href="#" class="font-medium text-indigo-600 hover:text-indigo-500">Forgot your password?</a>
                </div>
            </div>

            <div>
                <button type="submit"
                    class="w-full flex justify-center rounded-md bg-indigo-600 px-4 py-2 text-sm font-semibold text-white hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                    Sign in
                </button>
            </div>
        </form>

        <p class="text-center text-sm text-gray-600">
            Not a member?
            <a href="/register" class="font-medium text-indigo-600 hover:text-indigo-500">Create an account</a>
        </p>
    </div>
</div>
@endsection
