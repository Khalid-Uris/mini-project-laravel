<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CreditCard;
use Illuminate\Http\Request;

class CreditCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $creditCard = CreditCard::join('banks', 'credit_cards.bank_id', '=', 'banks.id')
            ->select('credit_cards.*', 'banks.name')
            ->get();
        // $creditCard = CreditCard::all();
        return response()->json([
            'Credit Card' => $creditCard,
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $obj = new CreditCard();
        $obj->cc_type = $request->cc_type;
        $obj->cc_number = $request->cc_number;
        $obj->cc_exp_month = $request->cc_exp_month;
        $obj->cc_exp_year = $request->cc_exp_year;
        $obj->bank_id = $request->bank_id;
        $obj->bank_id = $request->bank_id;
        $obj->save();
        return response()->json([
            'Credit Card' => $obj,
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
        $edit = CreditCard::find($id);
        return response()->json([
            'Credit Card' => $edit,
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
        $update = CreditCard::find($id);
        $update->cc_type = $request->cc_type;
        $update->cc_number = $request->cc_number;
        $update->cc_exp_month = $request->cc_exp_month;
        $update->cc_exp_year = $request->cc_exp_year;
        $update->bank_id = $request->bank_id;
        $update->bank_id = $request->bank_id;
        $update->update();

        return response()->json([
            'Credit Card' => $update,
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $destroy = CreditCard::find($id);
        $destroy->delete();

        return response()->json([
            'Credit Card' => $destroy,
        ], 200);
    }
}