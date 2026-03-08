<?php
$userdirectory = "userscripts";

if (strpos($_SERVER['SCRIPT_NAME'], $userdirectory) > 0 ) {
//the script is being called from the $userdirectory directory
include_once("../begin.php");
if( !$cms['support'] )
	$cms['tngpath'] = "../";
include_once($cms['tngpath'] . "$custommeta");

	} else {

//the script is being called from the TNG directory or as an include
//include_once("begin.php");
if( !$cms['support'] )
	$cms['tngpath'] = "";
}

//Changed by Mahesh
//tng_db_connect($database_host,$database_name,$database_username,$database_password) or exit;
$db = tng_db_connect($database_host,$database_name,$database_username,$database_password) or exit;

//END OF BLOCK FOR STANDALONE OPERATION OF SCRIPT

$search_url = getURL( "search", 1 );

?>

<table border="0" cellspacing="0" cellpadding="0">
	<tr><td align="left" valign="top">

<?php

	$wherestr = "WHERE lastname != \"\" and lastname != \"[--?--]\""; //this suppresses "[no surname]" and [--?--] from the list - Roger 20 Nov 2004
	
$topnum = 14;
$query = "SELECT lastname, binary(lastname) as binlast, count(lastname ) as lncount FROM $people_table $wherestr GROUP BY binlast ORDER by lncount DESC, binlast LIMIT $topnum";

//$result = mysql_query($query) or die ("$text[cannotexecutequery]: $query");
$result = $db->query($query) or die ("$text[cannotexecutequery]: $query");
$topnum = mysqli_num_rows($result); //change mysqli by Mahesh
if( $result ) {

		echo "<ul>\n";
	//change mysqli by Mahesh	
	while( $surname = mysqli_fetch_assoc( $result ) ) {
		$surname2 = urlencode( $surname['lastname'] );
		$name = $surname['lastname'] ? "<a href=\"$search_url" . "mylastname=$surname2&amp;lnqualify=equals&amp;mybool=AND&amp;tree=$tree\">$surname[lastname]</a>" : "<a href=\"$search_url";
		echo "<li> $name ($surname[lncount])</li>\n"; //remove type= to get rid of numbered list
	}

mysqli_free_result($result); //change mysqli by Mahesh	
}

?>
</ul><br />
<a href="surnames-all.php"><?php echo "$text[showallsurnames]" ?></a>
</td>
</tr>
</table>

