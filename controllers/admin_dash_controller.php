<?php
require "views/admin_dash.php";
include "models/getPieceDetails.php";
$data = getPieceDetails($piece_id);
var_dump($data);
?>