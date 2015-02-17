<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$page_title = "Signup";
include_once 'header.php';




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
    $users->username = $_POST['username'];
    $users->password = $_POST['password'];
    $users->user_type = $_POST['adminpassword'];
    $users->user_email = $_POST['email'];

    // create the product
    if ($users->create()) {
        echo "<div class=\"alert alert-success alert-dismissable\">";
        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
        echo "User was created.";
        echo "<div class='right-button-margin'>";
        echo "<a href='login.php' class='btn btn-default pull-right'>Login</a>";
        echo "</div>";
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
            <td><input type='text' name='username' placeholder="User Name" class='form-control' required></td>
        </tr>

        <tr>
            <td><input type='password' name='password' placeholder="Password" class='form-control' required></td>
        </tr>
        <tr>
            <td><input type="password" name="password2" placeholder="Password Confirmation" class="form-control" required</td>
        </tr>
        <tr>
            <td><input type='email' name='email' placeholder="Email" class='form-control' ></td>
        </tr>
        <tr>
            <td><input type='password' name='adminpassword' placeholder="Administrator Password" class='form-control' ></td>
        </tr>

        <tr>
            <td>
                <button type="submit" align="right" class="btn btn-primary btn-block">Login</button>
            </td>
        </tr>
    </table>
</form>
<?php
include_once 'footer.php';
?>