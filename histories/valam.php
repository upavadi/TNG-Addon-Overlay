<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<?php
/************ History ******* */
$cms['tngpath'] = "../";
include( "../tng_begin.php");
if( !$cms['support'] )
	$cms['tngpath'] = "../";

$title = "Valam Brahmins";
$description = "";
$path = $_SERVER['PHP_SELF'];

$logstring = "<a href=\"$path\">". $title. "</a>";
writelog($logstring);
preparebookmark($logstring);
var_dump($logstring);

$flags['noicons'] = true;
tng_header( "valam", $flags ); 

?>
<p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>

<div>
    <h1 class="article-title">Valam Gnati</h1>
    <?php echo $description; ?>

    <object class="pdf" 
            data= "../documents/History_of_the_Valam_Gnati.pdf"
            width="800"
            height="500">
    <p>
    This document cannot be displayed in your browser.
    <a href="../documents/History_of_the_Valam_Gnati.pdf" target="_blank">Click <b>here</b> to download or view the PDF.</a>
    </p>
    </object>
</div>
</body>

<p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>
<?php tng_footer( "" ); ?>





