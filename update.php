<?php

require_once 'inc/functions.php';
require_once 'inc/headers.php';

$input = json_decode(file_get_contents('php://input'));
$id = filter_var($input,FILTER_SANITIZE_NUMBER_INT);
$description = filter_var($input->description,FILTER_SANITIZE_FULL_SPECIAL_CHARS);

try {
    $db = openDb();

    $query = $db->prepare('update item set description=:description where id=:id');
    $query->bindValue(':description',$description,PDO::PARAM_STR);
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->execute();

    header('HTTP/1.1 200 OK');
    $data = array('id' => $id);
    print json_encode($data);
} catch (PDOException $pdoex) {
    returnError($pdoex);
}
