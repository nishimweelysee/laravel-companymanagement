<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('company.company',["companies"=>Company::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
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
            'address'=>'required',
            'telephonenumber'=>['required'],
            'website'=>'required',
            'director'=>'required',
            'logo'=>['required','image']
        ]);

        $imagePath = \request("logo")->store('uploads','public');
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

        Mail::to($email)->send(new SendEmail($details));
        return redirect('/company');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        return view('company.edit',['company'=>Company::find($id)]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $company)
    {
        $data = $request->validate([
            'name'=>'required',
            'address'=>'required',
            'telephonenumber'=>['required'],
            'website'=>'required',
            'director'=>'required',
            'logo'=>['required','image']
        ]);
        $imagePath = \request("logo")->store('uploads','public');
        $company = Company::find($company);
        $company->update(array_merge($data,['logo'=>$imagePath]));
        return redirect('/company');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy($company)
    {
        $company = Company::find($company);
        $company->delete();
        return redirect('/company');
    }
}
