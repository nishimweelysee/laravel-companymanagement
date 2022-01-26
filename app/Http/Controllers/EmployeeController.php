<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
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
        return view('employee.employee',["employees"=>Employee::paginate(10)]);
    }
    public function create($id){
        return view('employee.create',["company"=>Company::find($id)]);
    }
    public function edit($id){
        $employee = Employee::find($id);
        return view('employee.edit',['employee'=>$employee]);
    }

    public function delete($id){
        Employee::destroy($id);
        return redirect('/employee');
    }

    public function store($id){
        $data = \request()->validate([
            'id'=>'',
            'name'=>'required',
            'surname'=>'required',
            'employeeNumber'=>'required',
            'email'=>['email','required'],
            'telephoneNumber'=>['required'],
            'startDate'=>['date','required']
        ]);

        if (array_key_exists('id',$data) && $data['id']){
            $emp = Employee::find($data['id']);
            $emp->update($data);
        }else{

            $comp = Company::find($id);

            $comp->employee()->create([
                'name'=>$data['name'],
                'surname'=>$data['surname'],
                'employeeNumber'=>$data['employeeNumber'],
                'email'=>$data['email'],
                'telephoneNumber'=>$data['telephoneNumber'],
                'startDate'=>$data['startDate']
            ]);

            $user = auth()->user();
            $email = $user->email;
            $name = $user->name;
            $employeeName = $data['name'].'  '.$data['surname'];
            $details = [
                'title' => 'User creation Confirmation',
                'body' => "Hello $name, \n You have Created Employee called  $employeeName"
            ];

            \Illuminate\Support\Facades\Mail::to($email)->send(new \App\Mail\SendEmail($details));
        }

        return redirect('/employee');
    }
}
