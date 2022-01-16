<?php require_once 'header.php'; ?>


<!-- Heading Starts Here -->
<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Login</h1>
                <p><a href="index.php">User Panel</a> / <span>My Support Tickets</span></p>
            </div>
        </div>
    </div>
</div>
<!-- Heading Ends Here -->
<!-- title ortalayamadım -->
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="text-white my-5 rounded">

                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item ">
                        <a href="supporttickets.php" class="nav-link active" aria-current="page">
                            My Support Tickets
                        </a>
                    </li>
                    <li>
                        <a href="submitticket.php" class="nav-link text-dark">
                            Open Ticket
                        </a>
                    </li>
                    <li>
                        <a href="#" class="nav-link text-dark">
                            News
                        </a>
                    </li>
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
        </div>
        <div class="col-md-9 my-5">
            <h1 class="mb-5 font-italic"> My Support Tickets</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Department</th>
                        <th scope="col">Subject</th>
                        <th scope="col">Status</th>
                        <th scope="col">Last Updated</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Department</td>
                        <td><a href="supportticket.php?tid=319736&amp;c=HPGxXRYi" class="border-left">
                                <span class="ticket-number">#319736</span>
                                <span class="ticket-subject">konu</span>
                            </a></td>
                        <td><span class="label status status-open">
                                Open
                            </span></td>
                        <td>@mdo</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php require_once 'footer.php'; ?>