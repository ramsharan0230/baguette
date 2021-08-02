<!doctype html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div style="width:100%">
                <h3 style="margin-left:570px">INSPECT REPORT</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <p style="background-color: #6696e3; color:white; font-weight:bold; width:101%; padding:10px; border: 1px solid black"> 
                    <span > From: </span> <span >Ahmad El Khatib & Ganesh Shankar</span>  
                    <span style="margin-right: 100px"> Site: </span> <span >Khalifa Kitchen (CPU)</span> 
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <p style="background-color: #6696e3; color:white; font-weight:bold; width:101%; padding:10px; border: 1px solid black"> 
                    <span style="margin-right: 100px"> To: </span> <span style="padding: 50px">Production & Supervisors Team</span> 
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-lg-12 col-md-12">
                <p style="background-color: #6696e3; color:white; font-weight:bold; width:101%; padding:10px; border: 1px solid black"> 
                    <span style="margin-right: 100px"> Date: </span> <span style="padding: 50px">{{ date("d-m-Y") }}</span>  
                    <span style="margin-left: 100px"> Time: </span> <span style="padding: 50px"> 9:00 am & 1:00 pm</span>  
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <table class="table table-bordered" >
                    <thead>
                      <tr style="background-color: #6696e3; color:white">
                        <th width="3%">No. </th>
                        <th width="5%">Area/Location <br>Building/Level</th>
                        <th width="6%">Date</th>
                        <th width="15%">Findings</th>
                        <th width="13%">Picture</th>
                        <th width="15%">Proposed Corrective Action</th>
                        <th width="5%">Accountibility</th>
                        <th width="4%">Status</th>
                        <th width="5%">Closing Date</th>
                      </tr>
                    </thead>
                    <tbody>
            
                        @forelse ($inspections as $key => $inspection)
                        <tr>
                            <td>{{ $key +1 }}</td>
                            <td>{{ $inspection->location }}</td>
                            <td>{{ $inspection->start_date }}</td>
                            <td>{{ $inspection->findings }}</td>
                            <td>
                                @forelse ($inspection->pictures as $item)
                                    <img src="{{ public_path('/images/inspection_files').'/'.$item->name }}" width="120px" width="120px">
                                @empty
                                    <p>No picture found!</p>
                                @endforelse
                            </td>
                            <td>{{ $inspection->pca }}</td>
                            <td>{{ $inspection->accountibility }}</td>
                            <td>{{ $inspection->status==1?"Open":"Close" }}</td>
                            <td>{{ $inspection->closing_date }}</td>
                        </tr>
                        @empty
                        <tr>No Data Found!</tr>
                        @endforelse
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    </body>
</html>
