var index = 0;  //show index of data(commit)

var first = 1;  //when first commit star 
var star;

getCommit();

$(document).ready(function() {
    $('input[type=radio][name=star]').change(function() {
		star =  $(this).attr('id').substring(5);
		if (first){
			//add a commit input
			$(".commit").html("<input type='text' name='commit' maxlength='20' > <button style='display:none' onclick='commit_submit();'></button>");
			$("input[name='commit']").focus();
			first = 0;
		}
    });
});

function commit_submit(){
	event.preventDefault();
	//http://blog.webgolds.com/view/242

    var pathArray = window.location.pathname.split( '/' );
    var content = $(".commit input").val().substring(0,20);
    if ( content == removeTags(content) ){
        var commit = removeTags(content);
    }else{
        console.log("包含非法字串");
        return ;
    }

    $.ajax({
        url:"/Request/course/star",
        data:{
        	"star": star,
           	"commit": commit,
            "CID": pathArray[2]
        },
        type:'post',
        success:function(data){
            if (data.status == true){
            	console.log( "success", data.results );
            	$(".commit input").val("");
            	window.location.reload()
            }else{
                if (data.results == "please login"){
                    //please login
                }
            	console.log( "There was a problem", data );
            }
        },
        error:function(data){
            console.log( "error", data );
        }
    }); 	
}

function getCommit(){

    var pathArray = window.location.pathname.split( '/' );  
    $.ajax({
        url:"/Request/course/getCommit",
        data:{
            "CID": pathArray[2],
            "index": index
        },
        type:'post',
        success:function(data){
            
            if (data.status == true){
                var Data = JSON.parse( data.results );
                var avg = data.results.AVG;

                var string = "";

                $.each( Data.Result , function(i,e){
                    console.log( i, e );

                    //please reference home.js ;0
                });

                index = index + 5;

            }else{
                console.log( "There was a problem", data );
            }
        },
        error:function(data){
            console.log( "error", data );
        }
    });    
}

// function htmlEncode(value){
//   //create a in-memory div, set it's inner text(which jQuery automatically encodes)
//   //then grab the encoded contents back out.  The div never exists on the page.
//   return $('<div/>').text(value).html();
// }

// function htmlDecode(value){
//   return $('<div/>').html(value).text();
// }

function removeTags(txt){
    var rex = /(<([^>]+)>)/ig;
    return txt.replace(rex , "");
}