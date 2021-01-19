$(".review").on('click',function(e){
    e.preventDefault();
    var id = $(this).data("id")
    $.ajax({
        url: 'inspection/'+id+'/reviewSiteman',
        type: "GET",
        dataType: 'json',
        success: function (data) {
            $(".float-left").empty();$(".float-right").empty();
            if(data.data.length>0){
                for ( var i = 0; i < data.data.length; i++ ) {
                    var date = (data.data[i].created_at).split('-')
                    var day = date[2].substring(0, 2)
                    $( "<p class=`text-light mt-1 m-0 reviewText`>"+data.data[i].remarks+"</p>" ).appendTo( ".float-left" );
                    $( "<p class=`text-light mt-1 m-0 reviewDate`>"+day+'/'+date[1]+'/'+date[0]+"</p>" ).appendTo( ".float-right" );
                }
            }
            else{
                $( "<div class=`alert alert-success` role=`alert`>No Remarks Found</div>" ).appendTo( ".inner" );
            }
        }
    })
})