<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\Client;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('client.client', ["clients" => Client::paginate(10), "companies" => Company::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.create',["companies"=>Company::paginate(10)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'address'=>'required',
            'telephoneNumber'=>['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
            'company'=>'required'
        ]);
        $comp = Company::find($data['company']);
        $comp->client()->create($data);
        $user = auth()->user();
        $email = $user->email;
        $name = $user->name;
        $clientName = $data['name'].'  '.$data['surname'];
        $details = [
            'title' => 'User creation Confirmation',
            'body' => "Hello $name, \n You have Created Client called $clientName"
        ];

        Mail::to($email)->send(new SendEmail($details));
        return redirect('/client');
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
        $client = Client::find($id);
        return view('client.edit',['client'=>$client,"companies"=>Company::paginate(10)]);
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
        $data = $request->validate([
            'name'=>'required',
            'surname'=>'required',
            'address'=>'required',
            'telephoneNumber'=>['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
            'company_id'=>'required'
        ]);
        $client = Client::find($id);
        $client->update($data);
        return redirect('/client');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::destroy($id);
        return redirect('/client');
    }

    public function filterClient()
    {
        $query = Request::capture()->query->all();
        $clients = (collect($query)->shift())?Client::where($query)->paginate(10):Client::paginate(10);
        return view('client.client', ["clients" => $clients, "companies" => Company::all()]);
    }
}
