<?php 
  //Get POST data
  $response['depositDate'] = $_POST['depositDate'];
  $response['depositAmount'] = $_POST['depositAmount'];
  $response['depositTerm'] = $_POST['depositTerm'];
  $response['depositReplenishmentYes'] = $_POST['depositReplenishmentYes'];
  $response['depositReplenishmentNo'] = $_POST['depositReplenishmentNo'];
  $response['depositReplenishmentAmount'] = $_POST['depositReplenishmentAmount'];
  $today = date('Y-m-d');

  //Capitalization recursive function
  function capitalization($date)
  {
    $diff = abs(strtotime($date1) - strtotime($response['depositDate']));
    $years = floor($diff / (365*60*60*24));
    $months = floor(($diff - $years * 365*60*60*24) / (30*60*60*24));

    if ($months <= 1) {
      return $response['depositAmount'];
    } else {
      $month = getMonth($date);
      $year = getYear($date);
      $leap = date('L', mktime(0, 0, 0, 1, 1, getYear($date)));
      if ($leap == 1) {
        $days = 366;
      } else {
        $days = 365;
      }
      if ($response["depositReplenishmentNo"]) {
        $response['depositReplenishmentAmount'] = 0;
      }
      $newdate = date("Y-m-d", strtotime("-1 months"));
      return $cap = capitalization($newdate) + 
      (capitalization($newdate) + $response["depositReplenishmentAmount"]) 
      * cal_days_in_month(CAL_GREGORIAN, $month, $year) * (10 / $days);
    }
  }

  //get Year from date
  function getYear($pdate) {
    $date = DateTime::createFromFormat("Y-m-d", $pdate);
    return $date->format("Y");
  }

  //get month from date
  function getMonth($pdate) {
    $date = DateTime::createFromFormat("Y-m-d", $pdate);
    return $date->format("m");
  }

  //get day from date
  function getDay($pdate) {
      $date = DateTime::createFromFormat("Y-m-d", $pdate);
      return $date->format("d");
  }

  $sum = capitalization($today);

  echo json_encode($sum);
?>