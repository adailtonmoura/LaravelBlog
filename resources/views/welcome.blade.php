<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Blog</title>
    <link rel="stylesheet" href="{{ asset('/css/style.css')}}">

    {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}
    {{-- <link href="resources/css/app.css" rel="stylesheet" type="text/css"> --}}
</head>

<body class="antialiased">

    <div class="container mt-5">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif


        <div class="email">
            <h1>Send email</h1>
            <form action="{{route('send')}}" method="post" enctype="multipart/form-data">
                @csrf

                {{-- Name --}}


                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" id="name">
                </div>

                {{-- Content --}}
                <div class="form-group">
                    <label for="">Content</label>
                    <textarea class="form-control" name="content" id="content" rows="3"></textarea>
                </div>

                {{-- Attachments --}}
                <div class="form-group">
                    <label for="">Attachments</label>
                    <input type="file" class="form-control-file" name="file" id="file">
                </div>

                <button type="submit" name="button" id="button" class="btn btn-primary" btn-lg btn-block">Send</button>

            </form>

            </div>

        </div>


    </body>

</html>
