<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>
<style>
body {
    margin: 0;
    padding: 0;
    box-sizing: border-box;    
    font-family: Arial, Helvetica, sans-serif;
    background-image: linear-gradient(to top, #cfd9df 0%, #e2ebf0 100%);
    width: 100%;
    height: 576px;
}

.adding {
    display: flex;
    align-content: center;
    justify-content: center;
    background-image: linear-gradient(120deg, #a1c4fd 0%, #c2e9fb 100%);
    width: 400px;
    height: 400px;
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%);
    border-radius: 16px;
}
.adding h2 {
    text-align: center;
    color: #548CA8;
}
textarea,
.adding input[type="text"] {
    width: 80%;
    border-radius: 8px;
    border: none;
    font-size: 16px;
    padding: 2px 4px;
}

.adding input[type="submit"] {
    background-image: linear-gradient(to right, #00d2ff 0%, #3a7bd5  51%, #00d2ff  100%)
}
.adding input[type="submit"] {
    margin-top: 5px;
    padding: 4px 20px;
    text-align: center;
    text-transform: uppercase;
    transition: 0.5s;
    background-size: 200% auto;
    color: white;
    border-radius: 10px;
    display: block;
    cursor: pointer;
}

.adding input[type="submit"]:hover {
    background-position: right center; /* change the direction of the change here */
            color: #fff;
            text-decoration: none;
}
      
.nav-bar {
    height: 54px;
    background-image: radial-gradient( circle farthest-corner at 10% 20%,  rgba(97,186,255,1) 0%, rgba(166,239,253,1) 90.1% );
    display: flex;
    justify-content: space-evenly;
}
.nav-bar a {
    margin-top: 6px;
    align-content: center;
    padding: 8px 16px;
    font-size: 20px;
    text-decoration: none;
    color: #F5E8C7;
}



</style>
<body>

    <head>
        <Nav class="nav-bar">
            <a href="index.php">Home</a>
            <a href="adding.php">Adding</a>
            <a href="All-Product.php">All Product</a>
            <a href="#">Alter</a>
        </Nav>
    </head>

    <div class="adding">
        <form action="" method="post" enctype="multipart/form-data">
            <h1>OK</h1>
            <h2>Add Product</h2>
            <table >
                <tr>
                    <td>Product Name</td>
                    <td>
                        <input type="text" name="clothing_name">
                    </td>
                </tr>
                <tr>
                    <td>Price's Product</td>
                    <td>
                        <input type="text" name="clothing_price">
                    </td>
                </tr>
                <tr>
                    <td>Product image</td>
                    <td>
                        <input type="file" name="clothing_image">
                    </td>
                </tr>
                <tr>
                    <td>Product Des</td>
                    <td>
                        <textarea name="clothing_des" id="" rows="10"></textarea>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" name="insert_clothing" value="Add Product">
                    </td>
                </tr>
            </table>
    
        </form>
    </div>
    <?php

        $servername = "localhost";
        $username = "root" ;
        $password = "";
        $database = "store";
                //khai báo biến để kết nói vs csdl 

        $connect =  mysqli_connect($servername, $username, $password, $database);

        if(isset($_POST['insert_clothing'])) {
           $clothing_name = $_POST['clothing_name'];
           $clothing_price = $_POST['clothing_price'];
           $clothing_description = $_POST['clothing_des'];

           $clothing_image = $_FILES['clothing_image']['name'];
           $clothing_image_tmp = $_FILES['clothing_image']['tmp_name'];

            move_uploaded_file($clothing_image_tmp, "img/$clothing_image");

            $sql ="INSERT INTO clothing(clothing_id,
                                        clothing_name, 
                                        clothing_price, 
                                        clothing_image, 
                                        clothing_description) 
                                VALUES
                                        (NULL,
                                        '$clothing_name',
                                        '$clothing_price',
                                        '$clothing_image',
                                        '$clothing_description') 
                        ";

            $insert_pro = mysqli_query($connect, $sql);
            if($insert_pro) {
                echo 'Them thanh cong';
                echo "<script>window.open('index.php','_self')</script>";
            } else {
                echo 'Them that bai';
            }
        }


    ?>
</body>
</html>