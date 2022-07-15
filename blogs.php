<?php
    require_once('./header.php');
   
    if (isset($_REQUEST['delID'])) {
        $delID= $_REQUEST['delID'];
        $delImg= '.'.$_REQUEST['delImg'];
        
        $delSql="DELETE FROM blogs WHERE id={$delID}";
        if (file_exists($delImg)) {
            unlink($delImg);
        }
        $res= mysqli_query($mysql, $delSql);
        if ($res) {
            header("Location: ./blogs.php");
        }
    }

 
  ?>


<div class="container table-responsive py-5">
    <?php  include('./errorMessage.php') ;?>
    <div class="text-end my-2">
        <a href="./add-blogs.php" class="btn btn-primary btn-lg add-btn">Add Blog</a>
    </div>
    <?php
        if (!isset($_GET['page'])) {
            $page_number = 1;
        } else {
            $page_number = $_GET['page'];
        }

        $limit = 2;
 
        $initial_page = ($page_number-1) * $limit;

        $sql= "SELECT * FROM blogs WHERE `user_id`='{$logedInUser['id']}'";
        $result=mysqli_query($mysql, $sql) or die('no result found');
        $total_rows=mysqli_num_rows($result);
        $total_pages = ceil($total_rows / $limit);

        if ($total_rows>0):
            $getQuery = "SELECT *FROM blogs WHERE `user_id`='{$logedInUser['id']}' ORDER BY id DESC LIMIT " . $initial_page . ',' . $limit;
            $resultBlog = mysqli_query($mysql, $getQuery);
    ?>
    <table class="table table-bordered table-hover">
        <thead class="thead-dark">
            <tr>
                <th class="w-5" scope="col">#</th>
                <th class="w-15" scope="col">Title</th>
                <th class="w-45" scope="col">Description</th>
                <th class="w-20" scope="col">Image</th>
                <th class="w-7" scope="col">Edit</th>
                <th class="w-8" scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
               
                while ($blogs=mysqli_fetch_assoc($resultBlog)) :
            ?>
            <tr>
                <td scoppe='row'><?php echo $blogs['id'];?>
                </td>
                <td><?php echo nl2br($blogs['title']);?>
                </td>
                <td><?php echo nl2br($blogs['description']);?>
                </td>
                </td>
                <td scoppe='row' class="text-center">
                    <?php
                 $path= $blogs['image'];
                 $fullPath=$protocol.$_SERVER['HTTP_HOST'].$path;
                 ?>
                    <img width="150px" src="<?php echo $fullPath;?>"
                        alt="">
                <td>
                    <a class="text-success"
                        href="./edit-blogs.php?id=<?php echo $blogs['id']?>">Edit</a>
                </td>
                <td>
                    <a onClick="return confirm('Delete This Blogs?')" class="text-danger"
                        href="./blogs.php?delID=<?php echo $blogs['id']?>&delImg=<?php echo $path;?>">Delete</a>
                </td>

            </tr>
            <?php
                endwhile;
                
            ?>
        </tbody>
    </table>

    <!-- pagination  -->
    <div class="items ">
        <?php

            $pageURL = "";

            if ($page_number>=2) {
                echo "<a  href='blogs.php?page=".($page_number-1)."'>  Prev </a>";
            }

            for ($i=1; $i<=$total_pages; $i++) {
                if ($i == $page_number) {
                    $pageURL .= "<a   class = 'active' href='blogs.php?page="

                                                    .$i."'>".$i." </a>";
                } else {
                    $pageURL .= "<a  href='blogs.php?page=".$i."'>   

                                                    ".$i." </a>";
                }
            };

            echo $pageURL;

            if ($page_number<$total_pages) {
                echo "<a  href='blogs.php?page=".($page_number+1)."'>  Next </a>";
            }

            ?>

    </div>

    <div class="inline">

        <input id="page" type="number" min="1"
            max="<?php echo $total_pages?>"
            placeholder="<?php echo $page_number."/".$total_pages; ?>"
            required>

        <button onClick="go2Page('blogs');">Go</button>

    </div>


    <?php else: ;?>
    <h1>No Data Found</h1>
    <?php endif ?>
</div>


<?php
  require_once('./footer.php')
  ?>
<!-- end line  -->