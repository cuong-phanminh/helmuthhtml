

<?php
if (isset($_POST['quantity'])) {
    session_start();
    $cnt = 0;
    foreach ($_SESSION["cart"] as $keys => $values) {
        if ($values["product_id"] == $_POST["id"]) {
            $_SESSION["cart"][$cnt]['item_quantity'] = $_POST['quantity'];
            if ($_SESSION["cart"][$cnt]['item_quantity'] == 0) {
                unset($_SESSION["cart"][$keys]);
            }
        }
        $cnt++;
    }
}


if (isset($_POST['action']) && $_POST['action'] == "remove") {
    session_start();
    $cnt = 0;
    foreach ($_SESSION["cart"] as $keys => $values) {
        if ($values["product_id"] == $_POST["id"]) {
                unset($_SESSION["cart"][$keys]);
            }
        }
        $cnt++;
    }

?>