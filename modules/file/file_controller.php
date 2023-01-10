<?php

    //CONNECTION
    $connection = new mysqli("localhost","db_user_here","db_password_here","db_name_here");
    mysqli_set_charset($connection,"utf8");

    //ARCHIEVES NAME
    $archieve = $_FILES["file"]["tmp_name"];
    $name = $_FILES["file"]["name"];
    $ext = explode(".", $name);
    $extension = end($ext);

    //EXTENSION CHECK
    if($extension != "csv"){        
        header('location: ../product/product_manage.php?status=file_invalid');
    }else{
        $object = fopen($archieve,'r');
        while(($data = fgetcsv($object, 1000, ";")) !== FALSE){

            $product = $data[0];
            $model = $data[1];
            $amount = $data[2];
            $snumber = $data[3];
            $function = $data[4];
            $company = $data[5];
            $result = $connection->query("insert into tb_products(product, model, amount, snumber, function, company)values('$product', '$model', '$amount', '$snumber', '$function', '$company')");

        }
        //RESULT CHECK
        if($result){
            header('location: ../product/product_manage.php?status=file_success');
        }else{
            header('location: ../product/product_manage.php?status=file_error');
        }

    }

?>
