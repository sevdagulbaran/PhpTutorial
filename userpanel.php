<?php require_once 'header.php';
$news = getNews($db);
?>

<!-- Heading Starts Here -->
<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Login</h1>
                <p><a href="index.php">Home</a> / <span>User Panel</span></p>
            </div>
        </div>
    </div>
</div>
<!-- Heading Ends Here -->


<div class="container d-flex flex-row bd-highlight">
    <div class="flex-column flex-shrink-0 p-3 text-white my-5 rounded" style="width: 380px; height: 500px; background:#ebf0ec;">

        <span class="fs-4 text-dark">Hoşgeldin, db den ismini çek </span>

        </a>
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
                    Support Requests
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-dark">
                    My Profile
                </a>
            </li>
            <li>
                <a href="#" class="nav-link text-dark">
                    Log-out
                </a>
            </li>
        </ul>
        <hr>
    </div>
    <div class="flex-grow-1">
        <table class="table  my-5 mx-2">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">First</th>
                    <th scope="col">Last</th>
                    <th scope="col">Handle</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                </tr>
                <tr>
                    <th scope="row">2</th>
                    <td>Jacob</td>
                    <td>Thornton</td>
                    <td>@fat</td>
                </tr>
                <tr>
                    <th scope="row">3</th>
                    <td>Larry</td>
                    <td>the Bird</td>
                    <td>@twitter</td>
                </tr>
            </tbody>
        </table>
        <div class="container">
        <div class="row">
            <div class="col-md-12">
            </div>
            <?php foreach ($news as $new) { ?>
                <div class="col-md-4 col-sm-6 col-xs-12">
                    <div class="service-item">
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