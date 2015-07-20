<?php

namespace Richflor\Http\Controllers;

use Illuminate\Http\Request;
use Richflor\Client;
use Richflor\Http\Requests;
use Richflor\Http\Controllers\Controller;
use Richflor\Http\Requests\StoreUserPostRequest;
use Mail;
use App;
use Log;
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
        $birthdate->setTime(0, 0, 0);
        $data['birthdate']=date('Y-m-d H:i:s',$birthdate->getTimestamp());
        $client=new Client();
        $client->fill($data);
        $client->save();
        // Mail::send('email.verify', ['client'=>$client], function($message) use ($client){
        //     $message->to($client->email, $client->firstname.' '.$client->lastname)
        //     ->subject('Welcome to Richflor');
        // });

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
        if(!$client){
            Log::error("Client with ID ".$id." Doesn't exist");
            App::abort(404);
        }
        if($request->getMethod()!='PUT'){
            Log::info("Show client for edit");
            return view('client/edit',array('client'=>$client));
        }
        Log::error("Edit client with ID ".$id);
        $data =$request->all();
        $birthdate=\DateTime::createFromFormat('d/m/Y', $data['birthdate']);
        $birthdate->setTime(0, 0, 0);
        $data['birthdate']=date('Y-m-d H:i:s',$birthdate->getTimestamp());
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
    public function delete(Request $request,$id)
    {
        $client=Client::find($id);
        if(!$client)
            App::abort(404);
        $client->delete();
        return redirect()->action('ClientController@index');
    }
}
