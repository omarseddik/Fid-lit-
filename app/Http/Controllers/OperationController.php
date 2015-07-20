<?php

namespace Richflor\Http\Controllers;

use Illuminate\Http\Request;
use Richflor\Client;
use Richflor\Operation;
use Richflor\Http\Requests;
use Richflor\Http\Controllers\Controller;
use Log;
use DB;

class OperationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }
    /**
     * Add Operation
     *
     * @return Response
     */
    public function add(Request $request,$id)
    {
        $client=Client::find($id);
        if(!$client){
            Log::error("Client with ID ".$id." Doesn't exist");
            App::abort(404);
        }
        if($request->getMethod()!='POST'){
            Log::info("Show client for add");
            return view('Operation.add',array('operations'=>$client->operations));
        }
        Log::error("Add operation for client with ID ".$id);
        $data =$request->all();
        DB::beginTransaction();
        $operation=new Operation();
        $operation->fill($data);
        $operation->save();
        $client->operations()->save($operation);
        if($client->gender==='F')
            $client->points+=$data['montant']*0.1;
        else 
            $client->points+=$data['montant']*0.2;
        $client->save();
        DB::commit();
        return redirect()->action('ClientController@index');
    }
    
}
