<?php
     session_start();
?>
<?php 
    
    $title = $birthday = $image = '';
    include('db_connect.php');

    $errors1 = array('name' => '','birthday' => '', 'image' => '');
    if(isset($_POST['add']))
    {
       
        if(empty($_POST['name']))
        {
            $errors1['name'] ="the name is required";
        }
        else
        {
            $title = mysqli_real_escape_string($connect,$_POST['name']);
            if(!preg_match('/^[a-zA-Z\s]+$/',$title))
            {
               // $errors1['name'] ="the name in not valid";
            }
        }

        if(empty($_POST['birthday']))
        {
            $errors1['birthday'] ="the birthday is required";
        }
        else
        {
            $birthday = mysqli_real_escape_string($connect,$_POST['birthday']);
            if(!preg_match('/^[0-9]{4}-[0-9]{2}|[0-9]{1}-[0-9]{2}$/',$birthday))
            {
                //$errors1['birthday'] ="the name in not valid";
            }
        }
        
        if(empty($_POST['image']))
        {
                $errors1['image'] ="the Image is required";
        }
        else
        {
                $image = mysqli_real_escape_string($connect,$_POST['image']);
        }
        if(!array_filter($errors1))
        {
            $errors1 = array('name' => $title,'birthday' => $birthday,'image' => $image);

        
            $sql1 = "INSERT INTO authors(name,Birthday,image) VALUES ('$title','$birthday','$image')";
            
            if(mysqli_query($connect,$sql1))
            {
                header("location: authors.php");
                
            }
            else
            {
                echo "error" . mysqli_error($connect);
            }
            
            
        }
    }
    
    if(isset($_POST['Delete']))
    {
        
        $id_to_delete = mysqli_real_escape_string($connect,$_POST['Delete']);


        
        $sqlBookAuthors = "DELETE FROM booksauthors WHERE id_authors = $id_to_delete";

        if(mysqli_query($connect,$sqlBookAuthors))
        {
            header("location: authors.php");
        }
        else
        {
            echo "error" . mysqli_error($connect);
        }
        
       

    }
    
    
   
    if(isset($_POST['modify']))
    {
        header("location: modifyAuthors.php");
    }
    // echo print_r($authors);

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="css/gallery.css">
    <link rel="stylesheet" href="css/athors.css">

</head>
<body>
    
            <!-- the start of navbar -->

            <header>

<div class="logo">
    <img src="images/logo.png" alt="logo" class="lg">
</div>
<nav>
    <ul>
        <li class="disable"> <a href="Home/index.html">HOME</a></li>
        <li class="disable"> <a href="gallery.php">GALLERY</a></li>
        <li class="disable"> <a href="index.php">BOOKS</a></li>
        <li class="disable"> <a href="authors.php">AUTHORS</a></li>
    </ul>
</nav>

</header>



<div id="iconMenu" class="bar">
<img  src="images/Menu2.jpg" alt="kk">
</div>

<div id="menuMobile" class="menuMobile">
<ul class="mobile">
    <li class="mb"><a href="index.html">HOME</a></li>
    <li class="mb"><a href="gallery.php">GALLERY</a></li>
    <li class="mb"><a href="index.php">BOOKS</a></li>
    <li class="mb"><a href="authors.php">AUTHORS</a></li>
</ul>
</div>

        <!-- the end of navbar -->

    <!-- the start of add books -->
    <form action="" method="post"> 
    <div class="gen">
        <div class="title">
            <h1 class="add" >ADD AUTHORS</h1>
        </div>
        
        <div class="first">
            <h1 class="name">NAME : </h1>
        <input type="text" name="name" id="input_name">
        <label> <?php echo $errors1['name'];?></label>
        </div>

        <div class="second">
            <h1 class="birthday">BIRTHDAY : </h1>
        <input type="text" name="birthday" id="input_birthday">
        <label> <?php echo $errors1['birthday'];?></label>
        </div>

        <!-- <div class="third">
            <h1 class="pd_date">PRODUCTION DATE : </h1>
        <input type="text" name="pd_date" id="input_date">
        </div> -->

        <div class="fourd">
            <h1 class="UPLOAD_Authors">UPLOAD AuthorsIMAGE : </h1>
            <form class="form" action="#">
                <input type="file" name="image" id="input_upload">
                <label> <?php echo $errors1['image'] ?></label>
            </form>
            <!-- <input type="submit" name="submit" id="submit"> -->
        </div>
        
        <div class="icon">
            <button name="add" ><img class="icon_image"  src="images/icon_plus.png" alt="add"></button>
        </div>
    </div>
    </form>
    <!-- the end of add books -->

    <div class="author">
        <h1 class="au">Authors</h1>
    </div>

    <div class="allAuthors">
        <!-- <div class="id">

        </div>
        <div class="Title">

        </div>
        <div class="price">

        </div>
        <div class="prodDate">

        </div>
        <div class="image">
            <img src="#" alt="Modify" class="modify">
            <img src="#" alt="Delete" class="delete">
        </div> -->
        

        <form action="" method="post">
<table >
    <tr>
      <th>ID</th>
      <th>Name</th> 
      <th>Birthday</th>
      <th>Image</th>
      <th>Modify</th>
      <th>Delete</th>
    </tr>
    
    <?php  foreach($authors as $au){ ?>
    <tr>
      <td><?php echo $_SESSION['id_authors'] = $au['id']?></td>
      <td><?php echo $au['name']?></td>
      <td><?php echo $au['Birthday']?></td>
      <td><?php echo "<img src='images/".$au['image']."' />"?></td>
      <!-- <td><button><img  src="images/pen.svg" alt="modify" class="modify"></button></td> -->
      <!-- <td><button><img class="delete" src="images/trash.svg" alt="Delete" ></button></td> -->
      <td><a name="modify" href="modifyAuthors.php?id=<?php echo $au['id']?>"><img  src="images/pen.svg"  name="modify" alt="modify" ></a></td>
      <td><button name="Delete" value='<?php echo $au['id'] ?>'><img class="delete" name="Delete"  src="images/trash.svg"></button></td>
    </tr>
    <?php };?>
    
  </table>
  </form>
    </div>
    
    
    <footer>
      <div class="para">
      <p class="s-media">Social Media</p>
      </div>
      <div class="icons">
      <a href="#"><img src="images/facebook.png" alt="facebook"  class="social-media"></a>
        <a href="#"><img src="images/instagram.png" alt="instagram" class="social-media"></a>
        <a href="#"><img src="images/Twitter.png" alt="twitter" class="social-media"></a>
      </div>
      
    </footer>
    <p class="copyright">Copyright by books in the books</p>
    <script src="js/gallery.js"></script>
</body>
</html>