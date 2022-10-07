<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bank = Bank::all();
        return response()->json([
            'bank' => $bank
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $bank = new Bank();
        $bank->name = $request->name;
        $bank->address = $request->address;
        $bank->code = $request->code;
        $bank->save();

        return response()->json([
            'bank' => $bank
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bank = Bank::find($id);

        return response()->json([
            'Bank' => $bank
        ], 200);
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
        $bank = Bank::find($id);
        $bank->name = $request->name;
        $bank->address = $request->address;
        $bank->code = $request->code;
        $bank->save();

        return response()->json([
            'Bank' => $bank
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank = Bank::find($id);
        $bank->delete();

        return response()->json([
            'Bank' => $bank
        ], 200);
    }
}