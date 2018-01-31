@extends('layout.front-panel')

@section('after_style')
<link rel="stylesheet" href="{{ asset('css/jquery.tagsinput.min.css') }}">
<link rel="stylesheet" href="https://unpkg.com/lite-editor@1.4.0/css/lite-editor.css">
<style>
    div.tagsinput{
        height: auto !important;
        min-height: 0 !important;
        border-radius: 5px;
    }
    div.tagsinput input{
        margin: 0px !important;
        padding: 0px !important;
    }
</style>
@endsection

@section('content')
<h1>Create New Post</h1>
<form method="post" class="form" enctype="multipart/form-data">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{ csrf_field() }}

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" placeholder="Title" name="title">
    </div>
    <div class="form-group">
        <label for="body">Body</label>
        <textarea class="form-control js-lite-editor" name="body"></textarea>
    </div>
    <div class="form-group">
        <label for="tags">Tags</label>
        <input type="text" class="form-control" placeholder="Tags" name="tags">
    </div>
    <div class="form-group">
        <input type="submit" value="Save" class="btn btn-primary" />
    </div>
</form>
@endsection

@section('after_script')
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.tagsinput.min.js') }}"></script>
<script src="https://unpkg.com/lite-editor@1.4.0/js/lite-editor.min.js"></script>
<script>
    $(function(){
        $('input[name="tags"]').tagsInput();

        new LiteEditor('.js-lite-editor', {
            minHeight: 250,
        });
    });
</script>
@endsection