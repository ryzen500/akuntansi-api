<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\State;

class TransactionDataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function country()
    {
        //Get all data Country
            $countries =Country::all();

            // Response
            return response()->json($countries);
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function states(Country $country)
    {
        return response()->json($country->states);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cities(State $state)
    {
            return response()->json($state->cities);

    }

   

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    }
