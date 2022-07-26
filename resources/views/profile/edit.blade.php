@extends('layouts.app')

@section('content')

<style>
#image {background-image:url of the image}
</style>


    <div class="container">

        @if ($message = Session::get('error'))
            <div class="alert alert-danger alert-block my-3">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger my-3">
                <button type="button" class="close" data-dismiss="alert">×</button>
                Error
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-block my-3">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Posting Sesuatu</div>
                    <div class="card-body">
                        <form action="{{ route('post.store') }}" method="post" class="form">
                            @csrf
                            <div class="form-group">
                                <label for="" class="font-weight-normal">Konten Postingan</label>
                                <textarea name="content" cols="30" rows="3" class="form-control" style="box-shadow: 1px 1px 1px 1px #888888"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="" class="font-weight-normal">Hastags</label>
                                <input type="text" name="tags" class="form-control"
                                    style="box-shadow: 1px 1px 1px 1px #888888">
                                <label class="text-muted mt-1"> Pisahkan Tag oleh Koma </label>
                            </div>
                            <div class="form-group">
                                <Label> Upload Image Klik Here! </Label> <br>
                                <label class="btn btn-primary" for="my-file-selector">
                                    <input id="my-file-selector" type="file" style="display:none;">
                                        <span id="image">Upload Image</span>
                                </label>
                            </div>
                            <input type="submit" value="Post" class="btn btn-success float-left">
                        </form>
                    </div>
                </div>

                <div class="justify-center mt-5">
                    <h2 class="font-weight-normal"> Postingan Terbaru </h2>
                </div>

                <div class="" style="box-shadow: 5px 5px #888888">
                    <div class="card">
                        @foreach ($posts as $post)
                            <div class="card-body mt-3 pt-3" style="box-shadow: 5px 10px #888888">
                                {{ $post->user->name }}
                                @php
                                    \Carbon\Carbon::setLocale('id');
                                @endphp
                                <span class="float-right">
                                    {{ $post->created_at->diffForHumans() }}
                                </span>
                                <ul class="list-group list-group-flush py-3">
                                    <li class="list-group-item">
                                        <div class="col-md-2 float-left">
                                            {{ $loop->iteration }}
                                        </div>
                                        <div class="col-md-10 float-right">
                                            {{ $post->content }}
                                        </div>
                                    </li>
                                    @if (Auth::user()->id == $post->user_id)
                                        <li class="list-group-item">
                                            <a href="{{ route('post.edit', $post->id) }}" class="float-right"> Edit </a>
                                        </li>
                                    @endif
                                </ul>
                                <div class="float-left"> <a href="{{ route('post.show', $post->id) }}">
                                        {{ count($post->comments) . ' Komentar' }} </a> </div>
                                <div class="float-right">

                                    <form action="{{ route('post.destroy', $post->id) }}" method="post">
                                        @csrf
                                        @method('delete')
                                        @if (Auth::user()->id == $post->user_id)
                                            <input type="submit" value="Hapus" class="btn btn-danger">
                                        @endif
                                        <a href="{{ route('post.comment', $post->id) }}" class="btn btn-primary">Balas</a>
                                    </form>

                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
