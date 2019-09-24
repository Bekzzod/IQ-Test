<?php 
  //Get POST data
  $response['depositDate'] = $_POST['depositDate'];
  $response['depositAmount'] = $_POST['depositAmount'];
  $response['depositTerm'] = $_POST['depositTerm'];
  $response['depositReplenishmentYes'] = $_POST['depositReplenishmentYes'];
  $response['depositReplenishmentNo'] = $_POST['depositReplenishmentNo'];
  $response['depositReplenishmentAmount'] = $_POST['depositReplenishmentAmount'];
  $today = date('Y-m-d');
  $depositDate = date("Y-m-d", strtotime($response['depositDate']));

  //Capitalization recursive function
  //Функция работает неправильно, возможно неправильно понял формулу и ошибся в реализации

  function capitalization($date, $date1)
  {
    echo $date;

    $min_date = min(date("Y-m-d", strtotime($date1)), date("Y-m-d", strtotime($date)));
    $max_date = max(date("Y-m-d", strtotime($date1)), date("Y-m-d", strtotime($date)));

    $diff = (int)abs((strtotime($min_date) - strtotime($max_date))/(60*60*24*30)); 

    if ($diff <= 1) {
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
      $newdate = date("Y-m-d", strtotime("-1 month", $date));
      return $cap = capitalization($newdate, $date1) + 
      (capitalization($newdate, $date1) + $response["depositReplenishmentAmount"]) 
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

  $sum = capitalization($today, $depositDate);
  if ($sum == null) {
    echo json_encode(":(");
  } else {
    echo json_encode($sum);
  }
?>