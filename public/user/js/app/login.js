
$(function(){

    var PlatcelLogin = {

    	animation : false,
    	sizeOrigin : 0,
        layer : $('.layer'),
        iconloader : $('.iconloader'),
        ingresa : $('.ingresa'),
        email : $('#email'),
        password : $('#password'),
        send : $('#send'),
        loadForm: function(){

            PlatcelLogin.email.focus();

            PlatcelLogin.email.bind('keypress',function(e) {
            	var length = PlatcelLogin.email.val().length;
            	
            	if( length != 0 && PlatcelLogin.sizeOrigin != length ){
            		PlatcelLogin.sizeOrigin = 0;
            		PlatcelLogin.animation = false;
            		PlatcelLogin.layer.css('display','none');
                    PlatcelLogin.iconloader.css('display','none');
                    PlatcelLogin.ingresa.css('display','block');

            	}
            });
            
            PlatcelLogin.password.bind('keypress',function(e) {

                if( PlatcelLogin.email.val().length > 6  ){
                	if( PlatcelLogin.animation === false  ){
                		PlatcelLogin.sizeOrigin = PlatcelLogin.email.val().length;
                		PlatcelLogin.animation = true;
                        PlatcelLogin.ingresa.css('display','none');
                        PlatcelLogin.send.css('display','block');
                		PlatcelLogin.iconloader.css('display','block');
	                		setTimeout(function(){
							  PlatcelLogin.layer.css('display','block');
							  PlatcelLogin.iconloader.css('display','none');
							}, 1500);
                	}
                }

                
            });
        },

        init : function(){
            PlatcelLogin.loadForm();
        }

    };

    PlatcelLogin.init();
});