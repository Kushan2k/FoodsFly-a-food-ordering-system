<?php
session_start();
include_once '../utils/conn.php';
include_once '../utils/jwt-auth.php';
include_once '../utils/select_data.php';
include '../utils/input_validate.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header("Location:../index.php");
}
header('Access-Control-Allow-Origin: http://localhost:9090');
header('Access-Control-Allow-Methods: POST');
header("Content-Type:application/json");

if (isset($_POST['addToCart'])) {
    $itemid = $_POST['item_id'];
    $userId = verifyJWT($_COOKIE['jwt-token'])['user_id'];
    $count = getCartItemCount($conn, $userId);
    if(checkItemInTheCart($conn,$itemid,$userId)){
        $res = [
                "status" => false,
                "newCount" => $count,
                "msg"=>"item already in the cart"
            ];
        
        echo json_encode($res);
        return;
    }

    $SQL = "INSERT INTO user_cart(user_id,item_id) VALUES(?,?)";
    $stm = $conn->prepare($SQL);
    if ($stm) {
        $stm->bind_param("ii", $userId, $itemid);
        if ($stm->execute()) {
            $count = getCartItemCount($conn, $userId);
            $res = [
                "status" => true,
                "newCount" => $count,
            ];
            echo json_encode($res);
        } else {
            $res = [
                "status" => false,
                "newCount" => 0,
            ];
            echo json_encode($res);
        }
    } else {
        $res = [
            "status" => false,
            "newCount" => 0,
        ];
        echo json_encode($res);
    }
}

if (isset($_POST['removeFromCart'])) {
    $cartid = $_POST['cart_id'];

    $sql = "DELETE FROM user_cart WHERE id={$cartid}";
    if ($conn->query($sql) == true) {
        echo 1;
    } else {
        echo 0;
    }
}

if(isset($_POST['save-changes'])){
    $name=htmlspecialchars($_POST['name']);
    $category = htmlspecialchars($_POST['category']);
    $price = filter_var(htmlspecialchars($_POST['price']), FILTER_VALIDATE_FLOAT);
    $description = htmlspecialchars($_POST['desciption']);
    $imgFile = $_FILES['img'];

    if($price==false){
        redirectWithError('../dashboard/menu-items.php', 'Price is not valid!');
        return;
    }
    $price = (float) $price;

    if(!isValidFile($imgFile)){
        redirectWithError('../dashboard/menu-items.php', 'Not a valid file format!');
        return;
    }

    $uploadLocation = '../assets/images/uploads/'.basename($imgFile['name']);

    if(move_uploaded_file($imgFile['tmp_name'],$uploadLocation)){
        $sql = "INSERT INTO menu_item(name,price,category,description,img_url) VALUES(?,?,?,?,?)";
        $stm = $conn->prepare($sql);

        if($stm){
            $stm->bind_param('sisss', $name, $price, $category, $description, $uploadLocation);
            if($stm->execute()){
                redirectWithSuccess('../dashboard/menu-items.php', 'Menu Item Added!');
                return;
            }else{
                if(file_exists($uploadLocation)){
                    unlink($uploadLocation);

                }
                redirectWithError('../dashboard/menu-items.php', 'item adding failed!');
                return;
            }
        }else{
            if(file_exists($uploadLocation)){
                unlink($uploadLocation);

            }
            
            // redirectWithError('../dashboard/menu-items.php', $conn->error);
            redirectWithError('../dashboard/menu-items.php', 'item adding failed!');
            
            return;
        }

    }else{
        redirectWithError('../dashboard/menu-items.php', 'File upload failed!');
        return;
    }


}

if(isset($_POST['deleteMenuItem'])){
    $itemID = $_POST['item_id'];

    $sql = "SELECT img_url FROM menu_item WHERE menu_id={$itemID}";
    $img = $conn->query($sql)->fetch_assoc()['img_url'];
    

    $sql = "DELETE FROM menu_item WHERE menu_id={$itemID}";
    if($conn->query($sql)==TRUE){
        if(file_exists($img)){
            unlink($img);
        }
        echo 1;

    }else{
        echo 0;
    }
}

if(isset($_POST['edit-item'])){
    $id=$_POST['itemid'];
    $name = htmlspecialchars($_POST['name']);
    $price = filter_var(htmlspecialchars($_POST['price']), FILTER_VALIDATE_FLOAT);
    $description = htmlspecialchars($_POST['description']);
    $currentfile = $_POST['file'];

    if($price==false){
        redirectWithError("../dashboard/item-edit.php?itemid={$id}", 'Item price is not valid!');
        return;
    }

    if(isset($_FILES['img']) && $_FILES['img']['error']==0){
        $file = $_FILES['img'];
        if(isValidFile($file)){
            $uploadLocation = '../assets/images/uploads/'.$file['name'];
            if(move_uploaded_file($file['tmp_name'],$uploadLocation)){
                $sql = "UPDATE menu_item SET img_url=? WHERE menu_id=?";
                $stm = $conn->prepare($sql);
                $stm->bind_param('si', $uploadLocation, $id);
                if($stm->execute()){
                    if(file_exists($currentfile)){
                        unlink($currentfile);
                    }
                }
            }
        }else{
            print_r($_FILES);
            // redirectWithError("../dashboard/item-edit.php?itemid={$id}", 'invalid file type!');
            return;
        }
    }

    $sql = "UPDATE menu_item SET name=?,price=?,description=? WHERE menu_id=?";
    $stm = $conn->prepare($sql);
    $stm->bind_param('sisi', $name, $price, $description,$id);
    if($stm->execute()){
        redirectWithSuccess('../dashboard/menu-items.php?view=all', 'item updated!');
        return;
    }else{
        redirectWithError("../dashboard/item-edit.php?itemid={$id}", 'update did not complete!');
        return;
    }
    


}

function isValidFile($file){
    $ex = explode('.',$file['name']);
    $ext = end($ex);
    $fileTypes = array('jpg', 'png', 'jpeg');
    $exr = strtolower($ext);

    if(in_array($exr,$fileTypes)){

        return true;
    }else{
        return false;
    }
    
}

function checkItemInTheCart($conn,$itemid,$userid){

    $sql = "SELECT id from user_cart WHERE item_id={$itemid} AND user_id={$userid}";
    $res = $conn->query($sql);
    if($res==TRUE){
        if($res->num_rows>0){
            return true;
        }else{
            return false;
        }
    }

}
