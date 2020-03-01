<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

         <!-- CSRF Token -->
         <meta name="csrf-token" content="{{ csrf_token() }}">

        <!-- Bootstrap core CSS -->
        <link href="css/app.css" rel="stylesheet">
        <link href="css/bootsrap.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <!-- font-awesome icons -->
        <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

       
        <!-- JQuery -->
        <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
        <!-- Bootstrap core JavaScript -->
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/custom-script.js"></script>
        <!-- Bootstrap tooltips -->
        <script type="text/javascript" src="js/popper.min.js"></script>
        
       <script src="js/app.js]" defer></script>

       
    </head>
    <body>
        <div id="app">
           <App></App>
        </div>
    </body>
</html>
