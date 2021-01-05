@push('scripts')
<script>
    @if (count($errors) > 0)
        $('#addlocationModal').modal('show');
    @endif
</script>
<script>
    $(".approveBtn").click(function(e){
        e.preventDefault();
        var id = $(this).data("id")

        $.ajax({
            url: 'inspection/'+id+'/approve',
            type: "POST",
            data: {
                "_token": "{{ csrf_token() }}",
                id: id,
            },
            dataType: 'json',
        success: function (data) {
            alert(data.message)
            location.reload();
        }
    }); 

    $(".assignBtn").click(function(e){
        debugger
        // e.preventDefault();
        // var id = $(this).data("id")

        // $.ajax({
        //     url: 'inspection/'+id+'/assign',
        //     type: "POST",
        //     data: {
        //         "_token": "{{ csrf_token() }}",
        //         id: id,
        //     },
        //     dataType: 'json',
        // success: function (data) {
        //     alert(data.message)
        //     location.reload();
        // }
    }); 
});
</script>
<script type="text/javascript">
    $('.showImage').click(function(){
        var image = $(this).data('picture');
        $('#showImageModal').html('<img src="' + $(this).data('picture') + '"/>')

        // $('#showImageModal').modal('show');src="{{ asset('images/inspection_files').'/'.$inspection->picture }}"
    })
</script>
<script src="{{ asset('assets/js/lib/data-table/datatables.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/jszip.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/vfs_fonts.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.html5.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.print.min.js') }}"></script>
<script src="{{ asset('assets/js/lib/data-table/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('assets/js/init/datatables-init.js') }}"></script>
<script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js"> </script>
<script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js"></script>
<script type="text/javascript" src="{{ asset('assets/js/webcam.js') }}"></script>
<script src="{{ asset('assets/js/jquery.base64.min.js') }}"></script>

<script src="text/javascript">
    $(function () {
        $('#datetimepicker1').datetimepicker({
            dateFormat: "dd-mm-yy", 
        });
    });
</script>
<script language="JavaScript">
    Webcam.set({
        width: 500,
        height: 300,
        image_format: 'jpeg',
        jpeg_quality: 500
    });
    Webcam.attach( '#my_camera' );
</script>
{{-- Closing date model --}}
<div class="modal fade" id="closingDateModal" tabindex="-1" role="dialog" aria-labelledby="closingDateModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="closingDateModalLabel">Closing Date</h5> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group" >
                    <label for="Select date">Select Closing Date</label>
                    <input class="form-control" type="date" name="date"  value="{{old('date')}}">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btn-sm">Save</button>
            </div>
        </div>
    </div>
</div>

{{-- Status --}}
<div class="modal fade" id="selectStatusModel" tabindex="-1" role="dialog" aria-labelledby="selectStatusModelLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="selectStatusModelLabel">Select Status</h5> 
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group" >
                    <label for="Select date">Select Status</label>
                    <select name="status" id="status" class="form-control">
                        <option value="">Select Status</option>
                        <option value="1">Open</option>
                        <option value="0">Close/option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary btn-sm">Save</button>
            </div>
        </div>
    </div>
</div>
@endsection