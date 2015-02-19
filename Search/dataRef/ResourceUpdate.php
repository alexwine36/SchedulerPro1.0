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

include_once '../objects/Resource.php';

echo 'File included';

//Database Variables
$resc = new Resource($db);


$stmt = $resc->read();

while ($row_resc = $stmt->fetch(PDO::FETCH_ASSOC)) {
    extract($row_resc);
    //echo "<br> Row extracted: $res_name ";
    $txt .= "<item>"
            . "<name>$res_name"
            . "</name>"
            . "<description>Resource.php"
            . "</description>"
            . "<id>$res_id"
            . "</id>"
            . "</item>";
}
?>