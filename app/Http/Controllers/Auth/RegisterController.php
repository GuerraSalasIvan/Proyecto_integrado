<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default, this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $redirectTo = '/user';
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
            'player_name' => ['required', 'string', 'max:255'],
            'player_position' => ['required', 'string', 'max:255'],
            'player_birthdate' => ['required', 'date'],
        ]);
    }

    protected function create(array $data)
    {

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        $player = Player::create([
            'name' => $data['player_name'],
            'birthdate' => $data['player_birthdate'],
            'position' => $data['player_position'],
            'user_id' => $user->id,
        ]);

        return $user;
    }
}
