$(function(){
     //Add keywords repeater
     $('.add_key').click(function(){
        var k = $(".key").length + 1;
        var fieldKey = '<div id="key-'+k+'" class="key uk-panel uk-panel-box uk-margin-bottom"> \
             <ul class="uk-grid uk-grid-small uk-grid-width-medium-1-4 key-op-'+k+'"> \
                  <li> \
                       <label class="label_key"><i class="material-icons">label</i></label> \
                       <input type="text" data-key-group="'+k+'" name="field_key['+k+'][]" value="" placeholder="Write keyword here" /> \
                  </li> \
             </ul> \
             <a class="dropdown-button uk-button teal darken-4 white-text" data-activates="dropkey-'+k+'" title="Add Form"><i class="uk-icon uk-icon-plus-square"></i> Add Form</a> \
             <ul id="dropkey-'+k+'" class="dropdown-content"> \
                  <li><a href="javascript:void(0);" class="add_and" onclick="addKey('+k+', \'and\')"> AND</a></li> \
                  <li><a href="javascript:void(0);" class="add_or" onclick="addKey('+k+', \'or\')"> OR</a></li> \
                  <li><a href="javascript:void(0);" class="add_not" onclick="addKey('+k+', \'not\')"> NOT</a></li> \
             </ul> \
             <a class="uk-button uk-margin-remove right red white-text remove_key" onclick="removeKey(this)" title="Remove Keyword"><i class="uk-icon uk-icon-minus-square"></i> Remove Keyword</a> \
        </div>';
       $('.wrap_keys').append(fieldKey);
       $('.dropdown-button').dropdown();
     });
     //Add topics repeater
     $('.add_topic').click(function(){
        var t = $(".topic").length + 1;
        var fieldTopic = '<div id="topic-'+t+'" class="topic uk-panel uk-panel-box uk-margin-bottom"> \
             <ul class="uk-grid uk-grid-small uk-grid-width-medium-1-4 topic-op-'+t+'"> \
                  <li> \
                       <label class="label_topic"><i class="material-icons">label</i></label> \
                       <input type="text" data-topic-group="'+t+'" name="field_topic['+t+'][]" value="" placeholder="Write topic here" /> \
                  </li> \
             </ul> \
             <a class="dropdown-button uk-button teal darken-4 white-text" data-activates="droptopic-'+t+'" title="Add Form"><i class="uk-icon uk-icon-plus-square"></i> Add Form</a> \
             <ul id="droptopic-'+t+'" class="dropdown-content"> \
                  <li><a href="javascript:void(0);" class="add_and" onclick="addTopic('+t+', \'and\')"> AND</a></li> \
                  <li><a href="javascript:void(0);" class="add_or" onclick="addTopic('+t+', \'or\')"> OR</a></li> \
                  <li><a href="javascript:void(0);" class="add_not" onclick="addTopic('+t+', \'not\')"> NOT</a></li> \
             </ul> \
             <a class="uk-button uk-margin-remove right red white-text remove_topic" onclick="removeTopic(this)" title="Remove Topic"><i class="uk-icon uk-icon-minus-square"></i> Remove Topic</a> \
        </div>';
      $('.wrap_topics').append(fieldTopic);
      $('.dropdown-button').dropdown();
     });
     //Add topics exclude
     $('.add_excld').click(function(){
        var e = $(".excld").length + 1;
        var fieldExcld = '<div id="excld-'+e+'" class="excld uk-panel uk-panel-box uk-margin-bottom"> \
             <ul class="uk-grid uk-grid-small uk-grid-width-medium-1-4 excld-op-'+e+'"> \
                  <li> \
                       <label class="label_excld"><i class="material-icons">label</i></label> \
                       <input type="text" data-excld-group="'+e+'" name="field_excld['+e+'][]" value="" placeholder="Write exclude here" /> \
                  </li> \
             </ul> \
             <a class="dropdown-button uk-button teal darken-4 white-text" data-activates="dropexcld-'+e+'" title="Add Form"><i class="uk-icon uk-icon-plus-square"></i> Add Form</a> \
             <ul id="dropexcld-'+e+'" class="dropdown-content"> \
                  <li><a href="javascript:void(0);" class="add_and" onclick="addExcld('+e+', \'and\')"> AND</a></li> \
                  <li><a href="javascript:void(0);" class="add_or" onclick="addExcld('+e+', \'or\')"> OR</a></li> \
                  <li><a href="javascript:void(0);" class="add_not" onclick="addExcld('+e+', \'not\')"> NOT</a></li> \
             </ul> \
             <a class="uk-button uk-margin-remove right red white-text remove_excld" onclick="removeExcld(this)" title="Remove Exclude"><i class="uk-icon uk-icon-minus-square"></i> Remove Exclude</a> \
        </div>';
      $('.wrap_exclds').append(fieldExcld);
      $('.dropdown-button').dropdown();
     });

     //Advanced keywords repeater
     $('.add_advkey').click(function(){
        var k = $(".advkey").length + 1;
        var fieldKey = '<div class="advkey"> \
               <textarea id="key-'+k+'" name="adv_field_key['+k+']" class="materialize-textarea uk-margin-small-bottom"></textarea> \
               <a href="javascript:void(0);" class="uk-button uk-button-mini red accent-2 remove_form" onclick="removeAdvKey(this)" title="Delete This"><i class="uk-icon uk-icon-close"></i></a> \
          </div>';
       $('.wrap_advkeys').append(fieldKey);
     });

     //Advanced topic repeater
     $('.add_advtopic').click(function(){
        var t = $(".advtopic").length + 1;
        var fieldTopic = '<div class="advtopic"> \
               <textarea id="topic-'+t+'" name="adv_field_topic['+t+']" class="materialize-textarea uk-margin-small-bottom"></textarea> \
               <a href="javascript:void(0);" class="uk-button uk-button-mini red accent-2 remove_form" onclick="removeAdvTopic(this)" title="Delete This"><i class="uk-icon uk-icon-close"></i></a> \
          </div>';
       $('.wrap_advtopics').append(fieldTopic);
     });
     //Advanced exclude repeater
     $('.add_advexcld').click(function(){
        var e = $(".advexcld").length + 1;
        var fieldExcld = '<div class="advexcld"> \
               <textarea id="excld-'+e+'" name="adv_field_excld['+e+']" class="materialize-textarea uk-margin-small-bottom"></textarea> \
               <a href="javascript:void(0);" class="uk-button uk-button-mini red accent-2 remove_form" onclick="removeAdvExcld(this)" title="Delete This"><i class="uk-icon uk-icon-close"></i></a> \
          </div>';
       $('.wrap_advexclds').append(fieldExcld);
     });

    $('.project-form').on('submit', function(e) {
        e.preventDefault();
        $( ".field-key" ).each(function( index ) {
            var oldVal = $( this ).val();
            var action = $(this).attr('data-prefix');
            $(this).val(action + ' ' + oldVal);
        });
        $( ".field-topic" ).each(function( index ) {
            var oldVal = $( this ).val();
            var action = $(this).attr('data-prefix');
            $(this).val(action + ' ' + oldVal);
        });
        $( ".field-excld" ).each(function( index ) {
            var oldVal = $( this ).val();
            var action = $(this).attr('data-prefix');
            $(this).val(action + ' ' + oldVal);
        });
        this.submit();
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

//keyword
function addKey(id, type) {
    var wrapper = $('.key-op-' + id);
    var keyOpNum = $('.key-op-' + id + ' li').length + 1;
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
    // console.log(label);
    var removeForm = '<a href="javascript:void(0);" class="uk-button uk-button-mini red accent-2 remove_form" onclick="deleteKey(this)" title="Delete This"><i class="uk-icon uk-icon-close"></i></a>';
    var fieldForm = '<li class="input_'+label+'"><label>'+label+'</label><input class="field-key" data-key-group="'+id+'" type="text" name="field_key['+id+'][]" data-prefix="'+label+'" value=""/>'+removeForm+'</li>';
    $(wrapper).append(fieldForm);
}

function deleteKey(el) {
    $(el).closest('li').remove();
}

function removeKey(el) {
    $(el).closest('div.key').remove();
}

function removeAdvKey(el) {
    $(el).closest('div.advkey').remove();
}

//topic
function addTopic(id, type) {
    var wrapper = $('.topic-op-' + id);
    var topicOpNum = $('.topic-op-' + id + ' li').length + 1;
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
    //console.log(label);
    var removeForm = '<a href="javascript:void(0);" class="uk-button uk-button-mini red accent-2 remove_form" onclick="deleteTopic(this)" title="Delete This"><i class="uk-icon uk-icon-close"></i></a>';
    var fieldForm = '<li class="input_'+label+'"><label>'+label+'</label><input class="field-topic" data-topic-group="'+id+'" type="text" name="field_topic['+id+'][]" data-prefix="'+label+'" value=""/>'+removeForm+'</li>';
    $(wrapper).append(fieldForm);
}

function deleteTopic(el) {
    $(el).closest('li').remove();
}

function removeTopic(el) {
    $(el).closest('div.topic').remove();
}
function removeAdvTopic(el) {
    $(el).closest('div.advtopic').remove();
}
//exclude
function addExcld(id, type) {
    var wrapper = $('.excld-op-' + id);
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
    //console.log(label);
    var removeForm = '<a href="javascript:void(0);" class="uk-button uk-button-mini red accent-2 remove_form" onclick="deleteExcld(this)" title="Delete This"><i class="uk-icon uk-icon-close"></i></a>';
    var fieldForm = '<li class="input_'+label+'"><label>'+label+'</label><input class="field-excld" data-excld-group="'+id+'" type="text" name="field_excld['+id+'][]" data-prefix="'+label+'" value=""/>'+removeForm+'</li>';
    $(wrapper).append(fieldForm);
}

function deleteExcld(el) {
    $(el).closest('li').remove();
}

function removeExcld(el) {
    $(el).closest('div.excld').remove();
}

function removeAdvExcld(el) {
    $(el).closest('div.advexcld').remove();
}

function previewAdavancedQuery() {
    // keywords
    var output = '<h6>Keywords</h6>';
    var x = 1;
    $('textarea[name^="adv_field_key"]').each(function() {
        var keyword = $(this).val();
        if (x > 1) {
            output += '<br>';
        }
        output += keyword;
        x++;
    });

    // topic
    output += '<br><br><h6>Topic</h6>';
    var x = 1;
    $('textarea[name^="adv_field_topic"]').each(function() {
        var keyword = $(this).val();
        if (x > 1) {
            output += '<br>';
        }
        output += keyword;
        x++;
    });

    // exclude
    output += '<br><br><h6>Exclude</h6>';
    var x = 1;
    $('textarea[name^="adv_field_excld"]').each(function() {
        var keyword = $(this).val();
        if (x > 1) {
            output += '<br>';
        }
        output += keyword;
        x++;
    });

    $('.previewquery').html(output);
}

function previewQuery() {
    // keyword
    var group = 1;
    var output = '<h6>Keywords</h6>';
    $('input[name^="field_key"]').each(function() {
        var dataGroup = $(this).attr('data-key-group');
        var action = '';
        var keyword = $(this).val();
        if (dataGroup != group) {
            output += '<br>';
        }
        if ($(this).attr('data-prefix') == null) {
            action = '';
        } else {
            action += $(this).attr('data-prefix') + '&nbsp;';
        }
        output += '&nbsp;' + action + keyword
        group = dataGroup;
    });

    // topic
    var topicGroup = 1;
    output += '<br><br><h6>Topic</h6>';
    $('input[name^="field_topic"]').each(function() {
        var dataGroup = $(this).attr('data-topic-group');
        var action = '';
        var topic = $(this).val();
        if (dataGroup != topicGroup) {
            output += '<br>';
        }
        if ($(this).attr('data-prefix') == null) {
            action = '';
        } else {
            action += $(this).attr('data-prefix') + '&nbsp;';
        }
        output += '&nbsp;' + action + topic
        topicGroup = dataGroup;
    });

    // topic
    var excldGroup = 1;
    output += '<br><br><h6>Exclude</h6>';
    $('input[name^="field_excld"]').each(function() {
        var dataGroup = $(this).attr('data-excld-group');
        var action = '';
        var excld = $(this).val();
        if (dataGroup != excldGroup) {
            output += '<br>';
        }
        if ($(this).attr('data-prefix') == null) {
            action = '';
        } else {
            action += $(this).attr('data-prefix') + '&nbsp;';
        }
        output += '&nbsp;' + action + excld
        excldGroup = dataGroup;
    });

    $('.previewquery').html(output);
}
