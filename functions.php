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
    $data = [];
    $success = "";

    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if ($email === FALSE) {
        $errors[] = "Geçersiz e-mail adresi";
    }

    if (strlen($password) < 8) {
        $errors[] = "Parola minimum 8 karakter olmalıdır";
    }

    if (count($errors) > 0) {
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

function insertToUser(string $name, string $surname, string $email, string $password,  PDO $db)
{

    $errors = [];
    $success = "";

    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    if ($email === FALSE) {
        $errors[] = "Geçersiz e-mail adresi";
    }

    if (strlen($password) < 8) {
        $errors[] = "Parola minimum 8 karakter olmalıdır";
    }

    if (count($errors) > 0) {
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

function getTickets(PDO $db)
{
    $uid = $_SESSION['loggeduser']->id;
    $query = $db->prepare("SELECT * FROM tickets WHERE `user_id`='$uid'");
    $query->execute();
    if ($query->rowCount() > 0) {
        $result = $query->fetchAll();
        return $result;
    }
    return null;
}

function getTicketDepartments(PDO $db)
{
    $query = $db->prepare("SELECT * FROM ticket_departments");
    $query->execute();
    if ($query->rowCount() > 0) {
        $result = $query->fetchAll();
        return $result;
    }
    return null;
}

function getTicket(PDO $db,$id)
{
    $query = $db->prepare("SELECT * FROM tickets WHERE `id`='$id'");
    $query->execute();
    if ($query->rowCount() > 0) {
        $result = $query->fetchAll();
        return $result[0];
    }
    return null;
}

function getTicketReplies(PDO $db,$tid)
{
    $query = $db->prepare("SELECT * FROM ticket_replies WHERE `tid`='$tid' ORDER BY `id` DESC");
    $query->execute();
    if ($query->rowCount() > 0) {
        $result = $query->fetchAll();
        foreach ($result as $key => $reply) {
            if($reply->reply_admin_id != 0 ){
                // send a request to admin table. with admin id.
                $result[$key]->admin = [
                    "id" => $reply->reply_admin_id,
                    "name" => "sevda",
                    "surname" => "baran"
                ];
            }
        }
        return $result;
    }
    return null;
}

function insertTicketReplies(PDO $db,$tid,$message)
{
    $uid = $_SESSION['loggeduser']->id;
    $query = $db->prepare("INSERT INTO ticket_replies ( `tid`, `user_id`, `message`) VALUES ( '$tid', '$uid','$message')");
    $query->execute();
    $query2 = $db->prepare("UPDATE tickets SET `status` = 'customer-reply' WHERE `id` = '$tid'");
    $query2->execute();
    if ($query->rowCount() > 0) {
        $result = $query->fetchAll();
        return $result;
    }
    return null;
}

function supportTickets(string $title, string $message, string $urgency, PDO $db){

    $errors = [];
    $success = "";

    if (empty($title)) {
        $errors[] = "Title boş bırakılamaz";
    }
    if(!trim($message)){
         $errors[] ="Message boş bırakılamaz";
    }

    if (count($errors) > 0) {
        $result = [
            "errors" => $errors,
            "success" => $success
        ];
        return $result;
    }

    $did        = $_POST['department'];
    $uid        = $_SESSION['loggeduser']->id;
    $subject    = $_POST['title'];
    $message    = $_POST['message'];
    $urgency    = $_POST['urgency'];
    $status    = "active";
    $isadminread        = 0;
    $isclientread       = 1;

    $query = $db->prepare("INSERT INTO tickets ( `department_id`, `user_id`, `title`, `message`, `urgency`, `status`, `isadminread`, `isclientread`) 
                                 VALUES ( '$did', '$uid','$subject','$message','$urgency','$status','$isadminread','$isclientread')");
    $query->execute();
    if ($query->rowCount() > 0) {
        $success = "Form basarıyla gönderildi";
    }

    $result = [
        "errors" => $errors,
        "success" => $success
    ];
    return $result;
}
