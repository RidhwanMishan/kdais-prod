@extends('admin.app')

@section('title')Show User  @endsection

@section('adminContent')
    <div class="px-16" >

        <div >
            <div class="mt-1 pt-1">
                <h3 class="flex justify-center text-lg leading-6 font-medium text-gray-900">
                    Showing User Info
                </h3>
   
                <div class="mt-8" >
                    <h3 class="flex justify-center text-lg leading-6 font-medium text-gray-900">
                        Information for {{ $user->name }}
                    </h3>
                </div>
                <div class="mt-6 grid grid-cols-1 row-gap-6 col-gap-4 sm:grid-cols-8">
                    <div class="sm:col-span-4">
                        <label for="first_name" class="block text-sm font-medium leading-5 text-gray-700">
                            Full Name
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input readonly  value="{{ $user->name }}" id="name" name="name" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-500 @enderror" />
                        </div>
                        @error('name')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="sm:col-span-4">
                        <label for="email" class="block text-sm font-medium leading-5 text-gray-700">
                            Email address
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input readonly  value="{{ $user->email }}" id="email" type="email" name="email" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-500 @enderror" />
                        </div>
                        @error('email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>

                    <div class="sm:col-span-4">
                        <label for="title" class="block text-sm font-medium leading-5 text-gray-700">
                            Power BI Email
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input readonly  id="power_bi_email" type="text" name="power_bi_email" value="{{ $user->power_bi_email }}" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('power_bi_email') border-red-500 @enderror" />
                        </div>
                        @error('power_bi_email')
                        <p class="text-red-500 text-xs italic mt-4">
                            {{ $message }}
                        </p>
                        @enderror
                    </div>
                    <div class="sm:col-span-4">
                        <label for="landingPage" class="block text-sm font-medium leading-5 text-gray-700">
                            Landing Page
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <select name="landing_page" id="landing_page" class="form-select flex justify-center w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
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
                                        <input onclick="return false;"  id="admin" name="roles[]" type="checkbox"  class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out" @if($user->roles->contains('name', 'admin')) checked @endif/>
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
                                        <input onclick="return false;"  id="peopleOverview" name="roles[]" type="checkbox"  class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out" @if($user->roles->contains('name', 'sales_dealer')) checked @endif/>
                                    </div>
                                    <div class="pl-6 text-sm leading-5">
                                        <label for="salesDealer" class="font-medium text-gray-700">Dealer Penetration</label>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="relative flex items-start">
                                        <div class="absolute flex items-center h-5">
                                            <input onclick="return false;"  id="peopleAttendance" name="roles[]" @if($user->roles->contains('name', 'sales_product_availibility')) checked @endif type="checkbox"  class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out" />
                                        </div>
                                        <div class="pl-6 text-sm leading-5">
                                            <label for="salesProductAvailibility" class="font-medium text-gray-700">Product Availability</label>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="mt-4">
                                    <div class="relative flex items-start">
                                        <div class="absolute flex items-center h-5">
                                            <input onclick="return false;"  id="peopleAbsenteeism" name="roles[]" @if($user->roles->contains('name', 'people_absenteeism')) checked @endif type="checkbox"  class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out" />
                                        </div>
                                        <div class="pl-6 text-sm leading-5">
                                            <label for="peopleAbsenteeism" class="font-medium text-gray-700">Absenteeism</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="relative flex items-start">
                                        <div class="absolute flex items-center h-5">
                                            <input onclick="return false;"  id="peopleLeaves" name="roles[]" @if($user->roles->contains('name', 'people_leaves')) checked @endif type="checkbox"  class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out" />
                                        </div>
                                        <div class="pl-6 text-sm leading-5">
                                            <label for="peopleLeaves" class="font-medium text-gray-700">Leaves</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="relative flex items-start">
                                        <div class="absolute flex items-center h-5">
                                            <input onclick="return false;"  id="peopleExpenses" name="roles[]" @if($user->roles->contains('name', 'people_expenses')) checked @endif type="checkbox"  class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out" />
                                        </div>
                                        <div class="pl-6 text-sm leading-5">
                                            <label for="peopleExpenses" class="font-medium text-gray-700">Expenses</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="relative flex items-start">
                                        <div class="absolute flex items-center h-5">
                                            <input onclick="return false;"  id="peopleBehavior" name="roles[]" @if($user->roles->contains('name', 'people_behavior')) checked @endif type="checkbox"  class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out" />
                                        </div>
                                        <div class="pl-6 text-sm leading-5">
                                            <label for="peopleBehavior" class="font-medium text-gray-700">Behavior</label>
                                        </div>
                                    </div>
                                </div> -->
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

      </span>
            </div>
        </div>


    </div>


