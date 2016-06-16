<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Page non trouvée</title>

        <link href=" {{ asset('assets/css/error.css') }}" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">{{$message or "Pas le droit d'accéder à la ressource"}} <a href="{{url($url) or url('/home')}}">Revenir en arrière</a></div>
            </div>
        </div>
    </body>
</html>
