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
                <div class="title">{{$message or 'Page non trouvée.'}} <a href="{{$url}}">Revenir en arrière</a></div>
            </div>
        </div>
    </body>
</html>
