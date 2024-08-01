<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'identificacion' => ['required', 'string', 'max:255'],
            'nombre' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
       
        ]);
    }


    protected function create(array $data)
    {
        return User::create([
            'identificacion' => $data['identificacion'],
            'nombre' => $data['nombre'],
            'password' => Hash::make($data['password']),
           
        ]);
    }
}
