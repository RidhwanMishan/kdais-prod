@extends('admin.app')

@section('title')Edit User @endsection

@section('adminContent')
    @if (session('error'))
        <div class="mt-8 bg-red-100 mx-24 border rounded-md border-red-500 text-red-700 px-4 py-3" role="alert">
            <p class="text-sm">{{ session('error') }}</p>
        </div>
    @endif
    <form class="px-16" method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
        @csrf
        <div >
            <div class="mt-1 pt-1">
                <h3 class="flex justify-center text-lg leading-6 font-medium text-gray-900">
                    Add User
                </h3>

                <div class="mt-6 grid grid-cols-1 row-gap-6 col-gap-4 sm:grid-cols-8">
                    <div class="sm:col-span-4">
                        <label for="first_name" class="block text-sm font-medium leading-5 text-gray-700">
                            Full Name <span class="text-xs font-small text-red-600">*</span>
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input id="name" type="text" name="name" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-500 @enderror" />
                        </div>
                        @error('name')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="sm:col-span-4">
                        <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                            Email address <span class="text-xs font-small text-red-600">*</span>
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input  id="email" type="email" name="email" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-500 @enderror" />
                        </div>
                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium leading-5 text-gray-700">
                            Power BI Email <span class="text-xs font-small text-red-600">*</span>
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input  id="power_bi_email" type="text" name="power_bi_email" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('power_bi_email') border-red-500 @enderror" />
                        </div>
                        @error('power_bi_email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                  
                    <div class="sm:col-span-4">
                        <label for="landingPage" class="block text-sm font-medium leading-5 text-gray-700">
                            Landing Page <span class="text-xs font-small text-red-600">* REQUIRED</span>
                        </label>

                        <div class="mt-1 rounded-md shadow-sm">
                            <select name="landing_page" id="landing_page" class="form-select flex justify-center w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                                <option value=""> </option>
                                <option value="admin.users.index" >admin.index</option>

                                <option value="sales.dealer" >sales.dealer</option>
                                <option value="sales.product_availibility" >sales.product_availibility</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-8 border-t border-gray-200 pt-8 ">
                <div>
                    <h3 class="flex justify-center text-lg leading-6 font-medium text-gray-900">
                        Authorization
                    </h3>
                    <p class="flex justify-center mt-1 text-sm leading-5 text-gray-500">
                        User access availability
                    </p>
                </div>

                <div class="mt-6">
                    <div class="flex justify-center">
                        <fieldset class="">
                            <legend class="text-base font-medium text-gray-900">
                                Admin
                            </legend>
                            <div class="mt-4">
                                <div class="relative flex items-start">
                                    <div class="absolute flex items-center h-5">
                                        <input  id="admin" name="roles[]" type="checkbox" value="{{ $roles->where('name', 'admin')->first()->id
 }}" class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out"  />
                                    </div>
                                    <div class="pl-6 text-sm leading-5">
                                        <label for="admin" class="font-medium text-gray-700">Admin Page</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
            
                        <fieldset class="ml-8 ">
                            <legend class="text-base font-medium text-gray-900">
                                Sales
                            </legend>
                            <div class="mt-4">
                                <div class="relative flex items-start">
                                    <div class="absolute flex items-center h-5">
                                        <input  id="salesDealer" name="roles[]" type="checkbox" value="{{ $roles->where('name', 'sales_dealer')->first()->id
 }}" class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out"  />
                                    </div>
                                    <div class="pl-6 text-sm leading-5">
                                        <label for="salesDealer" class="font-medium text-gray-700">Dealer Penetration</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="relative flex items-start">
                                    <div class="absolute flex items-center h-5">
                                        <input  id="salesProductAvailibility" name="roles[]"   type="checkbox" value="{{ $roles->where('name', 'sales_product_availibility')->first()->id
}}" class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out" />
                                    </div>
                                    <div class="pl-6 text-sm leading-5">
                                        <label for="salesProductAvailibility" class="font-medium text-gray-700">Product Availability</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="ml-8 ">
                            <legend class="text-base font-medium text-gray-900">
                                State Security
                            </legend>
                            <div class="mt-4">
                                <div class="relative flex items-start">
                                    <div class="absolute flex items-center h-5">
                                        <input  id="salesDealer" name="roles[]" type="checkbox" value="{{ $roles->where('name', 'sales_dealer')->first()->id
 }}" class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out"  />
                                    </div>
                                    <div class="pl-6 text-sm leading-5">
                                        <label for="salesDealer" class="font-medium text-gray-700">Dealer Penetration</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        
                    </div>
                </div>
            </div>
        </div>
        <div class="mt-8 mb-4 border-t border-gray-200 pt-5">
            <div class="flex justify-end">
                <span class="ml-3 inline-flex rounded-md shadow-sm">
            <a href="{{ route('admin.users.index') }}" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
              Back
            </a>
        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-red-600 ml-4 hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red active:bg-red-700 transition duration-150 ease-in-out">
          Add
        </button>
      </span>
            </div>
        </div>


    </form>



@endsection
