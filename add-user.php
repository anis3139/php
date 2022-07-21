<?php require_once('./header.php') ; ?>

<div class="d-flex gap-3 justify-content-end m-5 mb-0">

    <div class=" flex-grow-1 text-center">
        <h2>Add User</h2>
    </div>
    <div>
        <a href="./user.php" class="btn btn-primary btn-lg">User List</a>

    </div>

</div>
<div class="row p-5 pt-2">
    <div class="col-md-10 offset-md-1 mt-2">
        <form action="./addUserData.php" method="POST">
            <?php  include('./registrationForm.php') ;?>
        </form>
    </div>
</div>


<?php require_once('./footer.php');
