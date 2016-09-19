
<?php
$con = mysql_connect("localhost","root","");
//mysql_query("SET NAMES 'utf8'", $dbConn);
//mysql_query("SET CHARACTER SET 'utf8'", $dbConn);

if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("testlink", $con);
mysql_query("SET NAMES 'utf8'", $con);
mysql_query("SET CHARACTER SET 'utf8'", $con);
$category = array();
$category['name'] = 'Name';

$series1 = array();
$series1['name'] = 'Block';

$series2 = array();
$series2['name'] = 'Fail';
$_SESSION['testplan_id'] = array();
$series3 = array();
$series3['name'] = 'Pass';
$row5=array();
$row6=array();

$rw5=array();	
$rw6=array();
$count=0;
$countf0= 0;
$countp0= 0;
$countb0= 0;
$countf1= 0;
$countp1= 0;
$countb1= 0;
$countf= 0;
$countp= 0;
$countb= 0;

$sql = "select name, id, node_type_id from nodes_hierarchy where node_type_id='1'";
$result = mysql_query($sql);
if ($pro=mysql_num_rows($result) ==0) 
{

    echo "No record";
    exit;
} else {
	
    while($row=mysql_fetch_assoc($result)) {
		
        $sql0="SELECT id  FROM `nodes_hierarchy` where parent_id='".$row['id']."' and node_type_id='5' order by id DESC LIMIT 1";	
        $result0 = mysql_query($sql0);	
        $row0=mysql_fetch_assoc($result0);
		
        $sql1="SELECT executions.testplan_id as id FROM nodes_hierarchy JOIN executions ON executions.testplan_id='".$row0['id']."'";
        $result1 = mysql_query($sql1);	
        $row1=mysql_fetch_assoc($result1);
		
		if(!empty($row1['id'])){
			
        $sql7="SELECT  tcversion_id,testplan_id  FROM `testplan_tcversions` where testplan_id='".$row1['id']."' ";
		$result7 = mysql_query($sql7);
		
		while($row7=mysql_fetch_array($result7)){
		$sql17="select id as tcversion_id from tcversions where id ='".$row7['tcversion_id']."' and execution_type='2'";
		$result17 = mysql_query($sql17);
		$row17=mysql_fetch_array($result17);
		
        $report = array();
		$report1 = array();		
		
		//print_r($row17['tcversion_id']);
	    $sql4="SELECT t.testplan_id,r.status,r.tcversion_id FROM (SELECT testplan_id ,execution_ts,tcversion_id,status
        FROM `executions` where testplan_id='".$row1['id']."'and tcversion_id= '".$row17['tcversion_id']."' ORDER BY execution_ts DESC LIMIT 50 )r 
		INNER JOIN executions t ON t.testplan_id='".$row1['id']."'GROUP BY r.tcversion_id";	
        $result4= mysql_query($sql4);
        $row4=mysql_fetch_assoc($result4);	
		//print_r($row17["tcversion_id"]);
        $report[]=  $row17["tcversion_id"];
		$report1[] = $row4["status"];
		$report11[]=$row4['testplan_id'];
		//}
		
		$row5[]=implode(",",$report1);
		$rw5[]=implode(",",$report11);
		$row6[]=implode(",",$report);
		$row9[]=$row17['tcversion_id'];
		$row7=array_slice($row5, -1, 1, true);
		$row8=array_slice($row6, -1, 1, true);
		$row10=array_slice($row9, -1, 1, true);
		$row11=array_slice($report11, -1, 1, true);
		//print_r(array_combine($row10,$row7));
		$res=array_combine($row11,$row7);
		//print_r(array_combine($row8,$row7));
		//print_r($row4['testplan_id']);
	    if(isset($row4['testplan_id'])){
			
		$countp=preg_match_all('/' . preg_quote('p', '/') . '/', $res[$row4['testplan_id']]);
           
		$countf=preg_match_all('/' . preg_quote('f', '/') . '/', $res[$row4['testplan_id']]);
       
		$countb=preg_match_all('/' . preg_quote('b', '/') . '/', $res[$row4['testplan_id']]);
	    $category['data'][]= $row['name'];
		$series1['data'][] = $countb;
        $series2['data'][] = $countf; 
		$series3['data'][] = $countp;
		} 
		
		}
		
       
		}
		
	
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

 
