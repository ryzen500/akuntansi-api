<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Transaction;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Get all data Transaction


        $transaction = Transaction::orderBy('time', 'DESC')->get();

        // Response 

        $response =
        [
            'message' => 'List Transaction order by time',
            'data'=>$transaction
    ];

    return response()->json($response, Response::HTTP_OK);
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        //Make validator 
        $validator =Validator::make($request->all(),[
            'title'=>['required'],
            'amount'=> ['required'],
            'type'=> ['required', 'in:expense,revenue']
        ]);

$transaction =$request->all();


        if ($validator->fails()) {
            # response
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        }elseif ($images =$request->file('images')) {

            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $images->getClientOriginalExtension();
            $images->move($destinationPath, $profileImage);
            $transaction['images']=url($images);
            $transaction['images']="$profileImage";
        }

        // return $transaction;

            // object 
           $transactions =Transaction::create($transaction); 
        $response =['message'=> 'membuat Transaksi berhasil', 
        'data'=> $transactions
    ];

    return response()->json($response,Response::HTTP_CREATED);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //get id
        $transaction = Transaction::findOrFail($id);
        $response =['message'=> 'Detail Transaksi berhasil', 
        'data'=> $transaction
    ];

    return response()->json($response,Response::HTTP_OK);


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
        //get Id 
        $transaction = Transaction::findOrFail($id);

          //Make validator 
          $validator =Validator::make($request->all(),[
            'title'=>['required'],
            'amount'=> ['required', 'numeric'],
            'type'=> ['required', 'in:expense,revenue']
        ]);


        if ($validator->fails()) {
            # response
            return response()->json($validator->errors(), Response::HTTP_BAD_REQUEST);
        }

        try {
            // object 
           $transaction->update($request->all()); 
        //throw $th;
        $response =['message'=> 'merubah Transaksi berhasil', 
        'data'=> $transaction
    ];

    return response()->json($response,Response::HTTP_OK);

        } catch (QueryException $e) {
        return response()->json([
            'message'=>"failed".$e->errorInfo
        ]);
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    //get Id 
    $transaction = Transaction::findOrFail($id);

  try {
      // object 
     $transaction->delete(); 
  //throw $th;
  $response =['message'=> 'Menghapus Transaksi berhasil' 
];

return response()->json($response,Response::HTTP_OK);

  } catch (QueryException $e) {
  return response()->json([
      'message'=>"failed".$e->errorInfo
  ]);
      
  }
    }
}
