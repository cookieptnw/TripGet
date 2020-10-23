@php $config = [ 'appName' => config('app.name'), 'locale' => $locale =
app()->getLocale(), 'locales' => config('app.locales'), 'githubAuth' =>
config('services.github.client_id'),'facebookAuth' =>
config('services.facebook.client_id'), 'fDir' => env('FDIR'), 'aDir' =>
env('ADIR'),'apiUrl' => env('API_URL'),]; @endphp
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link
      rel="apple-touch-icon"
      sizes="57x57"
      href="images/favicon/apple-icon-57x57.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="60x60"
      href="images/favicon//apple-icon-60x60.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="72x72"
      href="images/favicon//apple-icon-72x72.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="76x76"
      href="images/favicon//apple-icon-76x76.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="114x114"
      href="images/favicon//apple-icon-114x114.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="120x120"
      href="images/favicon//apple-icon-120x120.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="144x144"
      href="images/favicon//apple-icon-144x144.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="152x152"
      href="images/favicon//apple-icon-152x152.png"
    />
    <link
      rel="apple-touch-icon"
      sizes="180x180"
      href="images/favicon//apple-icon-180x180.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="192x192"
      href="images/favicon//android-icon-192x192.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="32x32"
      href="images/favicon//favicon-32x32.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="96x96"
      href="images/favicon//favicon-96x96.png"
    />
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="images/favicon//favicon-16x16.png"
    />
    <link rel="manifest" href="images/favicon//manifest.json" />
    <meta name="msapplication-TileColor" content="#ffffff" />
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png" />
    <meta name="theme-color" content="#ffffff" />

    <title>{{ config("app.name") }}</title>

    <style>
      @import url("https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css");
    </style>
    <link rel="stylesheet" href="{{ mix('dist/css/app.css') }}" />
    <link
      href="https://fonts.googleapis.com/css2?family=K2D:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800&family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700;1,900&display=swap"
      rel="stylesheet"
    />
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
      p,
      .btn {
        font-family: "Roboto", "K2D" !important;
      }

      a {
        text-decoration: none;
      }

      .form-filter {
        width: 100%;
        padding: 15px;
        background-color: #4582ec;
      }

      .form-group-search {
        width: 80%;
      }

      .form-group-search input {
        border-radius: 5px 0px 0px 5px !important;
      }

      .form-group-submit {
        margin-top: 0.5px;
        width: 20%;
        height: 42.5px;
        border-radius: 0px 5px 5px 0px !important;
      }

      .head-content {
        margin-top: 35px;
        margin-bottom: 20px;
      }

      .hotdeal-sold {
        width: 70%;
        float: left;
      }

      .hotdeal-price {
        width: 30%;
        float: left;
        font-weight: 300;
      }

      .hotdeal-sold-total p {
        font-weight: 300;
      }

      .progress {
        height: 2rem !important;
      }

      .category-home {
        padding: 35px 20px 35px 20px;
        background-color: #195dfc;
        border-radius: 5px;
      }

      .hotel-list {
        border-radius: 5px;
        border: 1px solid rgb(100, 142, 255);
      }

      .hotel-rating-bar {
        float: left;
        height: 43.5px;
        margin-bottom: 10px;
      }

      .hotel-price {
        float: left;
        font-weight: 300;
      }

      .hotel-voucher {
        float: left;
        font-weight: 300;
      }

      .w-100 {
        width: 100%;
      }

      .btn-buy {
        width: 100% !important;
        margin-top: 5px;
      }

      .hotel-list img {
        object-fit: cover;
      }

      .hotel-detail-content {
        width: 100%;
        padding: 15px;
        font-weight: 400;
      }

      .detail-price {
        text-align: center;
        font-weight: 600;
        padding: 30px;
        border: 1px solid #195dfc;
        border-radius: 5px;
      }

      .detail-rating {
        margin-top: 35px;
        text-align: center;
        float: right;
      }

      .vc-box {
        width: 100%;
        padding: 25px;
        font-weight: 400;
      }

      .same-shop-img img {
        width: 100%;
        height: 150px;
        object-fit: cover;
      }

      .same-shop-price {
        text-align: center;
        padding: 15px;
        border: 1px solid #195dfc;
        border-radius: 0px 0px 5px 5px;
      }

      .flash-sale-shop-price {
        text-align: center;
        padding: 15px;
        border: 1px solid #ff7d7d;
        border-radius: 0px 0px 5px 5px;
        background-color: #ffececd8;
      }

      .total {
        font-size: 24px;
        font-weight: 500;
      }

      .total-num {
        padding: 5px;
        border: 1px solid #195dfc;
        border-radius: 5px;
      }

      .flash-sale {
        color: #ff7d7d;
      }
    </style>
  </body>
</html>
