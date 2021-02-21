<div   x-data="{ open: false }">
    <input class="form-control mr-sm-2 " type="search" wire:model.debounce.500ms="title"
           placeholder="Search .. title  or code"
           @focus="open = true"
           @click.away="open = false"
           @keydown.escape.window = "open = false"
    >

    @if(strlen($title) >= 2)
        <div class="table-responsive absolute w-auto mt-1 " x-show="open">

            <table class="table table-striped table-dark rounded-lg mt-4 shadow-lg overflow-scroll overflow-x-scroll  ">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">title</th>
                    <th scope="col">Code</th>
                    <th scope="col">Instructor</th>

                </tr>
                </thead>
                <tbody>
                @foreach($courses as $course)
                    <tr>
                        <th scope="row" >{{ $course['id'] }}</th>

                        <td>{{ $course['title'] }}</td>
                        <td>{{ $course['code'] }}</td>
                        <td>{{ !empty( $course->user ) ? $course->user->name : "No Instructor yet ..."  }}</td>

                        <td class="flex flex-row gap-2">

                            <a class="btn btn-warning" href="#{{ $course['id'] }}"> get</a>

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endif
</div>
