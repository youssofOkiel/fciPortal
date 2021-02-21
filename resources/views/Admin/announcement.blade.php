@extends('layouts.adminLayout')

@section('content')

    <div class="card mx-2 ">
        <div class="card-header">

            <h4 class="font-weight-bolder text-orange-600 text-xl">Announcement</h4>

        </div>

        <div class="card-body">
            <div class="grid grid-cols-1 md:grid-cols-5 sm:grid-cols-2 gap-2">

                <button type="button" class="btn btn-success mr-auto" data-toggle="modal" data-target="#AddModal">
                    Add Announcement
                </button>

                <!-- Modal -->
                <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Announcement</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{ route('addAnnouncement') }}" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="form-group">
                                        <label for="levels">For Level: </label>
                                        <select id="levels" name="level" class="form-control">
                                            <option value="" >Public</option>
                                            @foreach($levels as $level)
                                                <option value="{{$level['id']}}">{{ $level['title'] }} => {{ $level['term'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="title">title</label>
                                        <input type="text" class="form-control" id="title" name="title" >
                                    </div>
                                    <div class="form-group">
                                        <label for="body">body</label>
                                        <textarea cols="50" class="form-control" id="body" name="body" >
                                            Enter body here...</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="photo"> Upload photo</label>
                                        <input type="file" class="form-control" id="photo" name="photo" >
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

            </div>
            <div class="table-responsive">

                <table class="table table-striped rounded-lg mt-4 shadow-lg table-hover  ">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">title</th>
                        <th scope="col">body</th>
                        <th scope="col">Level</th>
                        <th scope="col">Photo</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($announcements as $announcement)
                        <tr>
                            <th scope="row">{{ $announcement['id'] }}</th>

                            <td>{{ $announcement['title'] }}</td>
                            <td>{{ $announcement['body'] }}</td>
                            <td>
                                <img src="{{ asset('images\\'.$announcement['photo']) }}" class="rounded-lg" >
                            </td>
                            @if( $announcement->level_id != null)
                                <td>
                                    {{ ($announcement->level->title)}} {{ ($announcement->level->term)  }}
                                </td>
                            @else
                                <td>
                                    Public
                                </td>
                            @endif


                            <td class="flex flex-row gap-2">

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#UpdateModal{{ $announcement['id'] }}">
                                    Update schedule
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="UpdateModal{{ $announcement['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title font-semibold text-blue-500" id="exampleModalLabel">
                                                    Update {{ $announcement['title'] }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{ route('UpdateAnnouncement', $announcement['id'] ) }}" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="levels">update Level: </label>
                                                        <select id="levels" name="level" class="form-control">
                                                            @if( $announcement->level_id == null )
                                                            <option value="" >Public</option>
                                                            @else
                                                                <option value="{{$announcement->level_id}}" > {{$announcement->level->title}} </option>
                                                            @endif

                                                            @foreach($levels as $level)
                                                            @if( $announcement->level_id ==  $level['id'])
                                                                @continue
                                                                    @else
                                                                <option value="{{$level['id']}}">{{ $level['title'] }} - {{ $level['term'] }}</option>
                                                                    @endif
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="title">title</label>
                                                        <input type="text" class="form-control" id="title" name="title" value="{{ $announcement['title'] }}" >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="body">body</label>
                                                        <textarea cols="50" class="form-control" id="body" name="body">
                                                            {{ $announcement['body'] }}
                                                        </textarea>
                                                    </div>
                                                    <div class="form-group">

                                                        <img src="{{ asset('images\\'.$announcement['photo']) }}" class="rounded-full w-50 h-50">
                                                        <label for="photo"> Update photo</label>
                                                        <input type="file" class="form-control" id="photo" name="photo" >

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

                                <button type="button" class="btn btn-danger"  data-toggle="modal"
                                        data-target="#DeleteModal{{ $announcement['id'] }}" > Delete </button>

                                <div class="modal fade" id="DeleteModal{{ $announcement['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-red-800 " id="exampleModalLabel">{{ $announcement['title'] }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-red-800">
                                                Delete  {{ $announcement->title }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <form method="post" action="{{ route('delAnnouncement',$announcement['id'] )  }}">
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
