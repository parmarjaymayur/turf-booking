<?php

  // Database connection
  $conn = new mysqli('localhost', 'mindfusion', '123', 'events');
  if($conn->connect_error) die('Connection failed: ' . $conn->error);  
  $command = $_GET['command'];  
 date_default_timezone_set(DateTimeZone::listIdentifiers(DateTimeZone::UTC)[0]); 

  // Get from the database
  function get(){
    $request = 'SELECT * FROM `data`';
    $result = $GLOBALS['conn']->query($request);
    $output = array();
    if($result){
      while($row = $result->fetch_assoc()){
        $output[] = $row;
      };
      $result->free();
    }
    echo json_encode($output);
  }

  // Add to the database
  function add(){
    $item = json_decode($_GET['item']);
    $request = 'INSERT INTO `data` ';
    $request .= '(`StartTime`,`EndTime`,`Details`,`Contacts`,`Location`,`Resources`,`Subject`)';
    $request .= ' VALUES(';

    // The dates are in noncompatible for SQL format
    // Hence, they are converted to php dates and then sent to the SQL request
	// date_default_timezone_set(DateTimeZone::listIdentifiers(DateTimeZone::UTC)[0]); 
     $start = new DateTime($item->_startTime->_date);
	// $start->setTimezone(new DateTimeZone('UTC'));
     $end = new DateTime($item->_endTime->_date);
	// $end->setTimezone(new DateTimeZone('UTC'));
	
    $request .= '\'' . date('Y-m-d H:i:s', $start->getTimestamp()) . '\',';
    $request .= '\'' . date('Y-m-d H:i:s', $end->getTimestamp()) . '\',';

    $request .= '\'' . $item->_details . '\',';
    $request .= '\'' . json_encode($item->_contacts) . '\',';
    $request .= '\'' . json_encode($item->_location) . '\',';
    $request .= '\'' . json_encode($item->_resources) . '\',';
    $request .= '\'' . $item->_subject .  '\');';

    // Send the request to the database
    $result = $GLOBALS['conn']->query($request);
  }

  // Delete from the database
  function delete(){

	//date_default_timezone_set(DateTimeZone::listIdentifiers(DateTimeZone::UTC)[0]); 
    // Make the item from the url a valid SQL request
    $item = json_decode($_GET['item']);
    $request = 'DELETE FROM `data` WHERE ';

    // The dates are in noncompatible for SQL format
    // Hence, they are converted to php dates and then sent to the SQL request
    $start = new DateTime($item->_startTime->_date);
    $end = new DateTime($item->_endTime->_date);
    $request .= '`StartTime`=\'' . date('Y-m-d H:i:s', $start->getTimestamp()) . '\' AND ';
    $request .= '`EndTime`=\'' . date('Y-m-d H:i:s', $end->getTimestamp()) . '\' AND ';
    $request .= '`Details`=\'' . $item->_details . '\' AND ';
    $request .= '`Subject`=\'' . $item->_subject . '\';';

    // Send the request to the database
    $result = $GLOBALS['conn']->query($request);

  }
  /**
  * TODO IMPORTANT! The following code is here only for proof of concept consider altering it in producton
  * May be a security risk!
  */
  if($command === 'get'){get();}
  elseif($command === 'add'){add();}
  elseif($command === 'delete'){delete();}
?>
