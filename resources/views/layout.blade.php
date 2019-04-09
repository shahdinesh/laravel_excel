<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Demo Wrbsite</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/pricing/">

    <!-- Bootstrap core CSS -->
    
  	<link rel="stylesheet" href="<?=url('/css/bootstrap.css')?>">
    <!-- Custom styles for this template -->
    <link href="<?=url('/css/pricing.css')?>" rel="stylesheet">
  </head>

  <body>

  	@include('include.nav')

  	<div class="container">
	  	@yield('content')
	    @include('include.footer')
  	</div>

  </body>
</html>
