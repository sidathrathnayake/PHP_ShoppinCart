<?php

//Start session
session_start();


require_once ('php/Database.php');
require_once ('php/component.php');

//Crate instance of Database class
$database = new Database(dbname:"productdb", tablename:"products");


if(isset($_POST['add'])){
    //print_r($_POST['id']);

    if(isset($_SESSION['cart'])){
        $item_array_id = array_column($_SESSION['cart'],"id");

        if(in_array($_POST['id'],$item_array_id)){
            echo "<script>alert('Product is already added in the cart...!')</script>";
            echo "<script>window.location = 'index.php'</script>";
        }
        else{
            $count = count($_SESSION['cart']);
            $item_array = array(
                'id' => $_POST['id']
            );
            $_SESSION['cart'][$count] = $item_array;
            //print_r($_SESSION['cart']);
        }

    }
    else{
        $item_array = array(
            'id' => $_POST['id']
        );

        //Create new session variable 
        $_SESSION['cart'][0] = $item_array;
        //print_r($_SESSION['cart']);

    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    
    <script src="https://kit.fontawesome.com/d3d4d5673c.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
</head>
<body>
 
<?php 
    require_once ('php/header.php');
?>

    <div class="container">
        <div class="row text-center py-5">

            <?php

                $result = $database->getData();

                while($row = mysqli_fetch_assoc($result)){
                    component(
                        $row['names'],
                        $row['preprice'],
                        $row['price'],
                        $row['decs'],
                        $row['images'], 
                        $row['id'] );
                }

            ?>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
</html>