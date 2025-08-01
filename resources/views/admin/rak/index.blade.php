@extends('layouts.custom-app')

@section('header')
    <h2 class="font-semibold text-xl text-zinc-800 dark:text-zinc-200 leading-tight">
        {{ __('Daftar Rak') }}
    </h2>
@endsection

@section('content')
    <div class="max-w-7xl py-12 mx-auto sm:px-6 lg:px-8">
        {{-- Flash Message --}}
        @if (session('success'))
            <div class="mb-4 rounded-md bg-green-100 px-4 py-3 text-sm text-green-800 dark:bg-green-700 dark:text-white">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 rounded-md bg-red-100 px-4 py-3 text-sm text-red-800 dark:bg-red-700 dark:text-white">
                {{ session('error') }}
            </div>
        @endif

        <div class="relative overflow-x-auto shadow-md sm:rounded-lg bg-zinc-800 p-8">
            <a href="{{ route('admin.daftar-rak.create') }}">
                <x-primary-button type="button" class="mb-3">Tambah</x-primary-button>
            </a>
            <table class="w-full text-sm text-left rtl:text-right text-zinc-500 dark:text-zinc-400">
                <thead class="text-xs text-zinc-700 uppercase bg-zinc-50 dark:bg-zinc-700 dark:text-zinc-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Nama Rak
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $no = 1;
                    @endphp
                    @forelse ($rak as $item)
                        <tr
                            class="odd:bg-white odd:dark:bg-zinc-900 even:bg-zinc-50 even:dark:bg-zinc-800 border-b dark:border-zinc-700 border-zinc-200">
                            <th scope="row"
                                class="px-6 py-4 font-medium text-zinc-900 whitespace-nowrap dark:text-white">
                                {{ $no++ }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->nama_rak }}
                            </td>
                            <td class="px-6 py-4 flex">
                                <a href="{{ route('admin.daftar-rak.edit', ['id' => $item->id]) }}">
                                    <x-primary-button class="mx-1">Edit</x-primary-button>
                                </a>
                                <form method="POST" action="{{ route('admin.daftar-rak.destroy', $item->id) }}">
                                    @csrf
                                    @method('DELETE')

                                    <x-danger-button onclick="this.form.submit()">
                                        Delete
                                    </x-danger-button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="py-6">
                                <div class="flex justify-center items-center text-zinc-500 h-24">
                                    Data Tidak Ditemukan.
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
