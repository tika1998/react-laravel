@extends('layouts.app')

@section('content')

    <form method='POST' action="{{route('news.update', $news->id)}}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <input type="text" class="form-control" id="exampleInputEmail1" value="{{$news->name}}" aria-describedby="emailHelp" placeholder="Enter name" name="name">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="exampleInputEmail1" value="{{$news->short_description}}"  aria-describedby="emailHelp" placeholder="Enter short description" name="short_description">
        </div>
        <div class="form-group">
            <textarea  class="form-control" name="news" rows="4" cols="50" > {{$news->news}} </textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>


@endsection
