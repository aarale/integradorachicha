<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Material;
use App\Models\User; 
use App\Http\Controllers\PrestamoNotification;

class LoansController extends Controller
{
    public function index()
    {
        $Loans = Loan::all();
        $materials = Material::all();
        $users = User::all(); 

        return view('admin.prestamos', compact('Loans', 'materials', 'users'));
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'user_id' => 'required|exists:users,id', 
        'material_id' => 'required|exists:materials,id',
        'quantity' => 'required|integer|min:1',
        'devolution_date' => 'required|date',
    ]);

    $validatedData['status'] = 'loaned'; 
    $validatedData['transaction_date'] = now()->toDateString(); 

    Loan::create([
        'user_id' => $validatedData['user_id'], 
        'material_id' => $validatedData['material_id'],
        'quantity' => $validatedData['quantity'],
        'status' => $validatedData['status'],
        'transaction_date' => $validatedData['transaction_date'],
        'devolution_date' => $validatedData['devolution_date'],
    ]);
    $usuario = User::find($validatedData['user_id']);
    $material = Material::find($validatedData['material_id']);

if (!$material) {
    return redirect()->back()->withErrors('El material seleccionado no existe.');
}
    $detalles = [
        'nombreUsuario' => $usuario->name, 
        'material' => Material::find($validatedData['material_id'])->name, 
        'cantidad' => $validatedData['quantity'], 
        'fechaPrestamo' => $validatedData['transaction_date'],
        'fechaDevolucion' => $validatedData['devolution_date'],
    ];

    $usuario->notify(new \App\Notifications\PrestamoNotification($detalles));

    return redirect()->route('prestamos.index')->with('success', 'Préstamo registrado exitosamente');
}

}
