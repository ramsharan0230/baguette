<table>
    <thead>
        <tr>
            <th>SN. </th>
            <th>Location</th>
            <th>Start Date</th>
            <th>Findings</th>
            <th>Pictures</th>
            <th>Protective Corrective Action</th>
            <th>Accountibility</th>
            <th>Closing Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    	<tr>
            @foreach ($inspections as $key => $inspection)
                <td>{{ $key+1 }}</td>
                <td>{{ $inspection->location }}</td>
                <td>{{ $inspection->start_date }}</td>
                <td>{{ $inspection->findings }}</td>
                <td>{{ asset('images/inspection_files').'/'.$inspection->picture }}</td>
                <td>{{ $inspection->pca }}</td>
                <td>{{ $inspection->accountibility }}</td>
                <td>{{ $inspection->closing_date }}</td>
                <td>{{ $inspection->status?"Open":"Close" }}</td>
            @endforeach        
	    </tr>
    </tbody>
</table>