<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Models\People;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;


class UsrController extends Controller
{


    public function createau()
    {
        $roles = Role::all();
        return view('Prueba', compact('roles'));
    }

    public function authenticate(Request $request)
{
    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();   
        $role = $user->roles->first()->name ?? null;
        
        switch ($role) {
            case 'administrator':
                return redirect()->route('InicioAdmin'); 
            case 'teacher':
                return redirect()->route('Profesores.CrearExamen'); 
            case 'student':
                return redirect()->route('alumno.avisos'); 
        }
    }

    return back()->withErrors([
        'username' => 'Las credenciales no coinciden.',
    ]);
}

public function addPersonandUser(CreateUserRequest $request)
{
    // Capturar datos comunes
    $u_role_id = $request->role_id; // Capturar el rol seleccionado
    $u_username = $request->username;
    $u_password = Hash::make($request->password); // Encripta la contraseña
    $u_email = $request->email;
    $u_profile_picture = $request->file('profile_picture')->store('profile_pictures', 'public');

    $p_first_name = $request->first_name;
    $p_last_name = $request->last_name;
    $p_birth_date = $request->birth_date;
    $p_address = $request->address;
    $p_phone = $request->phone;

    // Inicializar datos opcionales
    $p_emergency_contact_first_name = null;
    $p_emergency_contact_last_name = null;
    $p_emergency_contact_address = null;
    $p_emergency_contact_phone = null;
    $p_emergency_contact_relationship = null;
    $p_rfc = null;

    try {
        // Lógica condicional basada en el rol
        if ($u_role_id == 3) { // Estudiante
            $p_emergency_contact_first_name = $request->emergency_contact_first_name;
            $p_emergency_contact_last_name = $request->emergency_contact_last_name;
            $p_emergency_contact_address = $request->emergency_contact_address;
            $p_emergency_contact_phone = $request->emergency_contact_phone;
            $p_emergency_contact_relationship = $request->emergency_contact_relationship;
        } elseif ($u_role_id == 2) { // Docente
            $p_rfc = $request->rfc;
        }

        // Llamar al procedimiento almacenado
        DB::select('CALL InsertUser_AndAssignRole(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $p_first_name,
            $p_last_name,
            $p_birth_date,
            $p_address,
            $p_phone,
            $u_profile_picture,
            $u_username,
            $u_password,
            $u_email,
            $u_role_id, // Asociar al rol seleccionado
            $p_emergency_contact_first_name,
            $p_emergency_contact_last_name,
            $p_emergency_contact_address,
            $p_emergency_contact_phone,
            $p_emergency_contact_relationship,
            $p_rfc,
        ]);

        return redirect()->back()->with('Exitoso', 'Usuario creado correctamente');
    } catch (\Exception $e) {
        return redirect()->back()->with('Error', 'Error al crear usuario: ' . $e->getMessage());
    }
}
}
