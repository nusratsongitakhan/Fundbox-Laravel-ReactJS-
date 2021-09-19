@extends('Layout.app')

@section('body')

<body class="vertical-layout vertical-menu-modern 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">

    @include('Layout.SpMenu')

    <!-- BEGIN: Content-->
   

    @include('Layout.footer')

    @include('Layout.scripts')
</body>
@endsection