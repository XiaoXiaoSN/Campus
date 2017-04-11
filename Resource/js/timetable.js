function getTimetable(){
    $.ajax({
        url:"/api/get_timetable",
        type:'post',
        success:function(data){
            console.log( "success", data );
        },
        error:function(data){
            console.log( "error", data );
        }
    }); 
}

getTimetable();


var temp = {
    1: ["D1","D2","D3","D8"],
    2: ["D1","D7","D8"],
    3: ["D1","D7"]
};

function getCoursefrTime(){
    $.ajax({
        url:"/api/getCoursefrTime",
        type:'post',
        data: {"data" : temp},
        success:function(data){
            console.log( "success", data );
        },
        error:function(data){
            console.log( "error", data );
        }
    }); 
}

getCoursefrTime();