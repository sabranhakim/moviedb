@extends('layouts.main')

@section('content')
<div class="flex min-h-screen items-center justify-center bg-zinc-900 px-6 py-12">
    <div class="w-full max-w-md space-y-8 bg-zinc-800 p-8 rounded-xl shadow-lg">
        <div class="text-center">
            <h2 class="mt-6 text-3xl font-bold tracking-tight text-white">Sign in to your account</h2>
            <p class="mt-2 text-sm text-zinc-400">Welcome back! Please enter your credentials.</p>
        </div>

        <form class="mt-8 space-y-6" action="/login" method="POST">
            @csrf
            <div class="space-y-4">
                <div>
                    <label for="email" class="block text-sm font-medium text-zinc-200 mb-1">Email address</label>
                    <input type="email" name="email" id="email" required autocomplete="email"
                        class="block w-full rounded-md border border-zinc-600 bg-zinc-700 px-4 py-2 shadow-sm placeholder-zinc-400 text-white focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500 sm:text-sm transition">
                </div>

                <div>
                    <label for="password" class="block text-sm font-medium text-zinc-200 mb-1">Password</label>
                    <input type="password" name="password" id="password" required autocomplete="current-password"
                        class="block w-full rounded-md border border-zinc-600 bg-zinc-700 px-4 py-2 shadow-sm placeholder-zinc-400 text-white focus:border-yellow-500 focus:ring-2 focus:ring-yellow-500 sm:text-sm transition">
                </div>
            </div>

            <div class="flex items-center justify-between">
                <div class="text-sm">
                    <a href="#" class="font-medium text-yellow-400 hover:text-yellow-300 transition">Forgot your password?</a>
                </div>
            </div>

            <div>
                <button type="submit"
                    class="w-full flex justify-center rounded-md bg-yellow-500 px-4 py-2 text-sm font-semibold text-black hover:bg-yellow-400 focus:outline-none focus:ring-2 focus:ring-yellow-500 transition">
                    Sign in
                </button>
            </div>
        </form>

        <p class="text-center text-sm text-zinc-400">
            Not a member?
            <a href="/register" class="font-medium text-yellow-400 hover:text-yellow-300 transition">Create an account</a>
        </p>
    </div>
</div>
@endsection
