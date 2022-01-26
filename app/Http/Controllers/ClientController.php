<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Company;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('client.client',["clients"=>Client::paginate(10)]);
    }
    public function create($id){
        return view('client.create',["company"=>Company::find($id)]);
    }
    public function edit($id){
        $client = Client::find($id);
        return view('client.edit',['client'=>$client]);
    }

    public function delete($id){
        Client::destroy($id);
        return redirect('/client');
    }

    public function store($id){
        $data = \request()->validate([
            'id'=>'',
            'name'=>'required',
            'surname'=>'required',
            'address'=>'required',
            'telephoneNumber'=>['required','regex:/^([0-9\s\-\+\(\)]*)$/','min:10'],
        ]);


        if (array_key_exists('id',$data) && $data['id']){
            $comp = Client::find($data['id']);
            $comp->update($data);
        }else{
            $comp = Company::find($id);

            $comp->client()->create([
                'name'=>$data['name'],
                'surname'=>$data['surname'],
                'address'=>$data['address'],
                'telephoneNumber'=>$data['telephoneNumber'],
            ]);
            $user = auth()->user();
            $email = $user->email;
            $name = $user->name;
            $clientName = $data['name'].'  '.$data['surname'];
            $details = [
                'title' => 'User creation Confirmation',
                'body' => "Hello $name, \n You have Created Client called $clientName"
            ];

            \Illuminate\Support\Facades\Mail::to($email)->send(new \App\Mail\SendEmail($details));
        }

        return redirect('/client');
    }
}
