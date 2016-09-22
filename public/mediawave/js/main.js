(function ($) {
     //document ready
     $(function () {
          $.scrollbarWidth=function(){var a,b,c;if(c===undefined){a=$('<div style="width:50px;height:50px;overflow:auto"><div/></div>').appendTo('body');b=a.children();c=b.innerWidth()-b.height(99).innerWidth();a.remove()}return c};
          //console.log($.scrollbarWidth());

          //Header
          var colors = new Array(
               [66,39,91],
               [115,75,109],
               [0,92,150],
               [54,55,149],
               [255,0,255],
               [255,128,0]
          );
          var step = 0;
          var colorIndices = [0,1,2,3];
          var gradientSpeed = 0.01;

          function updateGradient(){
               if ( $===undefined ) return;

               var c0_0 = colors[colorIndices[0]];
               var c0_1 = colors[colorIndices[1]];
               var c1_0 = colors[colorIndices[2]];
               var c1_1 = colors[colorIndices[3]];

               var istep = 1 - step;
               var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
               var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
               var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
               var color1 = "rgb("+r1+","+g1+","+b1+")";

               var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
               var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
               var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
               var color2 = "rgb("+r2+","+g2+","+b2+")";

               $('.gradient').css({
                    background: "-webkit-gradient(linear, left top, right top, from("+color1+"), to("+color2+"))"
               }).css({
                    background: "-moz-linear-gradient(left, "+color1+" 0%, "+color2+" 100%)"
               });

               step += gradientSpeed;
               if ( step >= 1 ) {
                    step %= 1;
                    colorIndices[0] = colorIndices[1];
                    colorIndices[2] = colorIndices[3];
                    colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
                    colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
               }
          }
          setInterval(updateGradient,10);

          //Active Menu
          var current_title = $(document).attr("title").replace(' - MediaWave Platform', '');
          $("a[name=topnav]").each(function() {
               var a = $(this).attr("data-tooltip");
               if (current_title.substring(0, a.length) === a) {
                    $(this).closest('li').addClass("active")
               }
               else {
                    //$(this).removeClass('active');
               }
          });

          //Modal
          $('.modal-trigger').leanModal();

          //Dropdown
          $('.dropdown-button').dropdown({
               belowOrigin: true
          });

          //search
          $('.emptysearch').click(function(){
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
               errorPlacement: function (error, element) {
                    $(element)
                    .closest("form")
                    .find("label[for='" + element.attr("id") + "']")
                    .attr("data-error", error.text());
               },
               submitHandler: function (form) {
                    console.log("Form OK");
                    form.submit();
               }
          });

          //Step Keyword
          $(".md-steps li.uk-active").prevAll().addClass("md-active");
          $(".md-steps li").on("click", function(){
             $(".md-steps li").removeClass("uk-active").prevAll().removeClass("md-active");
             $(this).addClass("uk-active").prevAll().addClass("md-active");
          });

          //Add form repeater
          var add_key = $('.add_key');
          var wrap_all = $('.wrap_all');
          var k = 1;
          $(add_key).click(function(){
              var kk = $(".wrap_all .card").length + 1;
              //console.log('add key clicked with ' + kk + 'children');
               var fieldHTML_key = '<div id="key-'+kk+'" class="card z-depth-0"> \
                    <div class="card-content"> \
                         <ul class="uk-grid uk-grid-small uk-grid-width-medium-1-4 wrap_operation-'+kk+'"> \
                              <li> \
                                   <label class="label_key"><i class="material-icons">label</i></label> \
                                   <input type="text" name="field_keys['+kk+'][]" value=""/> \
                              </li> \
                         </ul> \
                    </div> \
                    <div class="card-action"> \
                         <a class="dropdown-button uk-button teal darken-4 white-text" data-activates="opdrop-'+kk+'" title="Add Form"><i class="uk-icon uk-icon-plus-square"></i> Add Form</a> \
                         <ul id="opdrop-'+kk+'" class="dropdown-content"> \
                              <li><a href="javascript:void(0);" class="add_and" onclick="addField('+kk+', \'and\')"> AND</a></li> \
                              <li><a href="javascript:void(0);" class="add_or" onclick="addField('+kk+', \'or\')"> OR</a></li> \
                              <li><a href="javascript:void(0);" class="add_not" onclick="addField('+kk+', \'not\')"> NOT</a></li> \
                         </ul> \
                         <a class="uk-button uk-margin-remove right red white-text remove_key" onclick="removeKey(this)" title="Remove Keyword"><i class="uk-icon uk-icon-minus-square"></i> Remove Keyword</a> \
                    </div> \
               </div>';
              $(wrap_all).append(fieldHTML_key);
              $('.dropdown-button').dropdown();
          });

         $('.project-form').on('submit', function(e) {
             e.preventDefault();
             $( ".field-keys" ).each(function( index ) {
                 var oldVal = $( this ).val();
                 var action = $(this).attr('data-prefix');
                 $(this).val(action + ' ' + oldVal);
             });
             this.submit();
         });


     }); // end of document ready
})(jQuery);



function addField(id, type) {
    var wrapper = $('.wrap_operation-' + id);
    // console.log(wrapper.getAttribute('id'));
    //console.log('add field' + id + ' with type ' + type);
    var label = '';
    switch (type) {
        case 'and':
            label = 'AND';
            break;
        case 'or':
            label = 'OR';
            break;
        case 'not':
            label = 'NOT';
            break;
    }
    console.log(label);
    var removebtn_and = '<a href="javascript:void(0);" class="uk-button uk-button-mini red accent-2 remove_and" onclick="deleteField(this)" title="Delete This"><i class="uk-icon uk-icon-close"></i></a>';
    var fieldHTML_and = '<li class="input_'+label+'"><label>'+label+'</label><input class="field-keys" type="text" name="field_keys['+id+'][]" data-prefix="'+label+'" value=""/>'+removebtn_and+'</li>';
    $(wrapper).append(fieldHTML_and);
}

function deleteField(el) {
    $(el).closest('li').remove();
}

function removeKey(el) {
    $(el).closest('div.card').remove();
}
