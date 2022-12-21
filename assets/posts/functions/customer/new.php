<?php
    $target_dir = "./assets/images/comics/";
    $filename = date("his")."_".basename($_FILES['caft']['name']);
    $seller = $db->query("SELECT * FROM seller WHERE `userid`=$userid")->fetch();
    $sellerid = $seller['sellerid'];
    if(!empty($seller)) {
        if($_FILES['caft']['type'] == 'image/png') {
            $size = $_FILES['caft']['size'];
            $uploadfile = $target_dir.$filename;
    
            if(move_uploaded_file($_FILES['caft']['tmp_name'], $uploadfile)) {
                $decimal = intval($_POST['decimal']);
                $full = intval($_POST['fullnumber']);

                if($decimal < 1) {
                    $decimal = 00;
                }

                if($decimal > 99) {
                    $decimal = 99;
                }

                $price = "$full.$decimal";

                $insert = $db->prepare("INSERT INTO comic (`sellerid`, `comicname`, `comicdesc`, `price`, `comicpicture`) VALUES ($sellerid, :name, :description, :price, :picture)");
                $insert->bindparam(':name', $_POST['name']);
                $insert->bindparam(':description', $_POST['description']);
                $insert->bindparam(':price', $price);
                $insert->bindparam(':picture', $filename);

                $insert->execute();

                header('location: /customer/home/');
            }
        } 
    }
?>