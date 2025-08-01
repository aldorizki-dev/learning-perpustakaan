@extends('layouts.custom-app')

@section('header')
        <h2 class="font-semibold text-xl text-zinc-800 dark:text-zinc-200 leading-tight">
            {{ __('Dashboard Admin') }}
        </h2>
@endsection

@section('content')
        <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-zinc-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-zinc-900 dark:text-zinc-100">
                    {{ __("You're logged in as admin!") }}
                </div>
            </div>
        </div>
    </div>
@endsection
