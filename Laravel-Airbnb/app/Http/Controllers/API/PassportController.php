<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\User;
use DB;

class PassportController extends Controller
{
    public function login( Request $request ) {
    	
    	$fields = [
    		'email' => $request->email,
    		'password' => $request->password,
    	];

    	$access = Auth::attempt( $fields );
    	
    	if ( $access ) {

    		$user = Auth::user();
    		$token = $user->createToken('MyApp')->accessToken;

    		return response()->json( [
                "message" => "Login realizado com sucesso!",
                "data" => [
                	'user' => $user,
                	'token' => $token
                ]
            ], 200 );

    	} else {

    		return response()->json( [
                "message" => "Email ou senha inválidos!",
                "data" => null
            ], 401 );

    	}

    }

    public function register( Request $request ) {

    	$validator = Validator::make( $request->all(), [
    		'name' => 'required',
    		'email' => 'required|email',
    		'password' => 'required',
    		'c_password' => 'required|same:password',
    	]);

    	if ( $validator->fails() ) {

    		return response()->json([
    			'message' => 'Erro! '.$validator->errors(),
    			'data' => null
    		], 401);

    	}

    	$user = new User;

    	$user->name = $request->name;
    	$user->email = $request->email;
    	$user->password = bcrypt( $request->password );

    	return response()->json([
			'message' => 'Usuário '.$user->name.' criado com sucesso!',
			'data' => null
		], 200);

    }

    public function getDetails() {
    	$user = Auth::user();

    	return response()->json([
    		'message' => "Dados do usuário ".$user->name.":",
    		'data' => $user
    	], 200);
    }

    public function logout() {
    	$accessToken = Auth::user()->token();

    	DB::table('oauth_refresh_tokens')->where('access_token_id', $accessToken->id)->update([
    		'revoked' => true,
    	]);

    	$accessToken->revoke();

    	return response()->json([
    		'message' => .$user->name." deslogado com sucesso!",
    		'data' => null
    	], 201); 
    }
}
