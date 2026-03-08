 <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

<link rel="stylesheet" type="text/css" href="<?php echo $tngdomain. '/css/TngHomePage.css' ; ?>">

<?php
$cms['tngpath'] = "../";
include( "../tng_begin.php");
include ( "../config.php" );
if( !$cms['support'] )
	$cms['tngpath'] = "../";

$title = "Name Pending";


$logstring = "<a href=\"$path\">". $title. "</a>";
writelog($logstring);
preparebookmark($logstring);

$flags['noicons'] = true;
tng_header( "Events - Pending", $flags ); 


$db = mysqli_connect($database_host, $database_username, $database_password, $database_name); 
$sql = "SELECT
			personid,
			firstname,
			lastname,
			gedcom,
			sex,
			birthdate,
			birthdatetr,
			deathdate,
			deathdatetr,
			FLOOR(DATEDIFF(CURDATE(), birthdatetr)/365.25) AS BirthAge,
			FLOOR(DATEDIFF(deathdatetr, birthdatetr)/365.25) AS DeathAge,
			FLOOR(DATEDIFF(deathdatetr, birthdatetr)/365.25) AS DeathYears
	FROM $people_table
	
	WHERE
	   ( DATE_FORMAT(birthdatetr, '%m-%d') IN (
			DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY), '%m-%d'), 
			DATE_FORMAT(CURDATE(), '%m-%d'), 
			DATE_FORMAT(DATE_ADD(CURDATE(), INTERVAL 1 DAY), '%m-%d')
			)
)
	OR
	( DATE_FORMAT(deathdatetr, '%m-%d') IN (
			DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 1 DAY), '%m-%d'), 
			DATE_FORMAT(CURDATE(), '%m-%d'), 
			DATE_FORMAT(DATE_ADD(CURDATE(), INTERVAL 1 DAY), '%m-%d')
			)
)
	";
	$result = $db->query($sql);
	    $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
var_dump($rows);
?>

<p>
<div class="article-text">
	<h1 class="article-title"> On This Day</h1>

</p>
<p>
<b>Under construction</b>
</p>



<table class="born-article-table" >
    
    <th class="born-article-table " style="width: 100px; background-color: #EDEDED; text-align: center;"></th>    
	<th class="born-article-table " style="background-color: #EDEDED; text-align: center;">Event</th>
    <th  class="born-article-table" style="background-color: #EDEDED;text-align: center;">Birth Date</th>
    <th  class="born-article-table" style="background-color: #EDEDED; text-align: center;">Death Date</th>
	<th  class="born-article-table" style="background-color: #EDEDED;text-align: center;">Age<br />at Death</th>
	<th class="born-article-table" style="background-color: #EDEDED; text-align: center;">Years<br />since Birth</th>
	<th class="born-article-table" style="background-color: #EDEDED; text-align: center;">Years<br />since Death</th>
    
<?php	
foreach ($rows as $birthday): 
        $personId = $birthday['personid'];
		
$sql2 = "
SELECT *
FROM   $media_table as ml
    LEFT JOIN $medialinks_table AS m
              ON ml.mediaID = m.mediaID
where personID = '{$personId}' AND m.defphoto = 1";

        $result = $db->query($sql2);
		$thumbPath = Null;
        $row = $result->fetch_assoc();
        if (isset($row['thumbpath'])) $thumbPath = $tngdomain. "photos/". $row['thumbpath'];
		if($thumbPath == null && $birthday['sex'] == 'M') $thumbPath = $tngdomain. "img/male.jpg" ;
		if($thumbPath == null && $birthday['sex'] == 'F') $thumbPath = $tngdomain. "img/female.jpg" ;
		if ($birthday['birthdate'] == "")
			{
			$birthday['DeathAge'] = "";
			$birthday['BirthAge'] = "";
			}
		if ($birthday['deathdate'] == "") {
		$birthday['DeathYears'] = "";
		$birthday['DeathAge'] = "";
	}
   
	/**********/
	$birthmonth = substr($birthday['birthdatetr'], -5, 2);
	$deathmonth = substr($birthday['deathdatetr'], -5, 2);
	$currentmonth = date("m");
	If ($currentmonth == $birthmonth) {
			$bornClass = 'born-highlight';
            $event = "Birth";
		} else {
			$bornClass = "";
            $event = "";
	}
	If ($currentmonth == $deathmonth) {
			$deathClass = 'death-highlight';
            $event = "Death";
		} else {
			$deathClass = "";
            $event = "";
	}

	?>

        <tr>
            <td class="born-article-table" ><a href="<?php echo $tng_url; ?>getperson.php?personID=<?php echo $birthday['personid'];?>&tree=<?php echo $birthday['gedcom'];?>">
			<img src="<?php echo $thumbPath; ?>" class='profile-image' style="width: 80px; padding: 5px"; />
			<div>
                <a href="<?php echo $tng_url; ?>getperson.php?personID=<?php echo $birthday['personid'];?>&tree=<?php echo $birthday['gedcom'];?>">
                    <?php echo $birthday['firstname'] . " "; ?><?php echo $birthday['lastname']; ?>
                </a></div>
            <td class="born-article-table" ><?php echo $event; ?></td>
            <td class="born-article-table <?php echo $bornClass; ?>" style="text-align: center;"><?php echo $birthday['birthdate']; ?></td>
			<td class="born-article-table <?php echo $deathClass; ?>" style="text-align: center;"><?php echo $birthday['deathdate']; ?></td>
            <td class="born-article-table" style="text-align: center;"><?php echo $birthday['DeathAge']; ?></td>
			<td class="born-article-table" style="text-align: center;"><?php echo $birthday['BirthAge']; ?></td>
			<td class="born-article-table" style="text-align: center;"><?php echo $birthday['DeathYears']; ?></td>
        </tr>


    <?php endforeach; 

?>
</table>



<div>
<p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>
<?php tng_footer( "" ); ?>