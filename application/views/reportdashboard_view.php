<?php
 echo "<form method=post name=dashboard action='reportdashboard.php'>";

/// Add your form processing page address to action in above line. Example  action=dd-check.php////


////////// Starting of first drop downlist /////////
echo "<select name='testplan' onchange=\"reload(this.form)\"><option
value=''>Select one now</option>";
foreach ($dbo->query($quer2) as $noticia2) {
if($noticia2['id']==@$cat){echo "<option selected
value='$noticia2[id]'>$noticia2[is_open]</option>"."<BR>";}
else{echo "<option
value='$noticia2[cat_id]'>$noticia2[category]</option>";}
}
echo "</select>";


////////////////// This will end the first drop down list ///////////


////////// Starting of second drop downlist /////////
echo "<select name='testproject'><option value=''>Select
two</option>";
foreach ($dbo->query($quer) as $noticia) { 
echo "<option value='$noticia[subcategory]'>$noticia[subcategory]</option>";
}
echo "</select>";
////////////////// This will end thesecond drop down list ///////////

// add your other form fields here ////

echo "<input type=submit value=Submit>";

echo "</form>";
?>