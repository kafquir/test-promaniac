<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\TicketPosition;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::orderBy('created_at', 'desc')->get();

    }
    /*public function post(Request $request){
          $response = array(
              'status' => 'success',
              'msg' => $request->message,
          );
          return response()->json($response);
       }*/
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'city' => $request->city,
            'gender' => $request->gender,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        TicketPosition::create([
            'user_id' => $user->id,
        ]);

        return $user;

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        return $user->update([
            'age' => $request->age
        ]);
    }


    /**
     * verifie the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function email_verification(Request $request)
    {
        $email = User::where('email', $request->email)->first();

        if($email) {
            return response()->json(['message' => 'Please Try another email, this already taken !'], 422);
        }

    }

    /**
     * save the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function save_ticket_position(Request $request, $id)
    {
        $ticket = TicketPosition::findOrFail($id);

        $ticket->update([
            'position' => $request->position
        ]);
    }

}
