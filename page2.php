<link rel="stylesheet" href="page2_css.css" />
<body bgcolor="#fdf888">
<?php
    $servername = "db";
    $username = "root";
    $password = "password";
    $dbname = "CookThisNotThatDB";
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if(isset($_POST['submit'])){
      if(!empty($_POST['check_list'])) {
      // Counting number of checked checkboxes.
        $checked_count = count($_POST['check_list']);
        //echo "You have selected following ".$checked_count." option(s): <br/>";
        // Loop to store and display values of individual checked checkbox.
        foreach($_POST['check_list'] as $selected) {
          $sql =  "UPDATE Ingredients SET is_selected = '1' WHERE ingredient_id ='". $selected."'";
          mysqli_query($conn,$sql);
        //echo "<p>".$selected ."</p>";
        //echo "<p>".$sql ."</p>";
        }
      }
    }
    $sql2 = "SELECT name,recipe_id from Recipes WHERE recipe_id in (SELECT recipe_id FROM (select recipe_id,SUM(is_selected) as s ,COUNT(recipe_id) as c from RecipeIngredients LEFT JOIN Ingredients ON Ingredients.ingredient_id = RecipeIngredients.ingredient_id GROUP BY recipe_id) t  WHERE s=c)";
    $result1 = mysqli_query($conn,$sql2);
    $sql3 = "SELECT ingredient_id FROM Ingredients";
    $result2 = mysqli_query($conn,$sql3);
    while($row = mysqli_fetch_assoc($result2)){
      $sql4 =  "UPDATE Ingredients SET is_selected = '0' WHERE ingredient_id ='".$row["ingredient_id"]."'";
      mysqli_query($conn,$sql4);
    }
    // $sql5 = "SELECT * FROM Ingredients";
    // $result3 = mysqli_query($conn, $sql5);
    // if (mysqli_num_rows($result3) > 0) {
    //     while($row = mysqli_fetch_assoc($result3)) {
    //         echo "id: " . $row["ingredient_id"]. " - Name: " . $row["name"]. " " ."- is_selected: " .$row["is_selected"]. "<br>";
    //     }
    // }
    if (mysqli_num_rows($result1) > 0) {
      echo '<form action="page3.php" method="post">';
      while($row = mysqli_fetch_assoc($result1)){
        echo '<div class="form-check"><label>
        <input type="radio" name="id"  value='.$row['recipe_id'].' > <span class="label-text">'.$row['name'].'</span>
        </label></div>';
      }
      echo '<input type = "submit" name = "submit" value = "Instructions"/>';
      echo '</form>';
    }
    else {
       Echo "We are trying to find new recipe with the selected ingredients"."\n";
    }
    mysqli_close($conn);
?>
