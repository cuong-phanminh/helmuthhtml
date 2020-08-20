<?php
include("includes/db.inc.php");
if(isset($_POST['registerbtn']))
{

    $firstname = $_POST['first_name'];
    $lastname = $_POST['last_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $street = $_POST['street_address'];
    $zipcode = $_POST['zip_code'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $ordernote = $_POST['order_note'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    $query = "SELECT * FROM users where email='$email'";
    $query_run = mysqli_query($conn, $query);


    if($password == $confirmpassword && $firstname!= "" && $lastname != ""&& $phone!= "" && $email!= "" && $street!= "" && $city!= "" && $state!= "")
        {
            $hpassword = md5($password);
            if (mysqli_num_rows($query_run) == 0) 
                {
                    $query_user = "INSERT INTO users (first_name, last_name, phone, email, password, street_address, city, state, zip_code, order_note, role_id) 
                        VALUES('$firstname', '$lastname', '$phone', '$email', '$hpassword', '$street', '$city', '$state', '$zipcode', '$ordernote', '1')";
                        mysqli_query($conn, $query_user);
                        echo "Register Success!";
                        header("Refresh:5; url=user-list.php");
                }else
                    {
                        echo "Register Failed, Email exited!";
                        header("Refresh:5; url=user-list.php");
                    }
             
        }
    else
    {
        echo "Register Failed!";
        header("Refresh:5; url=user-list.php");
    }
}
?>




    <script>
            if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
            }</script>
    <?php