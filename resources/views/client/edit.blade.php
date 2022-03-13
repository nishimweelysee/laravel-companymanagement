@extends('layouts.app')

@section('content')
    <div class="w-full">
        <div class="flex justify-center underline m-2">
            <div class="p-4">
                <h3 class="text-center font-bold">Client information</h3>
            </div>
        </div>
        <div class="container grid grid-cols-2 gap-2 mx-auto border-2">
            <div class="w-full rounded ">
                <img src="https://www.pngitem.com/pimgs/m/75-753817_transparent-customer-icon-png-remarketing-icons-png-download.png">
            </div>
            <div class="w-full rounded bg-white shadow-md rounded">
                <form method="post" class=" px-8 pt-6 pb-8 flex flex-col gap-4" action="/client/{{ $client->id }}">
                    @method("PUT")
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Name') }}</label>
                        <div class="">
                            <input id="name" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') is-invalid @enderror" name="name" value="{{ $client->name }}" required autocomplete="name" autofocus>
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
                            <input id="surname" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('surname') is-invalid @enderror" name="surname" value="{{ $client->surname }}" required autocomplete="surname" autofocus>

                            @error('surname')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="address" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Address') }}</label>
                        <div class="">
                            <input id="address" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('address') is-invalid @enderror" name="address" value="{{ $client->address }}" required autocomplete="address" >

                            @error('address')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="telephoneNumber" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Telephone Number') }}</label>
                        <div class="">
                            <input id="telephoneNumber" type="tel" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('telephoneNumber') is-invalid @enderror" name="telephoneNumber" value="{{ $client->telephoneNumber }}" required autocomplete="telephoneNumber" >
                            @error('telephoneNumber')
                            <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="company" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Company') }}</label>
                        <div class="">
                            <select id="company" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('company') is-invalid @enderror" name="company_id" value="{{ $client->company->id }}" required>
                                @foreach($companies as $c)
                                    <option {{ ($c->id === $client->company->id)?"selected":"" }} value="{{ $c->id }}">{{ $c->name }}</option>
                                @endforeach
                            </select>

                            @error('company')
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
        </div>
    </div>
    </@endsection
