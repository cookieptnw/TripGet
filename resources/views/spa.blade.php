@php $config = [ 'appName' => config('app.name'), 'locale' => $locale =
app()->getLocale(), 'locales' => config('app.locales'), 'githubAuth' =>
config('services.github.client_id'), 'facebookAuth' =>
config('services.facebook.client_id'),]; @endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <title>{{ config("app.name") }}</title>

    <style>
      @import url("https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css");
    </style>
    <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}" />
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
    </style>
  </body>
</html>
