<?php
namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $services = Service::all();
        return view('dashboard', compact('services'));
    }

    public function store(Request $request)
    {
        // Validar los datos de entrada

        Service::create([
            'descripcion_corta' => $request->input('descripcion_corta'),
            'descripcion_larga' => $request->input('descripcion_larga'),
            'precio' => $request->input('precio'),
            'caracteristicas' => $request->input('caracteristicas'),
            'fecha_registro' => now(),
        ]);

        return redirect()->route('dashboard');


        // Redireccionar o mostrar un mensaje de éxito
    }

    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('dashboard');



        // Redireccionar o mostrar un mensaje de éxito
    }

    


    
}
