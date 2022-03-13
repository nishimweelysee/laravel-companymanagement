@extends('layouts.app')

@section('content')
    <div>
        <div class="flex justify-center underline m-2">
            <div class="p-4">
                <h3 class="text-center font-bold">Company registration</h3>
            </div>
        </div>
        <form method="post" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col gap-4 m-4" action="{{ route('company.update',['company'=> $company->id]) }}" enctype="multipart/form-data">
            @method("PUT")
            @csrf
            <div class="mb-3">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Name') }}</label>

                <div class="">
                    <input id="name" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') is-invalid @enderror" name="name" value="{{ $company->name }}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="address" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Address') }}</label>

                <div class="">
                    <input id="address" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('address') is-invalid @enderror" name="address" value="{{ $company->address  }}" required autocomplete="address" >

                    @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="telephonenumber" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Telephone Number') }}</label>

                <div class="">
                    <input id="telephonenumber" type="tel" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('telephonenumber') is-invalid @enderror" name="telephonenumber" value="{{ $company->telephonenumber }}" required autocomplete="telephonenumber" >

                    @error('telephonenumber')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="website" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Website') }}</label>

                <div class="">
                    <input id="website" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('website') is-invalid @enderror" name="website" value="{{ $company->website }}" required autocomplete="website" >

                    @error('website')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="director" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Director') }}</label>

                <div class="">
                    <input id="director" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('director') is-invalid @enderror" name="director" value="{{  $company->director }}" required autocomplete="director" >

                    @error('director')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="logo" class="block text-gray-700 text-sm font-bold mb-2">{{ __('Logo') }}</label>

                <div class="">
                    <input id="logo" type="file" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('logo') is-invalid @enderror" name="logo" value="{{ old('logo') }}" required >

                    @error('logo')
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
