@extends('layouts.adminLayout')

@section('content')

    <div class="card mx-2 ">
        <div class="card-header">
            <h4 class="font-weight-bolder text-orange-600 text-xl">Majors</h4>
        </div>

        <div class="card-body">
            <div class="grid grid-cols-1 md:grid-cols-5 sm:grid-cols-2 gap-2 ">
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#AddModal">
                    Add Major
                </button>

                <!-- Modal -->
                <div class="modal fade" id="AddModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add New Major</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <form method="post" action="{{ route('addMajor') }}" >
                                    @csrf
                                    <div class="form-group">
                                        <label for="major">Major title</label>
                                        <input type="text" class="form-control" id="major" name="title"
                                               required minlength="2">
                                    </div>
                                    <div class="form-group">
                                        <label for="description">description</label>
                                        <input type="text" class="form-control" id="description" name="description" required minlength="8">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Confirm</button>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

            <div class="table-responsive ">

                <table class="table table-striped rounded-lg mt-4 shadow-lg">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($majors as $major)
                        <tr>
                            <th scope="row" id="{{ $major['id'] }}">{{ $major['id'] }}</th>

                            <td>{{ $major['title'] }}</td>
                            <td>{{ $major['description'] }}</td>


                            <td class="flex flex-row gap-2">

                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#UpdateModal{{ $major['id'] }}">
                                    Update Major
                                </button>

                                <!-- Modal -->
                                <div class="modal fade" id="UpdateModal{{ $major['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title font-semibold text-blue-500" id="exampleModalLabel">Update {{ $major['title'] }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="post" action="{{ route('UpdateMajor', $major['id'] ) }}" >
                                                    @csrf
                                                    <div class="form-group font-semibold text-blue-500 " >
                                                        <label for="title">Major title</label>
                                                        <input type="text" class="form-control" id="title" value="{{ $major['title'] }}" name="title"
                                                               required minlength="2">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="description" class="font-semibold text-blue-500">Major Description</label>
                                                        <input type="text" class="form-control" id="description" value="{{ $major['description'] }}"
                                                               name="description" required minlength="4">
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
                                        data-target="#DeleteModal{{ $major['id'] }}" > Delete </button>

                                <div class="modal fade" id="DeleteModal{{ $major['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-red-800 " id="exampleModalLabel">{{ $major['title'] }}</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-red-800">
                                                Confirm Delete {{ $major['title'] }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <form method="post" action="{{ route('delMajor',$major['id'] )  }}">
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
