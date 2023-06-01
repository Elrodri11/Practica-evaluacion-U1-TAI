@extends('layouts.app')

@section('titulo')
Tu Cuenta
@endsection

@section('contenido')
<div class="flex justify-center">
    <div class="w-full md:w-2/4 lg:w-2/5 flex">
        <div class="md:w-2/3 lg:w-4/5 px-5">
            <img src="{{ asset('img/usuario.svg')}}" alt="imagen usuario"/>
        </div>
        <div class="md:w-1/3 lg:w-1/5 px-5">
            <p class="text-gray-700 text-1xl">{{ auth()->user()->username }}</p>
        </div>
    </div>
</div>

<div class="flex justify-center mt-10">
    <div class="w-full md:w-2/4 lg:w-2/5 pr-5">
        <form action="{{ route('GuardarServicio') }}" method="POST" class="mb-5">
            @csrf
            <div class="mb-4">
                <label for="descripcion_corta" class="block text-gray-700 font-bold mb-2">Descripción Corta:</label>
                <input type="text" name="descripcion_corta" id="descripcion_corta" class="border border-gray-300 rounded-md p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="descripcion_larga" class="block text-gray-700 font-bold mb-2">Descripción Larga:</label>
                <textarea name="descripcion_larga" id="descripcion_larga" rows="3" class="border border-gray-300 rounded-md p-2 w-full" required></textarea>
            </div>
            <div class="mb-4">
                <label for="precio" class="block text-gray-700 font-bold mb-2">Precio:</label>
                <input type="number" name="precio" id="precio" class="border border-gray-300 rounded-md p-2 w-full" required>
            </div>
            <div class="mb-4">
                <label for="caracteristicas" class="block text-gray-700 font-bold mb-2">Características:</label>
                <textarea name="caracteristicas" id="caracteristicas" rows="3" class="border border-gray-300 rounded-md p-2 w-full" required></textarea>
            </div>
            <div>
                <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Agregar Servicio</button>
            </div>
        </form>
    </div>
    <div class="w-full md:w-2/4 lg:w-2/5 pl-5">
        <table class="w-full bg-white border border-gray-300 rounded-lg">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-blue-500 text-white font-semibold uppercase text-sm">ID</th>
                    <th class="px-6 py-3 bg-blue-500 text-white font-semibold uppercase text-sm">Descripción Corta</th>
                    <th class="px-6 py-3 bg-blue-500 text-white font-semibold uppercase text-sm">Descripción Larga</th>
                    <th class="px-6 py-3 bg-blue-500 text-white font-semibold uppercase text-sm">Precio</th>
                    <th class="px-6 py-3 bg-blue-500 text-white font-semibold uppercase text-sm">Características</th>
                    <th class="px-6 py-3 bg-blue-500 text-white font-semibold uppercase text-sm">Fecha de Registro</th>
                    <th class="px-6 py-3 bg-blue-500 text-white font-semibold uppercase text-sm">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($services as $service)
                <tr>
                    <td class="px-6 py-4">{{ $service->id }}</td>
                    <td class="px-6 py-4">{{ $service->descripcion_corta}}</td>
                    <td class="px-6 py-4">{{ $service->descripcion_larga }}</td>
                    <td class="px-6 py-4">{{ $service->precio }}</td>
                    <td class="px-6 py-4">{{ $service->caracteristicas }}</td>
                    <td class="px-6 py-4">{{ $service->fecha_registro }}</td>
                    <td class="px-6 py-4">
                        <form action="{{ route('EliminarServicio', $service->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="bg-red-500 hover:bg-red-600 transition-colors text-white px-4 py-2 rounded-lg">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
