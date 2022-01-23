<?php require_once 'header.php';


if(!isset($_SESSION['loggeduser'])){
    header("Location: login.php");
}

$news = getNews($db);
$user = $_SESSION['loggeduser'];
?>

<!-- Heading Starts Here -->
<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Clientarea</h1>
                <p><a href="index.php">Home</a> / <span>Clientarea</span></p>
            </div>
        </div>
    </div>
</div>
<!-- Heading Ends Here -->


<div class="container d-flex flex-row bd-highlight">
    <div class="flex-column flex-shrink-0 p-3 text-white my-5 mr-3 rounded" style="width: 380px; height: 500px; background:#ebf0ec;">
        <span class="fs-4 text-dark">Welcome,
            <span class="text-capitalize"><?php echo ucfirst($user->name) ?></span>
            <span class="text-uppercase"><?php echo strtoupper($user->surname) ?></span>
        </span>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
            <li class="nav-item ">
                <a href="#" class="nav-link active" aria-current="page">
                    Home
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-dark">
                    Services
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-dark">
                    Bills
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-dark">
                    Support Tickets
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-dark">
                    My Profile
                </a>
            </li>
            <li>
                <a href="logout.php" class="nav-link text-dark">
                    Log-out
                </a>
            </li>
        </ul>
        <hr>
    </div>
    <div class="flex-grow-1 mt-5">
        <div class="tickets">
            <div class="tickets-heading">
                <h3 class="tickets-title">
                    <div class="pull-right">
                        <a href="submitticket.php" class="btn btn-xs roundend">
                            Open New Ticket
                        </a>
                    </div>
                    Recent Support Tickets
                </h3>
            </div>
            <div class="list-group">
                <a href="supporttickets.php" class="list-group-item text-dark">dbden gelen bilgiler
                    <label class="text-light px-1" style="background-color: #33db53;">Open</label><br><small class="text-muted">Last Updated: 15/01/2022 (17:39)</small>
                </a>
            </div>
        </div>
        <div class="row">
            <?php foreach ($news as $new) { ?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="service-item custom-news p-1 mb-3">
                        <h4 class="my-3"><?php echo $new->header ?></h4>
                        <p class="text-muted pb-2"><?php echo $new->content ?></p>
                        <p class="font-italic font-weight-bold mr-2 text-right"><?php echo $new->author ?></p>

                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>


</div>
<?php require_once 'footer.php'; ?>