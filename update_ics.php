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


include("includes/connection.php");
include("includes/icalendar.php");
//$records = mysql_num_rows(mysql_query("select * from  events"));
//if ($_POST['stage'] == 1) {

$rooms = array("http://www.icalx.com/public/mmmcabq/Arts__Crafts_Room_3_Calendar.ics",
    "http://www.icalx.com/public/mmmcabq/Social_Hall_East_Calendar.ics",
    "http://www.icalx.com/public/mmmcabq/Van_2_Calendar.ics",
    "http://www.icalx.com/public/mmmcabq/Gym_Court_East_Calendar.ics",
    "http://www.icalx.com/public/mmmcabq/Computer_Lab_Calendar.ics",
    "http://www.icalx.com/public/mmmcabq/Multipurpose_Room_4_Calendar.ics",
    "http://www.icalx.com/public/mmmcabq/MMMC_Calendar.ics",
    "http://www.icalx.com/public/mmmcabq/Spraypark_Calendar.ics",
    "http://www.icalx.com/public/mmmcabq/SittingCard_Room_Calendar.ics",
    "http://www.icalx.com/public/mmmcabq/Multipurpose_Room_5_Calendar.ics",
    "http://www.icalx.com/public/mmmcabq/Gym_Court_West_Calendar.ics",
    "http://www.icalx.com/public/mmmcabq/Lobby_Calendar.ics",
    "http://www.icalx.com/public/mmmcabq/Social_Hall_West_Calendar.ics",
    "http://www.icalx.com/public/mmmcabq/Van_1_Calendar.ics");

$arrayLength = count($rooms);
for ($x = 0; $x < $arrayLength; $x++) {
    $y = $x + 1;
    echo '<br><br><br>';
    echo "File ";
    echo $y;
    echo "<br><br><br>";
    //echo $_FILES[$rooms['x']]['size'];
    //echo readfile($rooms[$x]);
    $icsFile = fopen($rooms[$x], 'r') or die("Unable to open file!");
    //fread($icsFile, filesize($icsFile)) or die("Unable to read file!");

    while (!feof($icsFile)) {
        $dataString = fgets($icsFile) . "<br>";
        //echo $dataString;
        $ds = explode(":", $dataString);
        if (stristr($dataString, "begin:vevent")) {
            //echo stristr($dataString, 'begin:vevent');
            //print_r(explode(":", $dataString));
            echo $dataString;
            $event = array();
        }
        if (stristr($dataString, "end:vevent")) {
            foreach ($event as $t => $t_value) {
                echo '<br>';
                echo 'Key: '
                . $t . ", Value: "
                . $t_value;
                echo '<br>';
            }
            echo $dataString;
            unset($event);
        }
        switch ($ds['0']) {
            case 'DESCRIPTION':
                echo $ds['1'];
                $event['description'] = $ds['1'];
                break;
            case 'LAST-MODIFIED':
                echo $ds['1'];
                $event['last-modified'] = $ds['1'];
                break;
            case 'DTEND':
                echo $ds['1'];
                $event['dtend'] = $ds['1'];
                break;
            case 'DTSTART':
                echo $ds['1'];
                $event['dtstart'] = $ds['1'];
                break;
            case 'SUMMARY;LANGUAGE=en-us':
                echo $ds['1'];
                $event['summary'] = $ds['1'];
                break;
            case 'CATEGORIES':
                echo $ds['1'];
                $event['categories'] = $ds['1'];
                break;
            case 'UID':
                echo $ds['1'];
                $event['uid'] = $ds['1'];
                break;
        }
    }
    fclose($icsFile);
}
/*
  $ical = new iCalendar();
  $filename = $_FILES['file1']['tmp_name'];
  $ical->parse("$filename");
  $ical_data = $ical->get_all_data();

  $timezone = "{$ical_data['VCALENDAR']['X-WR-TIMEZONE']}";
  if (function_exists('date_default_timezone_set'))
  date_default_timezone_set($timezone);
  $strsql1 = "Insert into  events(ID,StartDate,StartTime,EndDate,EndTime,Title,Location,Description) values  ";
  if (!empty($ical_data['VEVENT'])) {
  foreach ($ical_data['VEVENT'] as $key => $data) {

  //get StartDate And StartTime
  $start_dttimearr = explode('T', $data['DTSTART']);
  $StartDate = $start_dttimearr[0];
  $startTime = $start_dttimearr[1];

  //get EndDate And EndTime
  $end_dttimearr = explode('T', $data['DTEND']);
  $EndDate = $end_dttimearr[0];
  $EndTime = $end_dttimearr[1];

  $strsql1.="('" . $data['UID'] . "','" . $StartDate . "','" . $startTime . "','" . $EndDate . "','" . $EndTime . "','" . mysql_real_escape_string($data['SUMMARY;LANGUAGE=en-us']) . "','" . mysql_real_escape_string($data['LOCATION']) . "','" . mysql_real_escape_string($data['DESCRIPTION']) . "')";
  $strsql1.=",";
  }
  $strsql1 = rtrim($strsql1, ',');

  mysql_query($strsql1);
  }

  header('Location:index.php');


  if ($_GET['stage'] == "empty") {
  mysql_query(" TRUNCATE events");
  header('Location:index.php');
  }
 * 
 */

$page_title = 'Update .ics';
include_once 'header.php';
?>

<?php

include_once 'footer.php';
?>