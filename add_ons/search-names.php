 <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<?php
global $text, $currentuser, $currentuserdesc, $cms, $allow_admin, $subroot, $tmp, $homepage;
$cms['tngpath'] = "../";
include( "../tng_begin.php");
if( !$cms['support'] )
	$cms['tngpath'] = "../";

$title = "Quick Search";
$path = $_SERVER['PHP_SELF'];

$logstring = "<a href=\"$path\">". $title. "</a>";
writelog($logstring);
preparebookmark($logstring);

$flags['noicons'] = true;
 tng_header( "Quick Search", $flags ); 
?>
<!DOCTYPE html>
<!--
<link rel="stylesheet" href="<?php echo $tngdomain; ?>/add_ons/custom-menu/topmenu-menu.css">
-->
<link rel="stylesheet" href="<?php echo $tngdomain; ?>/css/TngHomePage.css">
<link rel="stylesheet" href="<?php echo $tngdomain; ?>/css/templatestyle.css">

<p>
<div class="article-text">
	<h1 class="article-title">Quick Search</h1>
</p>
<p>
    <?php if( !$currentuser ) echo "<b>You would need to login For complete Family Search"; ?>
</p>
<p>
   <i> Note: For ladies, Last Name is the maiden name.</i>
</p>
<p>
<!-- Do not change the form action or field names! -->
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
</body>
</html>
