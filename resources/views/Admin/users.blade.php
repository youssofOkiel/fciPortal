@extends('layouts.adminLayout')

@section('content')

    <div class="card mx-2 ">
        <div class="card-header flex inline-flex">
            <h4 class="font-weight-bolder text-orange-600 text-xl">Users</h4>

            <a class="btn btn-danger ml-auto" href="{{ route('createEmployee') }}">
                Add Employee
            </a>
        </div>

        <div class="card-body">
            <div class="grid grid-cols-1 md:grid-cols-5 sm:grid-cols-2 gap-2 ">
                <a class="btn btn-primary mr-auto" href="{{ route('register') }}">
                    Add Student
                </a>

                <form method="post" action="{{ route('createUsers') }}" enctype="multipart/form-data"
                class=" flex inline-flex">
                    @csrf
                    <div class="input-group ">
                        <div class="custom-file ">
                            <input type="file" class="custom-file-input" id="inputGroupFile01"
                                   aria-describedby="inputGroupFileAddon01" name="csvFile" required >
                            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                        </div>

                        <button type="submit" class="btn btn-success mx-1"> Generate </button>
                    </div>

                </form>

                <div>
                    <a href="{{ route('fileExport') }}"  >
                        <button type="button" class="btn btn-warning">Generate Report</button>
                    </a>
                </div>

                @livewire('counter')

                <form method="post" action="{{ route('filtering') }}" class="inline-flex">
                    @csrf
                    <div class="input-group flex-nowrap ml-2 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="addon-wrapping">Filter</span>
                        </div>


                        <select class="form-control" name="filter" id="filter" aria-label="Username" aria-describedby="addon-wrapping" onchange="this.form.submit();">
                            <option value="0"></option>
                            <option value="1" >Admins</option>
                            <option value="2" >instructors</option>
                            <option value="3" >Students</option>
                            <option value="4" >Employee</option>
                        </select>
                    </div>


                    <a href="{{ url('/admin/allUsers') }}">
                        <button type="button" class=" btn btn-success mx-2 ">All</button>
                    </a>
                </form>

            </div>
<div class="table-responsive ">

            <table class="table table-striped rounded-lg mt-4 shadow-lg">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Name</th>
                    <th scope="col">SSD</th>
                    <th scope="col">GPA</th>
                    <th scope="col">CREDIT</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role</th>
                    <th scope="col">Phone</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <th scope="row" id="{{ $user['id'] }}">{{ $user['id'] }}</th>
                        <td>

                            <img src="{{ asset('images\\'.$user['photo']) }}" class="rounded-lg" >
                        </td>
                        <td>{{ $user['name'] }}</td>
                        <td>{{ $user['ssd'] }}</td>
                        <td>{{ $user['gpa'] }}</td>
                        <td>{{ $user['credit'] }}</td>
                        <td>{{ $user['email'] }}</td>
                        <td>{{ $user->role->title }}</td>
                        <td>{{ ($user['phone'] == null) ? 'No phone ' : $user['phone']  }}</td>

                        <td class="flex flex-row gap-2">
                            @if($user->role_id == 1)
                                <p>Disabled</p>
                            @else
                                <form method="post" action="{{ route('UpdateRole',$user['id'] )  }}">
                                    @csrf
                                    <select class="form-control" name="role" onchange="this.form.submit();">
                                        <option value="1" {{ ( $user['role_id'] == 1) ? 'selected' : null }} >Admin</option>
                                        <option value="2" {{ ( $user['role_id'] == 2) ? 'selected' : null }} >instructor</option>
                                        <option value="3" {{ ( $user['role_id'] == 3) ? 'selected' : null }} >Student</option>
                                        <option value="4" {{ ( $user['role_id'] == 4) ? 'selected' : null }} >Employee</option>
                                    </select>
                                </form>

                                <button type="button" class="btn btn-danger"  data-toggle="modal"
                                        data-target="#DeleteModal{{ $user['id'] }}" > Delete </button>

                                <div class="modal fade" id="DeleteModal{{ $user['id'] }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-red-800 " id="exampleModalLabel">Modal title</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body text-red-800">
                                                Confirm Delete  Mr\ {{ $user['name'] }}
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <form method="post" action="{{ route('delUser',$user['id'] )  }}">
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger" > Confirm </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endif

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
</div>

        </div>
    </div>

@endsection
