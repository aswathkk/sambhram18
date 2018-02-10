<?php
  include('db.php');
  if($msqi->connect_errno)
    die("{err: true, msg: '$msqi->connect_error'}");

  // CHeck whether POST variables are set
  $arr = array('event', 'dept', 'name', 'phone', 'college', 'members');
  if (array_diff($arr, array_keys($_POST)))
    die("{err: true, msg: 'Insufficient data.'}");
  
  $event = strtolower($_POST['event']);
  $dept = strtolower($_POST['dept']);
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $college = $_POST['college'];
  $members = $_POST['members'];

  if($event == '' || $dept == '' || $name == '' || $phone == '' || $college == '')
    die("{err: true, msg: 'Insufficient data.'}");

  $sql = "INSERT INTO `registration` (`event`, `dept`, `name`, `phone`, `college`, `members`) VALUES ('$event', '$dept', '$name', '$phone', '$college', '$members')";
  if(!$msqi->query($sql))
    die("{err: true, msg: '$mysqli->error'}");
  else
    echo "{err: false, msg: 'done'}";
  
  $msqi->close();
?>