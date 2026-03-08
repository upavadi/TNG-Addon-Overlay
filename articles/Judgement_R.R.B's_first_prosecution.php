<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<?php
/************ RRB JUdgement ******* */
$cms['tngpath'] = "../";
include( "../tng_begin.php");
if( !$cms['support'] )
	$cms['tngpath'] = "../";

$title = "RRB JUdgement";
$description = "";
$path = $_SERVER['PHP_SELF'];

$logstring = "<a href=\"$path\">". $title. "</a>";
writelog($logstring);
preparebookmark($logstring);
var_dump($logstring);

$flags['noicons'] = true;
tng_header( "RRB JUdjement", $flags ); 

?>

<p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>
<div>
    <h1 class="article-title">Judgement in Race Relations Board's first prosecution.</h1>
    <h4 class="article-description">This is an addendum to the the web Article <i>It Was Standard To See Signs.Saying,'No Blacks, No Dogs, No Irish'</i> by Rahul Verma, News Editor, for Human Rights News, Views & Info. <br>This Content from Runnymead Trust website has now been removed.


    <object class="pdf" 
            data= "../articles/Judgement_R.R.B's_first_prosecution.pdf"
            width="800"
            height="500">
    <p>
    This document cannot be displayed in your browser.
    <a href="../articles/Judgement_R.R.B's_first_prosecution.pdf" target="_blank">Click <b>here</b> to download or view the PDF.</a>
    </p>
    </object>
</div>
</body>

<p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>
<?php tng_footer( "" ); ?>





