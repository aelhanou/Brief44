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
       
    }

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql = "SELECT * FROM authors WHERE id=$id";

        $res = mysqli_query($connect,$sql);

        $authors1 = mysqli_fetch_assoc($res);
        print_r($authors1);
    }

if(isset($_POST['add']))
{
    
    $sql = "UPDATE authors SET name='$title', Birthday='$birthday', image='$image' WHERE id='$id' ";

    if(mysqli_query($connect,$sql))
    {
        header("location: authors.php");
    }
    else
    {
        echo "error" . mysqli_error($connect);
    }
    
    
}


  

    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="css/gallery.css">
    <link rel="stylesheet" href="css/style.css">
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
    <li class="mb"><a href="Home/index.html">HOME</a></li>
    <li class="mb"><a href="gallery.php">GALLERY</a></li>
    <li class="mb"><a href="index.php">BOOKS</a></li>
    <li class="mb"><a href="authors.php">AUTHORS</a></li>
</ul>
</div>

        <!-- the end of navbar -->
       
   
    
    
   
    <!-- the start of add books -->
    <form action="modifyAuthors.php?id=<?php echo $id ?>" method="post"> 
    <div class="gen">
        <div class="title">
            <h1 class="add" >EDIT Authoes</h1>
        </div>
        
        <div class="first">
            <h1 class="tl">Title : </h1>
        <input type="text" name="name" id="input_title" value="<?php echo $authors1['name'];?>">
        <label> <?php echo $errors1['name'] ?></label>
        </div>


        <div class="second">
            <h1 class="birthday">BIRTHDAY : </h1>
        <input type="text" name="birthday" id="input_price" value="<?php echo $authors1['Birthday'];?>">
        <label> <?php echo $errors1['birthday'];?></label>
        </div>

        <div class="fourd">
            <h1 class="UPLOAD_BOOKS">UPLOAD BOOKIMAGE : </h1>
            <form class="form" action="#">
                <input type="file" name="image" id="input_upload" value="<?php echo $authors1['image'];?>">
            </form>
            <!-- <input type="submit" name="submit" id="submit"> -->
        </div>
        
        <div class="icon">
            <!-- <button name="add" ><img class="icon_image"  src="images/icon_plus.png" alt="add"></button> -->
            <button class="add" name="add" value="">Save Change</button>
        </div>
    </div>
    </form>
    <!-- the end of add books -->

    
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