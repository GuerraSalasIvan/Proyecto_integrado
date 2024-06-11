<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Player;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    public function store(Request $request): Response
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'player_full_name' => ['required', 'string', 'max:100'],
            'player_birthdate' => ['required', 'date'],
            'player_position' => ['required', 'integer'],
        ]);



        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $token = $user->createToken('api_token');

        $player = Player::create([
            'full_name' => $request->player_full_name,
            'birthdate' => $request->player_birthdate,
            'position' => $request->player_position,
            'user_id' => $user->id,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return response()->noContent();
    }
}
