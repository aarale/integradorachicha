<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Mail\RegistrationMail;
use App\Models\User;
use App\Notifications\RegistroUsuarioNotification;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Mail;


class UserController extends Controller
{
   

    public function index(): View
    {
        $users = DB::table('users')->where('active', 1)->get();
        return view('users.index', ['users' => $users]);
    }

    public function getlogin()
    {
        $User = null;
        $User = CustomUser::all();
        return view('InicioSesion');
    }

    public function create()
    {
        $roles = Role::all();
        return view('Admin.UsersAdmin', compact('roles'));
    }


    public function authenticate(Request $request)
{
    $credentials = $request->only('username', 'password');

    if (Auth::attempt($credentials)) {
        $user = Auth::user();   
        $role = $user->roles->first()->name ?? null;
        
        
        switch ($role) {
            case 'admin':
                return redirect()->route('admin.inicioAdmin'); 
            case 'teacher':
                return redirect()->route('Profesores.CrearExamen'); 
            case 'student':
                return redirect()->route('alumno.avisos'); 
            
        }
    }

    return back()->withErrors([
        'name' => 'Las credenciales no coinciden.',
    ]);
    }


    public function store(Request $request)
{
    $validatedData = $request->validate([
        'first_name' => 'required',
        'last_name' => 'required',
        'birth_date' => 'required|date',
        'address' => 'required',
        'phone' => 'required',
        'name' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8',
        'role_id' => 'required|exists:roles,id',
        'emergency_contact_first_name' => 'required_if:role_id,3',
        'emergency_contact_last_name' => 'required_if:role_id,3',
        'emergency_contact_address' => 'required_if:role_id,3',
        'emergency_contact_phone' => 'required_if:role_id,3',
        'emergency_contact_relationship' => 'required_if:role_id,3',
        'rfc' => 'required_if:role_id,2',
        //'belt_id' => 'required_if:role_id,3|exists:belts,id',
        'belt_id' => 'nullable|exists:belts,id',
        'profile_picture' => 'nullable|image|max:2048',
    ]);

    try {
        $profilePicture = null;
        if ($request->hasFile('profile_picture')) {
            $profilePicture = file_get_contents($request->file('profile_picture')->getRealPath());
        }

        $beltId = $validatedData['role_id'] == 3 ? $validatedData['belt_id'] : null;
        dd($validatedData);

        DB::statement('CALL InsertUser(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [
            $validatedData['first_name'],
            $validatedData['last_name'],
            $validatedData['birth_date'],
            $validatedData['address'],
            $validatedData['phone'],
            $validatedData['name'],
            $validatedData['email'],
            Hash::make($validatedData['password']),
            $validatedData['role_id'],
            $validatedData['emergency_contact_first_name'] ?? null,     
            $validatedData['emergency_contact_last_name'] ?? null,      
            $validatedData['emergency_contact_address'] ?? null,        
            $validatedData['emergency_contact_phone'] ?? null,          
            $validatedData['emergency_contact_relationship'] ?? null,   
            $validatedData['rfc'] ?? null,                              
            $beltId, 
            $profilePicture,                                           
        ]);
        $user = User::where('email', $validatedData['email'])->first();

       $user->notify(new RegistroUsuarioNotification($user));

        return redirect()->route('admin.users.create')->with('success', 'Usuario creado exitosamente');
    } catch (\Exception $e) {
        return back()->withErrors(['error' => 'Error al crear el usuario: ' . $e->getMessage()]);
    }
}
}