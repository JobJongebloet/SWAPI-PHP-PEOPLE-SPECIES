<?php

/**
 * Class Home
 *
 */

class Home {

	/**
     * @var null Model
     */
    public $model = null;

    public function getNames(){
        $existingNames = $this->model->getNames();
        return $existingNames;
    }
    public function getSpecies(){
        $existingSpecies = $this->model->getSpecies();
        return $existingSpecies;
    }
    public function getStarWarsCharacter($name)
    {
        return $this->model->getStarWarsCharacter($name);
    }
    
    function __construct()
    {      
        // load "the model".
        $this->loadModel();   

        // Update database
    //$this->model->updateDatabasePeople();
    //$this->model->updateDatabaseSpecies(); 
    }
    /**
     * Loads the "model".
     * @return object model
     */
    
    public function loadModel()
    {
        require 'C:\xampp\htdocs\phpWebsite\public\application\model\model.php';
        $this->model = new Model();
    }

    /**
     * PAGE: index
     * 
     */
    public function index() {

        // load views   
    	require 'C:\xampp\htdocs\phpWebsite\public\application\view\home\home.php';      
    }	
}

if (isset($_POST['name'])) {

    $obj = new home();
    $existingNames =  $obj->getNames();
    $existingSpecies =  $obj->getSpecies();
   
    $name = $_POST['name'];
    if (!empty($name)) {
        foreach ($existingNames as $existingName) {// ($i = 0; $i < count($existingNames); $i++) {
            if (strpos(strtolower($existingName), strtolower($name)) !== false) {
                echo "suggestion: " . $existingName;
                echo "<br>";
            }         
        }
        foreach ($existingSpecies as $existingSpecie) {// ($i = 0; $i < count($existingNames); $i++) {
            if (strpos(strtolower($existingSpecie), strtolower($name)) !== false) {
                echo "suggestion: " . $existingSpecie;
                echo "<br>";
            }         
        }
    
    }
}

//get Character/Species Data
if (isset($_POST['text'])) {

    $obj = new home();
    $starWarsData = $obj->getStarWarsCharacter($_POST['text']);


    //print_r($starWarsCharacter);

    // $html = "<div id='nieuweChar' class='content'>
    //             <h1 id='name'>". $starWarsCharacter["name"] ."</h1>
    //             <h1 id='height'>Height: 172</h1>
    //             <h1 id='mass'>Mass: 77</h1>
    //             <h1 id='hair-color'>Hair color: blond</h1>
    //             <h1 id='skin-color'>Skin color: fair</h1>
    //             <h1 id='birth-year'>Year of birth: 19BBY</h1>
    //             <h1 id='gender'>Gender: male</h1>
    //         </div>";

    //echo $html;
    //print_r($starWarsData);
    //echo "ha";
    echo json_encode($starWarsData);
}
?>



