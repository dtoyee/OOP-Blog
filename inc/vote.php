<?php

include '../classes/database.php';
include '../classes/vote.php';
include '../classes/misc.php';

$db = new Database();
$vote = new Vote($db);
$misc = new Misc();

$id = $db->protectString($_POST['id']);

// add
$vote->addVote($id, $misc->getIp());