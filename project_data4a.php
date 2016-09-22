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
$rwa=array();
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
$totalcountb=0;
$totalcountf=0;
$totalcountp=0;
$project_id=$_GET['id'];
$sqla="select Distinct(execution_type) from tcversions limit 2";
$resulta= mysql_query($sqla);
while($rowa=mysql_fetch_assoc($resulta))
{
$rwa[]=$rowa['execution_type'];
		
}
       $sql = "SELECT id,name  FROM `nodes_hierarchy` where parent_id='".$project_id."' and node_type_id='5' order by id DESC LIMIT 1";
       $result = mysql_query($sql);
       $row=mysql_fetch_assoc($result); 
	  
	  
	   
	 
		//if(!empty($row1['id'])){
        $sql7="SELECT t.id,t.execution_type,r.testplan_id,r.tcversion_id,r.id as name FROM (SELECT id,testplan_id ,tcversion_id
	    FROM `testplan_tcversions` where testplan_id='".$row['id']."' ORDER BY tcversion_id DESC LIMIT 50 )r INNER JOIN 
		tcversions t ON t.id=r.tcversion_id and t.execution_type='1' GROUP BY r.tcversion_id";
		$result7 = mysql_query($sql7);
        //$report = "";	
		//$report1 = "";
        $report = array();
		$report1 = array();		
		$report11=array();
		
		
	    if ($row7=mysql_num_rows($result7) ==0) 
{
        $category['data'][]= 'No Results found';
        $series1['data'][] = '0';
        $series2['data'][] = '0'; 
		$series3['data'][] = '0';
    //echo "No record";
    //exit;
}else{
	while($row7=mysql_fetch_assoc($result7)){
		$sql4="SELECT t.testplan_id,r.status,r.tcversion_id FROM (SELECT testplan_id ,execution_ts,tcversion_id,status
        FROM `executions` where testplan_id='".$row7['testplan_id']."'and tcversion_id='".$row7['tcversion_id']."' ORDER BY execution_ts DESC LIMIT 50 )r 
		INNER JOIN executions t ON t.testplan_id='".$row7['testplan_id']."'GROUP BY r.tcversion_id";	
        $result4= mysql_query($sql4);
        $row4=mysql_fetch_assoc($result4);
		
		$sql4e="SELECT execution_type,id from tcversions where id='".$row4['tcversion_id']."' ";	
        $result4e= mysql_query($sql4e);
        $row4e=mysql_fetch_assoc($result4e);
		
	   $sql2="SELECT name from nodes_hierarchy where id='".$row7['name']."' and node_type_id='3'";	
       $result2= mysql_query($sql2);
	   $row2=mysql_fetch_assoc($result2);
	  
		
        $report[]=  $row2["name"];
		$report1[] = $row4["status"];
		$report11[]=$row7["execution_type"];
		
		$row5[]=implode(",",$report1);
		$row6[]=implode(",",$report);
		$rw6[]=implode(",",$report11);
		$row9[]=$row['id'];
		$tt[$row4["testplan_id"]][]=$row5;
		$rw5=array_combine($report11,$report1);
	
        //echo $row4["testplan_id"]->$row4["status"];echo"\n";	
		
		
		
        $jj=array_slice($tt, -1, 1, true);	
		$row7=array_slice($row5, -1, 1, true);
		$row8=array_slice($row6, -1, 1, true);
		$row10=array_slice($row9, -1, 1, true);
		$row11=array_slice($rw6, -1, 1, true);
		$res=array_combine($row11,$row7);
		
		//print_r(array_combine($rw6,$row5));
		//print_r(array_combine($row10,$row7));
		//print_r(array_combine($row11,$row7));
		
		if(isset($res[$row4e['execution_type']])){
			
		$countp=preg_match_all('/' . preg_quote('p', '/') . '/', $res[$row4e['execution_type']]);
           
		$countf=preg_match_all('/' . preg_quote('f', '/') . '/', $res[$row4e['execution_type']]);
       
		$countb=preg_match_all('/' . preg_quote('b', '/') . '/', $res[$row4e['execution_type']]);	
        		
		}
		$category['data'][]= $row2["name"];
        $series1['data'][] = $countb;
        $series2['data'][] = $countf; 
		$series3['data'][] = $countp;
}	
}		
		$totalcountb=$totalcountb+$countb;
		$totalcountf=$totalcountf+$countf;
		$totalcountp=$totalcountp+$countp;
		
		

 // print_r($totalcountb);print_r($totalcountf);print_r($totalcountp);

$result = array();
array_push($result,$category);
array_push($result,$series1);
array_push($result,$series2);
array_push($result,$series3);

print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($con);


?>

 