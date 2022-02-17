<?php
if (!session_id()) {
    session_start();
}
require_once '../backend/app/init.php';

$app = new App;
