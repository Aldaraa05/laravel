<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Bagsh;
use App\Http\Requests\StoreBagshRequest;
use App\Http\Requests\UpdateBagshRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;

class BagshController extends Controller

{
    public function index()
    {
        return Bagsh::all(); 
    }

    public function create(Request $req)
    {
        $this->validate($req, [
            'register' => 'required|max:10|min:10|unique:bagshes',
            'password' => 'required|min:8|max:15',
            'angi_id' => 'required|unique:bagshes',
            'name' => 'required',
        ]);

        $bagsh= new Bagsh;
        $bagsh->angi_id=$req->angi_id;
        $bagsh->name=$req->name;
        $bagsh->register=$req->register;
        $bagsh->password= Hash::make($req->password);
        $result=$bagsh->save();

        return response() -> json([
            'bagshId' => $bagsh->id,
            'message' => 'Bagsh created succesfully',
            // 'token' => $bagsh->createToken("API TOKEN")->plainTextToken
        ], 200);
    }

    public function signIn(Request $req) {

        $this->validate($req, [
            'register' => 'required|max:10|min:10',
            'password' => 'required|min:8|max:15',
        ]);

        $register = $req->register;
        $password = $req->password;
        $bagsh = Bagsh::where('register','like', $register) -> first();
        
        if(!$bagsh || !Hash::check($password , $bagsh->password )) {
            return response([
                'message' => 'password or register is incorrect'
            ], 401);
        }
        else {
            return response() -> json([
                $bagsh->angi_id,
                'message' => 'Bagsh signed in',
                'token' => $bagsh->createToken("API TOKEN")->plainTextToken
            ], 200);
        }

    }

    public function show($id)
    {
        $bagsh = Bagsh::find($id);
        return $bagsh;
    }

    public function edit($id, Request $req)
    {
        $this->validate($req, [
            'register' => 'required|max:10|min:10',
        ]);
        $bagsh = Bagsh::find($id);
        $bagsh->angi_id=$req->angi_id;
        $bagsh->name=$req->name;
        $bagsh->register=$req->register;
        $result=$bagsh->save();

        if($result) {
            return ['Result'=> 'Data has been updated'];
        }
        else {
            return ['Result'=> 'Operation has been failed'];
        }
    }

    public function update(UpdateBagshRequest $request, Bagsh $bagsh)
    {
        //
    }

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

    public function logout(Request $req) {

        auth()->user()->tokens()->delete();
        return response() -> json([
            'message' => 'Bagsh logged out',
        ], 200);       
    }
}
