<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta content="text/html; charset=utf-8" http-equiv="Content-Type"> 
<?php
/************ Bakula Pandya ******* */
$cms['tngpath'] = "../";
include( "../tng_begin.php");
if( !$cms['support'] )
	$cms['tngpath'] = "../";

$title = "Not Out At 87";
$description = "";
$path = $_SERVER['PHP_SELF'];

$logstring = "<a href=\"$path\">". $title. "</a>";
writelog($logstring);
preparebookmark($logstring);
var_dump($logstring);

$flags['noicons'] = true;
tng_header( "Not Out @ 87", $flags ); 

?>

<div class="article-text">
    <h1 class="article-title">Not Out at 87</h1>
    Gujarati Article in Chitralekha Magazine for <a href="../getperson.php?personID=I666">Bakula Pandya</a>
    <p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>

    <object class="pdf" 
            data= "../histories/chitralekha-Bakula-Pandya.pdf"
            width="800"
            height="500">
    <p>
    This document cannot be displayed in your browser.
    <a href="../histories/chitralekha-Bakula-Pandya.pdf" target="_blank">Click <b>here</b> to download or view the PDF.</a>
    </p>
    </object>
</div>
</body>

<p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>
<?php tng_footer( "" ); ?>





