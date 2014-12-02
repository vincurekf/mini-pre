
var API = API || {};
var edited_content = [];
var edit_content_holder = [];
var orig_data;
API.contents = {
  getAll: function(){
    $.get( GLOBAL_URL+"content/", function( data ) {
        //console.log(data);
        orig_data = data;
        //$('*[pre-id]').fadeOut('fast');
        for (var i = 0; i < data.length; i++) {
            if(data[i].value === ''){
                //$('#'+data[i].data_id).html('please edit this value');
                $('*[pre-id="'+data[i].data_id+'"]').html('Edit me!');
            }else{
                //$('#'+data[i].data_id).html(data[i].value);
                $('*[pre-id="'+data[i].data_id+'"]').html(data[i].value);
                //$('*[pre-id="'+data[i].data_id+'"]').text(data[i].value);
                //console.log('*[pre-id="'+data[i].data_id+'"]: '+data[i].value);
            }
        }
    }, "json" );
  },
  updateContents: function(){
    /*
    console.log('edited_content:');
    console.log(edited_content);
    */
    if (!_.isEmpty(edited_content)){
        $.post( GLOBAL_URL+"content/update", { update_data: edited_content }, function( data ) {
            edited_content = [];
            $('.save-button').fadeOut('fast');
            $('.cancel-button').fadeOut('fast');
            /*
            console.log( data );
            console.log( edited_content );
            */
        }, "json");
    }
  },
  cancelEdit: function(){
    /*
    console.log('edited_content:');
    console.log(edited_content);
    */
    if (!_.isEmpty(orig_data)){
        for (var i = 0; i < orig_data.length; i++) {
            if(orig_data[i].value === ''){
                //$('#'+orig_data[i].data_id).html('please edit this value');
                $('*[pre-id="'+orig_data[i].data_id+'"]').html('Edit me!');
            }else{
                //$('#'+orig_data[i].data_id).html(orig_data[i].value);
                $('*[pre-id="'+orig_data[i].data_id+'"]').html(orig_data[i].value);
                //$('*[pre-id="'+data[i].data_id+'"]').text(data[i].value);
                //console.log('*[pre-id="'+data[i].data_id+'"]: '+data[i].value);
            }
            edited_content = [];
            $('.save-button').fadeOut('fast');
            $('.cancel-button').fadeOut('fast');
        }
    }
  }
}

$( ".show-admin" ).click(function() {
    $( ".admin" ).slideToggle( "fast", function() {
    // Animation complete.
    });
    $( this ).toggleClass( "light" );
});

API.contents.getAll();