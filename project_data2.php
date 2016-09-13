
<?php
$con = mysql_connect("localhost","root","");


if (!$con) {
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("testlink", $con);
mysql_query("SET NAMES 'utf8'", $con);
mysql_query("SET CHARACTER SET 'utf8'", $con);
//include_once ('application\view\testchart.php');

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
$project_id=$_GET['id'];
$sql = "SELECT id,name  FROM `nodes_hierarchy` where parent_id='".$project_id."' and node_type_id='5' order by id DESC";
$result = mysql_query($sql);
//print_r($_GET['id']);
if ($pro=mysql_num_rows($result) ==0) 
{
        $category['data'][]= 'No Data';
        $series1['data'][] = '0';
        $series2['data'][] = '0'; 
		$series3['data'][] = '0';
    //echo "No record";
    //exit;
} else {
	
    while($row=mysql_fetch_assoc($result)) {
		
// $sql0="SELECT id  FROM `nodes_hierarchy` where parent_id='".$row['id']."' and node_type_id='5' order by id DESC LIMIT 1";	
//$result0 = mysql_query($sql0);	
//$row0=mysql_fetch_assoc($result0);
 $sql1="SELECT executions.testplan_id as id FROM nodes_hierarchy JOIN executions ON executions.testplan_id='".$row['id']."'";
$result1 = mysql_query($sql1);	
$row1=mysql_fetch_assoc($result1);

        $ss=($row1['id']);
		if(!empty($row1['id'])){
        $sql7="SELECT  tcversion_id,testplan_id  FROM `testplan_tcversions` where testplan_id='".$row1['id']."' ";
		$result7 = mysql_query($sql7);
        //$report = "";	
		//$report1 = "";
        $report = array();
		$report1 = array();		
		while($row7=mysql_fetch_array($result7)){
	    $sql4="SELECT t.testplan_id,r.status,r.tcversion_id FROM (SELECT testplan_id ,execution_ts,tcversion_id,status
        FROM `executions` where testplan_id='".$row1['id']."'and tcversion_id= '".$row7['tcversion_id']."' ORDER BY execution_ts DESC LIMIT 50 )r 
		INNER JOIN executions t ON t.testplan_id='".$row1['id']."'GROUP BY r.tcversion_id";	
        $result4= mysql_query($sql4);
        $row4=mysql_fetch_assoc($result4);	
        $report[]=  $row4["testplan_id"];
		$report1[] = $row4["status"];
		$row5[]=implode(",",$report1);
		$row6[]=implode(",",$report);
		$row9[]=$row1['id'];
		$tt[$row4["testplan_id"]][]=$row5;
        //echo $row4["testplan_id"]->$row4["status"];echo"\n";	
		}
		
        $jj=array_slice($tt, -1, 1, true);	
		$row7=array_slice($row5, -1, 1, true);
		$row8=array_slice($row6, -1, 1, true);
		$row10=array_slice($row9, -1, 1, true);
		$res=array_combine($row10,$row7);
		if(isset($res[$row1['id']])){
		$countp=preg_match_all('/' . preg_quote('p', '/') . '/', $res[$row1['id']]);
           
		$countf=preg_match_all('/' . preg_quote('f', '/') . '/', $res[$row1['id']]);
       
		$countb=preg_match_all('/' . preg_quote('b', '/') . '/', $res[$row1['id']]);	   
		} 
  
		   
		$category['data'][]= $row['name'];
        $series1['data'][] = $countb;
        $series2['data'][] = $countf; 
		$series3['data'][] = $countp;
	
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

 
