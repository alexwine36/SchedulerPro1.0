<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();

if ($_SESSION['username']) {
    //echo '<br>Username is set';
    header('location: index.php');
}
?>
<?php
$page_title = "Login";
//include_once 'Search/xml_update.php';
/*
 * if( $user->is_logged_in() ){    
 *
  header('Location: memberpage.php');
  }
 */



include_once 'includes/database.php';
include_once 'header.php';
//include_once 'objects/Users.php';
// get database connection
$database = new Database();
$db = $database->getConnection();
//Find Password

echo "<div class='right-button-margin'>";
echo "<a href='forgotpass.php' class='btn btn-default pull-right'>Forgot Password</a>";
echo "</div>";


if ($_POST) {

    // instantiate product object
    include_once 'objects/Users.php';
    $newuser = new Users($db);

    // set product property values
    $newuser->username = $_POST['username'];
    $newuser->password = $_POST['password'];

    // create the product
    if ($newuser->findUser()) {
        
        echo "<div class=\"alert alert-success alert-dismissable\">";
        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
        echo "Login successful.";
        echo "</div>";
        
        
    }

    // if unable to create the product, tell the user
    else {
        echo "<div class=\"alert alert-danger alert-dismissable\">";
        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>";
        echo "Unable to find login.";
        echo "</div>";
    }
}
?>

<form action='login.php' method='post'>

    <table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td><input type='text' name='username' placeholder="User Name"class='form-control' required></td>
        </tr>

        <tr>
            <td><input type='password' name='password' placeholder="Password" class='form-control' required></td>
        </tr>
        <tr>
            <td>
                <button type="submit" class="btn btn-primary btn-block">Login</button>
            </td>
        </tr>
    </table>
</form>
<?php
include_once 'footer.php';
?>