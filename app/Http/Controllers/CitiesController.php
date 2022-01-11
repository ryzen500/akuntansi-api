<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // call all data 
        $city = City::all();


        //  return $city;
        $response = ['message' => 'Berhasil Melihat Data' , 'status' => 'success', 'data' => $city];

        return response()->json($response, Response::HTTP_OK);

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
        $city = City::create($request->all());

        // return $city;

        $response = ['message' => 'Berhasil Menambahkan Data' , 'status' => 'success', 'data' => $city];

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
        //get data by id 
        $city = City::findOrFail($id);

        // return $city;
        $response = ['message' => 'Berhasil Melihat Detail Data' , 'status' => 'success', 'data' => $city];

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
        $city = City::findOrFail($id);

        $city->update($request->all());
        // return $city;
        $response = ['message' => 'Berhasil Merubah Data' , 'status' => 'success', 'data' => $city];

        return response()->json($response, Response::HTTP_OK);


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
        $city = City::findOrFail($id);

        $city->delete();

        // return $city;

        $response = ['message' => 'Berhasil Menghapus Data' , 'status' => 'success', 'data' => $city];

        return response()->json($response, Response::HTTP_OK);

    }
}
