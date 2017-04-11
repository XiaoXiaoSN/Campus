// $(".next-button").click(function(){
// 	NextStep();
// });

// $(".login-button").click(function(){
// 	Login();
// });

function NextStep(){
	$("input[name='account']").focus();
	var acc = $("input[name='account']").val();
	if( !checkAcc(acc) ){
		return false;
	}

	//ajax to backend
    $.ajax({
        url:"/Request/SignIn/sa",
        data:{
           "a": acc,
        },
        type:'post',
        success:function(data){
            if (data.status == true){
            	//console.log( "success", data.results );
	            $("input[name='XC']").val(data.results);
				$("input[name='account']").prop("readonly", true);
				//改動前端
					$("#PW").html('<input type="password" class="noto300" name="password"><label class="noto">密碼</label>');
					$(".next-button").addClass("login-button").removeClass("next-button").html("(・∀・)つ點我登入").attr("onclick", "Login();");
				//
				$("input[name='password']").focus();
            }else{
            	console.log( "There was a problem", data );
            }
        },
        error:function(data){
            console.log( "error", data );
        }
    }); 
}

function Login(){
	console.log("login butt click");
	var pw = $("input[name='password']").val();
	if( !checkPw(pw) ){
		return false;
	}

    $.ajax({
        url:"/Request/SignIn/sp",
        data:{
           "pw": pw,
           "tk": $("input[name='XC']").val()
        },
        type:'post',
        success:function(data){
            if (data.status == true){
            	console.log( "success", data.results );
            	$('#login-mod').closeModal();
            	window.location.reload()
            }else{
            	console.log( "There was a problem", data );
            }
        },
        error:function(data){
            console.log( "error", data );
        }
    }); 	
}

function ToggleModal(){
	$('#login-mod').modal('hide') ;
	$('#signup-mod').modal('show');

	$('.coupled.modal').modal({
    	allowMultiple: false
	});
	// attach events to buttons
	$('#login-mod').modal('closeModal', '.first.modal .togglebtn');
	// show first now
	$('#signup-mod').modal('show');
}
//use keyup or change  

function signup(){
	event.preventDefault();

	var signup = Array();
	signup['acc']	= $("input[name='signup_acc']").val();
	signup['pw']	= $("input[name='signup_pw']").val();
	signup['pwa']	= $("input[name='signup_pwa']").val();
	signup['mail']	= $("input[name='signup_mail']").val();
	

	//chack they are correct
	var check_flag = true;

	if ( !checkAcc(signup['acc']) ){
		check_flag = false;
		$('#errorMesgAcc').addClass("red").html("要6碼以上才可以齁");
	}
	else{
		$('#errorMesgAcc').removeClass("red").addClass("green").html('<div><i class="hand peace icon"></i>很好，你做對了</div>');	
	}
	
	if ( !checkPw(signup['pw']) ){
		check_flag = false;
		$('#errorMesgPw').addClass("red").html("就說要6個以上的英文加數字！");
	}
	else{
		$('#errorMesgPw').removeClass("red").addClass("green").html('<div><i class="hand peace icon"></i>很好，你做對了</div>');
		if ( signup['pw'] != signup['pwa'] ){
			check_flag = false;
			$('#errorMesgPwa').addClass("ui pointing below right basic label red").html("你怎麼打不一樣的？");
	}
	else
		$('#errorMesgPwa').addClass("ui pointing below right basic label green").html('<div><i class="hand peace icon"></i>很好，你做對了</div>');		
	}	
	
	if ( !validateEmail(signup['mail']) ){
		check_flag = false;
		$('#errorMesgMail').addClass("ui right pointing left basic label red").html("你是不是打錯了？");
	}
	else
		$('#errorMesgMail').addClass("ui right pointing left basic label green").html('<div><i class="hand peace icon"></i>很好，你做對了</div>');

	if ( check_flag ){
		//check account not exist		
	    $.ajax({
	        url:"/Request/Signup/ae",
	        data:{
	           "a": signup['acc']
	        },
	        type:'post',
	        success:function(data){
	            if (data.status == true){
	            	//account is exist
	            	$('#errorMesgMail').html('<div class="ui red basic label">這帳號被用了，你來遲了</div>');
	            	return;
	            }else{
	            	console.log( "this account can be use" );
	            }
	        },
	        error:function(data){
	            console.log( "error", data );
	            return ;
	        }
	    });     
	
	}else{
		return ;
	}

	//Sent the form 
    $.ajax({	
        url:"/Request/Signup/na",
        data:{
           "a": signup['acc'],
           "p": signup['pw'],
           "m": signup['mail']
        },
        type:'post',
        success:function(data){
            if (data.status == true){
            	console.log( data.results );
            	$('#signup-mod').closeModal();
            }else{
            	console.log( data.results );
            }
        },
        error:function(data){
        	console.log( "error", data );
            return ;
        }
    });  
}



//check account is eng,num or email
function checkAcc( str ) {
	if (str.length < 6)
		return false;

    var regExp = /^[\d|a-zA-Z]+$/;
    if ( regExp.test(str) || validateEmail(str) )
        return true;
    else
        return false;
}

function checkPw( str ) {
	if (str.length < 6)
		return false;

    var regExp = /^[\d|a-zA-Z]+$/;
    if (regExp.test(str))
        return true;
    else
        return false;
}

function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}