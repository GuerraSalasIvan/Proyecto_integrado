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
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors());
        }

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

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json(['data'=>$user, 'access_token' => $token, 'token_type'=>'Bearer']);
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

         $user = $request->user();
        //  ->load('player.teams');
        // $user->player->imageURL = $user->player->getFirstMediaURL();

        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'email_verified_at' => $user->email_verified_at,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
        ]);
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
        $user = $request->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'full_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'birthdate' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->save();

        $player = $user->player;
        $player->full_name = $request->full_name;
        $player->birthdate = $request->birthdate;

        if ($request->hasFile('image')) {

            if ($player->getFirstMediaURL()) {
                $player->clearMediaCollection();
            }
            $player->addMedia( $request->image)->toMediaCollection();
        }

        $player->save();

        return response()->json(['message' => 'Profile updated successfully']);
    }

}
