@extends('layouts.adminLayout')

@section('content')

    <div class="card mx-2 ">
        <div class="card-header">
            <h4 class="font-weight-bolder text-orange-600 text-xl">Courses</h4>

        </div>

        <div class="card-body">
            <div class="grid grid-cols-1 md:grid-cols-3 sm:grid-cols-2 gap-2">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success mr-auto" data-toggle="modal" data-target="#AddModal">
                    Add Course
                </button>

                <!-- Modal -->
                <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New course</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{ route('addCourse') }}" >
                                    @csrf
                                    <div class="form-group">
                                        <label for="title">title</label>
                                        <input type="text" class="form-control" id="title" name="title"
                                               required >
                                    </div>
                                    <div class="form-group">
                                        <label for="code">Code</label>
                                        <input type="text" class="form-control" id="code" name="code"
                                        required>
                                    </div>
                                    <div class="form-group">
                                        <label for="credit">Credit</label>
                                        <input type="number" min="1" max="6" class="form-control" id="credit" name="credit"
                                        required>
                                    </div>

                                    <div class="form-group">
                                        <label for="level">levels</label>
                                        <select class="form-control" name="level" required>
                                            @foreach($levels as $level)
                                            <option value="{{$level['id']}}"> {{$level['title']}} => {{$level['term']}}  </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="major">majors</label>
                                        <select class="form-control" name="major" required>
                                            @foreach($majors as $major)
                                                <option value="{{$major['id']}}"> {{$major['title']}} </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="instructor">Instructor</label>
                                        <select class="form-control" name="instructor">
                                            <option value="" >No Instructor yet .. </option>
                                            @foreach($instructors as $instructor)
                                                <option value="{{$instructor['id']}}"> {{$instructor['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>

                @livewire('curs-search')

                <form method="post" action="{{ route('CourseFiltering') }}" class="inline-flex ml-auto">
                    @csrf
                    <label for="filter" class="mx-3" > filter </label>
                    <select class="form-control" name="filter" id="filter" onchange="this.form.submit();">
                        <option value="" ></option>
                        @foreach($majors as $major)
                            <option value="{{$major['id']}}"> {{$major['title']}}  </option>
                        @endforeach
                    </select>
                    <a href="{{ url('/admin/allCourses') }}">
                        <button type="button" class=" btn btn-success mx-2 ">All</button>
                    </a>
                </form>

            </div>
            <div class="table-responsive">

                <table class="table table-striped rounded-lg mt-4 shadow-lg overflow-scroll overflow-x-scroll  ">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">title</th>
                        <th scope="col">Major</th>
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
                            <td>{{ $course->major->title }}</td>

                            <td>{{ $course['code'] }}</td>
                            <td>{{ $course['credit'] }}</td>
                            <td>{{ $course->level->title }} - {{ $course->level->term }}</td>

                            <td>
                                @if( $course['user_id'] != null )
                                {{ $course->user->name }}
                                @else
                                No Instructor yet
                                @endif

                            </td>
                            <td>
                                {{ count($course->lectures) }}
                                <a href="{{route('allLecture' , $course['id'] )}}" class="btn btn-warning">
                                    go in
                                </a>
                            </td>

                            <td class="flex flex-row gap-2">

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#UpdateModal{{ $course['id'] }}">
                                    Update Course
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="UpdateModal{{ $course['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title font-semibold text-blue-500" id="exampleModalLabel">Update {{ $course['title'] }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{ route('UpdateCourse', $course['id'] ) }}" >
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="title">title</label>
                                                        <input type="text" class="form-control" id="title" name="title" value="{{ $course['title'] }}" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="code">Code</label>
                                                        <input type="text" class="form-control" id="code" name="code" value="{{ $course['code'] }}">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="credit">Credit</label>
                                                        <input type="number" min="1" max="6" class="form-control" id="credit" name="credit" value="{{ $course['credit'] }}" >
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="level">levels</label>
                                                        <select class="form-control" name="level">
                                                            @foreach($levels as $level)
                                                                <option value="{{$level['id']}}"> {{$level['title']}} => {{$level['term']}}  </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="major">majors</label>
                                                        <select class="form-control" name="major" required>
                                                            @foreach($majors as $major)
                                                                <option value="{{$major['id']}}"> {{$major['title']}} </option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="instructor">Instructor</label>
                                                        <select class="form-control" name="instructor">

                                                            @if( !empty($course->user))
                                                                <option value="{{$course->user->id}}" > {{$course->user->name}}</option>
                                                            @else
                                                                <option value="" >No Instructor yet .. </option>
                                                            @endif

                                                            @foreach($instructors as $instructor)

                                                                @if( !empty($course->user) and  $course->user->id == $instructor->id )
                                                                    @continue
                                                                @endif
                                                                    <option value="{{$instructor['id']}}"> {{$instructor['name']}}</option>

                                                                @endforeach

                                                        </select>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <button type="button" class="btn btn-danger"  data-toggle="modal"
                                        data-target="#DeleteModal{{ $course['id'] }}" > Delete </button>

                                <div class="modal fade" id="DeleteModal{{ $course['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-red-800 " id="exampleModalLabel">{{ $course['title'] }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-red-800">
                                                Confirm Delete {{ $course['title'] }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <form method="post" action="{{ route('delCourse',$course['id'] )  }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger" > Confirm </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
