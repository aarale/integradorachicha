<?php
namespace App\Http\Controllers;

use App\Models\Material;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    public function index()
    {
        $materials = Material::all(); 
        return view('admin.inventario', compact('materials'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([  
            'name' => 'required',
            'description' => 'required',
            'total_quantity' => 'required|integer',
        ]);

        Material::create($validatedData);

        return redirect()->route('admin.inventario')->with('success', 'Material agregado exitosamente');
    }
}
