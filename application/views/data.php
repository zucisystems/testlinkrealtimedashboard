<?php
$con = mysql_connect("localhost","root","");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("testlink", $con);

$query = mysql_query("SELECT execution_type, Wordpress, status, testplan_id FROM executions");

$category = array();
$category['name'] = 'execution_type';

$series1 = array();
$series1['name'] = 'Wordpress';

$series2 = array();
$series2['name'] = 'status';

$series3 = array();
$series3['name'] = 'testplan_id';

while($r = mysql_fetch_array($query)) {
    $category['data'][] = $r['execution_type'];
    $series1['data'][] = $r['wordpress'];
    $series2['data'][] = $r['status'];
    $series3['data'][] = $r['testplan_id'];  
}

$result = array();
array_push($result,$category);
array_push($result,$series1);
array_push($result,$series2);
array_push($result,$series3);

print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($con);
?>