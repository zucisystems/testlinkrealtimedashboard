<style>
plotOptions: {
    column: {
        stacking: 'normal',
        dataLabels: {
            enabled: true,
            color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
        }
    }
}
</style>
<style>
body {font-family: "Lato", sans-serif;}
ul.tab {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Float the list items side by side */
ul.tab li {float: left;}

/* Style the links inside the list items */
ul.tab li a {
    display: inline-block;
    color: black;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of links on hover */
ul.tab li a:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
ul.tab li a:focus, .active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
}
</style>
<style>
    html,
    body,
    #myChart {
      width: 60%;
      height: 50%;
    }
  </style>
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
.chosen-container1 {
    -moz-user-select: none;
    display: inline-block;
    font-size: 13px;
    position: relative;
    vertical-align: middle;
}
</style>
<script type="text/javascript">
$(document).ready(function() {
    var options = {
        chart: {
            renderTo: 'container',
            type: 'column',
            marginRight: 130,
            marginBottom: 25
        },
        title: {
            text: 'Project Requests',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20
        },
        xAxis: {
            categories: []
        },
        yAxis: {
            title: {
                text: 'Status '
            },
            plotLines: [{
                value: b,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+
                    this.x +': '+ this.y;
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -10,
            y: 100,
            borderWidth: 0
        },
         plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true,
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
                }
                }
            }
        },
        series: []
    }
   
    $.getJSON("project_data.php", function(json) {
    options.xAxis.categories = json[0]['data'];
        options.series[0] = json[1];
        options.series[1] = json[2];
       options.series[2] = json[3];
        chart = new Highcharts.Chart(options);
    });
});
</script>
<script type="text/javascript">
$(document).ready(function() {
    var options = {
        chart: {
            renderTo: 'container1',
            type: 'column',
            marginRight: 130,
            marginBottom: 25
        },
        title: {
            text: 'Project Requests',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20
        },
        xAxis: {
            categories: []
        },
        yAxis: {
            title: {
                text: 'Status'
            },
            plotLines: [{
                value: b,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            formatter: function() {
                    return '<b>'+ this.series.name +'</b><br/>'+
                    this.x +': '+ this.y;
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -10,
            y: 100,
            borderWidth: 0
        },
         plotOptions: {
            column: {
                stacking: 'normal',
                dataLabels: {
                    enabled: true,
                    color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
                }
                }
            }
        },
        series: []
    }
   
    $.getJSON("project_data1.php", function(json) {
    options.xAxis.categories = json[0]['data'];
        options.series[0] = json[1];
        options.series[1] = json[2];
       //options.series[2] = json[3];
        chart = new Highcharts.Chart(options);
    });
});
</script>
<!DOCTYPE HTML>
<html>
<div style="width:1347">
<head>
<h1> Overall Project Dashboard</h1>
  <ul class="tab">
  <li><a href="#" class="tablinks" onclick="openCity(event, 'pstatus')">Project Status</a></li>
  <li><a href="#" class="tablinks" onclick="openCity(event, 'astatus')">Automation Status</a></li>
  <li><a href="#" class="tablinks" onclick="openCity(event, 'otstatus')">Other Related Reports</a></li>
       		
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
		
        <script type="text/javascript">
        $(document).ready(function() {
            var options = {
                chart: {
                    renderTo:'container',
                    type: 'column',
                    marginRight: 130,
                    marginBottom: 25
                },
                title: {
                    text: 'Project Status',
                    x: -20 //center
                },
                subtitle: {
                    text: '',
                    x: -20
                },
                xAxis: {
                    categories: []
                },
                yAxis: {
                    title: {
                        text: 'Status'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    formatter: function() {
                            return '<b>'+ this.series.name +'</b><br/>'+
                            this.x +': '+ this.y;
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -10,
                    y: 100,
                    borderWidth: 0
                },
                 plotOptions: {
                    column: {
                        stacking: 'normal',
                        dataLabels: {
                            enabled: true,
                            color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
                        }
                    }
                },
                series: []
            }
           
            $.getJSON("project_data.php", function(json) {
                options.xAxis.categories = json[0]['data'];
                options.series[0] = json[1];
                options.series[1] = json[2];
                options.series[2] = json[3];
                chart = new Highcharts.Chart(options);
            });
        });
        </script>
        <script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>
</head>

<body>
<div id="pstatus" class="tabcontent">
<table class="smallGrey" style="width:200%;height:200%;overflow: visible;"> 
<tr>
<td>
<h3>Project Health</h3>
</td>
</tr>
<tr>
<td>
<div id="container" style="min-width: 900px; height: 400px; margin: 0 auto"></div>
</td>
</tr>
</table>
</div>

<div id="astatus" class="tabcontent">
<table class="smallGrey" style="width:200%;height:200%;overflow: visible;"> 
<tr>
<td>
<h3>Automation Status</h3>
</td>
</tr>
<tr>
<td>
<div id="container1" style="min-width: 800px; height: 400px; margin: 0 auto"></div>
</td>
</tr>
</table>
</div>

<div id="otstatus" class="tabcontent">    
<table class="smallGrey" style="width:200%;height:200%overflow: visible;">
<tr>
<td>
<h3>Other Related Reports</h3>
</td>
</tr>
<tr>
<td>
<h2>Report Type</h2>
</td>
</tr>
<tr>
<td>
<label for="reporttype">Overall :</label>
<select id ="reporttype">
<option value='0'> Select Type</option>
<option value='1'>  Project</option>
<option value='2'>  Test Plan</option>
<option value='3'>  Build</option>
</select>
</td>
</tr>
<tr>
<td>
<label for="reporttype"> Manual:</label>
<select id ="reporttype">
<option value='0'> Select Type</option>
<option value='1'>  Project</option>
<option value='2'>  Test Plan</option>
<option value='3'>  Build</option>
</select>
</td>
</tr>
<tr>
<td>
<label for="reporttype"> Report Type:</label>
<select id ="reporttype">
<option value='0'> Select Type</option>
<option value='1'> Overall Project</option>
<option value='2'> Overall Test Plan</option>
<option value='3'> Overall Build</option>
</select>
</td>
</tr>
<div class="chosen-container chosen-container-single" style="width: 85%;" title="">
<tr>
<td>
<?php $testprojects['#'] = 'Please Select'; ?>
<label for="testproject">Testproject: </label><?php echo form_dropdown('testproject_id', $testprojects, '#', 'id="testproject"'); ?><br />
</td>
</tr>
<tr>
<td>
 <?php $plan['#'] = 'Please Select'; ?>
<label for="city">TestPlan: </label><?php echo form_dropdown('plan_id', $plan, '#', 'id="plan"'); ?><br />
</td>
</tr>
<tr>
<td>
 <?php $build['#'] = 'Please Select'; ?>
<label for="city">Build: </label><?php echo form_dropdown('build_id', $build, '#', 'id="build"'); ?><br />
</td>
</tr>
<tr id="overallprolink">
<td>
<a target="workframe" href="lib/results/resultsByStatus.php?type=f&format=0&tplan_id=73 ">Overall Project</a>
</td>
</tr>
<tr id="manualprolink">
<td>
<a target="workframe" href="lib/results/resultsByStatus.php?type=f&format=0&tplan_id=73 ">Manually Tested Project</a>
</td>
</tr>
<tr id="autoprolink">
<td>
<a target="workframe" href="lib/results/resultsByStatus.php?type=f&format=0&tplan_id=73 ">Automation Tested Project</a>
</td>
</tr>

<tr id="overallplanlink">
<td>
<a target="workframe" href="lib/results/resultsByStatus.php?type=f&format=0&tplan_id=73 ">Overall Testplan</a>
</td>
</tr>
<tr id="manualplanlink">
<td>
<a target="workframe" href="lib/results/resultsByStatus.php?type=f&format=0&tplan_id=73 ">Manual-Testplan</a>
</td>
</tr>
<tr id="autoplanlink">
<td>
<a target="workframe" href="lib/results/resultsByStatus.php?type=f&format=0&tplan_id=73 ">Automated-Testplan</a>
</td>
</tr>

<tr id="overallbuildlink">
<td>
<a target="workframe" href="lib/results/resultsByStatus.php?type=f&format=0&tplan_id=73 ">Overall Build Status</a>
</td>
</tr>
<tr id="manualbuildlink">
<td>
<a target="workframe" href="lib/results/resultsByStatus.php?type=f&format=0&tplan_id=73 ">Manual Build Status</a>
</td>
</tr>
<tr id="autobuildlink">
<td>
<a target="workframe" href="lib/results/resultsByStatus.php?type=f&format=0&tplan_id=73 ">Automated Build Status</a>
</td>
</tr>
</table>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 <script type="text/javascript">// <![CDATA[
 $(document).ready(function(){
 $('#testproject').change(function(){ //any select change on the dropdown with id testproject trigger this code
 $("#plan > option").remove(); //first of all clear select items
 $("#build > option").remove();
 var testproject_id = $('#testproject').val(); // here we are taking testproject id of the selected one.
 $.ajax({
 type: "POST",
 
url: 'index.php/reportdashboard/getplan/'+testproject_id, 
 //url: "localhost/dashboard/get_plan/"+testproject_id
//here we are calling our user controller and get_plan method with the testproject_id
 data: { 'testprojectid': testproject_id},
 success: function(plan) //we're calling the response json array 'plan'
 {
 $.each(plan,function(id,name) //here we're doing a foeach loop round each city with id as the key and city as the value
 {
 var opt = $('<option />'); // here we're creating a new select option with for each city
 opt.val(id);
 opt.text(name);
 $('#plan').append(opt); //here we will append these new select options to a dropdown with the id 'plan'
 });
 }
 
 });
 
 });
 });
 // ]]>
</script>
 <script type="text/javascript">// <![CDATA[
 $(document).ready(function(){
 $('#plan').change(function(){ //any select change on the dropdown with id testproject trigger this code
  //first of all clear select items
 $("#build > option").remove();
 var plan_id = $('#plan').val(); // here we are taking testproject id of the selected one.
 $.ajax({
 type: "POST",
 
url: 'index.php/reportdashboard/getbuild/'+plan_id, 
 //url: "localhost/dashboard/get_plan/"+testproject_id
//here we are calling our user controller and get_plan method with the testproject_id
 data: { 'plan_id': plan_id},
 success: function(build) //we're calling the response json array 'plan'
 {
 $.each(build,function(id,name) //here we're doing a foeach loop round each city with id as the key and city as the value
 {
 var opt = $('<option />'); // here we're creating a new select option with for each city
 opt.val(id);
 opt.text(name);
 $('#build').append(opt); //here we will append these new select options to a dropdown with the id 'plan'
 });
 }
 
 });
 
 });
 });
 // ]]>
</script>
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script type="text/javascript">
        $(document).ready(function() {
            var options = {
                chart: {
                    renderTo:'container1',
                    type: 'column',
                    marginRight: 130,
                    marginBottom: 25
                },
                title: {
                    text: 'Project Status',
                    x: -20 //center
                },
                subtitle: {
                    text: '',
                    x: -20
                },
                xAxis: {
                    categories: []
                },
                yAxis: {
                    title: {
                        text: 'Status'
                    },
                    plotLines: [{
                        value: 0,
                        width: 1,
                        color: '#808080'
                    }]
                },
                tooltip: {
                    formatter: function() {
                            return '<b>'+ this.series.name +'</b><br/>'+
                            this.x +': '+ this.y;
                    }
                },
                legend: {
                    layout: 'vertical',
                    align: 'right',
                    verticalAlign: 'top',
                    x: -10,
                    y: 100,
                    borderWidth: 0
                },
                 plotOptions: {
                    column: {
                        stacking: 'normal',
                        dataLabels: {
                            enabled: true,
                            color: (Highcharts.theme && Highcharts.theme.dataLabelsColor) || 'white'
                        }
                    }
                },
                series: []
            }
           
            $.getJSON("project_data1.php", function(json) {
                options.xAxis.categories = json[0]['data'];
                options.series[0] = json[1];
                options.series[1] = json[2];
              //  options.series[2] = json[3];
                chart = new Highcharts.Chart(options);
            });
        });
        </script>
		<script>
		$(document).ready(function(){
   
		$('#reporttype').change(function(){
			
      if ( this.value == '1')
      
      {
        $("#testproject").show();
		$("#plan").hide();
		$("#build").hide();
		$("#prolink").hide();
      }
	  if(this.value =='2')
	  {
		$("#testproject").show();
		$("#plan").show();
		$("#build").hide();
		  
	  }
	   if(this.value =='3')
	  {
		$("#testproject").show();
		$("#plan").show();
		$("#build").show();
		  
	  }
	  
      
    });
});
		
		
		
		
		</script>
</body>
</div>

<div style="margin: auto; min-height:30px; height: 20px; width: 1345px; position: relative;background: none repeat scroll 0 0 #005599; border: 1px solid black;
    color: white;text-align:right">Copyright © Zuci Systems. All rights reserved.</div>
</html>


