@extends('layouts/app')

@section('title', 'Productos')

@section('content')
    <main class="p-5 md:p-10 md:max-w-8xl md:mx-auto">
        <h2 class="font-bold text-xl text-pink-700">
            <i class="fa-solid fa-pen-to-square"></i> Editar producto
        </h2>
        <hr class="my-4 mb-5" />
        @if (Session::get('editSuccess'))
            <x-alert title="Atencion: " :message="Session::get('editSuccess')" class="bg-green-100 border-green-500 text-green-700" />
        @endif
        @error('error')
            <x-alert title="Error: " :message="$message" class="bg-red-100 border-red-500 text-red-700" />
        @enderror
        <form id="formShowProduct" action="#" autocomplete="off" class="grid grid-cols-1 gap-5 md:grid-cols-4 md:mx-auto mt-5">
            <div class="md:col-span-4">
                <label for="producto" class="text-gray-500 font-semibold">Producto</label>
                <input 
                disabled 
                type="text" 
                name="producto" 
                id="producto" placeholder="..." 
                value="{{ $product['nombreProducto'] }}"
                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
                />
            </div>

            <div class="md:col-span-4">
                <label for="descripcion" class="text-gray-500 font-semibold">Descripción</label>
                <textarea 
                disabled 
                name="descripcion" 
                id="descripcion" 
                rows="1"
                class="appearance-none rounded-none relative block w-full py-2 px-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                >{{ $product['descripcion'] }}</textarea>
            </div>

            <div class="relative md:col-span-2">
                <label for="sucursal" class="text-gray-500 font-semibold">Sucursal</label>
                <select 
                disabled 
                name="sucursal" 
                id="sucursal" 
                value="{{ $product['sucursal'] }}"
                class="appearance-none  block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                >
                    <option disabled selected>
                        {{ $product['sucursal'] }}
                    </option>
                </select>
                <i class="fa-solid fa-angle-down absolute top-9 right-4"></i>
            </div>

            <div class="relative md:col-span-2">
                <label for="categoria" class="text-gray-500 font-semibold">Categoria</label>
                <select 
                disabled 
                name="categoria" 
                id="categoria" 
                value="{{ $product['categoria'] }}"
                class="appearance-none block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                >
                    <option disabled selected>
                        {{ $product['categoria'] }}
                    </option>
                </select>
                <i class="fa-solid fa-angle-down absolute top-9 right-4"></i>
            </div>

            <div class="md:col-span-2">
                <label for="precio" class="text-gray-500 font-semibold">Precio</label>
                <input 
                disabled
                data-mxn 
                type="text" 
                name="precio" 
                id="precio" 
                placeholder="$00.00" 
                maxlength="5" 
                value="{{ $product['precio'] }}"
                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
                />
            </div>

            <div class="md:col-span-2">
                <label for="fecha_compra" class="text-gray-500 font-semibold">Fecha de compra</label>
                <input 
                disabled 
                type="date" 
                name="fecha_compra" 
                id="fecha_compra" 
                placeholder="..."
                value="{{ $product['fechaCompra'] }}"
                class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" 
                />
            </div>
        </form>

        <form action="{{ route('updateProduct') }}" method="post" class="grid grid-cols-1 gap-5 md:grid-cols-4 mt-5 pb-40">
            @method('put')
            @csrf
            <input type="hidden" name="id" value="{{ $product['id'] }}">
            <div class="md:col-span-2">
                <label for="comentario" class="text-gray-500 font-semibold">Comentario</label>
                <textarea 
                maxlength="100"
                name="comentario" 
                id="comentario" 
                rows="1"
                class="appearance-none rounded-none relative block w-full py-2 px-3 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                >{{ $product['comentario'] }}</textarea>
                @error('comentario')
                    <small class="text-red-500 text-sm py-3">*{{ $message }}</small>
                @enderror
            </div>
            <div class="md:col-span-1 md:flex md:justify-center md:items-center">
               <div class="md:w-full">
                    <label class="text-gray-500 font-semibold">Estado del producto</label><br/>
                    <input type="radio" name="estado" id="abierto" value="abierto" {{ $product['estado'] == 'abierto' ?  'checked' : '' }}> <label for="abierto">Abierto</label>
                    <input type="radio" name="estado" id="cerrado" value="cerrado" {{ $product['estado'] == 'cerrado' ?  'checked' : '' }}> <label for="cerrado">Cerrado</label>
                </div>
               @error('estado')
                    <small class="text-red-500 text-sm py-3">*{{ $message }}</small>
                @enderror
            </div>
            <div class="col-span-1 md:flex md:justify-start md:p-3">
                <button type="submit"
                    class="relative w-full py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700 focus:outline-none">
                    <i class="fa-solid fa-floppy-disk"></i>
                    <span class="flex-1 font-semibold md:mx-2">Actualizar</span>
                </button>
            </div>
        </form>
    </main>
@endsection

@section('scripts')
    <script src="{{ asset('js/priceFormat.js?v=<?echo time();?>') }}"></script>
@endsection