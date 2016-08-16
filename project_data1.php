<?php
$con = mysql_connect("localhost","root","");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("testlink", $con);
$category = array();
$category['name'] = 'Name';

$series1 = array();
$series1['name'] = 'Manual';

$series2 = array();
$series2['name'] = 'Automated';

//$series3 = array();
//$series3['name'] = 'fail';

$sql = "select name, id, node_type_id from nodes_hierarchy where node_type_id='1'";
$result = mysql_query($sql);
if (mysql_num_rows($result) ==0) 
{

    echo "No record";
    exit;
} else {
    while($row=mysql_fetch_assoc($result)) {
		
		
		$sql2 = "SELECT id, node_type_id FROM nodes_hierarchy where parent_id='".$row['id']."' and node_type_id='5'order by id DESC limit 1";
                $result2 = mysql_query($sql2);
		$row2=mysql_fetch_assoc($result2);
		$sql3="select * from executions where testplan_id ='".$row2['id']."'group by tcversion_id order by execution_ts DESC";
		$result3 = mysql_query($sql3);
		$row3=mysql_fetch_assoc($result3);
		$sql4="select *,count(execution_type)as auto from tcversions where id ='".$row3['tcversion_id']."' and execution_type='2'";
		$result4 = mysql_query($sql4);
		$row4=mysql_fetch_assoc($result4);
		$sql5="select *,count(execution_type)as man from tcversions where id ='".$row3['tcversion_id']."' and execution_type='1' ";
		$result5 = mysql_query($sql5);
		$row5=mysql_fetch_assoc($result5);
		
		

        $category['data'][]= $row['name'];
        $series1['data'][] = $row5['man'];
        $series2['data'][] = $row4['auto'];
	//$series3['data'][] = $row3['sp' ]; 
	
    }
}
$result = array();
array_push($result,$category);
array_push($result,$series1);
array_push($result,$series2);
//array_push($result,$series3);

print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($con);
?>

 
