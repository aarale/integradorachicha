<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
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
        $User = User::all();
        return view('auth.InicioSesion');
    }

    public function create()
    {
        $roles = Role::all();
        return view('Admin.UsersAdmin', compact('roles'));
    }


    

    public function authenticate(Request $request)
{
    
    $credentials = $request->only('name', 'password');

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

    
/*

    public function store(Request $request)
    {
       
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required|date',
            'address' => 'required',
            'phone' => 'required',
            'username' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|email',
            'role_id' => 'required|exists:roles,id',
        ]);

        
        $person = \App\Models\People::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'birth_date' => $validatedData['birth_date'],
            'address' => $validatedData['address'],
            'phone' => $validatedData['phone'],
        ]);

        
        $user = CustomUser::create([
            'person_id' => $person->id,
            'username' => $validatedData['username'],
            'password' => Hash::make($validatedData['password']),
            'email' => $validatedData['email'],
            'active' => 1,
            'registration_date' => now(),
        ]);
        
        
        DB::table('user_role')->insert([
            'user_id' => $user->id,
            'role_id' => $validatedData['role_id'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        
        

        if ($validatedData['role_id'] == 2) {
            \App\Models\Teacher::create([
                'person_id' => $person->id,
                'rfc' => 'RFC123456789',
            ]);
        

        } elseif ($validatedData['role_id'] == 3) {
            \App\Models\Student::create([
                'person_id' => $person->id,
                'student_number' => 'STU12345',
            ]);
        } elseif ($validatedData['role_id'] == 1) {
            \App\Models\Administrator::create([
                'person_id' => $person->id,
                'admin_code' => 'ADM12345',
            ]);
        }

        return redirect()->route('admin.users.create')->with('success', 'Usuario creado exitosamente');
    }*/

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