
<?php
function build_calendar($month, $year){
  // $mysqli = new mysqli('localhost','root',"",'bookingcalendar');
  // $stmt = $mysqli->prepare("select * from bookings where MONTH(date) = ? AND YEAR(date) = ?");
  // $stmt->bind_param('ss',$month,$year);
  // $booking = array();
  // if ($stmt->execute()) {
  //   $result = $stmt->get_result();
  //   if ($result->num_rows>0) {
  //     while ($row = $result->fetch_assoc()) {
  //       $bookings = $row['date'];
  //     }

  //     $stmt->close();
  //   }
  // }
  

  $daysOfWeek = array('Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday');
  $firstDayOfMonth = mktime(0, 0, 0,$month, 1, $year);
  $numberDays = date('t',$firstDayOfMonth);
  $dateComponents = getdate($firstDayOfMonth);
  $monthName = $dateComponents['month'];
  $dayOfWeek = $dateComponents['wday'];
  $dateToday = date('Y-m-d');
  
  $prev_month = date('m',mktime(0, 0, 0, $month-1, 1, $year));
  $prev_year = date('Y',mktime(0, 0, 0, $month-1, 1, $year));
  $next_month = date('m',mktime(0, 0, 0, $month+1, 1, $year));
  $next_year = date('Y',mktime(0, 0, 0, $month+1, 1, $year));
  $calendar = "<center><h2>$monthName $year</h2>";
  $calendar.= "<div class='btn-group'><a class='btn btn-primary btn-xs'href='?month=".$prev_month."&year=".$prev_year."'>PrevMonth</a>";
  $calendar.= "<a class='btn btn-primary btn-xs'href='?month=".date('m')."&year=".date('Y')."'>CurrentMonth</a>";
  $calendar.= "<a class='btn btn-primary btn-xs'href='?month=".$next_month."&year=$next_year'>NextMonth</a></div></center>";
  $calendar.= "<br><table class='table table-bordered'>";
  $calendar.= "<tr>";
  foreach($daysOfWeek as $day){
     $calendar.= "<th class='header'>$day</th>";
  }

  $calendar.= "</tr><tr>";
  $currentDay = 1;
  if($dayOfWeek > 0){
    for($k = 0; $k < $dayOfWeek; $k++){
      $calendar.="<td class='empty'></td>";
    }
  }

  $month = str_pad($month, 2, "0", STR_PAD_LEFT);
  while($currentDay <= $numberDays){
    if($dayOfWeek == 7){
        $dayOfWeek = 0;
        $calendar.= "</tr><tr>";
    }

    $currentDayRel = str_pad($currentDay, 2, "0", STR_PAD_LEFT);
    $date = "$year-$month-$currentDayRel";
    $dayName = strtolower(date('1',strtotime($date)));
    $today = $date==date('Y-m-d') ? 'today':"";
    $calendar.= "<td class='$today'><h4>$currentDay</h4><a class='btn btn-success btn-xs' href='./eg.php'>Book</a></td>";
    
    
    
    $currentDay++;
    $dayOfWeek++;


  }

  if($dayOfWeek<7){
    $remainingDays = 7 - $dayOfWeek;
    for($i=0; $i<$remainingDays; $i++){
      $calendar.="<td class='empty'></td>";

    }
  }

  $calendar.="</tr></table>";





  return $calendar;
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
    <style>
    @media only screen and (max-width: 760px),
    (min-device-width: 820px) and (max-device-width: 1020px){
      table,
      thead,
      tbody,
      th,
      td,
      tr{
        display: block;
      }
      .empty{
        display: none;
      }
      th{
        position: absolute;
        top: -9999px;
        left: -9999px;

      }
      tr{
        border: 1px solid #ccc;

      }
      td{
        border: none;
        border-bottom: 1px solid #eee;
        position: relative;
        padding-left: 50%;
      }
      td:nth-of-type(1):before{
        content: "Sunday";
      }
      td:nth-of-type(2):before{
        content: "Monday";
      }
      td:nth-of-type(3):before{
        content: "Tuesday";
      }
      td:nth-of-type(4):before{
        content: "Wedday";
      }
      td:nth-of-type(5):before{
        content: "Thursday";
      }
      td:nth-of-type(6):before{
        content: "Friday";
      }
      td:nth-of-type(7):before{
        content: "Saturday";
      }
    }

    @media only screen and (min-device-width: 320px) and (max-device-width: 480px){
      body{
        padding: 0;
        margin: 0;

      }
    }

    @media only screen and (min-device-width: 802px) and (max-device-width: 1020px){
      body{
        width: 495px;
      }
    }

    @media (min-width: 641px){
      table{
        table-layout: fixed;

      }
      td{
        width: 33%;
      }
    }
    .row{
      margin-top: 20px;

    }
    .today{
      background: yellow;
    }
  </style>  
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="#">JayParmar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="about.php">About</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact</a>
      </li>
       <li class="nav-item dropdown">
         <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
         <div class="dropdown-menu" aria-labelledby="navbarDropdown">
           <a class="dropdown-item" href="turfservices.php">Turf Services</a>
            <a class="dropdown-item" href="sandsoil.php">Sand Soil and Mulch</a>
            
            <a class="dropdown-item" href="artificial.php">Artificial Grass</a>
           
         </div>
       </li>
      <li class="nav-item">
        <a class="nav-link" href="booking.php">Booking</a>
      </li>
      
      
      
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
  </div>
</nav>

    <section class="breadcrumbs-section">
      <div class="container p-1 p-sm-3">
        <div class="row">
          <div class="col-12">
          <h2>Booking</h2>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
            <li class="breadcrumb-item active">Booking</li>
          </ol>

          </div> 
        </div>
      </div>
   
    </section>

    <div class="container">
    <div class="row">
      <div class="col-md-12">
      <?php
         $dateComponents = getdate();
         if (isset($_GET['month']) && isset($_GET['year'])) {
          $month = $_GET['month'];
          $year = $_GET['year'];
         }else{
          $month = $dateComponents['mon'];
          $year = $dateComponents['year'];

         }

         echo build_calendar($month, $year);
      ?>
        
      </div>
    </div>
    
  </div>
  <footer class="full-footer">
    <div class="container">
      <div class="row text-white">
        <div class="col-md-3 p-3">
          <h3 >@Jay Parmar</h3>
        </div>
    <div class="col-md-3">
      <h3>Important Links</h3>
      <a href="#" class="text-white">Privacy Policy</a><br>
      <a href="#"class="text-white">Youtube channel links</a><br>
      <a href="#"class="text-white">Blog Articles</a><br>
      <a href="#"class="text-white">Social media</a><br>
    </div>
    <div class="col-md-3">
      <h3>Our Services</h3>
      <a href="#"class="text-white">Turf Services</a><br>
      <a href="#"class="text-white">Sand,Soil and Mulch</a><br>
      <a href="#"class="text-white">Artificial Grass</a><br>
      
    </div>
    <div class="col-md-3">
      <h3>Contact Us</h3>
      <a href="#" class="text-white">+91 9137191606 </a><br>
      <a href="#" class="text-white">ilap620@gmail.com</a><br>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d241317.11609980912!2d72.74109852485876!3d19.0821978385003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7c6306644edc1%3A0x5da4ed8f8d648c69!2sMumbai%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1601455447455!5m2!1sen!2sin"></iframe>
    </div>
  </div>
</div>
</footer>

</body>
</html>