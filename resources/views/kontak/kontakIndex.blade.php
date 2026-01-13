<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kontak - Tri Bhakti Advertising</title>
    <!-- Google Fonts: Darker Grotesque -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Darker+Grotesque:wght@300..900&display=swap" rel="stylesheet">
    <link rel="icon" href="{{ asset('storage/img/logotab.png') }}" type="image/png">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
  </head>
  <body>
    @include('navbar')
    @include('kontak.heroSectionKontak')
    @include('kontak.kontak1')
    @include('footer')
    @include('partials.aos')
  </body>
</html>
