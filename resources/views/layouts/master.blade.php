<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Vue App</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/css/app.css">
  <link rel="stylesheet" href="https://adminlte.io/themes/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Ubuntu:300,400,400i,700" rel="stylesheet">
</head>
<body>

<div class="wrapper" id="app">
    <div class="container">
        <div class="row">
         <router-view></router-view>
        </div>
    </div>
</div>


<script src="js/app.js"></script>
</body>
</html>