<?php
include 'config.php';

if (isset($_GET['date'])) {
	$date = $_GET['date'];
}

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$email = $_POST['email'];
	$mysqli = new mysqli('localhost','root',"",'bookingcalendar');
	$stmt = $mysqli->prepare("INSERT INTO booking(name, email) VALUES(?,?)");
	$stmt->bind_param('ss',$name,$email);
    $stmt->execute();
	$msg = "<div class='alert alert-success'>Booking Successfull</div>";
	$stmt->close();
	$mysqli->close();
}

	

$duration = 30;
$cleanup = 0;
$start = "6:00";
$end = "24:00";
function timeslots($duration, $cleanup, $start, $end){
	$start = new DateTime($start);
	$end = new DateTime($end);
	$interval = new DateInterval("PT".$duration."M");
	$cleanupInterval = new DateInterval("PT".$cleanup."M");
	$slots = array();

	for($intStart = $start; $intStart<$end; $intStart->add($interval)->add($cleanupInterval)){
		$endPeriod = clone $intStart;
		$endPeriod->add($interval);
		if($endPeriod>$end){
			break;

		}
		$slots[] = $intStart->format("H:iA")."-".$endPeriod->format("H:iA");
	}

	return $slots;
}

?>


<!DOCTYPE html>
<html>
<head>
	<title></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
</head>
<body>
	<div class="container">
		
       	<h1 class="text-center">Book Timings</h1>
       	<hr>
		<div class="row">

			<div class="row">
			<?php $timeslots = timeslots($duration, $cleanup, $start, $end);
			  foreach($timeslots as $ts){
			?>
			<div class="col-md-2">
				<div class="form-group">
				<button class="btn btn-success book"data-timeslot="<?php echo $ts; ?>"><?php echo $ts; ?></button>
			</div>
		</div>

			<?php } ?>
		</div>
		

		
		




	</div>

	<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Booking: <span id="slot"></span></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <div class="row">
        	<div class="col-md-12">
        		<form action="" method="post">
        			<div class="form-group">
        				<label for="">Timeslot</label>
        				<input required type="text" readonlyname="timeslot" id="timeslot" class="form-control">
        			</div>
        			<div class="form-group">
        				<label for="">Name</label>
        				<input required type="text" name="name" class="form-control">
        			</div>
        			<div class="form-group">
        				<label for="">Email</label>
        				<input required type="email" name="email" class="form-control">
        			</div>
        			<div class="form-group pull-right">
        				<button class="btn btn-primary" type="submit" name="submit">Submit</button>
        			</div>
        		</form>
        	</div>
        </div>
      </div>
      
    </div>

  </div>
</div>
















	</body>
</html>

	 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
  	$(".book").click(function(){
  		var timeslot = $(this).attr('data-timeslot');
  		$("#slot").html(timeslot);
  		$("#timeslot").val(timeslot);
  		$("#myModal").modal("show");
  	})
  </script>
</body>
</html>
<header>