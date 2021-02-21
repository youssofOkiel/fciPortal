@extends('layouts.adminLayout')

@section('content')

    <div class="card mx-2 ">
        <div class="card-header">
            <h4 class="font-weight-bolder text-orange-600 text-xl">Schedule</h4>

        </div>

        <div class="card-body">
            <div class="grid grid-cols-1 md:grid-cols-5 sm:grid-cols-2 gap-2">

                <button type="button" class="btn btn-success mr-auto" data-toggle="modal" data-target="#AddModal">
                    Add Schedule
                </button>

                <!-- Modal -->
                <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Schedule</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="{{ route('addSchedule') }}" enctype="multipart/form-data" >
                                    @csrf
                                    <div class="form-group">
                                        <label for="levels">For Level: </label>
                                        <select id="levels" name="level" class="form-control">
                                            @foreach($levels as $level)
                                            <option value="{{$level['id']}}">{{ $level['title'] }} => {{ $level['term'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="schedule"> Upload Schedule</label>
                                        <input type="file" class="form-control" id="schedule" name="schedule"
                                        required >
                                    </div>
                                    <div class="form-group">
                                        <label for="description">description</label>
                                        <input type="text" class="form-control" id="description" name="description">
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
                        <th scope="col">Schedule</th>
                        <th scope="col">Level</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($schedules as $schedule)
                        <tr>
                            <th scope="row">{{ $schedule['id'] }}</th>

                            <td>
                                <figure class="figure">
                                    <img src="{{ asset('images\\'.$schedule['photo'] ) }}" class="figure-img img-fluid rounded" alt="...">
                                    <figcaption class="figure-caption">{{ $schedule['description'] }}</figcaption>
                                </figure>

                            </td>
                            <td colspan="2">
                                {{ ($schedule->level->title)}} - {{ ($schedule->level->term)  }}
                            </td>

                            <td class="flex flex-row gap-2">

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#UpdateModal{{ $schedule['id'] }}">
                                    Update schedule
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="UpdateModal{{ $schedule['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title font-semibold text-blue-500" id="exampleModalLabel">
                                                    Update schedule of {{ $schedule->level->title }} - {{ $schedule->level->term }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{ route('UpdateSchedule', $schedule['id'] ) }}" enctype="multipart/form-data" >
                                                    @csrf
                                                    <div class="form-group">
                                                        <label for="levels">Update Level: </label>
                                                        <select id="levels" name="level" class="form-control">

                                                            <option value="{{ $schedule->level->id }}">{{ $schedule->level->title }}
                                                                - {{ $schedule->level->term }}</option>

                                                        @foreach($levels as $level)
                                                            @if( $schedule->level->id == $level['id'] )
                                                                @continue
                                                                @else
                                                                <option value="{{$level['id']}}">{{ $level['title'] }} => {{ $level['term'] }}</option>
                                                                @endif
                                                                    @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="schedule"> Update Schedule</label>
                                                        <input type="file" class="form-control" id="schedule" name="schedule" >
                                                        <img src="{{ asset('images\\'.$schedule['photo']) }}" class="rounded-full w-50 h-50">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="description">Update description</label>
                                                        <input type="text" class="form-control" id="description" name="description">
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
                                        data-target="#DeleteModal{{ $schedule['id'] }}" > Delete </button>

                                <div class="modal fade" id="DeleteModal{{ $schedule['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-red-800 " id="exampleModalLabel">{{ $level['title'] }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-red-800">
                                                Delete Schedule of  {{ $schedule->level->title }} - {{ $schedule->level->term }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <form method="post" action="{{ route('delSchedule',$schedule['id'] )  }}">
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
