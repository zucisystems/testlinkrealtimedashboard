<?php
$con = mysql_connect("localhost","root","");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("testlink", $con);
$category = array();
$category['name'] = 'Name';

$series1 = array();
$series1['name'] = 'status';

$series2 = array();
$series2['name'] = 'id';

$series3 = array();
$series3['name'] = 'nodetypeid';

$sql = "select name, id, node_type_id from nodes_hierarchy where node_type_id='1'";
$result = mysql_query($sql);
if (mysql_num_rows($result) ==0) 
{

    echo "No record";
    exit;
} else {
    while($row=mysql_fetch_assoc($result)) {
		
		
		$sql2 = "SELECT id, node_type_id FROM nodes_hierarchy where parent_id='".$row['id']."' and node_type_id='5'";
        $result2 = mysql_query($sql2);
		$row2=mysql_fetch_assoc($result2);
		$sql3="select * from executions where testplan_id ='".$row2['id']."' ";
		$result3 = mysql_query($sql3);
		$row3=mysql_fetch_assoc($result3);
		$category['data'][]= $row['name'];
        $series1['data'][] = $row['node_type_id'];
        $series2['data'][] = $row['id'];
		$series3['data'][] = $row3['status' ]; 
	
    }
}
$result = array();
array_push($result,$category);
array_push($result,$series1);
array_push($result,$series2);
array_push($result,$series3);

print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($con);
?>

 