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


$page_title = 'Update .ics';
include_once 'header.php';

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
    echo readfile($rooms[$x]);
}
?>

<?php
include_once 'footer.php';
?>