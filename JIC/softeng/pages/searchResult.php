<?php 

$pdo = new PDO('mysql:host=localhost;dbname=jic', "root", "");
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if (isset($_POST['search'])){
    $keyword = $_POST['searchkey'];
    if ($keyword != null && $keyword != "") {
     $query=$pdo->prepare('SELECT * from user where lastname like ? or firstname like ?');
     $query->execute(array($keyword,$keyword));
     $result=$query->fetchAll(PDO::FETCH_ASSOC);
     if ($result != null) {
        foreach($result as $row)
        {
            echo "<table class='table table-striped'>";
            echo "<tr>";
            echo "<td><a href=../softeng/pages/searchedProfile.php?id=".$row['idnum']."'>".$row['firstname']." ".$row['lastname']."</a></td>";
            echo '</tr></a>';
        }
    } else {
       echo '<td>'. "No results found" .'</td>';
   }

} else {
    echo "<script>";
    echo "alert('Enter keyword')";
    echo "</script>";
    echo '<td>'. "No results found" .'</td>';
}
}




?>