$(function() {
    // Docs at http://simpleweatherjs.com

    /* Does your browser support geolocation? */
    if ("geolocation" in navigator) {
        $('.js-geolocation').show();
    } else {
        $('.js-geolocation').hide();
    }

    /* Where in the world are you? */
    $('.js-geolocation').on('click', function() {
        navigator.geolocation.getCurrentPosition(function(position) {
            loadWeather(position.coords.latitude + ',' + position.coords.longitude); //load weather using your lat/lng coordinates
        });
    });

    /*
     */
    $(document).ready(function() {
        loadWeather('Jakarta', ''); //@params location, woeid
    });

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


});
