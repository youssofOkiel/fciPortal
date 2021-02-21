@extends('layouts.adminLayout')

@section('content')

    <div class="card mx-2 ">
        <div class="card-header">
            <h4 class="font-weight-bolder text-orange-600 text-xl">{{ !empty($course->title) ? $course->title : "" }} Lectures</h4>
            <h4 class="font-weight-bolder text-orange-600 text-md ml-auto">{{$course->code}}</h4>
        </div>

        <div class="card-body">
            <div class="grid grid-cols-3">

            </div>

            <table class="table table-striped rounded-lg mt-4 shadow-lg overflow-scroll overflow-x-scroll  ">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">Videos</th>
                    <th scope="col">Materials</th>
                    <th scope="col">Sections</th>

                </tr>
                </thead>
                <tbody>
                @foreach($lectures as $lecture)
                    <tr>
                        <th scope="row">{{ $lecture['id'] }}</th>

                        <td>{{ $lecture['title'] }}</td>
                        <td>
                            <a href="{{ $lecture['VideosUrls'] }}" target="_blank"> Watch on youtube </a>
                        </td>
                        <td>
                            @foreach($lecture->materials  as $mat)
                                {{ $mat->title }}
                            @endforeach
                        </td>
                        <td>
                            @foreach($lecture->sections  as $mat)
                                {{ !empty( $mat->title ) ? $mat->title :  "NO sections " }}
                            @endforeach
                        </td>

{{--                        <td class="flex flex-row gap-2">--}}

{{--                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#UpdateModal{{ $lecture['id'] }}">--}}
{{--                                Update Course--}}
{{--                            </button>--}}

{{--                            <!-- Modal -->--}}
{{--                            <div class="modal fade" id="UpdateModal{{ $lecture['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--                                <div class="modal-dialog" role="document">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <h5 class="modal-title font-semibold text-blue-500" id="exampleModalLabel">Update {{ $lecture['title'] }}</h5>--}}
{{--                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                <span aria-hidden="true">&times;</span>--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-body">--}}
{{--                                            <form method="post" action="{{ route('UpdateCourse', $course['id'] ) }}" >--}}
{{--                                                @csrf--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label for="title">title</label>--}}
{{--                                                    <input type="text" class="form-control" id="title" name="title" placeholder="{{ $course['title'] }}" >--}}
{{--                                                </div>--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label for="code">Code</label>--}}
{{--                                                    <input type="text" class="form-control" id="code" name="code" placeholder="{{ $course['code'] }}">--}}
{{--                                                </div>--}}
{{--                                                <div class="form-group">--}}
{{--                                                    <label for="credit">Credit</label>--}}
{{--                                                    <input type="number" min="1" max="6" class="form-control" id="credit" name="credit" placeholder="{{ $course['credit'] }}" >--}}
{{--                                                </div>--}}

{{--                                                <div class="form-group">--}}
{{--                                                    <label for="level">levels</label>--}}
{{--                                                    <select class="form-control" name="level">--}}
{{--                                                        @foreach($levels as $level)--}}
{{--                                                            <option value="{{$level['id']}}"> {{$level['title']}} => {{$level['description']}}  </option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}

{{--                                                <div class="form-group">--}}
{{--                                                    <label for="instructor">Instructor</label>--}}
{{--                                                    <select class="form-control" name="instructor">--}}
{{--                                                        @foreach($instructors as $instructor)--}}
{{--                                                            <option value="{{$instructor['id']}}"> {{$instructor['name']}}</option>--}}
{{--                                                        @endforeach--}}
{{--                                                    </select>--}}
{{--                                                </div>--}}
{{--                                                <button type="submit" class="btn btn-primary">Update</button>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <button type="button" class="btn btn-danger"  data-toggle="modal"--}}
{{--                                    data-target="#DeleteModal{{ $lecture['id'] }}" > Delete </button>--}}

{{--                            <div class="modal fade" id="DeleteModal{{ $lecture['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">--}}

{{--                                <div class="modal-dialog" role="document">--}}
{{--                                    <div class="modal-content">--}}
{{--                                        <div class="modal-header">--}}
{{--                                            <h5 class="modal-title text-red-800 " id="exampleModalLabel">{{ $lecture['title'] }}</h5>--}}
{{--                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
{{--                                                <span aria-hidden="true">&times;</span>--}}
{{--                                            </button>--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-body text-red-800">--}}
{{--                                            Confirm Delete {{ $lecture['title'] }}--}}
{{--                                        </div>--}}
{{--                                        <div class="modal-footer">--}}
{{--                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>--}}
{{--                                            <form method="post" action="{{ route('delCourse',$course['id'] )  }}">--}}
{{--                                                @csrf--}}
{{--                                                <button type="submit" class="btn btn-danger" > Confirm </button>--}}
{{--                                            </form>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                        </td>--}}
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
