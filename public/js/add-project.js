$(function(){
    //Add form repeater
    var add_key = $('.add_key');
    var wrap_all = $('.wrap_all');
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
});

function addField(id, type) {
    var wrapper = $('.wrap_operation-' + id);
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
