<?php require_once('./header.php') ; ?>

<?php  include('./errorMessage.php') ;?>
<div class="d-flex gap-3 justify-content-end m-5">

    <div class=" flex-grow-1 text-center">
        <h2>Password Reset</h2>
    </div>
</div>
<div class="row">
    <div class="col-md-10 offset-md-1">
        <form action="./passwordReset.php" method="POST">

            <div class="mb-3">
                <label for="oldPass" class="form-label">Old Password</label>
                <input required type="password" class="form-control" id="oldPass" name="oldPass">
            </div>

            <div class="mb-3">
                <label for="newPass" class="form-label">New Password</label>
                <input required type="password" class="form-control" id="newPass" name="newPass">
            </div>

            <input type="hidden" name="id"
                value="<?php echo $logedInUser['id'] ?>">

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


<?php require_once('./footer.php');
