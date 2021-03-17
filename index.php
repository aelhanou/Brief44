<?php
     session_start();
?>
<?php 
    $a = 0;
    $title = $price = $pd_date = $image =$authors= '';
    include('db_connect.php');
    
    $errors = array('name' => '','price' => '','pd_date' => '','input_upload' => '','authors' => '');
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
       
       if(empty($_POST['authors']))
       {
            $errors['authors'] = "the authors is required";
       }
       else
       {
        $authors1 = mysqli_real_escape_string($connect,$_POST['authors']);
        // ^(0?[1-9]|[12][0-9]|3[01])[\/\-](0?[1-9]|1[012])[\/\-]\d{4}$
        //echo $authors1;
        if(!preg_match('/^[a-zA-Z\s]+$/',$authors1)){
            $errors['authors'] = "the authors should a Text";
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
    
      
       if(!array_filter($errors))
       {
       // $errors = array('name' => $title,'price' => $price,'pd_date' => $pd_date,'input_upload' => $image,'authors' => $authors1);
    
        //insert the data
        
              
               
              $sql = "INSERT INTO books(title,price,Producte_date,Image) VALUES('$title','$price','$pd_date','$image')";

              
            // $nameOfAuthors = "SELECT * FROM authors";
            // $sqlAuthors = mysqli_query($connect,$nameOfAuthors);
            // $resAuthors = mysqli_fetch_all($connect,$sqlAuthors);

              if(mysqli_query($connect,$sql))
              {
                    header("location: index.php");
                
              }
              else
              {
                  echo "eroor" . mysqli_error($connect);
                  
              }
                $sql = 'SELECT * FROM books';
                $res = mysqli_query($connect,$sql);
                $books = mysqli_fetch_all($res,MYSQLI_ASSOC);


              $id_book = $books[count($books) - 1]['id'];
              $nameOfAuthors = "SELECT * FROM authors";
              $sqlAuthors = mysqli_query($connect,$nameOfAuthors);
              $resAuthors = mysqli_fetch_all($sqlAuthors,MYSQLI_ASSOC);
  
                for($i = 0;$i< count($resAuthors);$i++)
                {
                    if($authors1 == $resAuthors[$i]['name'])
                    {
                      $id_authors =   $resAuthors[$i]['id'];
                    }
                }
                
              $sqlBookAuthors = "INSERT INTO booksauthors(id_books,id_authors) VALUES('$id_book',$id_authors)";
              mysqli_query($connect,$sqlBookAuthors);


              

       }
       
      
}

    
    if(isset($_POST['Delete']))
    {
        
        $id_to_delete = mysqli_real_escape_string($connect,$_POST['Delete']);

        //$sql = "DELETE FROM books WHERE id = $id_to_delete";
        // echo $id_to_delete;
        $sqlBookAuthors = "DELETE FROM booksauthors WHERE id_books = $id_to_delete";
              
        if(mysqli_query($connect,$sqlBookAuthors))
        {
            header("location: index.php");
        }
        else
        {
            echo "error" . mysqli_error($connect);
        }
        

    }


    if(isset($_POST['modify']))
    {

        // $_SESSION['index'] = mysqli_real_escape_string($connect,$_POST['modify']);
        // $_SESSION['title'] = mysqli_real_escape_string($connect,$_POST['modify']);
        // $_SESSION['price'] = mysqli_real_escape_string($connect,$_POST['price']);
        // $_SESSION['Producte_Date'] = mysqli_real_escape_string($connect,$_POST['Producte_Date']);
        // $_SESSION['Image'] = mysqli_real_escape_string($connect,$_POST['Image']);
        
        // $title = $books[0]['title']. "<br>";
        // $price= $books[0]['price']. "<br>";
        // $Producte_Date = $books[0]['Producte_Date']. "<br>";
        // $Image = $books[0]['Image']. "<br>";

        // foreach($books as $bks)
        // {
        //     echo $bks['id'];
        // }
       
        // echo $id = $_SESSION['id'] ."<br>";
        // echo $title = $_SESSION['title']."<br>";
        // echo $price = $_SESSION['price']."<br>";
        // echo $Producte_Date = $_SESSION['Producte_Date']."<br>";
        // echo $Image = $_SESSION['Image']."<br>";

        //  echo $_SESSION['index'];
        // echo $_SESSION['title'];
        // echo $_SESSION['price'];
        // echo $_SESSION['Producte_Date'];
        // echo $_SESSION['Image'];
        
            header("location: modify.php");
    }
    // else
    // {
    //     echo '<h1>hello</h1>';
    // }
    
    
    
    

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
    <form action="index.php?id=<?php echo $books[count($books) - 1]['id']?>" method="post"> 
    <div class="gen">
        <div class="title">
            <h1 class="add" >ADD BOOKS</h1>
        </div>
        
        <div class="first">
            <h1 class="tl">Title : </h1>
        <input type="text" name="name" id="input_title">
        <label> <?php echo $errors['name'] ?></label>
        </div>

        <div class="second">
            <h1 class="price">PRICE : </h1>
        <input type="text" name="price" id="input_price">
        <label> <?php echo $errors['price'] ?></label>
        </div>

        <div class="third">
            <h1 class="pd_date">PRODUCTION DATE : </h1>
        <input type="text" name="pd_date" id="input_date">
        <label> <?php echo $errors['pd_date'] ?></label>
        </div>
        <div class="five">
            <h1 class="authors">AUTHORS : </h1>
        <select name="authors" id="selectAuthors" >
            <option >Authors Choice</option>
            <?php foreach($authors as $au) {?><option ><?php echo $au['name']?></option><?php }?>
        </select>
        <label> <?php echo $errors['authors'] ?></label>
        </div>

        <div class="fourd">
            <h1 class="UPLOAD_BOOKS">UPLOAD BOOKIMAGE : </h1>
            <form class="form" action="#">
                <input type="file" name="input_upload" id="input_upload">
                <label> <?php echo $errors['input_upload'] ?></label>
            </form>
            <!-- <input type="submit" name="submit" id="submit"> -->
        </div>
        
        <div class="icon">
            <button name="add" ><img class="icon_image"  src="images/icon_plus.png" alt="add"></button>
            
        </div>
    </div>
    </form>
    <!-- the end of add books -->

    <div class="book">
        <h1 class="bk">BOOKS</h1>
    </div>

    <div class="allBooks">
    
        

       <form action="index.php" method="post">
<table>
    <tr>
      <th>ID</th>
      <th>Title</th> 
      <th>Price</th>
      <th>Product Date</th>
      <th>Image</th>
      <th>Modify</th>
      <th>Delete</th>
    </tr>
    
    <tr>
  
    <?php for($i = 0;$i < count($books);$i++){?>
      <td><?php echo $books[$i]['id']?></td>
      <td><?php echo $books[$i]['title']?></td>
      <td><?php echo $books[$i]['price']."$"?></td>
      <td><?php echo $books[$i]['Producte_Date']?></td>
      <td><?php echo "<img src='images/".$books[$i]['Image']."' />"?></td>
      <!-- <td><button name="modify" value='<?php echo $GLOBALS['e'] = $i;?>'><img  src="images/pen.svg"  name="modify" alt="modify" ></button></td> -->
      <td><a name="modify" href="modify.php?id=<?php echo $books[$i]['id']?>"><img  src="images/pen.svg"  name="modify" alt="modify" ></a></td>
      <td><button name="Delete" value='<?php echo $books[$i]['id'] ?>'><img class="delete" name="Delete"  src="images/trash.svg"></button></td>
      
    </tr>
    <?php }; ?>
  </table>
  

    </form>

    
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