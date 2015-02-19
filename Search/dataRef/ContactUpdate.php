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

//echo '<br>Contact Update Accessed';
include_once '../objects/Contact.php';
echo '<br>File included';
$contact = new Contact($db);

$stmtcon = $contact->read();

while ($row_contact = $stmtcon->fetch(PDO::FETCH_ASSOC)) {
    extract($row_contact);
    
    //echo "<br> Row extracted: $con_first_name $con_last_name";
    $txt .= "<item>"
            . "<name>$con_first_name $con_last_name "
            . "</name>"
            . "<extra>$con_main_phone $con_email"
            . "</extra>"
            . "<description>Contact.php"
            . "</description>"
            . "<id>$con_id"
            . "</id>"
            . "</item>";
}
?>