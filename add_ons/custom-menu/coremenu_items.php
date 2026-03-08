<html>
<style>
    .mhead li a {
        height: 14px;>
</style>
<?php
/** Add menu items to Mobile 'hamburger' view
 * add $tngdomain to global command in function tng_mobileicons($title) 
 * This file is included in genlib.php after 
 * around line 876 after statement
 * $tngconfig['mmenustyle'] = "";
 *   $tngconfig['menucount'] = 0;
 *	$menu .= "<ul id=\"mcoremenu\">\n";
 *	$menu .= tng_getLeftIcons();
 * include lines is added thus:

 */
	$menu .= "<li><a href=\"{$tngdomain}/articles/articles-list.php\" class=\"mobileicon\" onclick=\"showSubMenu()\">Articles</a></li>\n"; //Added by Mahesh Bahul 1 of 2
	$menu .= "<li><a href=\"{$tngdomain}/anniversaries.php'\" class=\"mobileicon\" onclick=\"showSubMenu()\">Anniversaries</a></li>\n"; //Added by Mahesh Bahul 2 of 2
?>
</html>