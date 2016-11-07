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
        var p = $(".md-title-page").eq(0), x = p.text();
        var current_title = $.trim(x);

        var t = $(".md-card-toolbar-heading-text").eq(0), y = t.attr("data-title");
        var block_title = $.trim(y);
        //console.log(current_title);
        //console.log(block_title);

        //Main Nav
        $("a[name=topnav]").each(function(){
            var title = $(this).attr("title");
            //console.log(title);
            if (current_title === title) {
                $(this).closest('li').addClass("active");
            } else if ((current_title === "Create Report") || (current_title === "View Report")) {
                $('li.nav-report').addClass("active");
            } else if (block_title === title) {
                $(this).closest('li').addClass("active");
            }
        });

        //Sub Nav
        $("a[name=subnav]").each(function() {
            var b = $(this).attr("title");
            if (current_title === b) {
                $(this).closest('li').addClass("uk-active");
            }
        });


        //Modal
        $('.modal-trigger').leanModal();

        //Dropdown
        $('.dropdown-button').dropdown({
            belowOrigin: true
        });

        //Sidenav
        $('.button-collapse').sideNav({
            menuWidth: 220,
            edge: 'right'
        });
        $('.collapsible').collapsible();


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
                //console.log("Form OK");
                form.submit();
            }
        });

        //Step Keyword
        $("a.step8").click(function(){
            $("a.switchtopic")[0].click();
        });
        $("a.step12").click(function(){
            $("a.switchexcld")[0].click();
        });
        $("a.backtopic").click(function(){
            $("a.switchkeyword")[0].click();
        });
        $("a.backexcld").click(function(){
            $("a.switchtopic")[0].click();
        });


    }); // end of document ready
})(jQuery);

//Screenshot
function capture() {
    $('main').html2canvas({
        letterRendering: true,
        background: '#E6E6E6',
        onrendered: function (canvas) {
            var a = document.createElement('a');
            a.href = canvas.toDataURL("image/jpeg").replace("image/jpeg", "image/octet-stream");
            a.download = 'mediawave-platform.jpg';
            a.click();
        }
    });
}
