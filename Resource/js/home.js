// $.fn.search.settings.templates = {
//     message:function(e,t){
//         var s="";
//         return (s+='<div class="message '+t+'">',s+="empty"==t?'<div class="header noto">查無資料</div class="header"><div class="description">'+e+'</div class="description">':' <div class="description">'+e+"</div>",s+="</div>"),s
//     }

// }



var index; //use in show more result

$(".ui.search").search.settings.selector.prompt = ".c-prompt";
$(".ui.search").search.settings.searchDelay = 500;
$('.ui.search').search({
    apiSettings: {
        url: '/api/search/suggest',
        method:'post',
        urlData:true,
        beforeSend: function (settings) {
            settings.data = {
                "search": $("input[name=search]").val()
            };
            return settings;
        },
        onResponse: function(data) {
            var result = [];
            if( false == data.status ){
                return null;
            }
            $.each(data.results,function(i,d){
                result[i]={
                    title:d.id+" "+d.name,
                    price:d.prof+"<span class='meta'> 教授</span>",
                    description:d.sect+d.dep,
                    id:d.id
                };
            })
            console.log(data);
            return { results : result };
        },
    },
    minCharacters : 2,
    onSelect:function(result){
        if(result){
            window.location.href = "/Course/"+result.id;
        }
    },
    onResultsOpen:function(){
        $(".results").css({width:"80%","margin-left":"10%"}).addClass("noto");
        fullResultBtn = setInterval(function(){
            if( !$(".fullResultBtn").is(":visible") ){
				if( $(".results").children("a").length > 0 ){
                	$(".results").css({width:"80%","margin-left":"10%"}).addClass("noto")
	                .append('<a class="result fullResultBtn" onclick="showFullResult()";><div class="content noto" style="text-align:center">完整結果</div></a>').children().addClass("noto");
				}
            } else {
                fullResultBtn = null;
            }
        },800);
    },
    error : {
        noResults   : '沒有 阿阿阿 啾咪 >.^',
    },
});

function showFullResult(){
    $.ajax({
        url:"/api/search/all",
        data:{
           "search": $("input[name=search]").val()
        },
        type:'post',
        success:function(data){
            // console.log( "success", data );
            $result = '';
            $.each( data.results, function( index, each ){
                $result += $("#s-f-r-m-p").html()
                    .replace("{{data-ID}}",each.id)
                    .replace("{{ID}}","s-r-i-"+each.id)
                    .replace("{{link-ID}}",each.id)
                    .replace("{{Header}}","<span class='noto300' style='font-size: 1.3rem;'>"+each.name+"</span>")
                    .replace("{{Body}}",
                            "課程代碼 "+each.id+"<br />"+
                            "開課單位 "+each.dep+"<br />"+
                            "任課教授 "+each.prof+"<br />"
                    );
            });
           $(".s-f-r").html( $result );
           $('.collapsible').collapsible({
                accordion : false // A setting that changes the collapsible behavior to expandable instead of the default accordion style
            });
            $('#s-f-r-m').openModal();
            index = 1;
        },
        error:function(data){
            console.log( "error", data );
        }
    }); 

}

$("#more-meg").click(function(){
    showMoreResult();
});

function showMoreResult(){
    $.ajax({
        url:"/api/search/all",
        data:{
           "search": $("input[name=search]").val(),
           "index" : index
        },
        type:'post',
        success:function(data){
            console.log( "index", index );
            index = index+1;
            $result = '';
            $.each( data.results, function( index, each ){
                $result += $("#s-f-r-m-p").html()
                    .replace("{{data-ID}}",each.id)
                    .replace("{{ID}}","s-r-i-"+each.id)
                    .replace("{{link-ID}}",each.id)
                    .replace("{{Header}}","<span class='noto300' style='font-size: 1.3rem;'>"+each.name+"</span>")
                    .replace("{{Body}}",
                            "課程代碼 "+each.id+"<br />"+
                            "開課單位 "+each.dep+"<br />"+
                            "任課教授 "+each.prof+"<br />"
                    );
            });
            $(".s-f-r").append( $result );

        },
        error:function(data){
            console.log( "error", data );
        }
    }); 

}

$("li,.collapsible-header").click(function() {
    $(this).children(".collapsible-header").removeClass("truncate").children("i").html("keyboard_arrow_up");
    setTimeout(function(){
        $(".collapsible-header").not(".active").addClass("truncate").children("i").html("keyboard_arrow_down");

    },400);
});
 

$(".typedHere").typed({
    strings: [
            "Tenoz Campus",
            "探索你的想像力",
            "快速的搜尋方式^800，像是...",
            "梅興 D2-D4 星期二",
            "周賜福 早九",
            "WEB攻防 資工二",
            "人文通識 大二",
            "資工二 選修",
            "進修部 英文"
        ],
    typeSpeed: 100,
    loop: true,
    backDelay: 2000,
    showCursor: false,
});
