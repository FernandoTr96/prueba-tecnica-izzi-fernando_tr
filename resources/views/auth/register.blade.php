@extends('layouts/app')

@section('title', 'Crear cuenta')


@section('content')
    <div class="w-auto h-max-96 md:w-10/12 md:mt-12 md:mb-40 shadow-md mx-auto flex justify-between">
        <div class="hidden md:w-1/2 md:h-100 md:block overflow-hidden">
          <img src="https://placeimg.com/800/500/arch" class="w-100 h-100 min-h-full object-cover" alt="arch" />
        </div>
        <div class="w-full p-10 md:w-1/2">
            <form action="{{ route('createAccount') }}" method="post" class="space-y-6 md:grid md:grid-cols-2 md:grid-rows-auto md:gap-4 md:space-y-0" autocomplete="off">
                @method('post')
                @csrf
                <div>
                    <label for="nombre" class="text-gray-500 font-semibold">Nombre</label>
                    <input id="nombre" name="nombre" type="text" value="{{ old('nombre') }}"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="...">
                    @error('nombre')
                        <small class="text-red-500 text-sm py-3">*{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <label for="apellidoPaterno" class="text-gray-500 font-semibold">Apellido paterno</label>
                    <input id="apellidoPaterno" name="apellidoPaterno" type="text" value="{{ old('apellidoPaterno') }}"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="...">
                    @error('apellidoPaterno')
                        <small class="text-red-500 text-sm py-3">*{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <label for="apellidoMaterno" class="text-gray-500 font-semibold">Apellido materno</label>
                    <input id="apellidoMaterno" name="apellidoMaterno" type="text" value="{{ old('apellidoMaterno') }}"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="...">
                    @error('apellidoMaterno')
                        <small class="text-red-500 text-sm py-3">*{{ $message }}</small>
                    @enderror
                </div>
                <div>
                    <label for="correo" class="text-gray-500 font-semibold">Correo</label>
                    <input id="correo" name="correo" type="email" value="{{ old('correo') }}"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="example@gmail.com">
                    @error('correo')
                        <small class="text-red-500 text-sm py-3">*{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-span-2">
                    <label for="clave" class="text-gray-500 font-semibold">Contraseña</label>
                    <input id="clave" name="clave" type="password" value="{{ old('clave') }}"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="...">
                    @error('clave')
                        <small class="text-red-500 text-sm py-3">*{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-span-2">
                    <label for="clave_confirmation" class="text-gray-500 font-semibold">Confirmar contraseña</label>
                    <input id="clave_confirmation" name="clave_confirmation" type="password" value="{{ old('clave_confirmation') }}"
                        class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                        placeholder="...">
                    @error('clave_confirmation')
                        <small class="text-red-500 text-sm py-3">*{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-span-2">
                    <button type="submit"
                        class="w-full flex justify-between items-center py-2 px-4 border border-transparent text-sm font-medium rounded-md bg-teal-600 hover:bg-teal-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        <i class="fa-solid fa-plus text-teal-500"></i>
                        <span class="flex-1 text-white">Registrarse</span>
                    </button>
                </div>
                <div class="col-span-2">
                  @error('msg')
                    <small class="text-red-500 text-sm py-3">{{ $message }}</small>
                  @enderror
                </div>
            </form>
        </div>
    </div>
@endsection
