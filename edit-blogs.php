<?php
require_once('./header.php');
?>


<?php
        $id=$_GET['id'];
        $sql= "SELECT * FROM blogs WHERE `id` = '$id' LIMIT 1";
        $result=mysqli_query($mysql, $sql) or die('no result found');
        if (mysqli_num_rows($result)==0):
            alertMessage('error', "Data not Found");
            header("Location: blogs.php");
            exit;
        else:
            $blog=mysqli_fetch_assoc($result); 
            if ($logedInUser['id']!== $blog['user_id']) {
                alertMessage('error', "Unautherized");
                header("Location: blogs.php");
                exit;
            }
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
        <form action="./UpdateBlogData.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id"
                value="<?php echo $blog['id'];?>">

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input
                    value="<?php echo isset($blog['title'])?nl2br($blog['title']):'' ?>"
                    required type="text" class="form-control" id="title" name="title">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea required type="text" class="form-control" id="description"
                    name="description"><?php echo isset($blog['description'])?nl2br($blog['description']):'' ?></textarea>
            </div>
            <div class="mb-3 row">
                <div class="col-md-6">
                    <label for="image" class="form-label">image</label>
                    <input type="file" class="form-control" id="image" name="image">
                    <button type="submit" class="btn btn-primary btn-lg mt-5">Update</button>
                </div>
                <div class="col-md-6 text-center">
                    <?php
                    $path= $blog['image'];
                    if ($path) {
                        $fullPath=$protocol.$_SERVER['HTTP_HOST'].$path;
                    } else {
                        $fullPath='./images/placeholder-image.png';
                    }
                    ?>
                    <img width="200px" src="<?php echo $fullPath;?>"
                        alt="">
                    <input type="hidden" name="oldImg"
                        value="<?php echo $path ?>">
                </div>

            </div>

        </form>
    </div>
</div>



<?php endif; ?>

<?php
require_once('./footer.php');
