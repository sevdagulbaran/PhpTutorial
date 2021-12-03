<?php
//connection bir kere çağrılır
function getConfigValueByKey(string $key,PDO $db){
    $query = $db->prepare("SELECT value FROM settings WHERE `key`='$key'");
    $query->execute();
    if ($query->rowCount() > 0) {
        $result = $query->fetchAll();
        foreach ($result as $row) {
            return $row['value'];
        }
    }
    return null;
}
