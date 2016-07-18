<?php
//including FusionCharts PHP Wrapper
include("fusioncharts.php");
$hostdb = "localhost"; // MySQl host
$userdb = "root"; // MySQL username
$passdb = ""; // MySQL password
$namedb = "testlink"; // MySQL database name
 
//Establish connection with the database
$dbhandle = new mysqli($hostdb, $userdb, $passdb, $namedb);
 
//Validating DB Connection
if ($dbhandle->connect_error) {
exit("There was an error with your connection: " . $dbhandle->connect_error);
}
 
?>
 
<html>
<head>
<title>Creating Drill Down Charts Using PHP and MySQL</title>
<!-- FusionCharts Core Package File -->
<script src="fusioncharts/js/fusioncharts.js"></script>
<script type="text/javascript" src="fusioncharts/js/elegant.js"></script>
<link href='https://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
</head>
<?php
 
//SQL Query for the Parent chart.
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
//Execute the query, or else return the error message.
$result = $dbhandle->query($strQuery) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
 
//If the query returns a valid response, preparing the JSON array.
if ($result) {
//`$arrData` holds the Chart Options and Data.
$arrData = array(
"chart" => array(
"caption" => "YoY name - KFC",
"xAxisName"=> "id",
"yAxisName"=> "name",
"paletteColors"=> "#008ee4",
"yAxisMaxValue"=> "50000",
"baseFont"=> "Open Sans",
"theme" => "elegant"
)
);
//Create an array for Parent Chart.
$arrData["data"] = array();
// Push data in array.
while ($row = mysqli_fetch_array($result)) {
array_push($arrData["data"], array(
"label" => $row["id"],
"value" => $row["name"],
//Create link for idly drilldown as "2011"
"link" => "newchart-json-" . $row["id"]
));
}
//Data for Linked Chart will start from here, SQL query from nodes_hierarchy table
$id = 2011;
$strQuarterly = "SELECT node_type_id, name, id FROM nodes_hierarchy WHERE 1";
$resultnode_type_idly = $dbhandle->query($strnode_type_idly) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
//If the query returns a valid response, preparing the JSON array.
if ($resultnode_type_idly) {
$arrData["linkeddata"] = array(); //"linkeddata" is responsible for feeding data and chart options to child charts.
$arrDataMonth[2011]["linkeddata"] = array();
$arrDataMonth[2012]["linkeddata"] = array();
$arrDataMonth[2013]["linkeddata"] = array();
$arrDataMonth[2014]["linkeddata"] = array();
$arrDataMonth[2015]["linkeddata"] = array();
$arrDataMonth[2016]["linkeddata"] = array();
$i = 0;	
if ($resultnode_type_idly) {
while ($row = mysqli_fetch_array($resultnode_type_idly)) {
//Collect the id for which node_type_idly drilldown will be created
$id = $row['id'];
//Create the monthly drilldown data
$arrMonthHeader[$id][$row["node_type_id"]] = array();
$arrMonthData[$id][$row["node_type_id"]] = array();
// Retrieve monthly data based on id and quarter
$strMonthly = "SELECT * FROM status WHERE `id` = '".$id."' and `node_type_id` = '".$row["node_type_id"]."' Order by FIELD( `Month`, 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec' )" ;	
$resultMonthly = $dbhandle->query($strMonthly) or exit("Error code ({$dbhandle->errno}): {$dbhandle->error}");
//Loop through monthly results
while ($rowMonthly = mysqli_fetch_assoc($resultMonthly)) {
//Create the monthly data for each quarter
if($rowMonthly['node_type_id'] == $row["node_type_id"])
{
array_push($arrMonthData[$id][$row["node_type_id"]], array(
"label" => $rowMonthly["Month"],
"value" => $rowMonthly["name"]
));
}
}
//Create the data for monthly drilldown
$arrMonthHeader[$id][$row["node_type_id"]] = array(
//Create the unique link id's provided from quarterly data as "2011Q1"
"id" => $id . $row['node_type_id'],
//Create the data for the monthly charts for each quarter
"linkedchart" => array(
"chart" => array(
//Create dynamic caption based on the id and quarter
"caption" => "MoM name - KFC for node_type_id ".$row["node_type_id"]." of $id",
"xAxisName"=> "Month",
"yAxisName"=> "name",
"paletteColors"=> "#f5555C",
"baseFont"=> "Open Sans",
"theme" => "elegant"
),
"data" => $arrMonthData[$id][$row["node_type_id"]]	
)	
);
//Finally push the data created into linkeddata node. Now our linked data for monthly drilldown for each quarter is ready
array_push($arrDataMonth[$id]["linkeddata"],$arrMonthHeader[$id][$row["node_type_id"]]);
//Create the linkeddata for quarterly drilldown
//If the linnkeddata for a quarter of a id is ready and the id matches
if (isset($arrData["linkeddata"][$i-1]) && $arrData["linkeddata"][$i-1]["id"] == $id) {	
if($row["node_type_id"] == 'Q4'){
array_push($arrData["linkeddata"][$i-1]["linkedchart"]["data"], array(
"label" => $row["node_type_id"],
"value" => $row["name"],
//Create the link for quarterly drilldown as "newchart-json-2011Q1"
"link" => "newchart-json-" . $id . $row["node_type_id"]
));	
//If we've reached the last quarter, append the data created for monthly drilldown
$arrData["linkeddata"][$i-1]["linkedchart"] = array_merge($arrData["linkeddata"][$i-1]["linkedchart"],$arrDataMonth[$id]);
}	
else{
array_push($arrData["linkeddata"][$i-1]["linkedchart"]["data"], array(
"label" => $row["node_type_id"],
"value" => $row["name"],
//Create the link for quarterly drilldown as "newchart-json-2011Q1"
"link" => "newchart-json-" . $id . $row["node_type_id"]
));
}
}
//Inititate the linked data for quarterly drilldown
else {
array_push($arrData["linkeddata"], array(
"id" => "$id",
"linkedchart" => array(
"chart" => array(
//Create dynamic caption based on the id
"caption" => "QoQ name - KFC for $id",
"xAxisName"=> "node_type_id",
"yAxisName"=> "name",
"paletteColors"=> "#6baa01",
"baseFont"=> "Open Sans",
"theme" => "elegant"
),
"data" => array(
array(
"label" => $row["node_type_id"],
"value" => $row["name"],
//Create the link for quarterly drilldown as "newchart-json-2011Q1"
"link" => "newchart-json-" . $id . $row["node_type_id"]
)
)
)
));
 
$i++;
}
}
}
//Convert the array created into JSON as our chart would recieve the dat ain JSON
$jsonEncodedData = json_encode($arrData);
$columnChart = new FusionCharts("column2d", "myFirstChart" , "300%", "500", "linked-chart", "json", "$jsonEncodedData");
$columnChart->render(); //Render Method
$dbhandle->close(); //Closing DB Connection
}
}
?>
 
<body>
<!-- DOM element for Chart -->
<?php echo "<script type=\"text/javascript\" >
FusionCharts.ready(function () {
FusionCharts('myFirstChart').configureLink({
overlayButton: {
message: 'Back',
padding: '13',
fontSize: '16',
fontColor: '#F7F3E7',
bold: '0',
bgColor: '#22252A',
borderColor: '#D5555C' } });
});
</script>"
?>
<div style="width:300px;" ><center><div id="linked-chart">Awesome Chart on its way!</div></center></div>
</body>
</html>