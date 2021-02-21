<div  x-data="{ open: false }">
    <input class="form-control mr-sm-2" type="search" wire:model.debounce.500ms="name"
           placeholder="Search .. name  or emails"
           @focus="open = true"
           @click.away="open = false"
           @keydown.escape.window = "open = false"
           >

    @if(strlen($name) > 2)
    <div class="table-responsive absolute w-auto mt-1 " x-show="open">

        <table class="table table-striped table-dark rounded-lg mt-4 shadow-lg overflow-scroll overflow-x-scroll  ">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <th scope="row" >{{ $user['id'] }}</th>

                    <td>{{ $user['name'] }}</td>
                    <td>{{ $user['email'] }}</td>


                    <td class="flex flex-row gap-2">

                        <a class="btn btn-warning" href="#{{ $user['id'] }}"> get</a>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    @endif
</div>
