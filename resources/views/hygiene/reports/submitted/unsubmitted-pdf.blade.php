<!doctype html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th width="5%">SN. </th>
                        <th width="8%">Location</th>
                        <th width="7%">Start Date</th>
                        <th width="20%">Findings</th>
                        <th width="15%">Picture</th>
                        <th width="20%">Protective Corrective Action</th>
                        <th width="10%">Accountibility</th>
                        <th width="8%">Closing Date</th>
                        <th width="7%">Status</th>
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
                                    <img src="{{ public_path('/images/inspection_files').'/'.$item->name }}" width="65px" height="65px">
                                @empty
                                    <p>No picture found!</p>
                                @endforelse
                            </td>
                            <td>{{ $inspection->pca }}</td>
                            <td>{{ $inspection->accountibility }}</td>
                            <td>{{ $inspection->closing_date }}</td>
                            <td>{{ $inspection->status==1?"Open":"Close" }}</td>
                        </tr>
                        @empty
                        <tr>No Data Found!</tr>
                        @endforelse
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
    
<script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
