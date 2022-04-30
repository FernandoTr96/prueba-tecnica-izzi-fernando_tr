@extends('layouts/app')

@section('title', 'home')
@section('content')
    <main class="p-5 md:p-12 bg-slate-50">
        <h2 class="font-bold text-xl text-gray-700">
            Bienvenido {{ auth()->user()->nombre }} {{ auth()->user()->apellidoPaterno }} 
        </h2>
        <hr class="my-5"/>
        <div class="grid grid-cols-1 md:grid-cols-4 mt-10 gap-5 pb-64">
            @foreach ($counters as $key => $parameter)
                <x-status-card 
                :dbparameter="$key"
                :numberofregisters="$parameter['numero']"
                :icon="$parameter['icono']"
                class="bg-gradient-to-r from-pink-500 to-pink-600" 
                />
            @endforeach
        </div>
    </main>
@endsection
