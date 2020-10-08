    function alaire() {
        window.open ("http://alojawebhost.com/turadio/", "TU 91.2 AL AIRE","location=0,status=0,scrollbars=0,width=500,height=300");
    }
    
    var scrollp=0;
    (function ($) {
        $(document).ready(function(){
            $(function () {
                $(window).scroll(function () {
                // ask about the position of scroll 

                    if ($(this).scrollTop() < scrollp) {
                        $('.navbar').fadeIn(800);
                        scrollp= $(this).scrollTop();
                    } else {
                        $('.navbar').fadeOut(800);
                        scrollp= $(this).scrollTop();
                    }
                });
            });

            $('table tbody tr').on('hover', function () {
                $(this).toggleClass('bghov');
            });

            $(".btn-pref .btn").click(function () {
                $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
                // $(".tab").addClass("active"); // instead of this do the below 
                $(this).removeClass("btn-default").addClass("btn-primary");   
            });

        });
    }(jQuery));
