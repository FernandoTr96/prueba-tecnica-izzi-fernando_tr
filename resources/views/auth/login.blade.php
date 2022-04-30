@extends('layouts/app')

@section('title', 'iniciar sesión')

@section('content')
    <div class="flex items-center justify-center pb-72 sm:px-6 lg:px-8">
        <div class="max-w-md w-full space-y-8 mt-32">

            <div>
                <img title="iniciar sesión" class="mx-auto h-12 w-auto"
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/84/Logo_Izzi.svg/1200px-Logo_Izzi.svg.png"
                    alt="izzi">
            </div>

            <form class="mt-8 space-y-6" action="{{route('login')}}" method="post" autocomplete="off">
                @method('post')
                @csrf
                <div class="rounded-md space-y-4">
                    <div>
                        <label for="correo" class="text-gray-500 font-semibold">Correo</label>
                        <input id="correo" name="correo" type="email" value="{{ old('correo') }}"
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="example@gmail.com">
                        @error('correo')
                            <small class="text-red-500 text-sm py-3">*{{ $message }}</small>
                        @enderror
                    </div>
                    <div>
                        <label for="clave" class="text-gray-500 font-semibold">Contraseña</label>
                        <input id="clave" name="clave" type="password" value="{{ old('clave') }}"
                            class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                            placeholder="...">
                        @error('clave')
                            <small class="text-red-500 text-sm py-3">*{{ $message }}</small>
                        @enderror
                        @error('msg')
                            <small class="text-red-500 text-sm py-3">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center justify-between">
                    <div class="flex items-center">
                        <input id="v" name="recuerdame" type="checkbox" 
                            class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                        <label for="recuerdame" class="ml-2 block text-sm text-gray-900"> Recordar contraseña </label>
                    </div>
                </div>

                <div>
                    <button type="submit"
                        class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700 focus:outline-none">
                        <span class="absolute left-0 inset-y-0 flex items-center pl-3">
                            <!-- Heroicon name: solid/lock-closed -->
                            <svg class="h-5 w-5 text-teal-500 group-hover:text-teal-600" xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd"
                                    d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z"
                                    clip-rule="evenodd" />
                            </svg>
                        </span>
                        Iniciar sesión
                    </button>
                </div>

            </form>
        </div>
    </div>
@endsection
