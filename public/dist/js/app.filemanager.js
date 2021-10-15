(function($) {
    "use strict";

    var contact;

    $('.scrollertodo').slimScroll({
        height: '500px',
        color: '#fff'
    });

    $('.document-menu a').on('click', function() {
        $('.document-menu a').removeClass('active');
        $(this).addClass('active');
        $('.document').hide();
        $('.' + $(this).data("documenttype")).show(500);
        return false;
    });
    $('.list-style').on('click', function() {
        $('.grid-style').removeClass('active');
        $('.documents').removeClass('grid');
        $(this).addClass('active');
        $('.documents').addClass('list');
        return false;
    });
    $('.grid-style').on('click', function() {
        $('.list-style').removeClass('active');
        $('.documents').removeClass('list');
        $(this).addClass('active');
        $('.documents').addClass('grid');
        return false;
    });
    $(".documents").on("click", ".delete-document", function() {
        $(this).closest('.document').addClass('outline-badge-danger');
        $(this).closest('.document').slideUp(550, function() {
            $(this).closest('.document').remove();
        });
    });


    $(document).ready(function() {
        $(".inventory").hide();

    });
    $(document).ready(function() {
        $(".shipping").hide();

    });
    $(document).ready(function() {
        $(".Linkedproduct").hide();

    });
    $(document).ready(function() {
        $(".Attributes").hide();

    });
    $(document).ready(function() {
        $(".Advanced").hide();

    });
    $(document).ready(function() {
        $(".GetmoreOption").hide();

    });
    //functions

    $(document).ready(function() {
        $("#genaral").click(function() {
            $(".genaral").show();
            $(".inventory").hide();
            $(".shipping").hide();
            $(".Attributes").hide();
            $(".Advanced").hide();
            $(".GetmoreOption").hide();
        });

    });
    $(document).ready(function() {
        $("#inventory").click(function() {
            $(".inventory").show();
            $(".genaral").hide();
            $(".shipping").hide();
            $(".Linkedproduct").hide();
            $(".Attributes").hide();
            $(".Advanced").hide();
            $(".Advanced").hide();
            $(".GetmoreOption").hide();
        });

    });
    $(document).ready(function() {
        $("#shipping").click(function() {
            $(".shipping").show();
            $(".inventory").hide();
            $(".genaral").hide();
            $(".Linkedproduct").hide();
            $(".Attributes").hide();
            $(".Advanced").hide();
            $(".GetmoreOption").hide();
        });

    });
    $(document).ready(function() {
        $("#linkedproduct").click(function() {
            $(".Linkedproduct").show();
            $(".shipping").hide();
            $(".inventory").hide();
            $(".genaral").hide();
            $(".Attributes").hide();
            $(".Advanced").hide();
            $(".GetmoreOption").hide();
        });

    });
    $(document).ready(function() {
        $("#attributes").click(function() {
            $(".Attributes").show();
            $(".Linkedproduct").hide();
            $(".shipping").hide();
            $(".inventory").hide();
            $(".genaral").hide();
            $(".Advanced").hide();
            $(".GetmoreOption").hide();
        });

    });
    $(document).ready(function() {
        $("#advanced").click(function() {
            $(".Advanced").show();
            $(".Attributes").hide();
            $(".Linkedproduct").hide();
            $(".shipping").hide();
            $(".inventory").hide();
            $(".genaral").hide();
            $(".GetmoreOption").hide();
        });

    });
    $(document).ready(function() {
        $("#moreoption").click(function() {
            $(".GetmoreOption").show();
            $(".Advanced").hide();
            $(".Attributes").hide();
            $(".Linkedproduct").hide();
            $(".shipping").hide();
            $(".inventory").hide();
            $(".genaral").hide();
        });

    });

    $(".document-search").on("keyup", function() {
        var v = $(".document-search").val().toLowerCase();
        var rows = $('.' + $('.document-menu li a.active').data("documenttype"));

        for (var i = 0; i < rows.length; i++) {
            var fullname = rows[i].getElementsByClassName("document-content");
            fullname = fullname[0].innerHTML.toLowerCase();
            if (fullname) {
                if (v.length == 0 || (v.length < 1 && fullname.indexOf(v) == 0) || (v.length >= 1 && fullname.indexOf(v) > -1)) {
                    rows[i].style.animation = 'fadein 7s';
                    rows[i].style.display = "block";
                } else {
                    rows[i].style.display = "none";
                    rows[i].style.animation = 'fadeout 7s';
                }
            }
        }
    });

})(jQuery);