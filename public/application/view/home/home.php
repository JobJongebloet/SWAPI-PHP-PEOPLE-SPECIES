<!DOCTYPE html> 
<html>
<head>
	<body>
		<style>
			body {
				margin: 0;
				background-color: black;
			}

			.star {
				position: absolute;
				width: 1px;
				height: 1px;
				background-color: white;
			}

			.header {
				padding: 60px;
				text-align: center;
				color: #ffe300;
				font-size: 12px;
			} 

			.content {
				padding: 30px;
				text-align: center;
				color: #ffe300;
				font-size: 8px;
			} 
		</style>

		<div class="header">
			<h1 id='title'> All the Star Wars data you've ever wanted: </h1>
			<h1 id='example'> Example: </h1>

			<div id='nieuweChar' class="content">
				<h1 id='name'>Luke Skywalker</h1>
				<h1 id='height'>Height: 172</h1>
				<h1 id='mass'>Mass: 77</h1>
				<h1 id='hair-color'>Hair color: blond</h1>
				<h1 id='skin-color'>Skin color: fair</h1>
				<h1 id='birth-year'>Year of birth: 19BBY</h1>
				<h1 id='gender'>Gender: male</h1>
				<h1 id='average-height'></h1>
				<h1 id='designation'></h1>
				<h1 id='classification'></h1>
				<h1 id='eye-colors'></h1>
				<h1 id='average-lifespan'></h1>
				<h1 id='language'></h1>
			</div>	
		</div>
		
<form class="header">
	<input type="text" name="search" placeholder="Search People or Species"><button type="button" id="button" name="button">Click here!</button>
	<p id ="text"></p>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="js/home.js"></script>

<script type="text/javascript">
	// Sets the number of stars we wish to display
	const numStars = 100;

	// For every star we want to display
	for (let i = 0; i < numStars; i++) {
		let star = document.createElement("div");  
		star.className = "star";
		var xy = getRandomPosition();
		star.style.top = xy[0] + 'px';
		star.style.left = xy[1] + 'px';
		document.body.append(star);
	}

	// Gets random x, y values based on the size of the container
	function getRandomPosition() {  
		var y = window.innerWidth;
		var x = window.innerHeight;
		var randomX = Math.floor(Math.random()*x);
		var randomY = Math.floor(Math.random()*y);
		return [randomX,randomY];
	}

</script>

</form>
	<audio autoplay loop>
	<source src="sounds/music.ogg" type="audio/ogg" autoplay = true>
	</audio> 
</body>
</html>
