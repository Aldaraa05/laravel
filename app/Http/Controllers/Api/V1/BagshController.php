<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Bagsh;
use App\Http\Requests\StoreBagshRequest;
use App\Http\Requests\UpdateBagshRequest;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\BagshResource;
use Illuminate\Http\Request;

class BagshController extends Controller

{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Bagsh::all(); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req)
    {
        $this->validate($req, [
            'register' => 'required|unique|max:10|min:10',
            'password' => 'required|min:8|max:15',
        ]);

        $bagsh= new Bagsh;
        $bagsh->angi_id=$req->angi_id;
        $bagsh->name=$req->name;
        $bagsh->register=$req->register;
        $bagsh->password=$req->password;
        $result=$bagsh->save();
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
        $bagsh = Bagsh::where('register','like', $register) -> first();;
        return $bagsh;
    }
    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $bagsh = Bagsh::find($id);
        return $bagsh;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, Request $req)
    {
        $this->validate($req, [
            'register' => 'required|unique:bagshes|max:10|min:10',
            'password' => 'required|min:8|max:15',
        ]);
        $bagsh = Bagsh::find($id);
        $bagsh->angi_id=$req->angi_id;
        $bagsh->name=$req->name;
        $bagsh->register=$req->register;
        $bagsh->password=$req->password;
        $result=$bagsh->save();

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
    public function update(UpdateBagshRequest $request, Bagsh $bagsh)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $bagsh = Bagsh::find($id);
        $result=$bagsh->delete();
        if($result) {
            return ['result' => 'succesfully deleted'];
        }
        else {
            return ['Result'=> 'Operation has been failed'];
        }
    }
}
