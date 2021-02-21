<div class="grid grid-cols-3">
    <h4 class="font-weight-bolder text-orange-600 text-xl">Users</h4>

    <input class="form-control mr-sm-2" type="search" placeholder="Search" >
</div>

<table class="table table-striped table-dark rounded-lg mt-4 shadow-lg overflow-scroll overflow-x-scroll  ">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Photo</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Role</th>
        <th scope="col">Phone</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
            <th scope="row">{{ $user['id'] }}</th>
            <td>
                <img src="{{ asset('images\\'.$user['photo']) }}" class="rounded-lg" >
            </td>
            <td>{{ $user['name'] }}</td>
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

