<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	<script type="text/javascript">
		var $dataPoints;
		$.ajax({
			url: 'getchartData.php',
			type: "POST",
			dataType: 'json',
			async:false,
			success: function (result) {
				$dataPoints = result
			}
		});
		window.onload = function () {
			var chart = new CanvasJS.Chart("chartContainer", {
				title:{
					text: "Monthly Order Charts"              
				},
				data: [              
				{
					type: "column",
					dataPoints: $dataPoints
				}
				]
			});
			chart.render();
		}

	</script>
</head>
<body>
	<div id="chartContainer" style="height: 300px; width: 100%;"></div>
</body>
</html>

