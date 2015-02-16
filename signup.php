<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$page_title = "Signup";
include_once 'header.php';


//Potential Home Button
/*
echo "<div class='right-button-margin'>";
echo "<a href='index.php' class='btn btn-default pull-right'>Home</a>";
echo "</div>";
*/

//Get database connection
include_once 'includes/database.php';

$database = new Database();
$db = $database->getConnection();
// if the form was submitted
if ($_POST) {

    // instantiate product object
    include_once 'objects/Users.php';
    $users = new Users($db);

    // set product property values
    $users->username = $_POST['name'];
    $users->password = $_POST['password'];
    $users->user_type = $_POST['adminpassword'];
    //$product->category_id = $_POST['category_id'];

    // create the product
    if ($users->create()) {
        echo "<div class=\"alert alert-success alert-dismissable\">";
        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
        echo "User was created.";
        echo "</div>";
    }

    // if unable to create the product, tell the user
    else {
        echo "<div class=\"alert alert-danger alert-dismissable\">";
        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
        echo "Unable to create user.";
        echo "</div>";
    }
}
?>


<form action='signup.php' method='post'>

    <table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td>Username</td>
            <td><input type='text' name='name' class='form-control' required></td>
        </tr>

        <tr>
            <td>Password</td>
            <td><input type='password' name='password' class='form-control' required></td>
        </tr>
        <tr>
            <td>Confirm Password</td>
            <td><input type="password" name="password2" class="form-control" required</td>
        </tr>
        <tr>
            <td>Administrator Password</td>
            <td><input type='password' name='adminpassword' class='form-control' ></td>
        </tr>
        
        <tr>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Login</button>
            </td>
        </tr>
    </table>
</form>
<?php
include_once 'footer.php';
?>