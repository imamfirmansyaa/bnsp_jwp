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
                            <input type="submit" value="Lihat Postingan" class="btn btn-danger float-left ml-2" href="{{ route('post.article') }}">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
