@extends('admin.app')

@section('title')Edit User @endsection

@section('adminContent')
    <form class="px-16" method="post" action="{{ route('admin.users.update', $user) }}" enctype="multipart/form-data">
        @csrf
        {{ method_field('PUT') }}
        <div >
            <div class="mt-1 pt-1">
                <h3 class="flex justify-center text-lg leading-6 font-medium text-gray-900">
                    Edit User Info
                </h3>
            
                <div class="mt-8" >
                    <h3 class="flex justify-center text-lg leading-6 font-medium text-gray-900">
                        Information for {{ $user->name }}
                    </h3>
                </div>
                <div class="mt-6 grid grid-cols-1 row-gap-6 col-gap-4 sm:grid-cols-8">
                    <div class="sm:col-span-4">
                        <label for="first_name" class="block text-sm font-medium leading-5 text-gray-700">
                            Full Name <span class="text-xs font-small text-red-600">*</span>
                        </label>
                        <div class="mt-1 rounded-md shadow-sm">
                            <input  value="{{ $user->name }}" id="name" name="name" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('name') border-red-500 @enderror" />
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
                            <input  value="{{ $user->email }}" id="email" type="email" name="email" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('email') border-red-500 @enderror" />
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
                            <input  id="power_bi_email" type="text" name="power_bi_email" value="{{ $user->power_bi_email }}" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5 @error('power_bi_email') border-red-500 @enderror" />
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
                                <option @if ($user->landing_page  == "admin.users.index") selected @endif value="admin.users.index" >admin.index</option>

                                <option @if ($user->landing_page  == "sales.dealer") selected @endif value="sales.dealer" >sales.dealer</option>
                                <option @if ($user->landing_page  == "sales.product_availibility") selected @endif value="sales.product_availibility" >sales.product_availibility</option>
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
 }}" class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out" @if($user->roles->contains('name', 'admin')) checked @endif/>
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
 }}" class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out" @if($user->roles->contains('name', 'sales_dealer')) checked @endif/>
                                    </div>
                                    <div class="pl-6 text-sm leading-5">
                                        <label for="salesDealer" class="font-medium text-gray-700">Dealer Penetration</label>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="relative flex items-start">
                                        <div class="absolute flex items-center h-5">
                                            <input  id="salesProductAvailibility" name="roles[]" @if($user->roles->contains('name', 'sales_product_availibility')) checked @endif type="checkbox" value="{{ $roles->where('name', 'sales_product_availibility')->first()->id
 }}" class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out" />
                                        </div>
                                        <div class="pl-6 text-sm leading-5">
                                            <label for="salesProductAvailibility" class="font-medium text-gray-700">Product Availability</label>
                                        </div>
                                    </div>
                                </div>
                            
                            
                            </div>
                        </fieldset>

                        <fieldset class="ml-8 ">
                            <legend class="text-base font-medium text-gray-900">
                                Security
                            </legend>
                            <div class="mt-4">
                                <div class="relative flex items-start">
                                    <div class="absolute flex items-center h-5">
                                        <input  id="johorSecurity" name="roles[]" type="checkbox" value="{{ $roles->where('name', 'Johor Security')->first()->id
 }}" class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out" @if($user->roles->contains('name', 'Johor Security')) checked @endif/>
                                    </div>
                                    <div class="pl-6 text-sm leading-5">
                                        <label for="johorSecurity" class="font-medium text-gray-700">Johor Security</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="relative flex items-start">
                                    <div class="absolute flex items-center h-5">
                                        <input  id="kedahSecurity" name="roles[]" type="checkbox" value="{{ $roles->where('name', 'Kedah Security')->first()->id
 }}" class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out" @if($user->roles->contains('name', 'Kedah Security')) checked @endif/>
                                    </div>
                                    <div class="pl-6 text-sm leading-5">
                                        <label for="kedahSecurity" class="font-medium text-gray-700">Kedah Security</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="relative flex items-start">
                                    <div class="absolute flex items-center h-5">
                                        <input  id="kelantanSecurity" name="roles[]" type="checkbox" value="{{ $roles->where('name', 'Kelantan Security')->first()->id
 }}" class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out" @if($user->roles->contains('name', 'Kelantan Security')) checked @endif/>
                                    </div>
                                    <div class="pl-6 text-sm leading-5">
                                        <label for="kelantanSecurity" class="font-medium text-gray-700">Kelantan Security</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="relative flex items-start">
                                    <div class="absolute flex items-center h-5">
                                        <input  id="kualalumpurSecurity" name="roles[]" type="checkbox" value="{{ $roles->where('name', 'WP Kuala Lumpur Security')->first()->id
 }}" class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out" @if($user->roles->contains('name', 'WP Kuala Lumpur Security')) checked @endif/>
                                    </div>
                                    <div class="pl-6 text-sm leading-5">
                                        <label for="kualalumpurSecurity" class="font-medium text-gray-700">Kuala Lumpur Security</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="relative flex items-start">
                                    <div class="absolute flex items-center h-5">
                                        <input  id="labuanSecurity" name="roles[]" type="checkbox" value="{{ $roles->where('name', 'WP Labuan Security')->first()->id
 }}" class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out" @if($user->roles->contains('name', 'WP Labuan Security')) checked @endif/>
                                    </div>
                                    <div class="pl-6 text-sm leading-5">
                                        <label for="labuanSecurity" class="font-medium text-gray-700">Labuan Security</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="relative flex items-start">
                                    <div class="absolute flex items-center h-5">
                                        <input  id="MelakaSecurity" name="roles[]" type="checkbox" value="{{ $roles->where('name', 'Melaka Security')->first()->id
 }}" class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out" @if($user->roles->contains('name', 'Melaka Security')) checked @endif/>
                                    </div>
                                    <div class="pl-6 text-sm leading-5">
                                        <label for="MelakaSecurity" class="font-medium text-gray-700">Melaka Security</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="relative flex items-start">
                                    <div class="absolute flex items-center h-5">
                                        <input  id="N.SembilanSecurity" name="roles[]" type="checkbox" value="{{ $roles->where('name', 'Negeri Sembilan Security')->first()->id
 }}" class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out" @if($user->roles->contains('name', 'Negeri Sembilan Security')) checked @endif/>
                                    </div>
                                    <div class="pl-6 text-sm leading-5">
                                        <label for="N.SembilanSecurity" class="font-medium text-gray-700">N.Sembilan Security</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="relative flex items-start">
                                    <div class="absolute flex items-center h-5">
                                        <input  id="PahangSecurity" name="roles[]" type="checkbox" value="{{ $roles->where('name', 'Pahang Security')->first()->id
 }}" class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out" @if($user->roles->contains('name', 'Pahang Security')) checked @endif/>
                                    </div>
                                    <div class="pl-6 text-sm leading-5">
                                        <label for="PahangSecurity" class="font-medium text-gray-700">Pahang Security</label>
                                    </div>
                                </div>
                            </div>
                        </fieldset>

                        <fieldset class="ml-8 ">
                            <legend class="text-base font-medium text-gray-900">
                                &nbsp;
                            </legend>
                            <div class="mt-4">
                                <div class="relative flex items-start">
                                    <div class="absolute flex items-center h-5">
                                        <input  id="PerakSecurity" name="roles[]" type="checkbox" value="{{ $roles->where('name', 'Perak Security')->first()->id
 }}" class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out" @if($user->roles->contains('name', 'Perak Security')) checked @endif/>
                                    </div>
                                    <div class="pl-6 text-sm leading-5">
                                        <label for="PerakSecurity" class="font-medium text-gray-700">Perak Security</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="relative flex items-start">
                                    <div class="absolute flex items-center h-5">
                                        <input  id="PerlisSecurity" name="roles[]" type="checkbox" value="{{ $roles->where('name', 'Perlis Security')->first()->id
 }}" class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out" @if($user->roles->contains('name', 'Perlis Security')) checked @endif/>
                                    </div>
                                    <div class="pl-6 text-sm leading-5">
                                        <label for="PerlisSecurity" class="font-medium text-gray-700">Perlis Security</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="relative flex items-start">
                                    <div class="absolute flex items-center h-5">
                                        <input  id="PulauPinangSecurity" name="roles[]" type="checkbox" value="{{ $roles->where('name', 'Pulau Pinang Security')->first()->id
 }}" class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out" @if($user->roles->contains('name', 'Pulau Pinang Security')) checked @endif/>
                                    </div>
                                    <div class="pl-6 text-sm leading-5">
                                        <label for="PulauPinangSecurity" class="font-medium text-gray-700">Pulau Pinang Security</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="relative flex items-start">
                                    <div class="absolute flex items-center h-5">
                                        <input  id="PutrajayaSecurity" name="roles[]" type="checkbox" value="{{ $roles->where('name', 'WP Putrajaya Security')->first()->id
 }}" class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out" @if($user->roles->contains('name', 'wP Putrajaya Security')) checked @endif/>
                                    </div>
                                    <div class="pl-6 text-sm leading-5">
                                        <label for="PutrajayaSecurity" class="font-medium text-gray-700">Putrajaya Security</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="relative flex items-start">
                                    <div class="absolute flex items-center h-5">
                                        <input  id="SabahSecurity" name="roles[]" type="checkbox" value="{{ $roles->where('name', 'Sabah Security')->first()->id
 }}" class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out" @if($user->roles->contains('name', 'Sabah Security')) checked @endif/>
                                    </div>
                                    <div class="pl-6 text-sm leading-5">
                                        <label for="SabahSecurity" class="font-medium text-gray-700">Sabah Security</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="relative flex items-start">
                                    <div class="absolute flex items-center h-5">
                                        <input  id="SarawakSecurity" name="roles[]" type="checkbox" value="{{ $roles->where('name', 'Sarawak Security')->first()->id
 }}" class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out" @if($user->roles->contains('name', 'Sarawak Security')) checked @endif/>
                                    </div>
                                    <div class="pl-6 text-sm leading-5">
                                        <label for="SarawakSecurity" class="font-medium text-gray-700">Sarawak Security</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="relative flex items-start">
                                    <div class="absolute flex items-center h-5">
                                        <input  id="SelangorSecurity" name="roles[]" type="checkbox" value="{{ $roles->where('name', 'Selangor Security')->first()->id
 }}" class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out" @if($user->roles->contains('name', 'Selangor Security')) checked @endif/>
                                    </div>
                                    <div class="pl-6 text-sm leading-5">
                                        <label for="SelangorSecurity" class="font-medium text-gray-700">Selangor Security</label>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <div class="relative flex items-start">
                                    <div class="absolute flex items-center h-5">
                                        <input  id="TerengganuSecurity" name="roles[]" type="checkbox" value="{{ $roles->where('name', 'Terengganu Security')->first()->id
 }}" class="form-checkbox h-4 w-4 text-yellow-400 transition duration-150 ease-in-out" @if($user->roles->contains('name', 'Terengganu Security')) checked @endif/>
                                    </div>
                                    <div class="pl-6 text-sm leading-5">
                                        <label for="TerengganuSecurity" class="font-medium text-gray-700">Terengganu Security</label>
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
          Save
        </button>
      </span>
            </div>
        </div>


    </form>


@endsection
