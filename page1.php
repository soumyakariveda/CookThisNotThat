<link rel="stylesheet" type="text/css" href="page1_css.css" />

<?php  //echo $_SERVER['PHP_SELF'];
?>
<body bgcolor="#b6ffb6">
<div class="container">
	<img src="CTNT.jpg" class = "center" >
	<h1>Ingredients</h1>
    <?php
    $servername = "db";
    $username = "root";
    $password = "";
    $dbname = "CookThisNotThatDB";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql1 = "SELECT name,ingredient_id FROM Ingredients";
    $result1 = mysqli_query($conn, $sql1);
    if (mysqli_num_rows($result1) > 0) {
       echo '<form action="page2.php" method="post">';
       	while($row = mysqli_fetch_assoc($result1)) {
 		echo '<label class = "customcheck">'.$row["name"].
         	'<input type="checkbox"  name = "check_list[]" value = '.$row["ingredient_id"].' > <span class="checkmark"></span> </label>';
        		//echo '<input type="checkbox" name="check_list[]" value='.$row["name"].'><label>'.$row["name"].'</label>';
		}
		echo '<input type = "submit" name = "submit" value = "Find Recipes"/>';
	echo '</form>';
	//echo '<a href="http://localhost/recipes.php" class="button">Find Recipes</a>';
    }
    else {
       Echo "No ingredients :( "."\n";
    }
    mysqli_commit($conn);
    mysqli_close($conn);
    ?>
</div>
