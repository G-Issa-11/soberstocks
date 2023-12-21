<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    // Modified register method to handle both registration and login
    public function register(Request $request)
    {
        // Validate the request data
        $this->validate($request, [
            'name' => 'required|min:8',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Check if the user exists based on email
        $user = User::where('email', $request->email)->first();

        if ($user) {
            // User exists, attempt login
            if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
                return redirect()->route('home');
            } else {
                // Login failed
                return redirect()->back()->with('error', 'Invalid credentials');
            }
        } else {
            // User doesn't exist, proceed with registration
            $this->create($request->all());

            // Log in the newly registered user
            auth()->attempt(['email' => $request->email, 'password' => $request->password]);

            return redirect()->route('home');
        }
    }
}
