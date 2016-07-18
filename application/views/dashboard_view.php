<html>

 <head>
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 <script type="text/javascript">// <![CDATA[
 $(document).ready(function(){
 $('#testplan').change(function(){ //any select change on the dropdown with id testplan trigger this code
 $("#build > option").remove(); //first of all clear select items
 $("#testcase > option").remove();
 var testplan_id = $('#testplan').val(); // here we are taking testplan id of the selected one.
 $.ajax({
 type: "POST",
 
url: 'index.php/reportdashboard/getbuild/'+testplan_id, 
 //url: "localhost/dashboard/get_build/"+testplan_id
//here we are calling our user controller and get_build method with the testplan_id
 data: { 'testplanid': testplan_id},
 success: function(build) //we're calling the response json array 'build'
 {
 $.each(build,function(id,name) //here we're doing a foeach loop round each city with id as the key and city as the value
 {
 var opt = $('<option />'); // here we're creating a new select option with for each city
 opt.val(id);
 opt.text(name);
 $('#build').append(opt); //here we will append these new select options to a dropdown with the id 'build'
 });
 }
 
 });
 
 });
 });
 // ]]>
</script>
 </head>
<body>
<table class="smallGrey" style="width:98%;overflow: visible;">
<tr>
<td>
<div class="chosen-container chosen-container-single" style="width: 85%;" title="">
<?php $testplans['#'] = 'Please Select'; ?>
<label for="testplan">Testplan: </label><?php echo form_dropdown('testplan_id', $testplans, '#', 'id="testplan"'); ?><br />
</td>
</div>
</tr>
<tr>

<td>
 <?php $build['#'] = 'Please Select'; ?>
<label for="city">Build: </label><?php echo form_dropdown('build_id', $build, '#', 'id="build"'); ?><br />
</td>
</tr>
</table>
</body>
</html>
<style>
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