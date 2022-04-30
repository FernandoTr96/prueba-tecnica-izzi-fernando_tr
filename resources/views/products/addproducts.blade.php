@extends('layouts/app')

@section('title', 'Productos')

@section('content')
    <main class="p-5 md:p-10 md:max-w-8xl md:mx-auto">
        <h2 class="font-bold text-xl text-pink-700"><i class="fa-solid fa-box"></i> Registrar producto</h2>
        <hr class="my-4 mb-5" />
        @if (Session::get('successAlert'))
            <x-alert title="Atencion: " :message="Session::get('successAlert')" class="bg-green-100 border-green-500 text-green-700" />
        @endif
        @error('error')
            <x-alert title="Error: " :message="$message" class="bg-red-100 border-red-500 text-red-700" />
        @enderror
        <form id="formAddProduct" action="{{ route('createProduct') }}" method="post" autocomplete="off"
            class="grid grid-cols-1 gap-5 md:grid-cols-4 md:mx-auto pb-80 mt-5">
            @method('post')
            @csrf
            <div class="md:col-span-4">
                <label for="producto" class="text-gray-500 font-semibold">Producto</label>
                <input autofocus maxlength="30" type="text" name="producto" id="producto" placeholder="..." value="{{ old('producto') }}"
                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" />
                @error('producto')
                    <small class="text-red-500 text-sm py-3">*{{ $message }}</small>
                @enderror
            </div>
            <div class="md:col-span-4">
                <label for="descripcion" class="text-gray-500 font-semibold">Descripción</label>
                <textarea maxlength="100" name="descripcion" id="descripcion" cols="50" rows="1"
                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"></textarea>
                @error('descripcion')
                    <small class="text-red-500 text-sm py-3">*{{ $message }}</small>
                @enderror
            </div>
            <div class="relative md:col-span-2">
                <label for="sucursal" class="text-gray-500 font-semibold">Sucursal</label>
                <select name="sucursal" id="sucursal" value="{{ old('sucursal') }}"
                    class="appearance-none  block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    <option disabled selected>sucursales</option>
                    @foreach ($subsidiaries as $subsidiary)
                        <option value="{{ $subsidiary->id }}">{{ $subsidiary->sucursal }}</option>
                    @endforeach
                </select>
                <i class="fa-solid fa-angle-down absolute top-9 right-4"></i>
                @error('sucursal')
                    <small class="text-red-500 text-sm py-3">*{{ $message }}</small>
                @enderror
            </div>
            <div class="relative md:col-span-2">
                <label for="categoria" class="text-gray-500 font-semibold">Categoria</label>
                <select name="categoria" id="categoria" value="{{ old('categoria') }}"
                    class="appearance-none block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm">
                    <option disabled selected>categorias</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->categoria }}</option>
                    @endforeach
                </select>
                <i class="fa-solid fa-angle-down absolute top-9 right-4"></i>
                @error('categoria')
                    <small class="text-red-500 text-sm py-3">*{{ $message }}</small>
                @enderror
            </div>
            <div class="md:col-span-2">
                <label for="precio" class="text-gray-500 font-semibold">Precio</label>
                <input data-mxn type="text" name="precio" id="precio" placeholder="$00.00" maxlength="5" value="{{ old('precio') }}"
                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" />
                @error('precio')
                    <small class="text-red-500 text-sm py-3">*{{ $message }}</small>
                @enderror
            </div>
            <div class="md:col-span-2">
                <label for="fecha_compra" class="text-gray-500 font-semibold">Fecha de compra</label>
                <input type="date" name="fecha_compra" id="fecha_compra" placeholder="..."
                    value="{{ old('fecha_compra') }}"
                    class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm" />
                @error('fecha_compra')
                    <small class="text-red-500 text-sm py-3">*{{ $message }}</small>
                @enderror
            </div>
            <div class="md:flex md:items-end md:justify-end md:col-span-4 md:mt-5">
                <button type="submit"
                    class="group relative w-full md:w-1/4 flex items-center justify-between py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-teal-600 hover:bg-teal-700 focus:outline-none">
                    <i class="fa-solid fa-floppy-disk"></i>
                    <span class="flex-1 font-semibold md:mx-2">Guardar</span>
                </button>
            </div>
        </form>
    </main>
@endsection

@section('scripts')
    <script src="{{ asset('js/priceFormat.js?v=<?echo time();?>') }}"></script>
@endsection