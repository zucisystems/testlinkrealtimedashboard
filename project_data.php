<?php
$con = mysql_connect("localhost","root","");

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("testlink", $con);
$category = array();
$category['name'] = 'Name';

$series1 = array();
$series1['name'] = 'Block';

$series2 = array();
$series2['name'] = 'Fail';

$series3 = array();
$series3['name'] = 'Pass';

$sql = "select name, id, node_type_id from nodes_hierarchy where node_type_id='1'";

$result = mysql_query($sql);
if (mysql_num_rows($result) ==0) 
{

    echo "No record";
    exit;
} else {
	
    while($row=mysql_fetch_assoc($result)) {
			
		$sql2="SELECT id, node_type_id FROM `nodes_hierarchy` where parent_id='".$row['id']."' and node_type_id='5' order by id DESC LIMIT 1 ";
        $result2 = mysql_query($sql2);
		$row2=mysql_fetch_assoc($result2);
	
		$sql6="select (id) as build from builds where testplan_id='".$row2['id']."' order by id desc limit 1 ";
		$result6 = mysql_query($sql6);
		$row6=mysql_fetch_assoc($result6);
		
		$sql7="SELECT tcversion_id  FROM `testplan_tcversions` where testplan_id='".$row2['id']."' ";
		$result7 = mysql_query($sql7);
						
	 while($row7=mysql_fetch_assoc($result7)) {
		
	   $sql3="SELECT t.testplan_id,r.status,r.tcversion_id FROM (SELECT testplan_id ,execution_ts,tcversion_id,status
           FROM `executions` where testplan_id='".$row2['id']."'and tcversion_id= '".$row7['tcversion_id']."' ORDER BY execution_ts DESC LIMIT 50 )r 
           INNER JOIN executions t ON t.testplan_id='".$row2['id']."'GROUP BY r.tcversion_id";	
	
	    $result3 = mysql_query($sql3);
	  //print_r($result3);
		$row3=mysql_fetch_assoc($result3);

     	$count=1;
		$countf= 1;
		$countp= 1;
		
		
		if($row3['status']=='b'){ $count++;}
		else if($row3['status']=='f'){ $countf++;}
		else{ $countp++;}
	 }
	
	
		$category['data'][]= $row['name'];
        $series1['data'][] = $count;
        $series2['data'][] = $countf; 
		$series3['data'][] = $countp;
	

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

 
