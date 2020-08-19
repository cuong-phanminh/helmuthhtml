<?php

//delete iterm product cart
if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["cart"] as $keys => $values) {
            if ($values["product_id"] == $_GET["product_id"]) {
                unset($_SESSION["cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="index.php"</script>';
            }
        }
    }
}
?>