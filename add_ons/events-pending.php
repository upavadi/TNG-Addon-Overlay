 <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<?php
$cms['tngpath'] = "../";
include( "../tng_begin.php");
if( !$cms['support'] )
	$cms['tngpath'] = "../";

$title = "Name Pending";
$path = $_SERVER['PHP_SELF'];

$logstring = "<a href=\"$path\">". $title. "</a>";
writelog($logstring);
preparebookmark($logstring);

$flags['noicons'] = true;
tng_header( "Events - Pending", $flags ); 
?>

<p>
<div class="article-text">
	<h1 class="article-title"> Events Listing</h1>

</p>
<p>
<b>Under construction</b>
</p>
<p>
Moving away from the Wordpress platform, we are going to lose birth, marriage and death anniversary reports. I can try and create a combined 'Upcoming Events'.Have a look at <a href="https://upavadi.net/wt-mu/index.php">This Sample</a> I welcome your input.
</p>
</div>

<div class="search-section">
    <form action="<?php echo $tngdomain. 'search.php'; ?>" method="get">
    <form action="search.php" method="get">
        <table border="0" cellspacing="5" cellpadding="0">
            <tr>
                <td><span class="normal"><?php echo $text['mnufirstname']; ?>:</span><input type="text" name="myfirstname" size="14"></td>
                <td><?php echo $text['mnulastname']; ?>:<input type="text" name="mylastname" size="14">
                </td>
                <td><input type="hidden" name="mybool" value="AND" /><input type="hidden" name="offset" value="0" /><input type="submit" name="search" value="<?php echo $text['mnusearch']; ?>" />
                </td>
            </tr>
        </table>
    </form>
</div>

<div>
<p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>
<?php tng_footer( "" ); ?>

