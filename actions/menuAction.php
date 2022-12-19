<?php

include_once '../utils/conn.php';
include_once '../utils/jwt-auth.php';
include_once '../utils/select_data.php';
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    header("Location:../index.php");
}


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
