<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        //
        $user =User::create([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'password'=>Hash::make($request->input('password'))
        ]);
        $token = $user->createToken('token')->plainTextToken;

        // return di variabel user 
        return response()->json(['data'=> $user, 'access_token' => $token, 'token_type'=>'Bearer']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        //Login 
        if (!Auth::attempt($request->only('email', 'password'))) {
            # memberikan return 
            return response([
                'message'=>'Unauthorized',
                "status" => "error"
            ], Response::HTTP_UNAUTHORIZED);
        }

        $user =User::where('email', $request['email'])->firstOrFail();

        
        // Create Token
        $token = $user->createToken('token')->plainTextToken;

        $user->token = $token;
        // $token=$user->createToken('token')->delete();
        // membuat berapa lama token 


        return response()->json(['message'=> 'Hi'.$user->name.', Welcome Home','access_token' =>$token, 'token_type'=>'Bearer', "status" => 'success', 'user_data' => $user]);
    }

    // public function user(){
    //         return Auth::user();
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        //
        auth()->user()->tokens()->delete();
        return [
            'message' => 'You have successfully logged out and the token was successfully deleted',
            'status' =>'success'
        ];

}
}
