/*
 * gravatar
 *
 *
 * Copyright (c) 2013 Emiliano Zilocchi
 * Licensed under the MIT license.
 */

(function ($) {

  $.gravatar = function (options) {
    $.ajax({
      method: "GET",
      dataType: "JSONP",
      crossDomain: true,
      url: 'http://en.gravatar.com/' + options.profile + '.json',
      success: function(response) {
        var profile = response.entry[0];
        options.success(profile);
      },
      complete: options.complete,
      error: options.error
    });
  };

  $.fn.gravatar = function (profile) {
    var that = this;
    var options = {
      profile: profile,
      success: function(profile) {
        that.each(function () {
          $(this).find('.displayName').text(profile.displayName);

          var thumbnail = $(this).find('.thumbnailUrl');
          if(thumbnail.prop('tagName') === 'IMG') {
            thumbnail.attr('src', profile.thumbnailUrl);
          } else {
            var image = $('<img></img>').attr('src', profile.thumbnailUrl);
            thumbnail.append(image);
          }

          var list = $('<ul class="urls"></ul>');
          $.each(profile.urls, function() {
            var a = $('<a target="_blank"></a>').attr('href', this.value).text(this.title);
            var li = $('<li class="url"></li>').append(a);
            list.append(li);
          });
          $(this).find('.urls').append(list);

          var imsList = $('<ul class="ims-list"></ul>');
          $.each(profile.ims, function() {
            var h6 = $('<h6></h6>').text(this.type);
            var p = $('<p></p>').text(this.value);
            var li = $('<li class="ims-item"></li>').append(h6).append(p);
            imsList.append(li);
          });
          $(this).find('.ims').append(imsList);

          var template = $(this);
          $.each(profile.emails, function() {
            if(this.primary === "true") {
              var mailTo = $('<a></a>').text(this.value).attr('href', 'mailto:' + this.value);
              template.find('.email').append(mailTo);
            }
          });
        });
      }
    };
    $.gravatar(options);
    return this.each(function () { $(this); });
  };

}(jQuery));


$(function() {
    if ("geolocation" in navigator) {
        $('.js-geolocation').show();
    } else {
        $('.js-geolocation').hide();
    }

    /**/
    $('.js-geolocation').on('click', function() {
        navigator.geolocation.getCurrentPosition(function(position) {
            loadWeather(position.coords.latitude + ',' + position.coords.longitude); //load weather using your lat/lng coordinates
        });
    });
    /*
     */
    loadWeather('Jakarta', ''); //@params location, woeid

    function loadWeather(location, woeid) {
        $.simpleWeather({
            location: location,
            woeid: woeid,
            unit: 'c',
            success: function(weather) {
                html = '<span class="loc">' + weather.city + ', ' + weather.region + '</span>';
                html += '<span class="temp"><i class="icon-' + weather.code + '"></i> ' + weather.temp + '&deg;' + weather.units.temp + '</span>';
                html += '<span class="currently">' + weather.currently + '</span>';

                $("#weather").html(html);
            },
            error: function(error) {
                $("#weather").html('<span class="uk-alert-danger">' + error + '</span>');
            }
        });
    }

    var useremail = $('.user #email').val();
    $('.gravatar').gravatar(useremail);
    $('.gravmail').html(useremail);
    $('.appusername').html('USERNAME');

});
function editProfile(e) {
    $('input[disabled]').attr('disabled',false);
}
function addSocmed(type) {
    var wrapper = $('.addsocmed');
    var label = '';
    switch (type) {
        case 'twitter':
            label = 'Twitter';
            icon = 'twitter-square';
            color = ' light-blue-text text-lighten-2';
            break;
        case 'facebook':
            label = 'Facebook';
            icon = 'facebook-square';
            color = ' blue-text text-darken-4';
            break;
        case 'youtube':
            label = 'Youtube';
            icon = 'youtube-square';
            color = ' red-text';
            break;
        case 'instagram':
            label = 'Instagram';
            icon = 'instagram';
            color = ' brown-text';
            break;
    }
    //var removeForm = '<a href="javascript:void(0);" class="uk-button uk-button-mini red accent-2 remove_form" onclick="deleteKey(this)" title="Delete This"><i class="uk-icon uk-icon-close"></i></a>';
    var fieldForm = '<div class="row"> \
        <div class="input-field col s12"> \
            <a href="javascript:void(0);" onclick="delSocmed(this)" class="right red-text delsocmed" title="Delete This"><i class="uk-icon-remove"></i></a> \
            <i class="uk-icon-'+icon+' prefix '+color+'"></i> \
            <input value="" id="'+label+'[1][]" type="text"> \
            <label for="'+label+'[1][]">'+label+'</label> \
        </div> \
    </div>';
    $(wrapper).append(fieldForm);
}
function delSocmed(e) {
    $(e).closest('.row').remove();
}
