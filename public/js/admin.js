$(function() {

    $( ".editable" ).each(function( index ) {
        //console.log( index + ": " + $( this ).text() );
        //edited_content[index] = {data_id: $( this ).attr('id'), value: $( this ).html()};
        if ($( this ).html() === '' || $( this ).html() === '<br>'){ $( this ).html('Please edit this default dummy text (you need to login).'); }
        $( this ).addClass('mousetrap');
    });


      $('#enable').button().click(function() {
        $('.editable').hallo({
          plugins: {
            'halloindicator': {},
            'halloformat': {},
            'halloheadings': {},
            'hallojustify': {},
            'hallolists': {},
            'hallolink': {},
            'halloreundo': {}/*,
            'halloimage': {
                search: function(query, limit, offset, successCallback) {
                    response = {offset: offset, total: limit + 1, assets: searchresult.slice(offset, offset+limit)};
                    successCallback(response);
                },
                suggestions: null,
                uploadUrl: function() {
                  return '/some/example/url'
                }
            }*/
            ,
            'hallocleanhtml': {
              format: true,
              allowedTags: ['pre', 'p', 'em', 'strong', 'br', 'div', 'ol', 'ul', 'li', 'a'],
              allowedAttributes: ['style']
            }
          },
          editable: true,
          toolbar: 'halloToolbarFixed'
        })
        .hallo('protectFocusFrom', $('#enable'));

        $('.editable').bind('hallomodified', function(event, data) {
            //console.log(data.content);
            var this_id = $(this).attr('pre-id');
            var id_data = _.findWhere(edited_content, {data_id: this_id});
            if(!id_data){
                var push_elem = {data_id: this_id, value: data.content};
                edited_content.push(push_elem);
                //console.log(edited_content);
            }else{
                var index = _.indexOf(edited_content, id_data);            
                _.extend(edited_content[index], {value: data.content});
            }
            if(_.isEmpty(edited_content)){
                $('.save-button').fadeOut('fast');
                $('.cancel-button').fadeOut('fast');
            }else{
                var admin_visible = $('.admin').is(':visible');
                if (!admin_visible){
                    $( ".show-admin" ).click();
                };
                $('.save-button').fadeIn('fast');
                $('.cancel-button').fadeIn('fast');
            };
        });

        $('.editable').bind('hallorestored', function(event, data) {
            $('#modified').html("restored");
            edited_content = [];
        });

        $('.editable').bind('halloselected', function(event, data) {
            $('#modified').html("Selection made");
        });
        $('.editable').bind('hallounselected', function(event, data) {
            $('#modified').html("Selection removed");
        });
      });
      
      $('#enable').button().click();
      
      $('#disable').button().click(function() {
        $('.editable').hallo({editable: false});
      });

      $('.editable').bind('hellodeactivated', function() {
        $(this).hallo({editable:false});
      });


    // map multiple combinations to the same callback
    Mousetrap.bind(['ctrl+alt+s','command+alt+s'], function() {
        //console.log('ALT + S: Save editted content');
        API.contents.updateContents(edit_content_holder)
        // return false to prevent default browser behavior
        // and stop event from bubbling
        return false;
    });
});