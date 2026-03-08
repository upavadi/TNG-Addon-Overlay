 <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

<link rel="stylesheet" type="text/css" href="<?php echo $tngdomain. '/css/TngHomePage.css' ; ?>">

<?php
$cms['tngpath'] = "../";
include( "../tng_begin.php");
include ( "../config.php" );
if( !$cms['support'] )
	$cms['tngpath'] = "../";

$title = "Name Pending";

/*****/
$logstring = "<a href=\"$path\">". $title. "</a>";
writelog($logstring);
preparebookmark($logstring);

$flags['noicons'] = true;
tng_header( "Events - Pending", $flags ); 


$db = mysqli_connect($database_host, $database_username, $database_password, $database_name); 

/********** Marriage ********************** */
 $sql = "SELECT 
	'Marriage' AS event_type,
	h.gedcom,
	h.personid AS personid1,
    h.firstname AS firstname1,
    h.lastname AS lastname1,
    h.birthdate AS birthdate1,
    h.birthdatetr AS birthdatetr1,
    h.deathdate AS deathdate1,
    h.deathdatetr AS deathdatetr1,
    FLOOR(IFNULL(DATEDIFF(h.deathdatetr, h.birthdatetr), 0)/365.25) AS DeathAge1,
    FLOOR(IFNULL(DATEDIFF(CURDATE(), h.birthdatetr), 0)/365.25) AS BirthAge1,
    w.personid AS personid2,
    w.firstname AS firstname2,
    w.lastname AS lastname2,
    w.birthdate AS birthdate2,
    w.birthdatetr AS birthdatetr2,
    w.deathdate AS deathdate2,
    w.deathdatetr AS deathdatetr2,
    FLOOR(IFNULL(DATEDIFF(w.deathdatetr, w.birthdatetr), 0)/365.25) AS DeathAge2,
    FLOOR(IFNULL(DATEDIFF(CURDATE(), w.birthdatetr), 0)/365.25) AS BirthAge2,
	f.familyID,
    f.living,
    f.marrdatetr AS event_datetr,
    f.marrdate AS event_date,
    f.marrplace,
    f.private,
    f.divdate,
    Year(CURDATE()) - Year(f.marrdatetr) AS Years
FROM   `{$families_table}` as f
    LEFT JOIN `{$people_table}` AS h ON f.husband = h.personid
    LEFT JOIN `{$people_table}` AS w ON f.wife = w.personid
WHERE  DATE(CONCAT(YEAR(CURDATE()), '-', MONTH(f.marrdatetr), '-', DAY(f.marrdatetr)))
    BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND DATE_ADD(CURDATE(), INTERVAL 1 DAY)

UNION ALL
/****************Birth */
SELECT 
	'Birth' AS event_type,
	p.gedcom,
	p.personid AS personid1,
    p.firstname AS firstname1,
    p.lastname AS lastname1,
    p.birthdate AS birthdate1,
    p.birthdatetr AS birthdatetr1,
    p.deathdate AS deathdate1,
    p.deathdatetr AS deathdatetr1,
    IFNULL(FLOOR(DATEDIFF(p.deathdatetr, p.birthdatetr)/365.25), '') AS DeathAge1,
    FLOOR(DATEDIFF(CURDATE(), p.birthdatetr)/365.25) AS BirthAge1,
    NULL AS personid2,
    NULL AS firstname2,
    NULL AS lastname2,
    NULL AS birthdate2,
    NULL AS birthdatetr2,
    NULL AS deathdate2,
    NULL AS deathdatetr2,
    NULL AS DeathAge2,
    NULL AS BirthAge2,
	NULL AS familyID,
    NULL AS living,
    p.birthdatetr AS event_datetr,
    p.birthdate AS event_date,
    NULL AS marrplace,
    p.private,
    NULL AS divdate,
    NULL AS Years
FROM `{$people_table}` AS p
WHERE DATE(CONCAT(YEAR(CURDATE()), '-', MONTH(p.birthdatetr), '-', DAY(p.birthdatetr)))
    BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND DATE_ADD(CURDATE(), INTERVAL 1 DAY)

UNION ALL

