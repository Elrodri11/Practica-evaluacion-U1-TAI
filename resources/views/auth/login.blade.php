@extends('layouts.app')

@section('titulo')
Inicia sesión 
@endsection

@section('contenido')

<div class="md:flex md:justify-center md:gap-10 md:items-center "> 
    <div class="md:w-1/2 p-5">
        <img src="{{asset('img/inicio_sesion.png')}}" alt="Imagen login de usuarios">

    </div>

    <div class="md:w-4/12 bg-white p-6 rounded-lg shadow-xl">
    
        <form action="{{route('login')}}" method="POST" novalidate>
            @csrf
            
            @if(session('mensaje'))
            <p class="bg-red-600 text-white my-2 rounded-lg text-sm p-2 text-center">
                {{ session('mensaje') }}
            </p>  
            @endif
            
            <div class="mb-5">
                <label for="email" class="mb-2 block text-gray-500 font-bold">
                    Email
                </label>
                <input 
                    id="email"
                    name="email"
                    type="text"
                    placeholder="Tu Email de registro"
                    class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror"
                    value="{{old('email')}}"
                />
                @error('email')
                <p class="bg-red-600 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>                    
                @enderror
            </div>

            <div class="mb-5">
                <label for="password" class="mb-2 block text-gray-500 font-bold">
                    Password
                </label>
                <input 
                    id="password"
                    name="password"
                    type="password"
                    placeholder="Password de registro"
                    class="border p-3 w-full rounded-lg"
                />
                @error('password')
                <p class="bg-red-600 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>                    
                @enderror
            </div>

            <div class="mb-5">
                <input type="checkbox" name="remember" id="remember" class="mr-2"><label for="remember" class="text-gray-500 text-sm">Mantener mi sesión abierta</label>
            </div>
           
            <input type="submit"
                value="Iniciar sesión"
                class="bg-blue-500 hover:bg-blue-600 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg"
            />
        </form>
    </div>
</div>
@endsection
