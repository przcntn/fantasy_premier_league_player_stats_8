<?php
require 'scraperwiki/simple_html_dom.php'; 

// get base url
$url = 'http://fantasy.premierleague.com/web/api/elements/';

//should create automatic method to find range of pages
#$lastplayer=

//set range of players to look through - currently there are 675
$players=range(1,657);
#$players=range(1,$lastplayer);

//need to add specific numbers such as Jan transfers to array

//scrape page for each player
foreach($players as $player)
{
$html = scraperwiki::scrape($url.$player);

// load html into dom
$dom = new simple_html_dom();
    $dom->load($html);

//turn dom into a string
$json = $dom;

//make the json string an array which i confusingly call an object
$obj = json_decode($json);

//Test:
#print_r($obj);

//get the fixture history for the player
foreach($obj->fixture_history->all as $rows)
{

//create results table
$results = array(

    'a' => strval($rows[0]),
    'b' => strval($rows[1]),
    'c' => strval($rows[3]),
    'd' => strval($rows[4]),
    'e' => strval($rows[5]),
    'f' => strval($rows[6]),
    'g' => strval($rows[7]),
    'h' => strval($rows[8]),
    'i' => strval($rows[9]),
    'j' => strval($rows[10]),
    'k' => strval($rows[11]),
    'l' => strval($rows[12]),
    'm' => strval($rows[13]),
    'n' => strval($rows[14]),
    'o' => strval($rows[15]),
    'p' => strval($rows[16]),
    'q' => strval($rows[17]),
    'r' => strval($rows[18]),
'pl_index' => strval($rows[2]),

  

);

//check results
//print_r($results);

//save
scraperwiki::save(array('pl_index'),$results);
}

}
?>
