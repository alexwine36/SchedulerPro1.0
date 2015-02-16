<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$page_title = "Login";
//include_once 'Search/xml_update.php';
include_once 'header.php';
include_once 'includes/database.php';
include_once 'objects/Users.php';

// get database connection
$database = new Database();
$db = $database->getConnection();

// prepare product object
$users = new Users($db);

// set ID property of product to be edited
$users->username = $name;
$users->password = $password;

// read the details of product to be edited
$users->findUser();

// if the form was submitted
if ($_POST) {

    // set product property values
    $users->username = $_POST['name'];
    $users->password = $_POST['password'];
    /*$product->description = $_POST['description'];
    $product->category_id = $_POST['category_id'];
     * /
     */

    // update the product
    if ($users->update()) {
        echo "<div class=\"alert alert-success alert-dismissable\">";
        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
        echo "Product was updated.";
        echo "</div>";
    }

    // if unable to update the product, tell the user
    else {
        echo "<div class=\"alert alert-danger alert-dismissable\">";
        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
        echo "Unable to update product.";
        echo "</div>";
    }
}
?>

<form action='login.php' method='post'>

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