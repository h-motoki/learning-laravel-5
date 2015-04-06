<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <div class="container">
        @include('partials.flash')
    </div>

    @yield('footer')

    <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    	$('div.alert').not('.alert-important').delay(3000).slideUp(300);
    </script>
</body>
</html>