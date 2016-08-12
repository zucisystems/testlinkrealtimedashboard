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
//$_SESSION['testplan_id'] = array();
$series3 = array();
$series3['name'] = 'Pass';
$row5=array();
$row6=array();
$rw6=array();	
$count=0;
$countf= 0;
$countp= 0;
$countb= 0;
function odd($var)
{
    // returns whether the input integer is odd
    return($var & '36');
}
$sql = "select name, id, node_type_id from nodes_hierarchy where node_type_id='1'";

$result = mysql_query($sql);

if ($pro=mysql_num_rows($result) ==0) 
{

    echo "No record";
    exit;
} else {
	
    while($row=mysql_fetch_assoc($result)) {
			
		$sql2="SELECT id, node_type_id FROM `nodes_hierarchy` where parent_id='".$row['id']."' and node_type_id='5' order by id DESC LIMIT 1 ";
        $result2 = mysql_query($sql2);
		$row2=mysql_fetch_assoc($result2);
        $ss=($row2['id']);
		$sql7="SELECT  tcversion_id,testplan_id  FROM `testplan_tcversions` where testplan_id='".$row2['id']."' ";
		$result7 = mysql_query($sql7);
        //$report = "";	
		//$report1 = "";
        $report = array();
		$report1 = array();		
		while($row7=mysql_fetch_array($result7)) {
	    $sql4="SELECT t.testplan_id,r.status,r.tcversion_id FROM (SELECT testplan_id ,execution_ts,tcversion_id,status
        FROM `executions` where testplan_id='".$row2['id']."'and tcversion_id= '".$row7['tcversion_id']."' ORDER BY execution_ts DESC LIMIT 50 )r 
		INNER JOIN executions t ON t.testplan_id='".$row2['id']."'GROUP BY r.tcversion_id";	
        $result4= mysql_query($sql4);
        $row4=mysql_fetch_assoc($result4);		
        $report[] =  $row4["testplan_id"];
		$report1[] = $row4["status"];		
		}	
       	   
		$row5=$report;
		$row6=$report1;
		$rw=sizeof($row5);
		//print_r($row6);echo"\n";
		
	
	
    if ((sizeof($row5)) >1)
	{
      //foreach($row5 as $tt){
		  $i=0;
		foreach($row6 as $dd)
		 {
	     
		
        if(($dd)  == 'p'){ 
           $countp=1; 
           }else{$countp=0;}
		   
		   
		   
		   if(($dd) == 'f'){ 
           $countf=$countf+1; 
           }else{$countf=0;}
		   
		   if(($dd) == 'b'){ 
           $countb=$countb+1; 
		   }else{$countb=0;}
		  }$i++; 
		   
		 // } 
		   
		 //  }  
		
    }
else { 

          if($report1[0]== 'p'){ 
           $countp=1; 
           }else{$countp=0;}
		   if($report1[0] == 'f'){ 
           $countf=$countf+1; 
           }else{$countf=0;}
          
		   if($report1[0] == 'b'){ 
           $countb=$countb+1; 
		   }else{$countb=0;}
		
	 }
 
   
	
	 //print_r(array_merge_recursive($report1,$report));
	//print_r(array_combine($report,$row6));
	//echo "<pre>";
	//print_r($row5);
	//print_r($row2['id']);
	//echo "</pre>";
	//$i=0; echo $i;
	
	

		$category['data'][]= $row['name'];
        $series1['data'][] = $countb;
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

 
