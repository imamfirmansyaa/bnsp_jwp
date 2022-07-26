@extends('layouts.app')

@section('content')

    <style>
        #image {
            background-image: url of the image
        }

        #wrapper {
            margin: auto;
            padding: 0;
            width: 480px;
            height: auto;
            background: #eeeeee;
            border-radius: 25px;
        }

        .titleprofile {
            margin: 10px;
            color: #000000;
            font-family: Segoe UI;
            font-size: 22px;
            text-align: center;
            padding-bottom: 10px;
            border-radius: 10px;
            font-weight: bold;
        }

        .photoprofile {
            margin: auto;
        }

        .dataprofile {
            margin: 10px;
            color: #000000;
            font-family: Segoe UI;
            font-size: 16px;
            border-radius: 10px;
        }

        .imgprofile {
            display: block;
            border-radius: 50%;
            width: 200px;
            height: 200px;
            margin-left: auto;
            margin-right: auto;

        }
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
                    <div class="card-body">
                        <p style="text-align: center">Tampilan Profil Data</p>
                        <div id="wrapper" style="border-radius: 10px">
                            <div class="titleprofile">Profil Saya</div>
                            <div class="photoprofile">
                                <img src="logo.png" class="imgprofile">
                            </div>
                            <table class="mx-4 my-4">
                                <tr>
                                    <td>Nama</td>
                                    <td>:</td>
                                    <td>Imam Firmansyah</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>imamsyaa001@gmail.com</td>
                                </tr>
                                <tr>
                                    <td>Password</td>
                                    <td>:</td>
                                    <td>**********</td>
                                </tr>
                            </table>
                            <input type="submit" value="Simpan" class="btn btn-success mb-3 mx-3" style="text-align: center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
