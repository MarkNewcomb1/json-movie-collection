<?php
$movies = array("21+Jump+Street", "28+Days+Later", "40+year+old+virgin", "Above+the+Law", "Airplane", "Aliens", "American+Beauty", "American+History+X", "American+Psycho", "Austin+Powers+International", "Austin+Powers+The+Spy+Who+Shagged", "Austin+Powers+in+Goldmember", "Back+to+the+Future", "Back+to+the+Future+Part+II", "Back+to+the+Future+Part+III", "Band+of+Brothers", "Beavis+and+Butt-Head+Do+America", "The+Believer", "Beverly+Hills+Cop", "Black+Hawk+Down", "Bourne+Identity", "Bourne+Supremacy", "Bourne+Ultimatum", "Breakdown", "Breaking+Bad", "Broken+Arrow", "Cabin+in+the+Woods", "Christine", "Cobra", "Commando", "Conspiracy", "Crank+Yankers", "The+Crazies", "Creepshow", "The+Dark+Knight", "Dawn+of+the+Dead", "Death+Wish", "Demolition+Man", "The+Devil%27s+Advocate", "Die+Hard", "Die+Hard+2", "Die+Hard+With+a+Vengeance", "Dirty+Harry", "Downfall", "Dredd", "Dumb+%26+Dumber", "Enemy+at+the+Gates", "Escape+From+New+York", "Evil+Dead+II", "Executive+Decision", "Face%2FOff", "Falling+Down", "Friday+the+13th", "Full+Metal+Jacket", "Game+of+Thrones", "Ghostbusters", "Goodfellas", "Halloween", "Hard+to+Kill", "Heat", "History+of+the+World%2C+Part+I", "Hostel", "The+Incredibles", "Raiders+of+the+Lost+Ark", "Indiana+Jones+and+the+Temple+of+Doom", "Indiana+Jones+and+the+Last+Crusade", "Inglourious+Basterds", "The+Italian+Job", "K-19%3A+The+Widowmaker", "The+Kids+in+the+Hall", "Last+Man+Standing", "Law+Abiding+Citizen", "Léon%3A+The+Professional", "Lethal+Weapon", "Lethal+Weapon+2", "The+Lion+King", "Marked+for+Death", "The+Meaning+of+Life", "Monsters+Inc", "Mr.+Brooks", "Mr.+Show+with+Bob+and+David", "The+Naked+Gun%3A+From+the+Files+of+Police+Squad!", "The+Naked+Gun+2½%3A+The+Smell+of+Fear", "Naked+Gun+33+1%2F3%3A+The+Final+Insult", "A+Nightmare+on+Elm+Street+3%3A+Dream+Warriors", "Freddy%27s+Dead%3A+The+Final+Nightmare", "Night+of+the+Comet", "Night+of+the+Living+Dead", "Ocean%27s+Eleven", "Office+Space", "Overboard", "Patton", "Planes%2C+Trains+%26+Automobiles", "Planet+Earth", "Platoon", "Police+Academy", "Primal+Fear", "Pulp+Fiction", "First+Blood", "Rambo%3A+First+Blood+Part+II", "Rambo", "Rear+Window", "Reservoir+Dogs", "The+Return+of+the+Living+Dead", "The+Rock", "Rocky+IV", "Ronin", "Saving+Private+Ryan", "Secret+Window", "Se7en", "Shaun+of+the+Dead", "The+Shawshank+Redemption", "The+Shining", "Skyfall", "Smokey+and+the+Bandit", "South+Park%3A+Bigger+Longer+%26+Uncut", "South+Park", "Stalingrad", "Star+Wars%3A+Episode+IV+-+A+New+Hope", "Star+Wars%3A+Episode+V+-+The+Empire+Strikes+Back", "Star+Wars%3A+Episode+VI+-+Return+of+the+Jedi", "Super+Size+Me", "Super+Troopers", "Taken", "Team+America%3A+World+Police", "The+Terminator", "Terminator+2%3A+Judgment+Day", "Tommy+Boy", "Top+Gun", "Toy+Story", "Toy+Story+3", "Transformers", "True+Lies", "Under+Siege", "United+93", "Used+Cars", "The+Usual+Suspects", "National+Lampoon%27s+Vacation", "The+Walking+Dead", "Wayne%27s+World", "What+About+Bob%3F", "Wreck-It+Ralph", "Wrong+Turn", "Z+Channel%3A+A+Magnificent+Obsession", "Zero+Dark+Thirty"); 
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>My Movie Collection Connected to the OMDb (Open Movie) API</title>
	<link href='http://fonts.googleapis.com/css?family=Raleway:400,300,600' rel='stylesheet' type='text/css'>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="images/favicon.png">
	<style>
		* {
			box-sizing: border-box;
			background-color: #1a1a1a;
			font-family: "Raleway", "HelveticaNeue", "Helvetica Neue", Helvetica, Arial, sans-serif;
		}
		h1 {
			color: #f2f2f2;
			font-weight: 300;
		}
		.wrapper {
			margin: 0 auto;
			text-align: center;
		}
		.title {
			font-weight: bold;
			font-size: 1.1em;
			color: white;
		}
		figure img {
			min-width: 300px;
			padding: 4px;
		}
		figcaption {
			font: 1.1em;
			color: #f2f2f2;
			text-align: center;
			margin-top: 10px;
			margin-left: auto;
			margin-right: auto;
			max-width: 310px;
		}
		figure {
			display: inline-block;
			vertical-align: top;
			margin: 0 10px 10px 10px;
		}
		
		@media screen and (min-width: 780px){
			figure {
				width: 39%;
			}
		}
		
		@media screen and (min-width: 1042px){
			figure {
				width: 30%;
			}
		}
		
		@media screen and (min-width: 1440px){
			figure {
				width: 21%;
			}
		}
		
	</style>
</head>
<body>
<div class="wrapper">
	<h1>My Movie Collection Connected to the OMDb (Open Movie) API</h1>
<?php

    for ($i = 0; $i < count($movies); ++$i) {
        $json_string = file_get_contents("http://www.omdbapi.com/?t=" . $movies[$i] . "&y=&plot=short&r=json"); 
		$parsed_json = json_decode($json_string);

		$title = $parsed_json->{'Title'};
		$plot = $parsed_json->{'Plot'};
		$poster = $parsed_json->{'Poster'};
?>

<!-- Your HTML for each entry goes here -->

<figure>
<img src="<?php echo $poster;?>" />
<figcaption>
<span class="title"><?php echo $title;?></span>
<?php echo $plot;?>
</figcaption>
</figure>
<!-- End HTML for each entry -->
<?php
		
    }	
?>
</div>
</body>
</html>
<!--
/*
<?php
$json_string = file_get_contents("http://www.omdbapi.com/?t=Die+Hard&y=&plot=short&r=json"); 
$parsed_json = json_decode($json_string);

$title = $parsed_json->{'Title'};
$plot = $parsed_json->{'Plot'};
$poster = $parsed_json->{'Poster'};
?>
*/
-->
