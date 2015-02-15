<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$page_title = "Search";
include_once 'header.php';
?>

<form>
    <table class='table table-hover table-responsive table-bordered'>
        <tr>
            <td>Search</td>
            <td>
                <input type="text" class='form-control' onkeyup="showResult(this.value)">
                <div id="livesearch"></div>
            </td>
        </tr>

    </table>
</form>

<?php
include_once 'footer.php';
?>