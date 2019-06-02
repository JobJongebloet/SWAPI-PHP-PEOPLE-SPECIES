<?php

class Model {

	public function updateDatabaseSpecies(){

		//Get total count of People from SWAPI

		// SWAPI API url
		$json_url = "https://swapi.co/api/species";
		// Read JSON data from API url
		$json = file_get_contents($json_url);
		// Decodes JSON array and converts it into PHP 
		$json = json_decode($json, true);
		$numberOfSpecies = $json['count'];
		$firstSpecie = 1;

		//Delete old Data

		$sql = "DELETE FROM starwars.species;";
		$conn = $this->CreateDatabaseConnection();
		mysqli_query($conn, $sql);

		ini_set('max_execution_time', 600); //600 seconds = 10 minutes
		//Update database
		for ($firstSpecie; $firstSpecie < $numberOfSpecies + 1; $firstSpecie++) { 

			// SWAPI API url
			$json_url = "https://swapi.co/api/species/" . $firstSpecie;

			// Read JSON data from API url
			$json = file_get_contents($json_url);
			
			// Decodes JSON array and converts it into PHP 
			$json = json_decode($json, true);

			$name = $json['name'];
			$classification = $json['classification'];
			$designation = $json['designation'];
			$averageHeight = $json['average_height'];
			$skinColors = $json['skin_colors'];
			$hairColors = $json['hair_colors'];
			$eyeColors = $json['eye_colors'];
			$averageLifespan = $json['average_lifespan'];
			$language = $json['language'];	

			$sql = "INSERT INTO starwars.species
			VALUES ('$name', '$classification', '$designation', '$averageHeight','$skinColors', 
			'$hairColors', '$eyeColors', '$averageLifespan' , '$language');";

			$conn = $this->CreateDatabaseConnection();
			mysqli_query($conn, $sql);
		}
	}
	//Updating the database with all the People from the SWAPI
	public function updateDatabasePeople(){

		//Get total count of People from SWAPI

		// SWAPI API url
		$json_url = "https://swapi.co/api/people";
		// Read JSON data from API url
		$json = file_get_contents($json_url);
		// Decodes JSON array and converts it into PHP 
		$json = json_decode($json, true);
		$numberOfPeople = $json['count'];
		$firstCharacter = 1;

		//Delete old Data and

		$sql = "DELETE FROM starwars.people;";
		$conn = $this->CreateDatabaseConnection();
		mysqli_query($conn, $sql);

		ini_set('max_execution_time', 600); //600 seconds = 10 minutes
		//Update database
		for ($firstCharacter; $firstCharacter < $numberOfPeople + 2; $firstCharacter++) { 

			// SWAPI API url
			$json_url = "https://swapi.co/api/people/" . $firstCharacter;

			// Read JSON data from API url
			$json = file_get_contents($json_url);
			
			// Decodes JSON array and converts it into PHP 
			$json = json_decode($json, true);

			$name = $json['name'];
			$height = $json['height'];
			$mass = $json['mass'];
			$hairColor = $json['hair_color'];
			$skinColor = $json['skin_color'];
			$birthYear = $json['birth_year'];
			$gender = $json['gender'];	

			$sql = "INSERT INTO starwars.people
			VALUES ('$name', '$height', '$mass', '$hairColor', '$skinColor', '$birthYear', '$gender')";

			$conn = $this->CreateDatabaseConnection();
			mysqli_query($conn, $sql);
		}
	}
    	//Creates database connection
	public function CreateDatabaseConnection(){

		$servername = "localhost";
		$username = "root";
		$password = "root";
		$dbName = "starwars";

    	// Create connection
		$conn = new mysqli($servername, $username, $password, $dbName);
		return $conn;
		
	}

	public function getNames(){

		$sql = "SELECT DISTINCT name FROM starwars.people;";

		$conn = $this->CreateDatabaseConnection();
		$result = mysqli_query($conn, $sql);
		/* determine number of rows result set */
		$rows = [];	
		while($row = mysqli_fetch_array($result))
		{
			$rows[] = $row["name"];
		}
		return  $rows;
	}

	public function getStarWarsCharacter($name)
	{
		//People SQL
		$sql = "SELECT * FROM starwars.people WHERE name = '" . $name . "';";

		$conn = $this->CreateDatabaseConnection();
		$result = mysqli_query($conn, $sql);

		$rows = [];
		while($row = mysqli_fetch_array($result))
			{
				$rows[] = $row;
			} 

  			//$character = null;
			if(count($rows) > 0) {
				$character = $rows[0];
			}
			
			$character["species_found"] = false;

  			$rows = [];


  		//Species SQL
  		if (! isset($character["name"])) {
  			$sql2 = "SELECT * FROM starwars.species WHERE name = '" . $name . "';";
  			
  			$result = mysqli_query($conn, $sql2);
  			
  		
			$rows2 = [];			
			while($row = mysqli_fetch_array($result))
			{
				$rows2[] = $row;
			} 


			$character = null;
			if(count($rows2) > 0) {
				$character = $rows2[0];
			}
			
			$character["species_found"] = true;

			return $character;
			}

			$character["species_found"] = false;

			return $character;
  		
	}

	public function getSpecies(){

		$sql = "SELECT DISTINCT name FROM starwars.species;";

		$conn = $this->CreateDatabaseConnection();
		$result = mysqli_query($conn, $sql);
		/* determine number of rows result set */
		$rows = [];
		while($row = mysqli_fetch_array($result))
		{
			$rows[] = $row["name"];
		}
		return $rows;
	}
}