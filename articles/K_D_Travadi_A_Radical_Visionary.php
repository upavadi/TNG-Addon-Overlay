<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<?php
/************ Radical Visionery ******* */
$cms['tngpath'] = "../";
include( "../tng_begin.php");
if( !$cms['support'] )
	$cms['tngpath'] = "../";

$title = "Radical Visionery";
$description = "";
$path = $_SERVER['PHP_SELF'];

$logstring = "<a href=\"$path\">". $title. "</a>";
writelog($logstring);
preparebookmark($logstring);

$flags['noicons'] = true;
tng_header( "A Radical Visionary", $flags ); 
?>
<p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>  
<div>
    <h1 class="article-title">K.D. Travadi - A Radical Visionary</h1>
    <h4 class="article-description">A web Article by By Shashi Tavares in Awaaz Magazine<br>
Shashi is a retired high school teacher, former President and an executive member of the Alpha Delta Kappa - ETA Chapter, an international Women Teachers' organization.</h4>
  
    <object class="pdf" 
            data= "../articles/K_D_Travadi _ A Radical_Visionary_AwaaZ_Magazine.pdf"
            
            width="800"
            height="500">
    <p>
    This document cannot be displayed in your browser.
    <a href="../articles/K_D_Travadi _ A Radical_Visionary_AwaaZ_Magazine" target="_blank">Click <b>here</b> to download or view the PDF.</a>
    </p>
    </object>
</div>
</body>
<?php tng_footer( "" ); ?>





