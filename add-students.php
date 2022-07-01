<?php require_once('./header.php') ; ?>


<div class="d-flex gap-3 justify-content-end m-5">

    <div class=" flex-grow-1 text-center">
        <h2>Add Students</h2>
    </div>
    <div>
        <a href="./students.php" class="btn btn-primary btn-lg">Student List</a>

    </div>

</div>
<div class="row">
    <div class="col-md-10 offset-md-1">
        <form action="./addStudentsData.php" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input required type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
                <label for="class" class="form-label">Class</label>
                <input required type="text" class="form-control" id="class" name="class">
            </div>
            <div class="mb-3">
                <label for="district" class="form-label">District</label>
                <input required type="text" class="form-control" id="district" name="district">
            </div>

            <input type="hidden" name="user_id"
                value="<?php echo $logedInUser['id'] ?>">

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


<?php require_once('./footer.php');
