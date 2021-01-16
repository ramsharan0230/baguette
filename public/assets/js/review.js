$(".review").on('click',function(e){
    e.preventDefault();
    var id = $(this).data("id")
    $.ajax({
        url: 'inspection/'+id+'/review',
        type: "GET",
        dataType: 'json',
        success: function (data) {
            $(".inner").empty();
            if(data.data.length>0){
                for ( var i = 0; i < data.data.length; i++ ) {
                    var date = (data.data[i].created_at).split('-')
                    var day = date[2].substring(0, 2)
                    $( "<div class=`alert alert-success` role=`alert`>"+data.data[i].remarks+" <small><i class=`fa fa-calender`></i>"+day+'/'+date[1]+'/'+date[0]+"</small></div>" ).appendTo( ".inner" );
                }
            }
            else{
                $( "<div class=`alert alert-success` role=`alert`>No Remarks Found</div>" ).appendTo( ".inner" );
            }
        }
    })
})