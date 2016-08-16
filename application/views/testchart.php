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
.chosen-container2 {
    -moz-user-select: none;
    display: inline-block;
    font-size: 13px;
    position: relative;
    vertical-align: middle;
}
</style>

        <script src="http://code.highcharts.com/highcharts.js"></script>
        <script src="http://code.highcharts.com/modules/exporting.js"></script>




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
                text: 'Status Result'
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
                text: 'Status Result'
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
                        text: 'Results'
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
<form action="" method=GET>
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
<h3>Execution Status</h3>
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
<label for="reporttype"> Report Type:</label>
<select id ="reporttype" name="reporttype">
<option value='0'> Select Type</option>
<option value='1'> Overall Project</option>
<option value='2'> Overall Test Plan</option>
<option value='3'> Overall Build</option>
<option value='4'> Manual Project</option>
<option value='5'> Manual Testplan</option>
<option value='6'> Manual Build</option>
<option value='7'> Automated Project</option>
<option value='8'> Automated Test Plan</option>
<option value='9'> Automated Build</option>
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

<tr>
<td>
<div id="container2" style="min-width: 800px; height: 400px; margin: 0 auto"></div>
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
                    text: 'Execution Status',
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
                        text: 'Results'
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
        $("#testproject").hide();
		$("#plan").hide();
		$("#build").hide();
		//$("#prolink").hide();
      }
	  if(this.value =='2')
	  {
		$("#testproject").hide();
		$("#plan").hide();
		$("#build").hide();
		  
	  }
	   if(this.value =='3')
	  {
		$("#testproject").hide();
		$("#plan").hide();
		$("#build").hide();
		  
	  }
	   if(this.value =='4')
	  {
		$("#testproject").show();
		$("#plan").hide();
		$("#build").hide();
		  
	  }
	   if(this.value =='5')
	  {
		$("#testproject").show();
		$("#plan").show();
		$("#build").hide();
		  
	  }
	   if(this.value =='6')
	  {
		$("#testproject").show();
		$("#plan").show();
		$("#build").show();
		  
	  }
	   if(this.value =='7')
	  {
		$("#testproject").show();
		$("#plan").hide();
		$("#build").hide();
		  
	  }
	   if(this.value =='8')
	  {
		$("#testproject").show();
		$("#plan").show();
		$("#build").hide();
		  
	  }
	   if(this.value =='9')
	  {
		$("#testproject").show();
		$("#plan").show();
		$("#build").show();
		  
	  }
      
    });
});
		
		
		
		
		</script>

		
		
		
		
		</form>
</body>
</div>

<div style="margin: auto; min-height:30px; height: 20px; width: 1345px; position: relative;background: none repeat scroll 0 0 #005599; border: 1px solid black;
    color: white;text-align:right">Copyright © Zuci Systems. All rights reserved.</div>
</html>




<script>
$(function() {
  var chart = new Highcharts.Chart({
    chart: {
      renderTo: 'container2',
      type: 'line',
      title: 'please select a category'
    },

   /* xAxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'] //here we have a common timeline  (dates)
    }*/
  });
  var chartType = "line";
  $("#chartType").change(function() {
    chartType = $("#chartType option:selected").val();
  });
   
 $('#reporttype').change(function(){
  
    value = this.value;
	
    while (chart.series.length > 0) {
      chart.series[0].remove(true);
    }
	
    if (value == '1') {
      chart.yAxis[0].setTitle({
        text: "Projectwise"
      });
      chart.setTitle({
        text: "OverallProject"
      });
      chart.addSeries({
        name: '#Project Status',
        type: chartType,
        color: '#43cd80',
        data: [100, 200, 300, 400, 100, 200, 100, 200, 300, 100, 400, 100] //no. of active learners 
		
      });

    } else if (value == '2') {
      chart.addSeries({
        name: 'Testplan',
        type: 'column',
        color: '#7FCDBB',
        data: [100, 280, 300, 490, 670, 900, 100, 200, 300, 400, 500, 100]
      });
      chart.addSeries({
        name: 'Testplan 1',
        type: 'column',
        color: '#41B6C4',
        data: [100, 200, 300, 400, 100, 200, 900, 800, 300, 500, 200, 100]
      });
      chart.addSeries({
        name: 'Testplan 2',
        type: 'column',
        color: '#1D91C0',
        data: [234, 578, 234, 895, 234, 54, 214, 234, 474, 214, 123, 235]
      });
      chart.addSeries({
        name: 'Testplan 3',
        type: 'column',
        color: '#253494',
        data: [343, 132, 467, 124, 214, 55, 73, 546, 435, 23, 56, 746]
      });
      chart.yAxis[0].setTitle({
        text: "#Status"
      });
      chart.setTitle({
        text: "Overall Testplan Status"
      });
    } else if (value == '3') {
      chart.addSeries({
        name: 'build 1',
        type: 'column',
        color: '#FCC5C0',
        data: [450, 770, 540, 110, 340, 870, 200, 500, 300, 600, 100]
      });
      chart.addSeries({
        name: 'build 2',
        type: 'column',
        color: '#F768A1',
        data: [563, 234, 675, 567, 234, 834, 341, 415, 300, 200, 100, 200, 400]
      });
      chart.addSeries({
        name: 'build 3',
        type: 'column',
        color: '#AE017E',
        data: [100, 200, 300, 400, 500, 100, 200, 300, 400, 500]
      });
      chart.addSeries({
        name: 'build 4',
        type: 'column',
        color: '#49006A',
        data: [400, 300, 200, 400, 200, 300, 500, 600, 100, 600, 700]
      });
    } else {
      chart.addSeries({
        name: 'Manual Project Status',
        type: 'column',
        color: '#ffcc99',
        data: [100, 0, 200, 0, 300, 100, 400, 100, 500, 200, 500, 300]
      });
    }
  });
});
</script>