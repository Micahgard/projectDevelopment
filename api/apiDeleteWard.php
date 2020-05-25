<?php
/**
 * Author: Joel
 * Date: 25/05/2020
 * Version: 1.0
 * Purpose: api for deleting ward
 */

session_start();

if (isset($_SESSION['id'])) {
    include_once "../class/Ward.php";
    $ward = new Ward();
    $ward->delete($_GET["id"]);
}