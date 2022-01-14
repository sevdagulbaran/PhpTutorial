<?php
//connection bir kere çağrılır
function getConfigValueByKey(string $key, PDO $db)
{
    $query = $db->prepare("SELECT value FROM settings WHERE `key`='$key'");
    $query->execute();
    if ($query->rowCount() > 0) {
        $result = $query->fetchAll();
        foreach ($result as $row) {
            return $row->value;
        }
    }
    return null;
}

function getCompanies(PDO $db)
{
    $query = $db->prepare("SELECT * FROM companies");
    $query->execute();
    if ($query->rowCount() > 0) {
        $result = $query->fetchAll();
        return $result;
    }
    return null;
}

function getNavbarItems(PDO $db)
{
    $query = $db->prepare("SELECT * FROM navbar_items");
    $query->execute();
    if ($query->rowCount() > 0) {
        $result = $query->fetchAll();
        return $result;
    }
    return null;
}

function getCloudFeatures(PDO $db)
{
    $query = $db->prepare("SELECT * FROM cloud_features");
    $query->execute();
    if ($query->rowCount() > 0) {
        $result = $query->fetchAll();
        return $result;
    }
    return null;
}

function getServices(PDO $db)
{
    $query = $db->prepare("SELECT * FROM services");
    $query->execute();
    if ($query->rowCount() > 0) {
        $result = $query->fetchAll();
        return $result;
    }
    return null;
}

function getTestimonials(PDO $db)
{
    $query = $db->prepare("SELECT * FROM testimonials");
    $query->execute();
    if ($query->rowCount() > 0) {
        $result = $query->fetchAll();
        return $result;
    }
    return null;
}

function getProducts(PDO $db)
{
    $sql = "SELECT products.* , currency.prefix FROM products
     LEFT JOIN currency ON currency.id=products.currency_id ";
    $query = $db->prepare($sql);
    $query->execute();
    if ($query->rowCount() > 0) {
        $result = $query->fetchAll();
        foreach ($result as $key => $row) {
            $result[$key]->features = getProductFeaturesById($row->id, $db);
        }
        return $result;
    }
    return null;
}

function getProductFeaturesById(int $productId, PDO $db)
{
    $query = $db->prepare("SELECT * FROM products_features WHERE `product_id`='$productId'");
    $query->execute();
    if ($query->rowCount() > 0) {
        $result = $query->fetchAll();
        return $result;
    }
    return null;
}

function getFooterItems(PDO $db)
{
    $query = $db->prepare("SELECT * from footer_parent_items ");
    $query->execute();
    if ($query->rowCount() > 0) {
        $result = $query->fetchAll();
        foreach ($result as $key => $row) {
            $result[$key]->subItems = geFooterItemsByParentId($row->id, $db);
        }
        return $result;
    }
    return null;
}

function geFooterItemsByParentId(int $fotterItemId, PDO $db)
{
    $query = $db->prepare("SELECT * FROM footer_items WHERE `parent_id`=' $fotterItemId'");
    $query->execute();
    if ($query->rowCount() > 0) {
        $result = $query->fetchAll();
        return $result;
    }
    return null;
}

function  isUserExist(string $email, string $password, PDO $db)
{
    $errors = [];
    $data =[];
    $success = "";

    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if ($email === FALSE) {
        $errors[] = "Geçersiz e-mail adresi";
    }

    if(strlen($password) < 8 ){
        $errors[] = "Parola minimum 8 karakter olmalıdır";
    }

    if(count($errors) > 0 ){
        $result = [
            "errors" => $errors,
            "success" => $success
        ];
        return $result;
    }

    $query = $db->prepare("SELECT * FROM users WHERE `email`='$email' AND `password`='$password' ");
    $query->execute();
    if ($query->rowCount() > 0) {
        $data = $query->fetchAll();
        $success = "Kullanıcı bulundu";
    }
    $result = [
        "errors" => $errors,
        "success" => $success,
        "data" => $data
    ];
    return $result;
}

function insertToUser(string $name, string $surname,string $email, string $password,  PDO $db){

    $errors = [];
    $success = "";

    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if ($email === FALSE) {
        $errors[] = "Geçersiz e-mail adresi";
    }

    if(strlen($password) < 8 ){
        $errors[] = "Parola minimum 8 karakter olmalıdır";
    }

    if(count($errors) > 0 ){
        $result = [
            "errors" => $errors,
            "success" => $success
        ];
        return $result;
    }

    $query = $db->prepare("INSERT INTO users ( `name`, `surname`, `email`,`password` ) VALUES ( '$name', '$surname', '$email','$password')");
    $query->execute();
    if ($query->rowCount() > 0) {
        $result = $query->fetchAll();
        $success = "Kullanıcı başarıyla kayıt edildi";
    }

    $result = [
        "errors" => $errors,
        "success" => $success
    ];
    return $result;
}

function getNews(PDO $db)
{
    $query = $db->prepare("SELECT * FROM news");
    $query->execute();
    if ($query->rowCount() > 0) {
        $result = $query->fetchAll();
        return $result;
    }
    return null;
}
