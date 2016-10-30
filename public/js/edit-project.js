$(function() {
    //Advanced keywords repeater
    $('.add_advkey').click(function () {
        var k = $(".advkey").length + 1;
        var fieldKey = '<div class="advkey"> \
               <textarea id="key-' + k + '" name="field_key[' + k + ']" class="materialize-textarea uk-margin-small-bottom"></textarea> \
               <a href="javascript:void(0);" class="uk-button uk-button-mini red accent-2 remove_form" onclick="removeAdvKey(this)" title="Delete This"><i class="uk-icon uk-icon-close"></i></a> \
          </div>';
        $('.wrap_advkeys').append(fieldKey);
    });
    //Advanced topic repeater
    $('.add_advtopic').click(function () {
        var t = $(".advtopic").length + 1;
        var fieldTopic = '<div class="advtopic"> \
               <textarea id="topic-' + t + '" name="field_topic[' + t + ']" class="materialize-textarea uk-margin-small-bottom"></textarea> \
               <a href="javascript:void(0);" class="uk-button uk-button-mini red accent-2 remove_form" onclick="removeAdvTopic(this)" title="Delete This"><i class="uk-icon uk-icon-close"></i></a> \
          </div>';
        $('.wrap_advtopics').append(fieldTopic);
    });
    //Advanced exclude repeater
    $('.add_advexcld').click(function () {
        var e = $(".advexcld").length + 1;
        var fieldExcld = '<div class="advexcld"> \
               <textarea id="excld-' + e + '" name="field_excld[' + e + ']" class="materialize-textarea uk-margin-small-bottom"></textarea> \
               <a href="javascript:void(0);" class="uk-button uk-button-mini red accent-2 remove_form" onclick="removeAdvExcld(this)" title="Delete This"><i class="uk-icon uk-icon-close"></i></a> \
          </div>';
        $('.wrap_advexclds').append(fieldExcld);
    });

    //INSTAGRAM
    $(".chips-hashtag").material_chip();
    $(".chips-excldhashtag").material_chip();
    $(".chips-user").material_chip();
    $(".chips-exclduser").material_chip();

    var htag = $(".wrap_hashtag .chips").material_chip('data');
    $('.wrap_hashtag  .chips').on('chip.add', function(e, chip){
         console.log(htag);
    });
});

function removeAdvKey(el) {
    $(el).closest('div.advkey').remove();
}

function removeAdvTopic(el) {
    $(el).closest('div.advtopic').remove();
}

function removeAdvExcld(el) {
    $(el).closest('div.advexcld').remove();
}
