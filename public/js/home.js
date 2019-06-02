    let button = document.querySelector('#button')

    let name = document.querySelector('#name')
    let height = document.querySelector('#height')
    let mass = document.querySelector('#mass')
    let hairColor = document.querySelector('#hair-color')
    let skinColor = document.querySelector('#skin-color')
    let birthYear = document.querySelector('#birth-year')
    let gender = document.querySelector('#gender')
    let averageHeight = document.querySelector('#average-height')
    let designation = document.querySelector('#designation')
    let classification = document.querySelector('#classification')
    let eyeColors = document.querySelector('#eye-colors')
    let averageLifespan = document.querySelector('#average-lifespan')
    let language = document.querySelector('#language')


    let title = document.querySelector('#title')
    let example = document.querySelector('#example')

    function updateInfoPeople(data){
        
    example.innerText = ''   
    title.innerText = data.name 
    name.innerText = ''
    averageHeight.innerText = ''
    designation.innerText = ''
    height.innerText = 'Height: ' + data.height
    mass.innerText = 'Mass: ' + data.mass
    hairColor.innerText = 'Hair color: ' + data.hair_color
    skinColor.innerText = 'Skin color: ' + data.skin_color
    birthYear.innerText = 'Year of birth: '+ data.birthyear
    gender.innerText = 'Gender: ' + data.gender
    eyeColors.innerText = ''
    averageLifespan.innerText = ''
    language.innerText = ''
    button.innerText = 'Search Again'
    }

    function updateInfoSpecies(data){
        
    example.innerText = ''   
    title.innerText = data.name 
    name.innerText = ''
    averageHeight.innerText = 'Average Height: ' + data.height
    designation.innerText = 'Designation: ' + data.designation
    height.innerText = ''
    mass.innerText = ''
    hairColor.innerText = 'Hair colors: ' + data.hair_colors
    skinColor.innerText = 'Skin color: ' + data.skin_color
    birthYear.innerText = ''
    gender.innerText = ''
    eyeColors.innerText = 'Eye colors: '+ data.eye_colors
    averageLifespan.innerText = 'Average lifespan: ' + data.average_lifespan
    language.innerText = 'Language: ' + data.language
    button.innerText = 'Search Again'
    }

    $(document).ready(function(){

        $("#button").click( function(){     
            var name = $("input").val();
            $.post("controller/home.php", {
                text: name
            }, function(data, status){
                 let character = JSON.parse(data);
                //console.dir(JSON.parse(data));
                console.dir(character);
                if (character.species_found) {
                    console.dir("if statement");
                updateInfoSpecies((character));
                }
                else  {
                    console.dir("else statement");
                    updateInfoPeople((character));
                }
            });
        });        
        });
    $(document).ready(function(){

        $("input").keyup(function(){
            var name = $("input").val();
            $.post("controller/home.php", {
                name: name
            }, function(data, status){
                $("#text").html(data);
            });
        });
        });
    

