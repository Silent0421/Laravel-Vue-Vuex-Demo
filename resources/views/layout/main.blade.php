<!DOCTYPE html>
<html lang="en">
<head>
    @include('layout.parts.head')
</head>
<body>
@include('layout.parts.header')
@yield('content')
@yield('scripts')
@include('layout.parts.footer')
@include('layout.parts.footer-scripts')
 </body>
</html>
