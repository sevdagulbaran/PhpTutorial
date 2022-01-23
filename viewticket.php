<?php

require_once 'header.php';

if(!isset($_SESSION['loggeduser'])){
    header("Location: login.php");
}

$tid = $_GET['tid'];
$user = $_SESSION['loggeduser'];


if(isset($_POST['message'])){
    insertTicketReplies($db,$tid,$_POST['message']);
}



$ticket = getTicket($db,$tid);
$replies = getTicketReplies($db,$tid);

?>
    <style>
        .user-info {
            background: #2f5aec;padding: 10px 20px;color: white;text-transform: capitalize;display: flex;justify-content: space-between;
        }
        .admin-info {
            background: #6729b1;padding: 10px 20px;color: white;text-transform: capitalize;display: flex;justify-content: space-between;
        }
    </style>
    <!-- Heading Starts Here -->
    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>#<?php echo $ticket->id?></h1>
                    <p><?php echo $ticket->title?></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Heading Ends Here -->


    <div class="container mt-5 mb-5">
        <div class="row">

            <div class="col-md-12">
                <div style="border: 1px solid #2f5aec;margin-bottom: 20px;">
                    <div id="reply-btn" style="background: #2f5aec;padding: 10px 20px;color: white;cursor: pointer;"><i class="fa fa-edit"></i> Reply</div>
                    <form method="post" id="reply-form" style="padding: 20px;">
                        <div class="row">
                            <div class="form-group col-sm-4">
                                <label for="inputName">Name</label>
                                <input type="text" name="name" id="inputName" value="<?php echo $user->name ?>" class="form-control disabled" disabled="disabled">
                            </div>
                            <div class="form-group col-sm-5">
                                <label for="inputEmail">Email Address</label>
                                <input type="email" name="email" id="inputEmail" value="<?php echo $user->email ?>" class="form-control disabled" disabled="disabled">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputMessage">Message</label>
                            <div class="md-editor" id="1642264520357">
                                <div class="md-header btn-toolbar">
                                </div><textarea name="message" rows="12" class="form-control markdown-editor md-input" style="resize: vertical;"></textarea>
                                <div class="md-fullscreen-controls"><a href="#" class="exit-fullscreen" title="Exit fullscreen"><span class="glyphicon glyphicon-fullscreen"></span></a></div>
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" name="ticket" class="btn btn-primary "> Submit </button>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
            <?php foreach($replies as $reply) { ?>

            <div class="col-md-12">
                <div class="user-message" style="border: 1px solid #384ce1;margin-bottom: 20px;">
                    <div class="<?php if($reply->reply_admin_id != 0){ echo 'admin-info'; } else { echo 'user-info'; } ?>">
                        <?php if($reply->reply_admin_id != 0){ ?>
                            <span><?php echo $reply->admin['name']." ".$reply->admin['surname'] ?> (Admin)</span>
                        <?php }else{ ?>
                            <span><?php echo $user->name." ".$user->surname ?> (User)</span>
                            <?php } ?>
                        <span style="font-size: 13px;font-style: italic;"><?php echo date('d.m.Y H:i',strtotime($reply->created_at)) ?></span>
                    </div>
                    <div class="message" style="padding: 20px;">
                        <?php echo $reply->message ?>
                    </div>
                </div>
            </div>
            <?php } ?>

            <div class="col-md-12">
                <div class="user-message" style="border: 1px solid #384ce1;margin-bottom: 20px;">
                    <div class="user-info" style="background: #2f5aec;padding: 10px 20px;color: white;text-transform: capitalize;display: flex;justify-content: space-between;">
                        <span><?php echo $user->name." ".$user->surname ?> (User)</span>
                        <span style="font-size: 13px;font-style: italic;"><?php echo date('d.m.Y H:i',strtotime($ticket->created_at)) ?></span>
                    </div>
                    <div class="message" style="padding: 20px;">
                        <?php echo $ticket->message ?>
                    </div>
                </div>
            </div>

        </div>

    </div>
<?php require_once 'footer.php'; ?>