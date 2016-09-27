(function($) {
    //document ready
    $(function() {
        $.scrollbarWidth = function() {
            var a, b, c;
            if (c === undefined) {
                a = $('<div style="width:50px;height:50px;overflow:auto"><div/></div>').appendTo('body');
                b = a.children();
                c = b.innerWidth() - b.height(99).innerWidth();
                a.remove()
            }
            return c
        };
        //console.log($.scrollbarWidth());

        //Header Login
        var colors = new Array(
            [66, 39, 91], [115, 75, 109], [0, 92, 150], [54, 55, 149], [255, 0, 255], [255, 128, 0]
        );
        var step = 0;
        var colorIndices = [0, 1, 2, 3];
        var gradientSpeed = 0.01;

        function updateGradient() {
            if ($ === undefined) return;

            var c0_0 = colors[colorIndices[0]];
            var c0_1 = colors[colorIndices[1]];
            var c1_0 = colors[colorIndices[2]];
            var c1_1 = colors[colorIndices[3]];

            var istep = 1 - step;
            var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
            var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
            var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
            var color1 = "rgb(" + r1 + "," + g1 + "," + b1 + ")";

            var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
            var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
            var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
            var color2 = "rgb(" + r2 + "," + g2 + "," + b2 + ")";

            $('.gradient').css({
                background: "-webkit-gradient(linear, left top, right top, from(" + color1 + "), to(" + color2 + "))"
            }).css({
                background: "-moz-linear-gradient(left, " + color1 + " 0%, " + color2 + " 100%)"
            });

            step += gradientSpeed;
            if (step >= 1) {
                step %= 1;
                colorIndices[0] = colorIndices[1];
                colorIndices[2] = colorIndices[3];
                colorIndices[1] = (colorIndices[1] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;
                colorIndices[3] = (colorIndices[3] + Math.floor(1 + Math.random() * (colors.length - 1))) % colors.length;
            }
        }
        setInterval(updateGradient, 10);

        //Active
        var pageTitle = $("h1.md-title-page").eq(0),
        text = pageTitle.text();
        var current_title = $.trim(text);
        //Main Nav
        $("a[name=topnav]").each(function() {
            var a = $(this).attr("data-tooltip");
            if (current_title.substring(0, a.length) === a) {
                $(this).closest('li').addClass("active");
            }
        });
        //Sub Nav
        $("a[name=subnav]").each(function() {
            var b = $(this).attr("data-tooltip");
            if (current_title.substring(0, b.length) === b) {
                $(this).closest('li').addClass("uk-active");
            }
        });
        //manual
        var a = $(".md-subnav li.uk-active a").text();
        var b = "Create Instagram Project";
        var c = "Create Report";
        var d = "View Report";
        if (a==b) {
            $('li.nav-newproject').addClass("active");
        } else if ((a==c)||(a==d)) {
            $('li.nav-report').addClass("active");
        }


        //Modal
        $('.modal-trigger').leanModal();

        //Dropdown
        $('.dropdown-button').dropdown({
            belowOrigin: true
        });

        //search
        $('.emptysearch').click(function() {
            $('input#search').val('');
            //$('input#search').empty();
        });

        //Login Validate
        $("form[name='login']").validate({
            rules: {
                username: "required",
                password: {
                    required: true,
                    minlength: 5
                }
            },
            messages: {
                username: "Please enter your username",
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                }
            },
            debug: true,
            errorClass: "invalid",
            validClass: "valid",
            errorPlacement: function(error, element) {
                $(element)
                    .closest("form")
                    .find("label[for='" + element.attr("id") + "']")
                    .attr("data-error", error.text());
            },
            submitHandler: function(form) {
                console.log("Form OK");
                form.submit();
            }
        });

        //Step Keyword
        $(".md-steps li.uk-active").prevAll().addClass("md-active");
        $(".md-steps li").on("click", function() {
            $(".md-steps li").removeClass("uk-active").prevAll().removeClass("md-active");
            $(this).addClass("uk-active").prevAll().addClass("md-active");
        });

    }); // end of document ready
})(jQuery);
