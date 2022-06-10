<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

        <!-- <script>alert("hello")</script> -->

        <?php
        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
          
          if (isset($_REQUEST['fName']) && !empty($_REQUEST['fName'])):
        ?>

        <h2> <?php echo 'First Name:'.test_input($_REQUEST['fName']); ?> </h2>

        <?php
          endif
        ?>

        <?php
          if (isset($_REQUEST['lName']) && !empty($_REQUEST['lName'])):
        ?>

        <h2> <?php echo 'Last Name:'.test_input($_REQUEST['lName']); ?> </h2>

        <?php
          endif
        ?>


        <!-- /**  <?php
          if (isset($_FILES['image'])):

             $images=$_FILES['image']['tmp_name'];
             
             $name=explode('.', $_FILES['image']['name']); //image.png

             $path="images/users/".time().".".$name[1]; //time= 3423432434.png

             move_uploaded_file($images, $path) ;

          endif
        ?> */-->

        <?php 

            $images=$_FILES['image'];
           
            if (isset($_FILES['image'])):
                    for ($i=0; $i< count($images['tmp_name']); $i++) {

                        $images=$images['tmp_name'][$i];
                            
                        $name=explode('.', $images['name'][$i]); 

                        $path= "images/multiple/".time().".".'jpg';
            
                        move_uploaded_file($images, $path) ;
                    }
            endif
                ?>
     
</body>
</html>