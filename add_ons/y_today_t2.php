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
			living,
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
			DATE_FORMAT(DATE_SUB(CURDATE(), INTERVAL 10 DAY), '%m-%d'), 
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
/***********************marr annivesaries****************************************************************** */
$db3 = mysqli_connect($database_host, $database_username, $database_password, $database_name); 
$sql3 = "SELECT
h.personid AS personid1,
       h.firstname AS firstname1,
       h.lastname AS lastname1,
	   h.living,
	   h.sex,
		h.birthdate,
		h.birthdatetr,
		h.deathdate,
		h.deathdatetr,
       w.personid AS personid2,
       w.firstname AS firstname2,
       w.lastname AS lastname2,
	   f.familyID,
       f.marrdate AS marrdate,
       f.marrplace,
       f.private,
       f.divdate,
       Year(Now()) - Year(marrdatetr) AS Years
FROM   {$families_table} as f
    LEFT JOIN {$people_table} AS h
              ON f.husband = h.personid
       LEFT JOIN {$people_table} AS w
              ON f.wife = w.personid
# WHERE  Month(f.marrdatetr) = MONTH(ADDDATE(now(), INTERVAL 3 month))
  WHERE  DATE(CONCAT(YEAR(CURDATE()), RIGHT(f.marrdatetr, 6)))
          BETWEEN 
              DATE_SUB(CURDATE(), INTERVAL 1 DAY)
          AND
              DATE_ADD(CURDATE(), INTERVAL 1 DAY)     
ORDER  BY Day(f.marrdatetr)
";
$result3 = $db3->query($sql3);
 	    $rows3 = array();
        while ($row3 = $result3->fetch_assoc()) {
            $rows3[] = $row3;
        }
var_dump($rows3[0]['marrdate']);
/******************************************************************************************** */
?>

<p>
<div class="article-text">
	<h1 class="article-title">yesterday TODAY tomorrow</h1>
</p>
<p>
<b>Under construction</b>
<p>LogIn required to view all data</p>
</p>



<table class="born-article-table" >
    
    <th class="born-article-table " style="width: 100px; background-color: #EDEDED; text-align: center;"></th>    
	<th class="born-article-table " style="background-color: #EDEDED; text-align: center;">Event</th>
    <th  class="born-article-table" style="background-color: #EDEDED;text-align: center;">Date</th>
    <th  class="born-article-table" style="background-color: #EDEDED; text-align: center;">Years</th>
	<th  class="born-article-table" style="background-color: #EDEDED;text-align: center;">Death Date</th>
	<th class="born-article-table" style="background-color: #EDEDED; text-align: center;">Age at Death</th>
	
    
<?php
/*********For loop ******************************************************* */	
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

	$birthmonth = substr($birthday['birthdatetr'], -5, 2);
	$deathmonth = substr($birthday['deathdatetr'], -5, 2);
	$marremonth = substr($birthday['marrdatetr'], -5, 2);
	$currentmonth = date("m");

	
  If ($currentmonth == $birthmonth) {
	$event = "BIRTH";
	$bornClass = 'born-highlight';
	$eventBirthday = $birthday['birthdate'];
   	$eventDeathday = $birthday['deathdate'];
	$eventYears = $birthday['BirthAge'];
	$eventDeathYears = $birthday['DeathAge']; 
}
	If ($currentmonth == $deathmonth) {
	$deathClass = 'death-highlight';
    $event = "DEATH";
  	$eventBirthday = $birthday['birthdate'];
   	$eventDeathday = $birthday['deathdate'];
	$eventYears = $birthday['BirthAge'];
	$eventDeathYears = $birthday['DeathAge'];
	}

	If ($currentmonth == $marremonth) {
			$marrClass = 'marr-highlight';
            $event = "MARRIAGE";	
	}
	var_dump ($eventDeathday);
	if (!$currentuser && $birthday['living'] == 1) {
		$birthday['firstname'] = "Living";
		$birthday['lastname'] = "";
		if ($birthday['sex'] == "M") {
			$thumbPath = $tngdomain. "img/male.jpg" ;
		
		} else {
		$thumbPath = $tngdomain. "img/female.jpg" ;	
		}
	}
	
	?>

        <tr>
            <td class="born-article-table" ><a href="<?php echo $tngdomain; ?>getperson.php?personID=<?php echo $birthday['personid'];?>&tree=?>">
			<img src="<?php echo $thumbPath; ?>" class='profile-image' style="width: 80px; padding: 5px"; />
			<div>
                <a href="<?php echo "../" ?>getperson.php?personID=<?php echo $birthday['personid'];?>&tree=?>">
                    <?php echo $birthday['firstname'] . " "; ?><?php echo $birthday['lastname']; ?>
                </a></div>
			</td>
        <!--event -->    
			<td class="born-article-table" ><?php echo $event; ?>
			</td>
        <!--Birth date--->
			<td class="born-article-table <?php echo $bornClass; ?>" style="text-align: center;"><?php echo $eventBirthday; ?>
	   		</td>
		<!---- Years ------->	
		<td class="born-article-table <?php echo $deathClass; ?>" style="text-align: center;"><?php echo $eventYears; ?>
		</td>
		<!---Death Date -------->
        <td class="born-article-table" style="text-align: center;"><?php echo $eventDeathday; ?>
		</td>
		    <td class="born-article-table" style="text-align: center;"><?php echo $eventDeathYears; ?>
		</td>
			

        </tr>

    <?php endforeach; ?>


</table>



<div>
<p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>
<?php tng_footer( "" ); ?>