<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Nette\Utils\Image;

class CompanyController extends Controller
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
    public function index(){
        return view('company.company',["companies"=>Company::paginate(10)]);
    }
    public function create(){
        return view('company.create');
    }
    public function edit($id){
        $company = Company::find($id);
        return view('company.edit',['company'=>$company]);
    }

    public function delete($id){
        Company::destroy($id);
        return redirect('/company');
    }

    public function store(){
        $data = \request()->validate([
            'id'=>'',
            'name'=>'required',
            'address'=>'required',
            'telephonenumber'=>['required'],
            'website'=>'required',
            'director'=>'required',
            'logo'=>['required','image']
        ]);

        $imagePath = \request("logo")->store('uploads','public');

        if (array_key_exists('id',$data) && $data['id']){
            $comp = Company::find($data['id']);
            $comp->update(array_merge($data,['logo'=>$imagePath]));
        }else{
            $comp = new Company([
                'name'=>$data['name'],
                'address'=>$data['address'],
                'telephonenumber'=>$data['telephonenumber'],
                'website'=>$data['website'],
                'director'=>$data['director'],
                'logo'=>$imagePath
            ]);
            $comp->save();
            $user = auth()->user();
            $email = $user->email;
            $name = $user->name;
            $details = [
                'title' => 'Registration Confirmation',
                'body' => "Hello $name, \n You have Created Company called $comp->name"
            ];

            \Illuminate\Support\Facades\Mail::to($email)->send(new \App\Mail\SendEmail($details));
        }

        return redirect('/company');
    }
}
