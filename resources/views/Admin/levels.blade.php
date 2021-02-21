@extends('layouts.adminLayout')

@section('content')

    <div class="card mx-2 ">
        <div class="card-header">
            <h4 class="font-weight-bolder text-orange-600 text-xl">Levels</h4>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br />
        @endif
        <div class="card-body">
            <div class="grid grid-cols-1 md:grid-cols-5 sm:grid-cols-2 gap-2 ">

                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddModal">
                   Add level
                </button>

                <!-- Modal -->
                <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Level</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form method="post" action="{{ route('addLevel') }}" >
                                    @csrf
                                        <div class="form-group">
                                            <label for="title">Level title</label>
                                            <input type="text" class="form-control" id="title" name="title" required minlength="7">
                                        </div>
                                        <div class="form-group">
                                            <label for="term">term</label>
                                            <input type="text" class="form-control" id="term" name="term" required minlength="4">
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


            <table class="table table-striped rounded-lg mt-4 shadow-lg overflow-scroll overflow-x-scroll  ">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">term</th>
                    <th scope="col"># courses</th>
                </tr>
                </thead>
                <tbody>
                @foreach($levels as $level)
                    <tr>
                        <th scope="row">{{ $level['id'] }}</th>

                        <td>{{ $level['title'] }}</td>
                        <td>{{ $level['term'] }}</td>
                        <td>{{ count($level->courses)  }} Course</td>

                        <td class="flex flex-row gap-2">

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#UpdateModal{{ $level['id'] }}">
                                Update level
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="UpdateModal{{ $level['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title font-semibold text-blue-500" id="exampleModalLabel">Update {{ $level['title'] }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post" action="{{ route('UpdateLevel', $level['id'] ) }}" >
                                                @csrf
                                                <div class="form-group font-semibold text-blue-500 " >
                                                    <label for="title">Level title</label>
                                                    <input type="text" class="form-control" id="title" value="{{ $level['title'] }}" name="title"
                                                           required minlength="7">
                                                </div>
                                                <div class="form-group">
                                                    <label for="term" class="font-semibold text-blue-500">term</label>
                                                    <input type="text" class="form-control" id="term" value="{{ $level['term'] }}" name="term"
                                                           required minlength="4">
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
                                        data-target="#DeleteModal{{ $level['id'] }}" > Delete </button>

                                <div class="modal fade" id="DeleteModal{{ $level['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-red-800 " id="exampleModalLabel">{{ $level['title'] }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-red-800">
                                                Confirm Delete {{ $level['title'] }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <form method="post" action="{{ route('delLevel',$level['id'] )  }}">
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

@endsection
