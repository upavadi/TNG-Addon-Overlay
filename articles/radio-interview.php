<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<?php
/************ History ******* */
$cms['tngpath'] = "../";
include( "../tng_begin.php");
if( !$cms['support'] )
	$cms['tngpath'] = "../";

$title = "Radio Interview";
$description = "";
$path = $_SERVER['PHP_SELF'];

$logstring = "<a href=\"$path\">". $title. "</a>";
writelog($logstring);
preparebookmark($logstring);

$flags['noicons'] = true;
tng_header( "RRB JUdjement", $flags ); 

?>

<div class="center">
    <h1 class="article-title"><b>First Case of Race Discrimination - United Kingdom</b></h1>
    <h4 class="article-description"><a href="<?php echo $tngdomain. 'getperson.php?personID=I695';?>"> <b>Mahesh Upadhyaya</b></a></a> and <a href="<?php echo $tngdomain. 'getperson.php?personID=I925';?>"> <b>Nikesh Shukla</b></b></a></a><b> discuss 50 years of Race Discrimination Act - UK on BBC Radio 4.</b></h4>

    <div style="margin: 10px">
        <p>Race Relation Act was introduced in Uk, in 1968.<br /> First court case of discrimination was brought by Mahesh Upadhyaya against a builder who had a policy not to sell properties to coloured people.
        </p>
        <p>
        In this edited excerpt of radio interview, on BBC, <a href="http://www.upavadi.net/family/?personId=I695&amp;tree=upavadi_1"><b>Mahesh </b></a> and <a href="http://www.upavadi.net/family/?personId=I926&amp;tree=upavadi_1"><b>Nikesh Shukla</b></a> discuss changes in racism, 50 years since the enacment of Race Relations Act.
        </p>
        <audio controls>
          <source src="BroadcastingHouse-20180415_excerpt.mp3" type="audio/mpeg">
         Your browser does not support the audio element.
        </audio>

</body>

<p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>
<?php tng_footer( "" ); ?>





