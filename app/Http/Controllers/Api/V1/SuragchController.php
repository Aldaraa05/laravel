<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Suragch;
use App\Http\Requests\StoreSuragchRequest;
use App\Http\Requests\UpdateSuragchRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;


class SuragchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Suragch::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req)
    {
        // return $req;
        $this->validate($req, [
            'register' => 'required|max:10|min:10|unique:suragches',
            'password' => 'required|min:8|max:15',
        ]);
        $suragch= new Suragch;
        $suragch->angi_id=$req->angi_id;
        $suragch->name=$req->name;
        $suragch->register=$req->register;
        $suragch->password=bcrypt($req->password);
        
        $result=$suragch->save();
        if($result) {
            return ['Result'=> 'Data has been saved'];
        }
        else {
            return ['Result'=> 'Operation has been failed'];
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function signIn(Request $req) {
        $register = $req->register;
        $suragch = Suragch::where('register','like', $register) -> first();;
        return $suragch;
    }

    public function show($id)
    {
        $suragch = Suragch::find($id);
        return $suragch;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Request $req)
    {
        $this->validate($req, [
            'register' => 'required|max:10|min:10',
        ]);
        $suragch = Suragch::find($id);
        $suragch->angi_id=$req->angi_id;
        $suragch->name=$req->name;
        $suragch->register=$req->register;
        $result=$suragch->save();

        if($result) {
            return ['Result'=> 'Data has been updated'];
        }
        else {
            return ['Result'=> 'Operation has been failed'];
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSuragchRequest $request, Suragch $suragch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $suragch = Suragch::find($id);
        $result=$suragch->delete();
        if($result) {
            return ['result' => 'succesfully deleted'];
        }
        else {
            return ['Result'=> 'Operation has been failed'];
        }
    }
}
