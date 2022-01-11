<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $state = State::all();
        // return $state;


        return response()->json(['data' => $state, 'message' => 'List Data', 'status' => 'success']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $state =State::create($request->all());

        // return $state;

        $response = ['message' => 'Membuat State Berhasil', 'status' => 'success', 'data' => $state];

        return response()->json($response, Response::HTTP_CREATED);
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
        $state = State::findOrFail($id);

        // return $state;


        $response = ['message' => 'Memanggil Detail data ' , 'data' =>$state , 'status' => 'success'];

        return response()->json($response, Response::HTTP_OK);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
        $state = State::findOrFail($id);

        $state->update($request->all());


        // return $state;

        $response = ['message' => 'Merubah Data Berhasil', 'status' => 'success', ];

        return response()->json($response, Response::HTTP_ACCEPTED);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        $state = State::findOrFail($id);

        $state->delete();

        // return $state;

        $response = ['message' => 'Berhasil Menghapus Data ', 'status' =>'success' , 'data'=> $state];

        return response()->json($response, Response::HTTP_OK);


    }
}
