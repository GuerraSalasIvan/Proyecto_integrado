<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use Carbon\Carbon;
use Validator;
use \stdClass;

class UserController extends Controller
{

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
            'player_full_name' => 'required',
            'player_birthdate' => 'required|date',
            'player_position' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        // Crear usuario
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);

        // Crear jugador asociado al usuario
        $player = Player::create([
            'full_name' => $request->input('player_full_name'),
            'birthdate' => $request->input('player_birthdate'),
            'position' => $request->input('player_position'),
            'user_id' => $user->id,
        ]);

        // Generar token de acceso
        $token = $user->createToken('auth_token')->plainTextToken;

        // Retornar respuesta JSON con datos del usuario y token de acceso
        return response()->json(['data' => $user, 'access_token' => $token, 'token_type' => 'Bearer']);
    }





    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password')))
        {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'message' => 'Hola ' . $user->name,
            'accessToken' => $token,
            'token_type' => 'Bearer',
            'user' => $user,
        ]);
    }

    public function logout()
    {
        auth()->user()->tokens()->delete();

        return ['message'=>'Logout!'];
    }









    public function getUser(Request $request)
    {

        $user = $request->user()->load('player.teams');
        $user->player->imageURL = $user->player->getFirstMediaURL();

        return response()->json($user);
    }


    public function assignTeam(Request $request)
    {

        $request->validate([
            'playerId' => 'required|exists:players,id',
            'teamId' => 'required|exists:teams,id'
        ]);

        $player = Player::findOrFail($request->playerId);

        $player->teams()->attach($request->teamId);

        return response()->json(['message' => 'Team assigned successfully.']);
    }

    public function updateUser(Request $request)

    {
        // Obtener el usuario autenticado
        $user = Auth::user();

        // Si no se obtiene el usuario, devolver un error
        if (!$user) {
            return response()->json(['message' => 'User not authenticated'], 401);
        }

        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'birthdate' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $validatedData = $validator->validated();

        // Actualizar los campos del usuario
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->save();

        // Verificar si el usuario tiene un player asociado
        $player = $user->player;
        if ($player) {
            $player->full_name = $validatedData['full_name'];
            $player->birthdate = $validatedData['birthdate'];

            if ($request->hasFile('image')) {
                if ($player->getFirstMediaUrl()) {
                    $player->clearMediaCollection();
                }
                $player->addMedia($request->file('image'))->toMediaCollection();
            }

            $player->save();

            return response()->json(['message' => 'Profile updated successfully']);
        } else {
            return response()->json(['message' => 'Player not found for the user'], 404);
        }
    }


}
