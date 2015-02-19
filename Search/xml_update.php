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


    include_once '../includes/database.php';
//echo "Database Included <br>";
    $database = new Database();
//echo "New Database Connection Created<br>";
    $db = $database->getConnection();
//echo "Database Connected<br>";



    $myfile = fopen('ls.xml', 'w') or die("Unable to open file!");
    $txt = "<?xml version='1.0' encoding='UTF-8'?>"
            . "<pages>";

    include_once 'dataRef/ContactUpdate.php';
//echo 'Contact Update Success';
    include_once 'dataRef/ScheduleRecurringUpdate.php';

    include_once 'dataRef/ResourceUpdate.php';

    $txt .= "</pages>";

    fwrite($myfile, $txt);
    fclose($myfile);
//include_once 'footer.php';

?>
<?php
header('location: ../index.php');
?>
