<?php
//connection bir kere çağrılır
function getConfigValueByKey(string $key, PDO $db)
{
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
function getConfigByImage(string $src, PDO $db)
{
    $query = $db->prepare("SELECT image FROM companies WHERE `name`='$src'");
    $query->execute();
    if ($query->rowCount() > 0) {
        $result = $query->fetchAll();
        foreach ($result as $row) {
            return $row['image'];
        }
    }
    return null;
}
function getConfigNavbarItemsByName(int $i, PDO $db)
{
    $query = $db->prepare("SELECT name FROM navbar_items WHERE`id`='$i'");
    $query->execute();
    if ($query->rowCount() > 0) {
        $result = $query->fetchAll();
        foreach ($result as $row) {
            return $row['name'];
        }
    }
    return null;
}

function getConfigNavbarItemsByLink(int $i, PDO $db)
{
    $query = $db->prepare("SELECT link FROM navbar_items WHERE`id`='$i'");
    $query->execute();
    if ($query->rowCount() > 0) {
        $result = $query->fetchAll();
        foreach ($result as $row) {
            return $row['link'];
        }
    }
    return null;
}
