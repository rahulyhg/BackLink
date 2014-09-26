<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Backlink Takip Sistemi - @YD</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('dist/css/style.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
  <style type="text/css" media="screen">
    .container {
       width: 400px;
    }
  </style>
    <div class="container">
        @if (Session::has('message'))
          <div class="col-md-12">
            <div class="alert alert-danger"><strong>Hatalar:</strong><br>
              {{ Session::get('message') }}
            </div>
          </div>
        @endif

      <form action="{{ URL::to('/login/check') }}" class="form-signin" method="post">
        <h2 class="form-signin-heading">BackLink Takip Sistemi <small>Lütfen Giriş Yap</small></h2>
        <input name="email" type="text" class="form-control" placeholder="Email Adresin" required autofocus>
        <input name="password" type="password" class="form-control" placeholder="Şifren" required>
        <br>
        <input type="submit" class="btn btn-lg btn-primary btn-block" value="Giriş Yap">

      </form>

    </div> <!-- /container -->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="{{ asset('dist/js/bootstrap.min.js')}}"></script>
    @yield('footer-code')
  </body>
</html>