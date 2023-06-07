<script>
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

</script>    

            $('.upcoming-events').mouseover(function (e) {
                $('.nav-tooltip-6').css('visibility', 'visible');
            });
            $('.upcoming-events').mouseout(function (e) {
                $('.nav-tooltip-6').css('visibility', 'hidden');
            })

            $(".nav-expand-ico").click(function () {
                $(".tooltip-nav-main").toggleClass("tool-tip-hide");
            });
