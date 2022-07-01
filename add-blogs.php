<?php require_once('./header.php') ; ?>


<div class="d-flex gap-3 justify-content-end m-5">

    <div class=" flex-grow-1 text-center">
        <h2>Add Blogs</h2>
    </div>
    <div>
        <a href="./blogs.php" class="btn btn-primary btn-lg">Blog List</a>

    </div>

</div>
<div class="row">
    <div class="col-md-10 offset-md-1">
        <form action="./addBlogsData.php" method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input required type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea required type="text" class="form-control" id="description" name="description"></textarea>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">image</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>

            <input type="hidden" name="user_id"
                value="<?php echo $logedInUser['id'] ?>">

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>


<?php require_once('./footer.php');
