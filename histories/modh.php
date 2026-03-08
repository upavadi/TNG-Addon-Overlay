 <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
<?php
$cms['tngpath'] = "../";
include( "../tng_begin.php");
if( !$cms['support'] )
	$cms['tngpath'] = "../";

$title = "Modh Brahmins";
$path = $_SERVER['PHP_SELF'];

$logstring = "<a href=\"$path\">". $title. "</a>";
writelog($logstring);
preparebookmark($logstring);
var_dump($logstring);

$flags['noicons'] = true;
tng_header( "Modh", $flags ); 
?>

<div class="article-text">
	<h1 class="article-title"> Modh Brahmins</h1>

<b>Modh</b> are the followers of Modheshwari Maa (also known as Matangi Maa), a form of Amba Maa with eighteen hands.
<p>They lived in a town called Modhera in Patan District  in the northern part of Gujarat. The name of the town Modhera was  adopted by the community living around the temple of Modheshwari Mata.</p>
<p>The residents of Modhera were from the four caste systems, the <a title="Brahmin" href="http://en.wikipedia.org/wiki/Brahmin" target="_blank">Brahmins</a> (priests), <a title="Kshatriya" href="http://en.wikipedia.org/wiki/Kshatriya" target="_blank">Kshatriyas</a> (warriors), <a title="Vaishya" href="http://en.wikipedia.org/wiki/Vaishya" target="_blank">Vaishyas</a> (merchants), and the<a href="http://en.wikipedia.org/wiki/Shudra" target="_blank"> Shudras</a>  (services providers). 
<p>Later on, after 10th century onwards, the  predominant community of Modhera consisted of the Brahmins and the  Banias.
</p>
The residents of Modhera migrated to other parts of Gujarat and  Maharashtra states to towns such as Surat, Bulsar, Navsari, Mandvi,  Bharuch, Ankaleshwar, Bardoli, Billimora, Chikhli, Gandevi, Dharampur,  Bombay, Varanasi etc. Hence, the descendants who originated from the  township of Modhera whether they are Brahmins, Vanias, Kshatriyas or  Harijans are all referred to as Modhs.</p>
<p></b><br />
<i>Excerpt from wikipedia <a href="http://en.wikipedia.org/wiki/Modh" target="_blank">Modh Brahmin</a></i></p>
</div>

<p class="center"><a class="btn-detail" href="../articles/articles-list.php">Back to Articles Index</a></p>

<?php tng_footer( "" ); ?>
