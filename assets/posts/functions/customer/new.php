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
                $insert = $db->prepare("INSERT INTO comic (`sellerid`, `comicname`, `comicdesc`, `comicpicture`) VALUES ($sellerid, :name, :description, :picture)");
                $insert->bindparam(':name', $_POST['name']);
                $insert->bindparam(':description', $_POST['description']);
                $insert->bindparam(':picture', $filename);

                $insert->execute();

                header('location: /customer/home/');
            }
        } 
    }
?>