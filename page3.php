<link rel="stylesheet" href="page3_css.css" />
<?php
    $servername = "db";
    $username = "root";
    $password = "password";
    $dbname = "CookThisNotThatDB";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql1 = "SELECT * FROM Recipes WHERE recipe_id = ".$_POST['id'];
?>
<h1 class="elegantshd">
  <?php
    $result1 = mysqli_query($conn,$sql1);
    echo mysqli_fetch_assoc($result1)['name'];
  ?>
</h1>
<h3 class="deepshd">
  <?php
    $result1 = mysqli_query($conn,$sql1);
    echo nl2br("Cooking Time: ".mysqli_fetch_assoc($result1)['cooking_time']." minutes\n");
    $result1 = mysqli_query($conn,$sql1);
    echo nl2br("Category: ".mysqli_fetch_assoc($result1)['category']."\n");
    $result1 = mysqli_query($conn,$sql1);
    echo nl2br("Calories: ".mysqli_fetch_assoc($result1)['calories']);
  ?>
</h3>
<h2 class="xbootstrap">
  <?php
    $result1 = mysqli_query($conn,$sql1);
    echo mysqli_fetch_assoc($result1)['directions'];
  ?>
</h2>
