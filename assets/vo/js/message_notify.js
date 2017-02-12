// JavaScript Document
( function( window, Pusher, $) {
  
  Pusher.log = function( msg ) {
    if( window.console && window.console.log ) {
      window.console.log( msg );
    }
  };
 
  Pusher.channel_auth_endpoint = base_url+'user_comment/auth';
  
  var pusher = new Pusher( PUSHER_APP_KEY );
  pusher.connection.bind('state_change', function( change ) {
    var el = $('.connection-status');
    el.removeClass( change.previous );
    el.addClass( change.current );
  });

  var channel = pusher.subscribe( PUSHER_CHANNEL_NAME );
  channel.bind( 'new_message', addMessage );
 
  function addMessage( data ) {

    //對應帳號才進行留言
    if(loginType_user_id == data.table_id){

        $.notify({
          // options
          message: data.text
        },{
          // settings
          type: 'info'
        });
    }
    	
  }

  
})( window, window['Pusher'], jQuery );