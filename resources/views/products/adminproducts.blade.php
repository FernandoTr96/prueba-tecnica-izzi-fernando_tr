@extends('layouts/app')

@section('title', 'Bandeja de productos')

@section('head')
    <link rel="stylesheet" href="{{ asset('lib/css/jquery.dataTables.min.css') }}">
@endsection

@section('content')
    <main class="p-5 md:p-10">
        <h2 class="font-bold text-xl text-pink-700">
            <i class="fa-solid fa-list"></i> Bandeja de productos
        </h2>
        <hr class="mt-5 mb-5" />
        @if (Session::get('productDestroyed'))
            <x-alert title="Atencion: " :message="Session::get('productDestroyed')" class="bg-green-100 border-green-500 text-green-700" />
        @endif
        <div class="overflow-x-scroll md:overflow-auto mt-5 pb-80">
            <table id="table-admin-products" class="text-center cell-border compact stripe hover">
                <thead>
                    <tr class="bg-slate-700 text-white">
                        <th>ID</th>
                        <th>NOMBRE DEL PRODUCTO</th>
                        <th>CATEGORIA</th>
                        <th>SUCURSAL</th>
                        <th>EDITAR</th>
                        <th>ELIMINAR</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td>
                                {{ $product->id }}
                            </td>
                            <td>
                                {{ $product->nombreProducto }}
                            </td>
                            <td>
                                {{ $product->categoria }}
                            </td>
                            <td>
                                {{ $product->sucursal }}
                            </td>
                            <td>
                                <a href="{{ route('showProduct', ['id' => $product->id]) }}" title="Editar"
                                    class="text-blue-600 hover:text-blue-700 text-lg font-bold transition-transform hover:scale-105">
                                    <i class="fa-solid fa-file-pen"></i>
                                </a>
                            </td>
                            <td>
                                <form id="formDestroyProduct" action="{{ route('destroyProduct') }}" method="post"
                                    class="flex justify-center">
                                    @method('delete')
                                    @csrf
                                    <input type="hidden" name="id_producto" value={{ $product->id }}>
                                    <button type="submit" title="Eliminar"
                                        class="border-0 text-pink-600 text-lg font-bold hover:text-pink-700 transition-transform hover:scale-105">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
@endsection

@section('scripts')
    <script src="{{ asset('lib/js/jquery.min.js') }}"></script>
    <script src="{{ asset('lib/js/jquery.dataTables.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table-admin-products').DataTable({
                "language": {
                    "decimal": "",
                    "emptyTable": "La tabla esta vacia",
                    "info": "Mostrando pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "Registros no disponibles",
                    "infoFiltered": "(Filtrado de _MAX_ total registros)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ registros por pagina",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar ",
                    "zeroRecords": "No se encontraron coincidencias",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "aria": {
                        "sortAscending": ": activate to sort column ascending",
                        "sortDescending": ": activate to sort column descending"
                    }
                }
            });
        });
    </script>
@endsection
