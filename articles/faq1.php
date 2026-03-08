<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<?php
/************ FAQs ******* */
$cms['tngpath'] = "../";
include( "../tng_begin.php");
if( !$cms['support'] )
	$cms['tngpath'] = "../";

/*  $logstring should contain the URL for your family stories
	writelog creates an entry in the Access Log
	preparebookmark creates the bookmark link on the page  */
$title = "FAQs";
$description = "";
$path = $_SERVER['PHP_SELF'];

$logstring = "<a href=\"$path\">". $title. "</a>";
writelog($logstring);
preparebookmark($logstring);;

tng_header( "FAQs", $flags ); 

?>

<div class="article-text">
	<h1 class="article-title">FAQs</h1>
<p>
<b>To be Completed</b>
</p>
<p>
With your help, We are updating the software and the text in Google doc. 
Once the software developement is complete, I shall update the FAQs, here.
</p>
</div>


<?php tng_footer( "" ); ?>

