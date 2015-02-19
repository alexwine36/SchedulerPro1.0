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

//Include Database Files
include_once '../objects/ScheduleRecurring.php';



//Database Variables
$schrec = new ScheduleRecurring($db);


$stmt = $schrec->read();

while ($row_schrec = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row_schrec);
    //echo "<br> Row extracted: $sch_rec_name ";
    $txt .= "<item>"
            . "<name>$sch_rec_name"
            . "</name>"
            . "<description>ScheduleRecurring.php"
            . "</description>"
            . "<id>$sch_rec_id"
            . "</id>"
            . "</item>";
}