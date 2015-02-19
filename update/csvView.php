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

ini_set('auto_detect_line_endings', TRUE);

include_once '../includes/database.php';

$database = new Database();
$db = $database->getConnection();
include_once '../objects/ScheduleCategory.php';
include_once '../objects/ScheduleRecurring.php';
if ($file = fopen("../upload/" . 'uploaded_file.csv', "r")) {
    echo 'File opened. <br /><br><br>';

    /* for ($i = 0; $i < 1; $i++) {
      print_r(fgetcsv($file));
      echo '<br><br>';
      fclose($file);
      $file = fopen("upload/" . $storagename, "r");
      } */

    $row_count = 0;
    while (!feof($file)) {
        if ($row_count == 0) {


            echo '<br>Column Headers<br>';
            $headers = fgetcsv($file);
            $csvCount = count($headers);

            print_r($headers);
            echo '<br><br>Columns: ' . $csvCount . "<br><br>";
            for ($c = 0; $c < $csvCount; $c++) {
                print_r($headers[$c]);
                echo '<br>';

                $schedcat = new ScheduleCategory($db);

// set product property values
                $schedcat->schedcat_name = $headers[$c];


// create the product
                if ($schedcat->createName()) {
                    echo "<br>Create Success<br>";
                }

// if unable to create the product, tell the user
                else {
                    echo "<br>Create Fail<br>";
                }
            }
        } else {
            echo '<br><br>';
            echo 'Row: ' . $row_count . "<br>";
            //print_r(fgetcsv($file));
            $rowInfo = fgetcsv($file);
            for ($c = 0; $c < $csvCount; $c++) {
                print_r($headers[$c]);
                echo ': ';
                print_r($rowInfo[$c]);
                echo '<br>';
                if ($rowInfo[$c] == "") {
                    continue;
                }
                $schedcat = new ScheduleCategory($db);

// set product property values
                $schedcat->schedcat_name = $headers[$c];

                if ($schedcat->readName()) {
                    $schrecur = new ScheduleRecurring($db);
                    echo 'Name Found!<br>';
                    echo $GLOBALS['sid'];
                    //$si = $selectedId;
                    $schrecur->name = $rowInfo[$c];
                    //var_dump($selectedId);
                    $schrecur->cat_id = $GLOBALS['sid'];
                    if ($rowInfo != NULL or $rowInfo != "") {
                        if ($schrecur->createName()) {
                            echo '<br>Schedule Recurring Success!<br>';
                        } else {
                            echo '<br>Schedule Recurring not added<br>';
                        }
                    } else {
                        echo 'Name not found<br>';
                    }
                }
            }
        }

        $row_count += 1;
        echo 'Current Row: '
        . $row_count;
    }
//print_r(fgetcsv($file));


    fclose($file);
} else {
    echo 'No file selected <br />';
}
?>