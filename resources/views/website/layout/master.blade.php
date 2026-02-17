<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Male_Fashion Template">
    <meta name="keywords" content="Male_Fashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Trend Hub wibsite</title>

    @include('website.component.headerlink')

</head>

<body>

    <!-- Header Section Begin -->
    @include('website.component.header')


    @yield("content")
   
    <!-- Footer Section start -->
    @include('website.component.footer')
    <!-- Footer Section End -->



    <!-- Search Begin -->
  @include('website.component.search')
    <!-- Search End -->

    <!-- Js Plugins -->
    @include('website.component.footerlink')


</body>

</html>
