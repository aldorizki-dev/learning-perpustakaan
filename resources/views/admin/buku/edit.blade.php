@extends('layouts.custom-app')

@section('header')
    <h2 class="font-semibold text-xl text-zinc-800 dark:text-zinc-200 leading-tight">
        {{ __('Input Data Buku') }}
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
                Tambah Data Buku
            </h3>

            <form action="{{ route('admin.daftar-buku.update', $buku->id) }}" method="post">
                @method('PATCH')
                @csrf
                <input type="hidden" value="{{$buku->id}}">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <x-input-label class="mb-1">Judul Buku</x-input-label>
                        <x-text-input name="judul_buku" class="w-full" value="{{$buku->judul_buku}}"/>
                    </div>

                    <div>
                        <x-input-label class="mb-1">Rak</x-input-label>
                        <x-select-option name="rak_id" class="w-full">
                            <option selected disabled>Choose a rak</option>
                            @foreach ($rak as $item)
                                <option value="{{$item->id}}" {{$buku->rak_id == $item->id ? 'selected' : ''}}>{{$item->nama_rak}}</option>
                            @endforeach
                        </x-select-option>
                    </div>
                </div>

                <div class="mt-6">
                    <x-primary-button>Simpan</x-primary-button>
                </div>
            </form>
        </div>
    </div>
@endsection
