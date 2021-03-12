<?php
     session_start();
?>

<?php 
    
    $title = $price = $pd_date = $image = '';
    include('db_connect.php');
    include('modify3.php');
    $errors = array('name' => '','price' => '','pd_date' => '','input_upload' => '');
    if(isset($_POST['add']))
    {

       if(empty($_POST['name']))
       {
           $errors['name'] = "the name is required";
       }
       else
       {
        
        $title = mysqli_real_escape_string($connect,$_POST['name']);
        if(!preg_match('/^[a-zA-Z\s]+$/',$title))
        {
            $errors['name'] = "the name is not valid";
        }
        
       }
       if(empty($_POST['price']))
       {
           $errors['price'] = "the price is required";
       }
       else
       {
        $price = mysqli_real_escape_string($connect,$_POST['price']);
        if(!preg_match('/^[0-9]+$/',$price))
        {
            $errors['price'] = "the price should be a number";
        }
       }
       if(empty($_POST['pd_date']))
       {
            $errors['pd_date'] = "the producted date is required";
       }
       else
       {
        $pd_date = mysqli_real_escape_string($connect,$_POST['pd_date']);
        // ^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$

        if(!preg_match('/^[0-9]{4}-[0-9]{2}|[0-9]{1}-[0-9]{2}$/',$pd_date)){
            $errors['pd_date'] = "the producted date should be as form of date (0000-00-00)";
        }
       }
       if(empty($_POST['input_upload']))
       {
            $errors['input_upload'] =  "the Image is required";
       }
       else
       {
        $image = mysqli_real_escape_string($connect,$_POST['input_upload']);
       }
    
       
    //    if(!array_filter($errors))
    //    {
    //     $errors = array('name' => '$title','price' => '$price','pd_date' => '$pd_date','input_upload' => '$image');
    
    //     //insert the data
    //           $sql = "INSERT INTO books(title,price,Producte_date,Image) VALUES('$title','$price','$pd_date','$image')";
      
    //           if(mysqli_query($connect,$sql))
    //           {
    //               header("location: index.php");
                  
    //           }
    //           else
    //           {
    //               echo "eroor" . mysqli_error($connect);
                  
    //           }
              
    //    }
       

}

    if(isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sql = "SELECT * FROM books WHERE id=$id";

        $res = mysqli_query($connect,$sql);

        $books = mysqli_fetch_assoc($res);

    }

// $index = $_SESSION['index'];
if(isset($_POST['add']))
{
    //$modify = mysqli_real_escape_string($connect,$_POST['modify']);
    
    // $id = $books[$index]['id'];
    
    // $title = $books[$index]['title'];
    // $price = $books[$index]['price'];
    // $Producte_Date = $books[$index]['Producte_Date'];
    // $Image = $books[$index]['Image'];

    // echo $id;
    // echo $title;
    // echo $price;
    // echo $Producte_Date;
    // echo $Image;

    // var_dump($id);

    $sql = "UPDATE books SET title='$title', price='$price', Producte_Date='$pd_date', Image='$image' WHERE id='$id' ";

    if(mysqli_query($connect,$sql))
    {
        header("location: index.php");
    }
    else
    {
        echo "error" . mysqli_error($connect);
    }
    
    
}


    // if(isset($_POST['add']))
    // {
    //     //$modify = mysqli_real_escape_string($connect,$_POST['modify']);

    //     $sql = "UPDATE books SET title=$title, price=$price, Producte_Date=$pd_date, Image=$image";

    //     if(mysqli_query($connect,$sql))
    //     {
    //         header("location: modify.php");
    //         echo "hellow world";
    //     }
    //     else
    //     {
    //         echo "error" . mysqli_error($connect);
    //     }
    //     echo $id;
        
    // }
    
    // if(isset($_POST['modify']))
    // {

    //     $id = mysqli_real_escape_string($connect,$_POST['modify']);
        // $title = $books[0]['title']. "<br>";
        // $price= $books[0]['price']. "<br>";
        // $Producte_Date = $books[0]['Producte_Date']. "<br>";
        // $Image = $books[0]['Image']. "<br>";

        // foreach($books as $bks)
        // {
        //     echo $bks['id'];
        // }
       

        // echo $id;
        // echo $title;
        // echo $price;
        // echo $Producte_Date;
        // echo $Image;


    // }

    // $_SESSION['id'] 
    // $_SESSION['title'] 
    // $_SESSION['price'] 
    // $_SESSION['Producte_Date'] 
    // $_SESSION['Image'] 

    

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
    <form action="modify.php?id=<?php echo $id ?>" method="post"> 
    <div class="gen">
        <div class="title">
            <h1 class="add" >EDIT BOOKS</h1>
        </div>
        
        <div class="first">
            <h1 class="tl">Title : </h1>
        <input type="text" name="name" id="input_title" value="<?php echo $books['title'] ?>">
        <label> <?php echo $errors['name'] ?></label>
        </div>

        <div class="second">
            <h1 class="price">PRICE : </h1>
        <input type="text" name="price" id="input_price" value="<?php echo $books['price'] ?>">
        <label> <?php echo $errors['price'] ?></label>
        </div>

        <div class="third">
            <h1 class="pd_date">PRODUCTION DATE : </h1>
        <input type="text" name="pd_date" id="input_date" value="<?php echo $books['Producte_Date'] ?>">
        <label> <?php echo $errors['pd_date'] ?></label>
        </div>

        <div class="fourd">
            <h1 class="UPLOAD_BOOKS">UPLOAD BOOKIMAGE : </h1>
            <form class="form" action="#">
                <input type="file" name="input_upload" id="input_upload" value="<?php echo $books['Image'] ?>">
                <label> <?php echo $errors['input_upload'] ?></label>
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