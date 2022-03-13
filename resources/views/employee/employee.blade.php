@extends('layouts.app')

@section('content')
    <div>
        <div class="flex flex-col">
            <div class="flex justify-between m-2">
                <div class="p-4">
                    <h3 class="text-center font-bold">List of all Employees</h3>
                </div>
                <div>
                    <a href=" {{ route('employee.create') }} " class="fas fa-plus-o bg-gray-800 hover:bg-green-600 text-white p-2">Add New</a>
                </div>
            </div>
            <div class="flex justify-between m-2">
                <div>
                    <form method="get" action="{{ route('employee.filterEmployee') }}">
                        <div class="container flex justify-center items-center">
                            <div class="relative">
                                <div class="absolute top-4 left-3"> <i class="fa fa-search text-gray-400 z-20 hover:text-gray-500"></i> </div> <input type="text" class="h-14 w-96 pl-10 pr-20 rounded-lg z-0 focus:shadow focus:outline-none" name="name" placeholder="Search anything...">
                                <div class="absolute top-2 right-2"> <button class="h-10 w-20 text-white rounded-lg bg-gray-800 hover:bg-green-600">Search</button> </div>
                            </div>
                        </div>
                    </form>
                </div>
                <form method="get" action="{{ route('employee.filterEmployee') }}">
                    <select id="company" onchange="this.form.submit()" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('company') is-invalid @enderror" name="company_id" value="{{ old('company') }}" required autocomplete="company" >
                        <option selected disabled>Select Company</option>
                        @foreach($companies as $c)
                            <option value=" {{ $c->id }}">{{ $c->name }}</option>
                        @endforeach
                        <option value="">All</option>
                    </select>
                </form>
            </div>
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Id
                                </th>
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Name
                                </th>
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Surname
                                </th>
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Employee Number
                                </th>
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    E-main
                                </th>
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Phone Number
                                </th>
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Start Date
                                </th>
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Company
                                </th>
                                <th
                                    scope="col"
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"
                                >
                                    Registered Date
                                </th>
                                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    <span>Action</span>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($employees as $employee)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$employee->id}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$employee->name}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$employee->surname}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$employee->employeeNumber}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$employee->email}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$employee->telephoneNumber}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$employee->startDate}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$employee->company->name}}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">{{$employee->created_at}}</div>
                                    </td>
                                    <td class="px-6 py-4 text-center flex justify-center gap-2 whitespace-nowrap text-sm font-medium">
                                        <a href=" {{ route('employee.edit', ['employee'=>$employee]) }}" class="text-indigo-600 hover:text-indigo-900">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form method="post" action=" {{ route('employee.destroy', ['employee'=>$employee]) }} ">
                                            @method("DELETE")
                                            @csrf
                                            <button type="submit" class="text-red-600 hover:text-red-900">
                                                <i class="fas fa-trash-alt"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center p-2">
                            {!! $employees->links() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
