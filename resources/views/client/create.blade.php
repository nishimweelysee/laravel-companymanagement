@extends('layouts.app')

@section('content')
    <div>
        <form method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col gap-4 m-4" action="/client/{{ $company->id }}">
            @csrf

            <div class="mb-3">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Name') }}</label>

                <div class="">
                    <input id="name" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                    <input id="surname" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('surname') is-invalid @enderror" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>

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
                    <input id="address" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" >

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
                    <input id="telephoneNumber" type="tel" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('telephoneNumber') is-invalid @enderror" name="telephoneNumber" value="{{ old('telephoneNumber') }}" required autocomplete="telephoneNumber" >

                    @error('telephoneNumber')
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
                            {{ __('Save') }}
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
    </@endsection
