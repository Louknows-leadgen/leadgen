<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
    	table{
    		table-layout: fixed;
    		border-collapse: collapse;
    		width: 100%;
    		border: 1px solid #808080;
    	}
    	thead{
    		background-color: #3578bc;
    		color: #fff;
    	}
    	td{
    		color: #808080;
    		text-align: center;
    	}
    	em{
    		color: red;
    	}
    </style>
</head>
<body>
	<p>Hi {{ucwords($details['interviewer'])}},</p>
	<p>A new interviewee has been assigned to you. Refer on the details below.</p>
	<table>
		<thead>
			<tr>
				<th>Full Name</th>
				<th>Applied For</th>
				<th>Schedule</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>{{$details['name']}}</td>
				<td>{{$details['job']}}</td>
				<td>{{$details['sched']}}</td>
			</tr>
		</tbody>
	</table>
	<p>Click this <a href="{{$details['url']}}">link</a> to navigate on the interview page.</p>
	<p><em><strong>Note:</strong> Submit the form with the result of the interview on the page to proceed with the application process.</em></p>
</body>
</html>