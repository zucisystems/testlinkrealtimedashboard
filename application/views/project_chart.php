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
  <h3>Other Related Reports</h3>
  
  
  <table class="smallGrey" style="width:200%;height:200%overflow: visible;">
<tr>
<td>
<div class="chosen-container chosen-container-single" style="width: 85%;" title="">
<?php $testprojects['#'] = 'Please Select'; ?>
<label for="testproject">Testproject: </label><?php echo form_dropdown('testproject_id', $testprojects, '#', 'id="testproject"'); ?><br />
</td>
</div>
</tr>
<tr>

<td>
 <?php $plan['#'] = 'Please Select'; ?>
<label for="city">TestPlan: </label><?php echo form_dropdown('plan_id', $plan, '#', 'id="plan"'); ?><br />
</td>
</tr>
</table>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 <script type="text/javascript">// <![CDATA[
 $(document).ready(function(){
 $('#testproject').change(function(){ //any select change on the dropdown with id testproject trigger this code
 $("#plan > option").remove(); //first of all clear select items
 $("#testcase > option").remove();
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
</body>
</div>
</html>


