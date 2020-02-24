<!DOCTYPE html>
<html>
<head>
    <style type="text/css">
        #sched{
            color: red;
        }

        .header{
            background: linear-gradient(to right, #404040, #2e2e2e);
            position: relative;
            padding: 10px;
        }

        .logo{
            position: relative;

        }

        .logo img{
            width: 50px;
            height: 50px;
            vertical-align: middle;
        }
        .logo span{
            color: #caba00;
            vertical-align: middle;
        }

        .sub-header{
            margin-bottom: 24px;
            height: 40px;
            width: 100%;
            background: linear-gradient(to right, #0069aa, #119422);;
        }

    </style>
</head>
<body>
	<div class="header">
		<div class="logo">
	        <img src="http://recruitment.digicononline.com/images/leadgen_logo.png">
	        <span>DCI/LEADGEN RECRUITMENT</span>
	    </div>
	</div>
	<div class="sub-header"></div>    
	<p>Hi {{ucwords($details['name'])}},</p>
	<p>Congratulations on passing the final interview. Please be reminded that the schedule of your job orientation is <span id="sched">{{ $details['schedule'] }}</span>.</p>
	<p>Please be there 10-15mins before the scheduled time. Thanks.</p>
</body>
</html>