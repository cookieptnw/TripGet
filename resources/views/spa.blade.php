@php $config = [ 'appName' => config('app.name'), 'locale' => $locale =
app()->getLocale(), 'locales' => config('app.locales'), 'githubAuth' =>
config('services.github.client_id'), 'facebookAuth' =>
config('services.facebook.client_id'),]; @endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

  <title>{{ config("app.name") }}</title>

  <style>
    @import url("https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");

  </style>
  <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}" />
  <link
    href="https://fonts.googleapis.com/css2?family=K2D:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&display=swap"
    rel="stylesheet">
</head>

<body>
  <div id="app"></div>

  {{-- Global configuration object --}}
  <script>
    window.config = @json($config);

  </script>

  {{-- Load the application scripts --}}
  <script src="{{ mix('dist/js/app.js') }}"></script>
  <style>
    @import url("/css/bootstrap.min.css");

    @font-face {
      font-family: "psl";
      src: url("/fonts/PSL-Omyim.ttf");
    }

    body,
    html,
    a,
    p {
      font-family: 'Roboto', 'K2D';
    }

  </style>
</body>

</html>
