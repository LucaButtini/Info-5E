<?php
// legacy timestamp, date,time, mktime, getdate, strtotime
// sono del 2004 prima di php 5


//usiamo noi le classi

$now= new DateTime();

// per accedere ai metodi dell'oggetto si usa ->
echo $now->format('Y-m-d H:i:s');
echo '<br>';
echo $now->format('d-m-Y H:i:s');
echo '<br>';
echo $now->format('H:i:s');
echo '<br>';
// ho aggiunto due ore
$date1 = new DateTime('+2 hours');
echo $date1->format('Y-m-d H:i:s');
echo '<br>';
$date2 = new DateTime('-3 months');
echo $date2->format('Y-m-d H:i:s');
echo '<br>';
$date3 = new DateTime('1 year');
echo $date3->format('Y-m-d H:i:s');
echo '<br>';
$date4= clone $date3;
$date4->setTime(11, 15, 29);
echo $date4->format('d-m-Y H:i:s');
echo '<br>';
$date5= new DateTime('+10 days');
$date6= new DateTime('-15 days');
$interval = $date5->diff($date6);
echo $interval->format('%y - %m - %d %H - %i - %s');
echo '<br>';
$intervalTime= new DateInterval('P1Y3M4DT2H3M4S');
echo $intervalTime->format('%y - %m - %d %H - %i - %s');
echo '<br>';
$now= new DateTime();
$date7= $now->add($intervalTime);
echo $now->format('d-m-Y H:i:s');
