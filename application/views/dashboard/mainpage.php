<html>
<head>
<h1> Overall Project Dashboard</h1>
</head>
<body>
<div="workback">
<table class="smallGrey" style="width:100%;height:100%;overflow: visible;">
<tr>
<td>
Project Health
</td>
</tr>
<tr>
<td>


<?php
include("phpgraphlib.php");
include("phpgraphlib_stacked.php");
$graph = new PHPGraphLibStacked(500,300);
$popularity = array('Windows 7'=>80, 'Mac OS 10'=>35, 'Fedora'=>9);
$cost = array('Windows 7'=>10, 'Mac OS'=>30, 'Fedora'=>90);
$speed = array('Windows 7'=>50,'Mac OS'=>50,'Fedora'=>80);
$graph->addData($popularity, $cost, $speed);
$graph->setTitle('Operating System Scores');
$graph->setTitleLocation('left');
$graph->setXValuesHorizontal(TRUE);
$graph->setTextColor('blue');
$graph->setBarColor=array('#0066CC', '#669999', '#66CCCC');
$graph->setLegend(TRUE);
$graph->setLegendTitle=array('Popularity', 'Cost', 'Speed');
$graph->createGraph();
?>

</td>
</tr>

</table>
</div>

</body>
</html>
<!--Made changes h1 tag before 85% and changed to 130%-->
<style>
h1, h1.title {
    background: none repeat scroll 0 0 #005599;
    border: 1px solid black;
    color: white;
    font-size: 130%;
    font-weight: bold;
    margin: 0 0 4px;
    padding: 3px;
    text-align: left;
}
div.workBack {
    background: none repeat scroll 0 0 #CCDDEE;
    border-style: groove;
    border-width: thin;
    margin: 3px;
    padding: 3px 3px 50px;
    text-align: left;
}
table.smallGrey {
    background: none repeat scroll 0 0 #EEEEEE;
    border: 1px solid black;
    font-size: smaller;
    margin-bottom: 10px;
    margin-right: 0;
}
.chosen-container {
    -moz-user-select: none;
    display: inline-block;
    font-size: 13px;
    position: relative;
    vertical-align: middle;
}
</style>


