
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
$row9=array();
$rw5=array();	
$rw6=array();
$tt=array();
$rw7=array();
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
      
	   $sql = "SELECT id,name  FROM `nodes_hierarchy` where parent_id='".$project_id."' and node_type_id='5' order by id  DESC LIMIT 1";
       $result = mysql_query($sql);
       $row=mysql_fetch_assoc($result);
    
       $sql0="SELECT  tcversion_id,testplan_id  FROM `testplan_tcversions` where testplan_id='".$row['id']."'";	
       $result0 = mysql_query($sql0);	
       while($row0=mysql_fetch_assoc($result0))
	   {
	   $sql1="SELECT executions.testplan_id as id,executions.tcversion_id as tc_id FROM nodes_hierarchy JOIN executions ON executions.testplan_id='".$row['id']."' and executions.tcversion_id='".$row0['tcversion_id']."'";
       $result1 = mysql_query($sql1);
	   $row1=mysql_fetch_array($result1);
	 
	 
	    $report = array();
	    $report1 = array();		
	    $report11 = array();
	    $sql4="SELECT t.testplan_id,r.status,r.tcversion_id FROM (SELECT testplan_id ,execution_ts,tcversion_id,status
        FROM `executions` where testplan_id='".$row['id']."'and tcversion_id= '".$row1['tc_id']."' ORDER BY execution_ts DESC LIMIT 50 )r 
		INNER JOIN executions t ON t.testplan_id='".$row['id']."'GROUP BY r.tcversion_id";	
        $result4= mysql_query($sql4);
        $row4=mysql_fetch_assoc($result4);	
		$sql7="SELECT  execution_type    FROM `tcversions` where id='".$row1['tc_id']."'";
		$result7 = mysql_query($sql7);
        $row7=mysql_fetch_array($result7);
		$sql8="SELECT  Distinct(execution_type)    FROM `tcversions` ";
		$result8 = mysql_query($sql8);
		
        $row8=mysql_fetch_array($result8);
		
		$report[]=  $row4["testplan_id"];
		$report1[] = $row4["status"];
		$row5[]=implode(",",$report1);		
		$row6[]=implode(",",$report);
		$row9[]=$row['id'];		
		$rw5[]=$row7['execution_type'];
		$rw6[]=array_combine($row6,$row5);
		$rw7[]=$row8['execution_type'];
		$rw8[]=implode(",",$rw7);
		$rw9=array_slice($rw8, -1, 1, true);
 
}
	
		$tt=array_combine($rw5,$row5) ;
  
		
		
		
		
		 if($row7['execution_type']==2){$row7['execution_type']='Auto';}else{$row7['execution_type']='Manual';}
		if(isset($tt[$row8['execution_type']])){
			
		$countp=preg_match_all('/' . preg_quote('p', '/') . '/', $tt[$row8['execution_type']]);
		//print_r($subArray);
           
		$countf=preg_match_all('/' . preg_quote('f', '/') . '/', $tt[$row8['execution_type']]);
       
		$countb=preg_match_all('/' . preg_quote('b', '/') . '/', $tt[$row8['execution_type']]);	   
		} 
      
  

  
  
  
		
      		
		$category['data'][]= $row7['execution_type'];
        $series1['data'][] = $countb;
        $series2['data'][] = $countf; 
		$series3['data'][] = $countp;
	
		//}
//}

//}
$result = array();
array_push($result,$category);
array_push($result,$series1);
array_push($result,$series2);
array_push($result,$series3);

print json_encode($result, JSON_NUMERIC_CHECK);

mysql_close($con);


?>

 
