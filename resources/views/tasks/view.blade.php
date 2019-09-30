@extends('layouts.app')

@section('content')

<table class="table table-striped">
    <thead>
    <tr>
        <th scope="col">No.</th>
        <th scope="col">Task</th>
        <th scope="col">Action</th>

    </tr>
    </thead>
    <tbody>
    @foreach($tasks as $index=>$task)
    <tr>
        <td>{{$index+1}}</td>
        <td>{{$task['task']}}</td>
        <td>

            <form action="{{route("tasks.destroy",$task['id'])}}" method="post">

                <a type="button" href="{{ route('tasks.edit',$task['id']) }}" value="Edit" class="btn btn-primary">Edit</a>
                @method("DELETE")
                {{csrf_field()}}
                <input type="submit" value="Delete" class="btn btn-danger" />
            </form>
        </td>
    </tr>

    @endforeach
    </tbody>
</table>

@endsection
