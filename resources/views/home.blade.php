@extends('layouts.app')

@section('content')

    <h1 class="container-fluid font-weight-bolder text-3xl">User Profile</h1>

    <div class="row mx-3 " >
        <div class="side-bar col-md-2 border-3 border-gray-800 rounded-lg shadow-lg mx-2  pt-3" >
            <div class="btn-primary border-2 border-orange-700 rounded-lg text-center my-2">
                my courses
            </div>
            <div class="btn-primary border-2 border-orange-700 rounded-lg text-center my-2">
                my taskes and grades
            </div>
            <div class="btn-primary border-2 border-orange-700 rounded-lg text-center my-2">
                test
            </div>
            <div class="btn-primary border-2 border-orange-700 rounded-lg text-center my-2">
                test
            </div>
        </div>
        <div class="doctor-container col-md-9 border-3 border-gray-800 rounded-lg shadow-lg m-2">
            <h2 class="text-3xl tracking-wide text-orange-600" >Instructors</h2>
            <hr class="bg-orange-400 border-4 " >
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 ">

                <div class="rounded shadow-lg border-4 border-gray-600 my-2 transform duration-300 hover:-translate-y-4">
                    <img class="w-full" src="{{ asset('images\avatar.png') }}" alt="Sunset in the mountains">
                    <div class="px-6 py-4">

                        <div class="font-bold text-xl mb-2">name</div>
                        <p>type</p>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                    </div>
                </div>

            </div>
            <hr class="bg-orange-400 border-4 " >
            <h2 class="text-3xl tracking-wide text-orange-600" >Courses</h2>

            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 ">

                <div class="rounded shadow-lg border-4 border-gray-600 my-2">
                    <img class="w-full" src="{{ asset('images\avatar.png') }}" alt="Sunset in the mountains">
                    <div class="px-6 py-4">

                        <div class="font-bold text-xl mb-2">Title Course</div>
                        <p>Code</p>
                    </div>
                    <div class="px-6 pt-4 pb-2">
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
                        <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
