<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required|min:7',
        ]);
        try {
            $is_email_exist = User::where('email', '=', $request->email)->first();

            if ($is_email_exist) {

                if (Hash::check($request->password, $is_email_exist->password)) {
                    session([
                        'user_id' => $is_email_exist->id,
                        'name' => $is_email_exist->name,
                    ]);
                    return redirect()->route('bank.index');
                } else {
                    return back()->withError('Password does not match');
                }
            } else {
                return back()->withError('Email does not exists');
            }
        } catch (Exception $ex) {
            return back()->withErrors($ex->getMessage());
        }


        // try {
        //     if ($request->email == 'admin@admin.com' and $request->password == 'admin12') {

        //         session([
        //             'admin_id' => $request->email,
        //         ]);
        //         return redirect()->route('bank.index');
        //     } else {
        //         return back()->withError('Email and Password does not match..');
        //     }
        // } catch (Exception $ex) {
        //     return back()->withError($ex->getMessage());
        // }
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        return redirect()->route('login.index');
    }

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
    }
}