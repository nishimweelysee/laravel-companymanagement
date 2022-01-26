@extends('layouts.app')

@section('content')
    <div>
        <form method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col gap-4 m-4" action="/employee/{{ $employee->id }}">
            @csrf
            <div class="mb-3">
                <label for="id" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Id') }}</label>

                <div class="">
                    <input id="id" type="text" readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('id') is-invalid @enderror" name="id" value="{{ $employee->id  }}" required autocomplete="id" autofocus>

                    @error('id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>


            <div class="mb-3">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Name') }}</label>

                <div class="">
                    <input id="name" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') is-invalid @enderror" name="name" value="{{ $employee->name }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="surname" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Surname') }}</label>

                <div class="">
                    <input id="surname" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('surname') is-invalid @enderror" name="surname" value="{{ $employee->surname }}" required autocomplete="surname" autofocus>

                    @error('surname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="employeeNumber" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Employee Number') }}</label>

                <div class="">
                    <input id="employeeNumber" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('employeeNumber') is-invalid @enderror" name="employeeNumber" value="{{ $employee->employeeNumber }}" required autocomplete="employeeNumber" >

                    @error('employeeNumber')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">{{ __('E-mail') }}</label>

                <div class="">
                    <input id="email" type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') is-invalid @enderror" name="email" value="{{ $employee->email }}" required autocomplete="email" >

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="telephoneNumber" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Telephone Number') }}</label>

                <div class="">
                    <input id="telephoneNumber" type="tel" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('telephoneNumber') is-invalid @enderror" name="telephoneNumber" value="{{ $employee->telephoneNumber }}" required autocomplete="telephoneNumber" >

                    @error('telephoneNumber')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>
            <div class="mb-3">
                <label for="startDate" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Start Date') }}</label>

                <div class="">
                    <input id="startDate" type="date" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('startDate') is-invalid @enderror" name="startDate" value="{{ $employee->startDate }}" required autocomplete="startDate" >

                    @error('startDate')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>



            <div class="mb-0">
                <div class="flex flex-col">
                    <div>
                        <button type="submit" class="bg-blue-500 hover:bg-green-500 text-white p-2">
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </@endsection
