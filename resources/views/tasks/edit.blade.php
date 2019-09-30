@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('tasks.update',$edit['id'])}}" method="post">
            @csrf
            @method('PATCH')
            {{csrf_field()}}
            <div class="form-group">
                <label for="exampleInputEmail1">Add task</label>
                <input type="text" name="task" value="{{$edit->task}}" class="form-control" id="task" aria-describedby="emailHelp" placeholder="Add Tasks">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
