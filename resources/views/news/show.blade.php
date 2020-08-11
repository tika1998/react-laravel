@extends('layouts.app')

@section('content')
    <div class="card " style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">{{$news->name}}</h5>
            <p class="card-text">{{$news->short_description}}</p>
            <p class="card-text">{{$news->news}}</p>
            <a href="{{route('news.edit',$news->id)}}" class="btn btn-primary">Edit</a>
            <a href="" class="btn btn-success">View</a>
            <form action="{{route('news.destroy', $news->id)}}" method='post' style='display: contents'>
                @csrf
                @method('DELETE')
                <input type='submit' class='btn btn-success' value='Delete'>
            </form>
        </div>
    </div>
@endsection
