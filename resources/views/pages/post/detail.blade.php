@extends('layout.front-panel')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <h1>{{ $post->title }}</h1>
            <span>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $post->created_at)->toFormattedDateString() }}</span>
            <div class="pull-right">
                <em>Tags :</em>
                @foreach($post->tags as $tag)
                    <a href="{{ route('postTag', $tag->id) }}" class="tag">
                        <span class="label label-warning">{{$tag->name}}</span> 
                    </a>
                @endforeach
            </div>
            <hr>
        </div>
        <div class="col-sm-12">
            <div>
                {!! $post->body !!}
            </div>
        </div>
    </div>
@endsection