<?php
$mysqli = new mysqli("localhost", "root", "1234567", "members_information");
/* Getting demo_viewer table data */
$sql = "SELECT SUM(YEAR(birth_date)) as count FROM members
			GROUP BY YEAR(birth_date) ORDER BY YEAR(birth_date)";
$viewer = mysqli_query($mysqli, $sql);
$viewer = mysqli_fetch_all($viewer, MYSQLI_ASSOC);
$viewer = json_encode(array_column($viewer, 'count'), JSON_NUMERIC_CHECK);
?>
<!DOCTYPE html>
<html>
<head>
	<title>HighChart</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.js"></script>
	<script src="https://code.highcharts.com/highcharts.js"></script>
</head>
<body>


<script type="text/javascript">


$(function () {

    var data_viewer = <?php echo $viewer; ?>;


    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'BIRTH DATE RATIO'
        },
        xAxis: {
            categories: ['2000','2001','2002', '2003','2004','2005','2006','2007']
        },
        yAxis: {
            title: {
                text: 'Rate'
            }
        },
        series: [ {
            name: 'TOTAL YEAR',
            data: data_viewer
        }]
    });
});


</script>


<div class="container">
	<br/>
	<h2 class="text-center">GRAPH ACRRODING BIRTH DATE</h2>
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">GRAPH FOR BIRTH DATE</div>
                <div class="panel-body">
                    <div id="container"></div>
                </div>
            </div>
        </div>
    </div>
</div>


</body>
</html>