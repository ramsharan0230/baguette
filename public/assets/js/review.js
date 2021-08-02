$(".review").on('click',function(e){
    e.preventDefault();
    var id = $(this).data("id")
    $.ajax({
        url: 'hygiene/inspection/'+id+'/review',
        type: "GET",
        dataType: 'json',
        success: function (data) {
            $('#review_text').empty(); $('#review_date').empty(); $('#serial_num').empty();
            if(data.data.length>0){
                $('#no_review_text').empty();
                var p =0;
                for ( var i = 0; i < data.data.length; i++ ) {
                    p++
                    var date = (data.data[i].created_at).split('-')
                    var day = date[2].substring(0, 2)

                    $( "<p>"+data.data[i].remarks+"</p>" ).appendTo( "#review_text" );
                    $( "<p>"+day+'/'+date[1]+'/'+date[0]+"</p>" ).appendTo( "#review_date" );
                    $( "<p>"+p+".</p>" ).appendTo( "#serial_num" );   
                }
            }
            else{
                $('#no_review_text').empty();
                $('<p style=`color:red`>No Remarks Found !!</p>').appendTo( "#no_review_text" );
            }
        }
    })
})