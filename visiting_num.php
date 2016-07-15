<?php
$mysql_host = 'localhost';
$mysql_user = 'root';
$mysql_password = 'apmsetup';
$mysql_db = 'yd_travel';
$mysql_db_table = 'favorite_table';
$con = mysql_connect($mysql_host, $mysql_user, $mysql_password);
$dbcon = mysql_select_db($mysql_db, $con);

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

$sth = mysql_query("SELECT Nam FROM favorite_table");
$rows = array();
$rows['name'] = 'Namsan Tower';
while($r = mysql_fetch_array($sth)) {
    $rows['data'][] = $r['Nam'];
}

$sth1 = mysql_query("SELECT Gyeong FROM favorite_table");
$rows1 = array();
$rows1['name'] = 'Gyeonggi';
while($rr = mysql_fetch_assoc($sth1)) {
    $rows1['data'][] = $rr['Gyeong'];
}

$result = array();
array_push($result,$rows);
array_push($result,$rows1);

$jsonTable = json_encode($result);
print json_encode($result, JSON_NUMERIC_CHECK);
mysql_close($con);
?>
