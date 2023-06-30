<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Validator;
class AuthController extends Controller
{
  /**
  * Create user
  *Register User : Nous allons implémenter une méthode simple pour enregistrer un utilisateur :
  * @param  [string] name
  * @param  [string] email
  * @param  [string] password
  * @param  [string] password_confirmation
  * @return [string] message
  */
  public function register(Request $request)
  {
      $request->validate([
          'name' => 'required|string',
          'email' => 'required|string|email|unique:users',
          'password' => 'required|string|',
          'c_password'=>'required|same:password',
      ]);

      $user = new User([
          'name' => $request->name,
          'email' => $request->email,
          'password' => bcrypt($request->password)
      ]);

      if($user->save()){
          return response()->json([
              'message' => 'Successfully created user!'
          ], 201);
      }else{
          return response()->json(['error'=>'Provide proper details']);
      }
    }

    /**
* Login user and create token
*Login User : Dans le même fichier AuthController.php, créez une méthode de connexion simple qui génère API tokenvia sanctum :
* @param  [string] email
* @param  [string] password
* @param  [boolean] remember_me
* @return [string] access_token
* @return [string] token_type
* @return [string] expires_at
*/
public function login(Request $request)
{
  $request->validate([
    'email' => 'required|string|email',
    'password' => 'required|string',
    'remember_me' => 'boolean'
  ]);

  $credentials = request(['email', 'password']);
  if(!Auth::attempt($credentials))
  {
    return response()->json([
    'message' => 'Unauthorized'
    ], 401);
  }

  $user = $request->user();
  $tokenResult = $user->createToken('Personal Access Token');
  $token = $tokenResult->plainTextToken;


  return response()->json([
    'access_token' => $token,
    'token_type' => 'Bearer',
  ]);
}
/**
* Get the authenticated User
*Get User : Dans le même fichier AuthController.php, créez une méthode simple pour obtenir les détails de l'utilisateur :
* @return [json] user object
*/
public function user(Request $request)
{
  $user = Auth::user();
  return response()->json($user);
}
/**
* Logout user (Revoke the token)
*Logout User : Dans le même fichier AuthController.php, créez une méthode simple au revoketoken de l'utilisateur :
* @return [string] message
*/
public function logout(Request $request)
{
  $request->user()->tokens()->delete();

  return response()->json([
    'message' => 'Successfully logged out'
  ]);
}

  }
