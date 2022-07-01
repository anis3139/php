<?php
require_once('./header.php');
?>


<?php
        $id=$_GET['id'];
        $sql= "SELECT * FROM blogs WHERE `id` = '$id'";
        $result=mysqli_query($mysql, $sql) or die('no result found');
        if (mysqli_num_rows($result)==0):
                header("Location: blogs.php");
        else:
            $blog=mysqli_fetch_assoc($result);
?>
<div class="d-flex gap-3 justify-content-end m-5">

    <div class=" flex-grow-1 text-center">
        <h2>Edit Blogs</h2>
    </div>
    <div>
        <a href="./blogs.php" class="btn btn-primary btn-lg">Blog List</a>

    </div>

</div>
<div class="row">
    <div class="col-md-10 offset-md-1">
        <form action="./UpdateBlogData.php" method="POST">
            <input type="hidden" name="id"
                value="<?php echo $blog['id'];?>">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name"
                    value="<?php echo $blog['name'];?>">
            </div>
            <div class="mb-3">
                <label for="class" class="form-label">Class</label>
                <input type="text" class="form-control" id="class" name="class"
                    value="<?php echo $blog['class'];?>">
            </div>
            <div class="mb-3">
                <label for="district" class="form-label">District</label>
                <input type="text" class="form-control" id="district" name="district"
                    value="<?php echo $blog['district'];?>">
            </div>

            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>



<?php endif; ?>

<?php
require_once('./footer.php');
