@extends('layouts.custom-app')

@section('header')
    <h2 class="font-semibold text-xl text-zinc-800 dark:text-zinc-200 leading-tight">
        {{ __('Input Data Rak Buku') }}
    </h2>
@endsection

@section('content')
    <div class="max-w-7xl py-12 mx-auto sm:px-6 lg:px-8">
        @if (session('error'))
            <div class="mb-4 rounded-md bg-red-100 px-4 py-3 text-sm text-red-800 dark:bg-red-700 dark:text-white">
                    {{ session('error') }}
            </div>
        @endif

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg py-6 px-6 bg-zinc-800">
            <h3 class="text-white text-2xl mb-6">
                Tambah Data Rak Buku
            </h3>

            <form action="{{ route('admin.daftar-rak.update', ['id' => $rak->id]) }}" method="post">
                @method('PATCH')
                @csrf
                <input type="hidden" name="id" value="{{$rak->id}}">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <x-input-label class="mb-1">Nama Rak</x-input-label>
                        <x-text-input name="nama_rak" class="w-full" value="{{$rak->nama_rak}}"/>
                    </div>
                </div>

                <div class="mt-6">
                    <x-primary-button>Simpan</x-primary-button>
                </div>
            </form>
        </div>
    </div>
@endsection
