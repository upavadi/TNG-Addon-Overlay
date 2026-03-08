<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<?php
/************ No Blacks ******* */
$cms['tngpath'] = "../";
include( "../tng_begin.php");
if( !$cms['support'] )
	$cms['tngpath'] = "../";

$title = "No Blacks";
$description = "";
$path = $_SERVER['PHP_SELF'];

$logstring = "<a href=\"$path\">". $title. "</a>";
writelog($logstring);
preparebookmark($logstring);

$flags['noicons'] = true;
tng_header( "No Blacks, No Dogs, No Irish", $flags ); 

?>
<p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>

<div>
    <h1 class="article-title">It Was Standard To See Signs Saying, No Blacks, No Dogs, No Irish</h1>
    <h4 class="article-description"><a href="https://rightsinfo.org/racism-1960s-britain/?utm_source=facebook&utm_medium=social&utm_campaign=SocialWarfare">A web Article</a> by By Rahul Verma, for Human Rights News, Views & Info (now renamed eachother.org) <br>The R.R.B. Judgement is also reproduced <a href="../articles/Judgement_R.R.B's_first_prosecution.php">Here</a></h4>

    <object class="pdf" 
            data= "../articles/noBlacks-nocontent.pdf"
            width="800"
            height="500">
    <p>
    This document cannot be displayed in your browser.
    <a href="../articles/noBlacks-nocontent.pdf" target="_blank">Click <b>here</b> to download or view the PDF.</a>
    </p>
    </object>
</div>
</body>

<p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>
<?php tng_footer( "" ); ?>





