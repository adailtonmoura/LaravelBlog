<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Send Email</title>
    <link rel="stylesheet" href="{{asset('/css/style.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('/css/home.css')}}">   --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/js/all.js" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}
    {{-- <link href="resources/css/styles.css" rel="stylesheet" type="text/css"> --}}
</head>

<body class="antialiased">

    <div class="container mt-5">
   

        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <div class="email">
            <h1>ENVIAR EMAIL</h1>
            <form action="{{route('send')}}" method="post" enctype="multipart/form-data">
                @csrf

                {{-- Name --}}


                <div class="form-group">
                    <label for="">Nome</label>
                    <input type="text" class="form-control" name="name" id="name">
                    @error('name')                    
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>                    
                    @enderror
                </div>
               

                {{-- Content --}}
                <div class="form-group">
                    <label for="">Conteudo</label>
                    <textarea class="form-control" name="content" id="content" rows="3"></textarea>
                    @error('content')                    
                        <div class="alert alert-danger">
                            {{ $message }}
                        </div>                    
                    @enderror
                </div>

                {{-- Attachments --}}
                <div class="form-group">
                    <label for="file">Arquivos</label>
                    <input type="file" class="form-control-file" name="files[]" id="file" multiple>
                </div>

                <button type="submit" name="button" id="button" class="btn btn-primary" btn-lg btn-block">Enviar  <i class="fas fa-paper-plane"></i> </button>

            </form>

            </div>

        </div>


    </body>

</html>
