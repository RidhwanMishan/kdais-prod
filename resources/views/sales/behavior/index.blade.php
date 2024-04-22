@extends('people.index')

@section('peopleContent')

    <div class="mx-auto px-2 sm:px-1 lg:px-4">
        <div class="flex  px-2 py-2 sm:px-1">
            <a href="/people/behavior/overall" class="text-center w-1/12 mt-1 ml-2 xxl:ml-4 text-gray-700 bg-white xl:px-2 xxl:px-4 xxxl:px-8 xxll:px-12 py-3 xxl:py-4 rounded-md xxxl:rounded-lg text-md xxxl:text-lg xxll:text-2xl font-semibold hover:bg-yellow-200 xl:border-2 xxxl:border-4 border-gray-300 @isset($overall) bg-yellow-400  @endisset" >Overall</a>
            <a href="/people/behavior/individual" class="flex items-center text-center  w-1/12 mt-1 ml-2 xxl:ml-4 text-gray-700 bg-white xl:px-2 xxl:px-4 xxxl:px-8 xxll:px-12 py-3 xxl:py-4 rounded-md xxxl:rounded-lg text-md xxxl:text-lg xxll:text-2xl font-semibold hover:bg-yellow-200 xl:border-2 xxxl:border-4 border-gray-300 @isset($individual) bg-yellow-400  @endisset" ><span class="flex-1">Individual</span></a>
        </div>
    </div>

    @yield('peopleBehavior')

@endsection
