<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\Count;
use Symfony\Component\HttpFoundation\Response;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $countries = Country::all();

        $response =
        [
            'message' => 'List Transaction order by time',
            'data'=>$countries
    ];

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

        $countries = Country::create($request->all());

        $response =['message'=> 'membuat Negara berhasil', 
        'data'=> $countries
    ];
    return response()->json($response,Response::HTTP_CREATED);    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $countries =Country::find($id);
        $response =['message'=> 'Detail Negara berhasil', 
        'data'=> $countries
    ];

    return response()->json($response,Response::HTTP_OK);
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
        $countries =Country::findOrFail($id);
        $countries->update($request->all());

        $response =['message'=> 'merubah Negara berhasil', 
        'data'=> $countries
    ];

    return response()->json($response,Response::HTTP_OK);
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
        $countries = Country::find($id);
        $countries->delete();
        $response =['message'=> 'Menghapus Negara berhasil', 
        'data'=> $countries
    ];

        return response()->json($response,Response::HTTP_CREATED);    }
    }

