@extends('layouts.base')
@section('body')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">@include('layouts.navbar')</div>
            <div class="col-sm-8 col-content">
                @include('layouts.title')
                <div id="content" style="height: 10em; overflow: scroll;">
                    @yield('content')
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script type="text/javascript">
    function contentResize() {
        var content_height = $(document).height() - $("#content").offset().top;
        console.log($(document).height());
        {{--
        console.log($("html").height());
        console.log($(document).height());
        console.log($(window).height());
        console.log($("body").offset().top);
        console.log($("html").position().top);

        console.log("offsets:");
        console.log($("#content").position().top);
        console.log($("#content").offset().top);


        console.log("he: "+ diff);
        --}}

        $("#content").css("height", content_height + "px");
    }

    $(document).ready(function () {
        contentResize();

        $(window).resize(contentResize);
    });
</script>
@endpush