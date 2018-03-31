<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Client;
use App\Http\Resources\Client as ClientResource;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ClientResource::collection(Client::paginate(10));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $client = $request->isMethod('put') ? Client::findOrFail($request->client_id) : new Client;

      $client->id = $request->input('client_id');
      $client->name = $request->input('name');
      $client->zipcode = $request->input('zipcode');
      $client->number = $request->input('address');
      $client->country = $request->input('country');
      $client->city = $request->input('city');

      if ($client->save()) {
        return new LocationResource($client);
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new ClientResource(Client::findOrFail($id));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $client = Client::findOrFail($id);

        if ($client->delete()) {
          return new ClientResource($client);
        }
    }
}
