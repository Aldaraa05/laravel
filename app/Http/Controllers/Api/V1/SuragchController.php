<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Suragch;
use App\Http\Requests\StoreSuragchRequest;
use App\Http\Requests\UpdateSuragchRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        $this->validate($req, [
            'register' => 'required|unique:bagshes|max:10|min:10',
            'password' => 'required|min:8|max:15',
        ]);
        $suragch= new Suragch;
        $suragch->angi_id=$req->angi_id;
        $suragch->name=$req->name;
        $suragch->register=$req->register;
        $suragch->password=$req->password;
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
    public function store(StoreSuragchRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
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
            'register' => 'required|unique:bagshes|max:10|min:10',
            'password' => 'required|min:8|max:15',
        ]);
        $suragch = Suragch::find($id);
        $suragch->angi_id=$req->angi_id;
        $suragch->name=$req->name;
        $suragch->register=$req->register;
        $suragch->password=$req->password;
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