SELECT 
	'Death' AS event_type,
	p.gedcom,
	p.personid AS personid1,
    p.firstname AS firstname1,
    p.lastname AS lastname1,
    p.birthdate AS birthdate1,
    p.birthdatetr AS birthdatetr1,
    p.deathdate AS deathdate1,
    p.deathdatetr AS deathdatetr1,
    FLOOR(IFNULL(DATEDIFF(p.deathdatetr, p.birthdatetr), 0)/365.25) AS DeathAge1,
    FLOOR(IFNULL(DATEDIFF(CURDATE(), p.birthdatetr), 0)/365.25) AS BirthAge1,
    NULL AS personid2,
    NULL AS firstname2,
    NULL AS lastname2,
    NULL AS birthdate2,
    NULL AS birthdatetr2,
    NULL AS deathdate2,
    NULL AS deathdatetr2,
    NULL AS DeathAge2,
    NULL AS BirthAge2,
	NULL AS familyID,
    NULL AS living,
    p.deathdatetr AS event_datetr,
    p.deathdate AS event_date,
    NULL AS marrplace,
    p.private,
    NULL AS divdate,
    NULL AS Years
FROM `{$people_table}` AS p
WHERE DATE(CONCAT(YEAR(CURDATE()), '-', MONTH(p.deathdatetr), '-', DAY(p.deathdatetr)))
    BETWEEN DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND DATE_ADD(CURDATE(), INTERVAL 1 DAY)

ORDER BY event_datetr";
      

        $result = $db->query($sql); 
                $rows = array();
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
?>
<table class="born-article-table" style="font-size: 1.5em" >
    
    <th class="born-article-table " style="width: 100px; background-color: #EDEDED; text-align: center;"></th>    
	<th class="born-article-table " style="background-color: #EDEDED; text-align: center;">Event</th>
    <th  class="born-article-table" style="background-color: #EDEDED;text-align: center;"> Date</th>
    <th  class="born-article-table" style="background-color: #EDEDED; text-align: center;">Years</th>
	<th  class="born-article-table" style="background-color: #EDEDED;text-align: center;">Age<br />at Death</th>
	<th class="born-article-table" style="background-color: #EDEDED; text-align: center;">Years<br />since Birth</th>
	<th class="born-article-table" style="background-color: #EDEDED; text-align: center;">Years<br />since Death</th>

<?php 
var_dump($rows);
    foreach ($rows as $event): 
        $eventtype = $event['event_type']; 
        $eventdate = $event['event_date'];
        $eventyears = $event['Years'];
        $person1 = $event['firstname1'] . " " . $event['lastname1'];
        $person2 = ($event['firstname2']) ? $event['firstname2'] . " " . $event['lastname2'] : "";
       
      /******************************************
        // Determine age information based on event type
        $ageInfo = "";
        $deathYears = "";
        $birthYears = "";
        
        if ($eventtype == "Birth") {
            // For births: show years since birth
            $birthYears = $event['BirthAge1'];
            $ageAtDeath
        }
        
        } elseif ($eventtype == "Death") {
            // For deaths: show age at death and years since death
            $ageInfo = $event['DeathAge1'];
            $deathYears = date('Y') - (int)substr($event['deathdatetr1'], 0, 4);
        } elseif ($eventtype == "Marriage") {
            // For marriages: show years of marriage
            $eventyears = $event['Years'];
            // Also show ages at time of marriage if available
            $person1 .= " (Age: " . $event['BirthAge1'] . ")";
            if ($person2) {
                $person2 .= " (Age: " . $event['BirthAge2'] . ")";
            }
        }
*********************************/
        if ($eventtype == "Birth") {
            // For births: show years since birth
            $birthYears = $event['BirthAge1'];
            
        }


?>
<tr>
    <td class="born-article-table" > <?php echo $person1; if($person2) echo "<br />" . $person2; ?></td>
    <td class="born-article-table" > <?php echo $eventtype ?></td>
    <td class="born-article-table" > <?php echo $eventdate ?> </td>
    <td class="born-article-table" > <?php echo $eventyears; ?></td>
    <td class="born-article-table" > <?php echo $ageInfo; ?></td>
    <td class="born-article-table" > <?php echo $birthYears; ?></td>
    <td class="born-article-table" > <?php echo $deathYears; ?></td>


<?php  
     endforeach;   
?>
</table>    