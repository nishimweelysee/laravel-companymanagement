<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Mail;
use \App\Mail\SendEmail;

class EmployeeController extends Controller
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
        return view('employee.employee',["employees"=>Employee::paginate(10), "companies" => Company::all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employee.create',["companies"=>Company::paginate(10)]);
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
            'employeeNumber'=>'required',
            'email'=>['email','required'],
            'telephoneNumber'=>['required'],
            'startDate'=>['date','required'],
            'company'=>'required'
        ]);
        $comp = Company::find($data['company']);
        $comp->employee()->create($data);
        $user = auth()->user();
        $email = $user->email;
        $name = $user->name;
        $employeeName = $data['name'].'  '.$data['surname'];
        $details = [
            'title' => 'User creation Confirmation',
            'body' => "Hello $name, \n You have Created Employee called  $employeeName"
        ];
        Mail::to($email)->send(new SendEmail($details));
        return redirect('/employee');
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
        $employee = Employee::find($id);
        return view('employee.edit',['employee'=>$employee,"companies"=>Company::paginate(10)]);
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
            'employeeNumber'=>'required',
            'email'=>['email','required'],
            'telephoneNumber'=>['required'],
            'startDate'=>['date','required'],
            'company_id'=>'required'
        ]);
        $employee = Employee::find($id);
        $employee->update($data);
        return redirect('/employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Employee::destroy($id);
        return redirect('/employee');
    }

    public function filterEmployee()
    {
        $query = Request::capture()->query->all();
        $employees = (collect($query)->shift())?Employee::where($query)->paginate(10):Employee::paginate(10);
        return view('employee.employee', ["employees" => $employees, "companies" => Company::all()]);
    }
}
