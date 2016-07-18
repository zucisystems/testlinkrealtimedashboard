<!DOCTYPE html>
<html>



<head>
<h1> Overall Project Dashboard</h1>
  <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
  <script>
    zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
    ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
  </script>
  <style>
    html,
    body,
    #myChart {
      width: 60%;
      height: 50%;
    }
  </style>
</head>

<body>
  <table class="smallGrey" style="width:200%;height:200%;overflow: visible;"> 
  <tr>
<td>
Project Health
</td>
</tr>
<tr>
<td>
  <div id='myChart'>
</div>
</td>
</tr>
 </table>
  <script>
    var myConfig = {
      type: "bar",
      plot: {
        stacked: true,
        stackType: "normal"
      },
      series: [{
        values: [20, 40, 25, 50, 15, 45, 33, 34]
      }, {
        values: [5, 30, 21, 18, 59, 50, 28, 33]
      }, {
        values: [30, 5, 18, 21, 33, 41, 29, 15]
      }]
    };

    zingchart.render({
      id: 'myChart',
      data: myConfig,
      height: "30%",
      width: "50%"
    });
  </script>
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

</body>

</html>