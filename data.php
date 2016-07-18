<?php
$con = mysql_connect("localhost","root","");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("testlink", $con);
$query = mysql_query("SELECT name, parent_id, id, node_type_id FROM nodes_hierarchy");

$category = array();
$category['name'] = 'Name';

$series1 = array();
$series1['name'] = 'parentid';

$series2 = array();
$series2['name'] = 'id';

$series3 = array();
$series3['name'] = 'nodetypeid';

while($r = mysql_fetch_array($query)) {
    $category['data'][] = $r['name'];
    $series1['data'][] = $r['parent_id'];
    $series2['data'][] = $r['id'];
    $series3['data'][] = $r['node_type_id'];  
}

$result = array();
array_push($result,$category);
array_push($result,$series1);
array_push($result,$series2);
array_push($result,$series3);

print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($con);
?>

 