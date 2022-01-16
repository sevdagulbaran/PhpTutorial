<?php require_once 'header.php' ?>

<!-- Heading Starts Here -->
<div class="page-heading header-text">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Login</h1>
                <p><a href="index.php">User Panel</a> / <span>Open Ticket</span></p>
            </div>
        </div>
    </div>
</div>
<!-- Heading Ends Here -->

<form method="post" role="form">
    <div class="container my-5 ">
        <div class="row">
            <div class="form-group col-sm-4">
                <label for="inputName">Name</label>
                <input type="text" name="name" id="inputName" value="Albert Joe" class="form-control disabled" disabled="disabled">
            </div>
            <div class="form-group col-sm-5">
                <label for="inputEmail">Email Address</label>
                <input type="email" name="email" id="inputEmail" value="albert@domain.com" class="form-control disabled" disabled="disabled">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-10">
                <label for="inputSubject">Subject</label>
                <input type="text" name="subject" id="inputSubject" value="" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-sm-3">
                <label for="inputDepartment">Department</label>
                <select name="deptid" id="inputDepartment" class="form-control">
                    <option value="1" selected="selected">
                        Support
                    </option>
                </select>
            </div>
            <div class="form-group col-sm-5">
                <label for="inputRelatedService">Related Service</label>
                <select name="relatedservice" id="inputRelatedService" class="form-control">
                    <option value="">None</option>
                </select>
            </div>
            <div class="form-group col-sm-3">
                <label for="inputPriority">Priority</label>
                <select name="urgency" id="inputPriority" class="form-control">
                    <option value="High">
                        High
                    </option>
                    <option value="Medium" selected="selected">
                        Medium
                    </option>
                    <option value="Low">
                        Low
                    </option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputMessage">Message</label>
            <div class="md-editor" id="1642264520357">
                <div class="md-header btn-toolbar">
                </div><textarea name="message" id="inputMessage" rows="12" class="form-control markdown-editor md-input" data-auto-save-name="client_ticket_open" style="resize: vertical;"></textarea>
                <div class="md-fullscreen-controls"><a href="#" class="exit-fullscreen" title="Exit fullscreen"><span class="glyphicon glyphicon-fullscreen"></span></a></div>
            </div>
        </div>


        <div class="text-center">
            <button type="submit" name="submit" class="btn btn-primary "><a class="text-light" href="supporttickets.php">Submit </a></button>
            <a href="userpanel.php" class="btn btn-danger text-light">Cancel</a>
            </p>
        </div>




</form>



</div>
<?php require_once 'footer.php' ?>