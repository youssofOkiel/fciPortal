@extends('layouts.InstructorLayout')

@section('content')

    <div class="card mx-2 ">
        <div class="card-header">
            <h4 class="font-weight-bolder text-orange-600 text-xl"> My Courses</h4>
        </div>

        <div class="card-body">
            <div class="grid grid-cols-3">

                @livewire('curs-search')

            </div>
            <div class="table-responsive">

                <table class="table table-striped table-dark rounded-lg mt-4 shadow-lg overflow-scroll overflow-x-scroll  ">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">title</th>
                        <th scope="col">code</th>
                        <th scope="col">credit</th>
                        <th scope="col">level</th>
                        <th scope="col">instructor</th>
                        <th scope="col">Lectures</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($courses as $course)
                        <tr>
                            <th scope="row" id="{{ $course['id'] }}">{{ $course['id'] }}</th>

                            <td>{{ $course['title'] }}</td>
                            <td>{{ $course['code'] }}</td>
                            <td>{{ $course['credit'] }}</td>
                            <td>{{ $course->level->title }}</td>

                            <td>
                                @if( $course['user_id'] != null )
                                    {{ $course->user->name }}
                                @else
                                    No Instructor yet
                                @endif

                            </td>
                            <td>
                                {{ count($course->lectures)  }}
                                <a href="{{route('instLecture' , $course['id'] )}}" class="btn btn-warning">
                                    go in {{$course['id']}}
                                </a>
                            </td>


                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
