<!doctype html>
<html lang="ja">
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <title>
      @yield('title')
    </title>
  <!-- Styles -->
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>
<body>
  <div id="app">
    @yield('content')
  </div>

  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}" defer></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>  
</body>
</html>