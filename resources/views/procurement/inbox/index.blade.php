@extends('layouts.app')
@section('content')
    <!-- Header Starts -->
    @include('procurement.layouts.header')
    <!-- Header Ends -->

@push('scripts')
    <script>
        $(document).ready(function () {
            $('.nav-expand-ico').click(function () {
                var toggleWidth = $(".side-nav-main").width() == 285 ? "64px" : "285px";
                $('.side-nav-main').animate({ width: toggleWidth });
            });

          
            
            $(".nav-expand-ico").click(function () {
                $("#logo-toogle").toggleClass("hide-logo");
            });
            
            $(".nav-expand-ico").click(function () {
                $(this).toggleClass("nav-close-ico");
            });

            $('.bid-open').hide();

            $('.bid-detail').click(function () {
                $('.bid-tap, .questions-ask').hide('500');
                $('.bid-open').show('500');

                $('.scnd-section-main').removeClass('col-md-9');
                $('.scnd-section-main').addClass('col-md-6');
            });

            $('.cross-second').click(function () {
                $('.bid-tap, .questions-ask').show('300');
                $('.bid-open').hide('300');
            });
            $('.question-asked').hide();
            $('.cross').click(function () {
                $('.questions-ask').hide('300');
                $('.scnd-section-main').addClass('col-md-9');
                $('.scnd-section-main').removeClass('col-md-6');
                $('.question-asked').show();
            });
            $('.question-asked').click(function () {
                $('.questions-ask').show('300');
                $('.scnd-section-main').removeClass('col-md-9');
                $('.scnd-section-main').addClass('col-md-6');
                $('.question-asked').hide();
            });

            $(".all-bid-ul").on('click', 'li', function () {
                $(".all-bid-ul li.active").removeClass("active");
                $(this).addClass("active");
            });

            $('.my-quotes').mouseover(function (e) {
                $('.nav-tooltip-1').css('visibility', 'visible');
            });
            $('.my-quotes').mouseout(function (e) {
                $('.nav-tooltip-1').css('visibility', 'hidden');
            })
            
            $('.review-list').mouseover(function (e) {
                $('.nav-tooltip-2').css('visibility', 'visible');
            });
            $('.review-list').mouseout(function (e) {
                $('.nav-tooltip-2').css('visibility', 'hidden');
            })

            $('.draft').mouseover(function (e) {
                $('.nav-tooltip-3').css('visibility', 'visible');
            });
            $('.draft').mouseout(function (e) {
                $('.nav-tooltip-3').css('visibility', 'hidden');
            })

            $('.completed-bidding').mouseover(function (e) {
                $('.nav-tooltip-4').css('visibility', 'visible');
            });
            $('.completed-bidding').mouseout(function (e) {
                $('.nav-tooltip-4').css('visibility', 'hidden');
            })

            $('.team-settings').mouseover(function (e) {
                $('.nav-tooltip-5').css('visibility', 'visible');
            });
            $('.team-settings').mouseout(function (e) {
                $('.nav-tooltip-5').css('visibility', 'hidden');
            })

            $('.upcoming-events').mouseover(function (e) {
                $('.nav-tooltip-6').css('visibility', 'visible');
            });
            $('.upcoming-events').mouseout(function (e) {
                $('.nav-tooltip-6').css('visibility', 'hidden');
            })

            $(".nav-expand-ico").click(function () {
                $(".tooltip-nav-main").toggleClass("tool-tip-hide");
            });

            
            $('.read-more').click(function () {
                $('#msg-expand').removeClass('msg-expand-main');
                $('#msg-expand').addClass('msg-less-main');
                $('.read-more').hide();
                $('.read-less').show();
                $("ul.all-bid-ul").css("height", "calc(100vh - 646px)");
                
            });

            $('.read-less').click(function () {
                $('#msg-expand').addClass('msg-expand-main');
                $('#msg-expand').removeClass('msg-less-main');
                $('.read-more').show();
                $('.read-less').hide();
                $("ul.all-bid-ul").css("height", "calc(100vh - 369px)");
            });

        });

    </script>
@endpush
 
@endsection    