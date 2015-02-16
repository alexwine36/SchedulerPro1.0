<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$page_title = "Signup";
include_once 'header.php';
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