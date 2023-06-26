<!DOCTYPE HTML>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@900&display=swap" rel="stylesheet">

    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css') }}" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous"> -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/aos.css') }}" type="text/css">
    <!-- <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}" type="text/css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">

    <title>DialectB2B</title>
</head>

<body>

    @yield('content')


    <!-- New Quote Button Start -->
    @if(!request()->is('member/quote/*'))
    <a href="{{ route('member.quote.selectCategory') }}">
    <div class="create-qoute d-flex justify-content-end">
        <span>Create Quote</span>
        <div class="create-qoute-btn"></div>
    </div>
    </a>
    @endif
    <!-- New Quote Button End -->

    <script type='text/javascript' src="{{ asset('assets/js/jquery.min.js') }}"></script>
    <script type='text/javascript' src="{{ asset('assets/js/aos.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>


    @stack('scripts')
    <script>


function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        window.onclick = function (event) {
            if (!event.target.matches('.dropbtn')) {
                var dropdowns = document.getElementsByClassName("dropdown-content");
                var i;
                for (i = 0; i < dropdowns.length; i++) {
                    var openDropdown = dropdowns[i];
                    if (openDropdown.classList.contains('show')) {
                        openDropdown.classList.remove('show');
                    }
                }
            }
        }




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
            $('body').on('click','.cross',function () {
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

            
            

            

        });


        function openCity(evt, cityName) {
            var i, tabcontent, tablinks;
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }
            tablinks = document.getElementsByClassName("tablinks");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }
            document.getElementById(cityName).style.display = "block";
            evt.currentTarget.className += " active";
        }



        $(document).ready(function () {
            $(window).scroll(function () {
                if ($(this).scrollTop() > 200) {
                    $('.header').addClass("sticky");
                } else {
                    $('.header').removeClass("sticky");
                }
            });
            $('a[href*="#"]:not([href="#"])').click(function () {
                if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                    var target = $(this.hash);
                    target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                    if (target.length) {
                        $('html, body').animate({
                            scrollTop: target.offset().top
                        }, 100);
                        return false;
                    }
                }
            });
            AOS.init();

            $(".talents-list").hide();
            $('#tooltipBtn').click(function () {
                $('#tooltipContent').fadeToggle("slow")
                $('#bgChange').toggleClass("content-list-main-active");
            });


            $('.talents-list').click(function () {
                $(this).hide();
                $('#bgChange').removeClass("content-list-main-active");
            });


        });


        var x, i, j, l, ll, selElmnt, a, b, c;
        /*look for any elements with the class "custom-select":*/
        x = document.getElementsByClassName("custom-select");
        l = x.length;
        for (i = 0; i < l; i++) {
            selElmnt = x[i].getElementsByTagName("select")[0];
            ll = selElmnt.length;
            /*for each element, create a new DIV that will act as the selected item:*/
            a = document.createElement("DIV");
            a.setAttribute("class", "select-selected");
            a.innerHTML = selElmnt.options[selElmnt.selectedIndex].innerHTML;
            x[i].appendChild(a);
            /*for each element, create a new DIV that will contain the option list:*/
            b = document.createElement("DIV");
            b.setAttribute("class", "select-items select-hide");
            for (j = 1; j < ll; j++) {
                /*for each option in the original select element,
                create a new DIV that will act as an option item:*/
                c = document.createElement("DIV");
                c.innerHTML = selElmnt.options[j].innerHTML;
                c.addEventListener("click", function (e) {
                    /*when an item is clicked, update the original select box,
                    and the selected item:*/
                    var y, i, k, s, h, sl, yl;
                    s = this.parentNode.parentNode.getElementsByTagName("select")[0];
                    sl = s.length;
                    h = this.parentNode.previousSibling;
                    for (i = 0; i < sl; i++) {
                        if (s.options[i].innerHTML == this.innerHTML) {
                            s.selectedIndex = i;
                            h.innerHTML = this.innerHTML;
                            y = this.parentNode.getElementsByClassName("same-as-selected");
                            yl = y.length;
                            for (k = 0; k < yl; k++) {
                                y[k].removeAttribute("class");
                            }
                            this.setAttribute("class", "same-as-selected");
                            break;
                        }
                    }
                    h.click();
                });
                b.appendChild(c);
            }
            x[i].appendChild(b);
            a.addEventListener("click", function (e) {
                /*when the select box is clicked, close any other select boxes,
                and open/close the current select box:*/
                e.stopPropagation();
                closeAllSelect(this);
                this.nextSibling.classList.toggle("select-hide");
                this.classList.toggle("select-arrow-active");
            });
        }
        function closeAllSelect(elmnt) {
            /*a function that will close all select boxes in the document,
            except the current select box:*/
            var x, y, i, xl, yl, arrNo = [];
            x = document.getElementsByClassName("select-items");
            y = document.getElementsByClassName("select-selected");
            xl = x.length;
            yl = y.length;
            for (i = 0; i < yl; i++) {
                if (elmnt == y[i]) {
                    arrNo.push(i)
                } else {
                    y[i].classList.remove("select-arrow-active");
                }
            }
            for (i = 0; i < xl; i++) {
                if (arrNo.indexOf(i)) {
                    x[i].classList.add("select-hide");
                }
            }
        }
        /*if the user clicks anywhere outside the select box,
        then close all select boxes:*/
        document.addEventListener("click", closeAllSelect);



        @if (Session::has('warning'))
            Swal.fire({
                toast: true,
                icon: 'warning',
                title: "{{ Session::get('warning') }}",
                animation: false,
                position: 'top-right',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
        @elseif(Session::has('success'))
            Swal.fire({
                toast: true,
                icon: 'success',
                title: "{{ Session::get('success') }}",
                animation: false,
                position: 'top-right',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            });
        @endif
    </script>
</body>

</html>
