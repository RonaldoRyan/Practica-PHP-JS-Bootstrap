<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Register new user
    // Método para registrar nuevos usuarios
    public function register(Request $request)
    {
        // Validate data
        // Validar los datos del formulario de registro
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required|string'
        ]);

         // If user already existed in database, show an alert and redirect to register form
        // Crear un nuevo usuario o buscar un usuario existente por correo electrónico
        $user = User::firstOrCreate(
            ['email' => $request->email],
            ['name' => $request->name, 'password' => Hash::make($request->password)]
        );

        // Si el usuario ya existía en la base de datos, mostrar una alerta y redirigir al formulario de registro
        if (!$user->wasRecentlyCreated) {
            return back()->with('register_error', 'El usuario ya está registrado');
        }

        // Iniciar sesión automáticamente
        auth::login($user);

        // Redirigir al usuario a la página de inicio después del registro
        return redirect(route('home'));
    }
     // Show index page
    // Método para mostrar la página principal
    public function show()
    {
        // Obtener todos los usuarios
        $user = User::all();

        // Devolver una vista con los usuarios
        return view('index', ['opciones' => $user]);
    }

    // Método para iniciar sesión
    public function login(Request $request)
    {
        // Validar los datos del formulario de inicio de sesión
        $request->validate([
            'email' => 'required|email',
            'password'=>'required|string'
        ]);
        //  get the user credentials(email and password)
        // Obtener las credenciales del usuario (correo electrónico y contraseña)
        $credentials = [
            'email'=>$request->email,
            'password'=>$request->password,
        ];
         //keep session open
        // Mantener la sesión iniciada si el usuario seleccionó la opción "recordar sesión"
        $remember = ($request->has('remember') ? true : false);

        // Intentar iniciar sesión con las credenciales proporcionadas
        if(Auth::attempt($credentials,$remember)){
            // Regenerar el ID de sesión para evitar ataques de secuestro de sesión
            $request->session()->regenerate();

            // Redirigir al usuario a la página principal después de iniciar sesión
            return redirect(route('index'))->with('credentials', $credentials);
        }else{
            // Si las credenciales son incorrectas, mostrar un mensaje de error y redirigir al usuario de vuelta a la página de inicio de sesión
            return redirect()->back()->with(['login_error' => 'Datos Incorrectos']);
        }
    }

    // Método para cerrar sesión
    public function logout(Request $request)
    {
        // Cerrar sesión del usuario actual
        Auth::logout();

        // Invalidar la sesión actual y generar un nuevo token de sesión para evitar ataques de secuestro de sesión
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirigir al usuario a la página principal con un mensaje de confirmación
        return redirect(route('index'))->with('message', '¡Sesion Cerrada!');
    }
}
