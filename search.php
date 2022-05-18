<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
<?php
include 'connection.php';
if(isset($_GET['q'])){
    $q= $_GET['q'];
    // XSS
    $q=htmlentities($q);
    // SQL
    $q=mysqli_real_escape_string($con,$q);
    $sql="SELECT * FROM books_data where book_name='$q' or book_name like '%$q' or book_name like '%$q'or book_name like '$q%' or book_name like '%$q%'";
    $res=mysqli_query($con, $sql);
    if(mysqli_num_rows($res) > 0){
        ?>
        <ul class="collection row">
            <?php
            while($x=mysqli_fetch_assoc($res)){
                ?>
                <li class="collection-item">
                    <p><a href="#" class="black-text"><?php echo 'Book Name:'. ' '.$x['book_name'] . ' ' .'Library Name:'. ' ' . $x['library'] . ' ' . 'Library Contact:' . ' ' .$x['lib_contact'] . ' ' .'Library Address:'. ' ' . $x['lib_address']; ?></a></p>
                    <span><?php echo $x['library']; ?></span>
                </li>
                <?php
            }
            ?>
        </ul> <?php
    }
    else{
        echo "<p class='red-text'>No data found</p>";
    }
}
else
{
   echo "<p class='red-text'>Bad Request</p>";
}
?>