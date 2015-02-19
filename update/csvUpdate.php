<?php
/*
 * Copyright (C) 2015 alexanderwine
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */
session_start();

if ($_SESSION['type'] < 0) {
    $page_title = 'CSV Update';
    include_once '../header.php';
} else {

    header('location: ../index.php');
}
?>

<form action='csvUpdating.php' method='post' enctype="multipart/form-data">

    <table class='table table-hover table-responsive table-bordered'>

        <tr>
            <td>
                Select .csv file for upload
            </td>
            <td><input type='file' name='file2' class='form-control' required></td>
        </tr>
        
        <tr>
            <td></td>
            <td><input type="submit" value="Upload Report" name="submit" class="btn btn-primary btn-block"></td>
        </tr>

    </table>
</form>
<form action="csvView.php" method="post">
    <table class="table table-hover table-responsive table-bordered">
        <tr>
            <td>View previously uploaded csv file</td>
        </tr>
        <tr>
            <td><input type="submit" value="submit" name="View" class="btn btn-primary btn-block"></td>
        </tr>
    </table>
</form>

<?php
include_once '../footer.php';
?>