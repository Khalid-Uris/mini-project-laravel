<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use Exception;
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
        return view('bank.insert');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
            'name' => 'required|string|max:255|regex:/^[a-bA-B ]+$/',
            'address' => 'required|string|max:255',
            'code' => 'required|numeric|min:11'
        ]);
        try {
            $obj = new Bank();
            $obj->name = $request->name;
            $obj->address = $request->address;
            $obj->code = $request->code;
            $obj->save();
            //return $obj;
            return redirect()->route('bank.show');
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
        $bank = Bank::all();
        return view('bank.show')->with('bank', $bank);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bank = Bank::find($id);
        return view('bank.edit', compact('bank'));
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
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'code' => 'required|numeric|min:11'
        ]);
        try {
            $obj = Bank::find($id);
            $obj->name = $request->name;
            $obj->address = $request->address;
            $obj->code = $request->code;
            $obj->update();
            //return $obj;
            return redirect()->route('bank.show');
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
        $bank = Bank::find($id);
        $bank->delete();
        return redirect()->route('bank.show');
    }
}