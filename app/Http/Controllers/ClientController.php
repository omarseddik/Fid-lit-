<?php

namespace Richflor\Http\Controllers;

use Illuminate\Http\Request;
use Richflor\Client;
use Richflor\Http\Requests;
use Richflor\Http\Controllers\Controller;
use Richflor\Http\Requests\StoreUserPostRequest;

class ClientController extends Controller
{ /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $clients=Client::all();
        return view('client/list', ['clients' => $clients]);
    }


    public function create()
    {
        return view('client/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function add(StoreUserPostRequest $request)
    {
        $data =$request->all();
        $birthdate=\DateTime::createFromFormat('d/m/Y', $data['birthdate']);
        $data['birthdate']=$birthdate->getTimestamp();
        $client=new Client();
        $client->fill($data);

        $client->save();
        return view('client/add');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Request $request,$id)
    {
        $client=Client::find($id);
        if($request->getMethod()!='PUT'){
            return view('client/edit',array('client'=>$client));
        }
        $data =$request->all();
        $birthdate=\DateTime::createFromFormat('d/m/Y', $data['birthdate']);
        $data['birthdate']=$birthdate->getTimestamp();
        $client=$client->fill($data);
        $client->save();
        return view('client/edit',array('client'=>$client));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function delete($id)
    {
        //
    }
}
