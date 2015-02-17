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



if (isset($_POST["submit"])) {

    
    
    if (isset($_FILES["file2"])) {
        //$myfile = fopen($_FILES["file2"], "r") or die("File open fail");
        if ($_FILES["file2"]["error"] > 0) {
            echo 'Return Code: ' . $_FILES["file2"]["error"] . "<br />";
        } else {
            //Print file details
            //echo 'File Contents: ' . $_FILES['file2'];
            echo 'Upload: ' . $_FILES["file2"]["name"] . "<br />";
            echo 'Type: ' . $_FILES["file2"]["type"] . "<br />";
            echo 'Size: ' . ($_FILES["file2"]["size"] / 1024) . " Kb<br />";
            echo 'Temp file: ' . $_FILES["file2"]["tmp_name"] . "<br />";

            //if file already exists
            if (file_exists("upload/" . $_FILES["file2"]["name"])) {
                echo $_FILES["file2"]["name"] . " already exists. ";
            } else {
                //Store file in directory upload with the name of "uploaded_file.txt"
                $storagename = "uploaded_file.csv";
                move_uploaded_file($_FILES["file2"]["tmp_name"], "../upload/" . $storagename);
                echo 'Stored in: ' . "upload/" . $_FILES["file2"]["name"] . "<br />";
            }
        }
        //readfile($_FILES["file2"]) or die("File could not be opened");
    } if ($file = fopen("../upload/" . $storagename, "r")) {
        echo 'File opened. <br /><br><br>';
        /*for ($i = 0; $i < 1; $i++) {
            print_r(fgetcsv($file));
            echo '<br><br>';
            fclose($file);
            $file = fopen("upload/" . $storagename, "r");
        }*/

        while (!feof($file)) {
            print_r(fgetcsv($file));
        }
        fclose($file);
    } else {
        echo 'No file selected <br />';
    }
}
//echo readfile($_FILES['file2']) or die("Unable to open file");
/* $file = fopen($_POST['file2'], 'r') or die("Unable to open file!");
  while (!feof($file)) {
  //print_r(fgetcsv($file));
  echo fgetcsv($file);
  }
  fclose($file);
 */
?>