<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Angi;
use App\Http\Requests\StoreAngiRequest;
use App\Http\Requests\UpdateAngiRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bagsh;
use App\Models\Suragch;

class AngiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Angi::all();
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $angi = Angi::create([
            'angi' => $request->angi,
        ]);
        
        $angi->save();
        return response()->json($angi);
    }
    public function add(Request  $request) {
        $angi = new Angi;
        $angi->angi=$request->angi;
        $result=$angi->save();
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
    public function store(StoreAngiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $angi= Angi::with('suragches')->where('id', $id)->get();
        $angi1= Angi::with('bagsh')->where('id', $id)->get();
        return response() -> json([$angi, $angi1]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Angi $angi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAngiRequest $request, Angi $angi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Angi $angi)
    {
        //
    }
}
