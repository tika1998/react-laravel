@extends('layouts.app')

@section('content')

    <div class="d-flex justify-content-around">
    @foreach($news as $el)
        <div class="card " style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{$el->name}}</h5>
                <p class="card-text">{{$el->short_description}}</p>
                <p class="card-text">{{ Str::limit($el->news, $limit = 10, $end = '...') }}</p>
                <a href="{{route('news.edit',$el->id)}}" class="btn btn-primary">Edit</a>
                <a href="{{route('news.show',$el->id)}}" class="btn btn-success">View</a>

                <form action="{{route('news.destroy', $el->id)}}" method='post' style='display: contents'>
                    @csrf
                    @method('DELETE')
                    <input type='submit' class='btn btn-success' value='Delete'>
                </form>
            </div>
        </div>
    @endforeach
        {{ $news->links() }}
    </div>

    <div>
        <a href="{{route('news.create')}}" class="btn btn-primary">Create</a>
    </div>

@endsection
