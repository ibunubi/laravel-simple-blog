@extends('layout.front-panel')
@section('content')
    @if(count($post) < 1)
        <div class="alert alert-info">No articles found!</div>
    @else
        @if(isset($tag))
            <div class="alert alert-success">Only Tag: {{$tag->name}}</div>
        @endif
        @foreach($post as $item)
            <div class="row">
                <div class="col-sm-9">
                    <a href="{{ route('postDetail', $item) }}">
                        <h2>{{ $item->title }}</h2>  
                    </a>
                </div>
                <div class="col-sm-3">
                    <div class="pull-right info">
                        <span>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $item->created_at)->toFormattedDateString() }}</span>
                        <br>
                        @foreach($item->tags as $tag)
                            <a href="{{ route('postTag', $tag->id) }}" class="tag">
                                <span class="label label-warning">{{$tag->name}}</span> 
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <hr/>
        @endforeach
    @endif
@endsection