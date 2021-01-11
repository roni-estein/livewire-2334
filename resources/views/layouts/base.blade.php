<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
{{--  @larabugJavaScriptClient--}}
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

  <!-- Styles -->
  <link rel="stylesheet" href="{{ mix('css/app.css') }}">

  <!-- Scripts -->
  <script src="{{ mix('js/app.js') }}" defer></script>
  @stack('styles')
  @stack('headScripts')
  @livewireStyles
</head>


<body class="font-sans antialiased">

  {{ $slot }}

  <livewire:floating-notifications :key="now()->toString()"/>

  @stack('scripts')
  @livewireScripts
</body>
</html>
