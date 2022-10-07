<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\CreditCard;
use Exception;
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
        $bank = Bank::all();
        return view('creditCard.addCreditCard', compact('bank'));
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
        $request->validate([
            'cc_type' => 'required|string|max:255|alpha',
            'cc_number' => 'required|min:15|numeric',
            'cc_exp_month' => 'required|date',
            'cc_exp_year' => 'required|date',
            'bank_id' => 'required|string',

        ]);

        try {
            $obj = new CreditCard();
            $obj->cc_type = $request->cc_type;
            $obj->cc_number = $request->cc_number;
            $obj->cc_exp_month = $request->cc_exp_month;
            $obj->cc_exp_year = $request->cc_exp_year;
            $obj->bank_id = $request->bank_id;
            $obj->save();

            return redirect()->route('credit-card.show');
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $creditCard = CreditCard::join('banks', 'credit_cards.bank_id', '=', 'banks.id')
            ->select('credit_cards.id AS cc_id', 'banks.name AS bname')
            ->get();
        return view('creditCard.showCreditCard', compact('creditCard'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bank = Bank::all();
        $creditCard = CreditCard::find($id);
        return view('creditCard.editCreditCard')
            ->with('creditCard', $creditCard)
            ->with('bank', $bank);
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
        // $creditCard=CreditCard::join('banks','credit_cards.bank_id','=','banks.id')->get();
        // $bank=Bank::all();
        $request->validate([
            'cc_type' => 'required|string|max:255|alpha',
            'cc_number' => 'required|min:15|numeric',
            'cc_exp_month' => 'required|date',
            'cc_exp_year' => 'required|date',
            'bank_id' => 'required|string',
        ]);

        try {
            $obj = CreditCard::find($id);
            $obj->cc_type = $request->cc_type;
            $obj->cc_number = $request->cc_number;
            $obj->cc_exp_month = $request->cc_exp_month;
            $obj->cc_exp_year = $request->cc_exp_year;
            $obj->bank_id = $request->bank_id;
            $obj->update();

            return redirect()->route('credit-card.show');
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage());
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
        $creditCard = CreditCard::find($id);
        $creditCard->delete();

        return redirect()->route('credit-card.show');
    }
}