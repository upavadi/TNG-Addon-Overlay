<?php
/************ Article *********/
$cms['tngpath'] = "../";
include( "../tng_begin.php");
if( !$cms['support'] )
	$cms['tngpath'] = "../";

$title = "Pranshanker Joshi (1867 - 1958) - 2";
$description = "Friend of Mahatma Gandhi - Article in Gujarati Newspaper, Kumar";

$path = $_SERVER['PHP_SELF'];

$logstring = "<a href=\"$path\">". $title. "</a>";
writelog($logstring);
preparebookmark($logstring);
//var_dump($logstring);

$flags['noicons'] = true;
tng_header( $title, $flags ); 

?>
<style>
    .pdf {
        width: 100%;
        aspect-ratio: 4 / 3;
    }

    .pdf,
    html,
    body {
        height: 100%;
        margin: 0;
        padding: 0;
    } 
</style>

<div class="contentRight">
    <h1><?php echo $title ; ?></h1>
    <?php echo $description; ?>

    <object class="pdf" 
            data= "../documents/Pranshankar_B.Joshi.pdf"
            width="800"
            height="500">
    </object>
</div>
</body>

<!SIDEBAR--------------------------------------------->
<?php
include('../templates/template21/sidebar1.php');
?>
<div class="clear"></div>
<p>&nbsp;</p>
<p class="center"><a class="btn-detail" href="../index.php">Back to (Histories) Home</a></p>
<?php tng_footer( "" ); ?>