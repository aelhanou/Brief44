<?php 
    include('db_connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/gallery.css">
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

    <div class="gallery">
        <h1 class="gy">GALLERY</h1>
    </div>


    <div class="filter">
        <div class="filterByName">
                <h2>Fillter : </h2>
                <select onchange="Displaybooks()" name="" id="">
                    <option  value="all">All</option>
                    <option  value="Alber camu">Alber camu</option>
                    <option  value="Bokofski">Bokofski</option>
                    <option  value="Geuss">Geuss</option>
                </select>
        </div>
        <div class="maxMin">
            <div class="min">
                <h2 class="mn">Min : </h2>
                <input type="text" name="mn" id="mn">
            </div>
            <div class="max">
                <h2 class="mx">Max : </h2>
                <input type="text" name="mx" id="mx">
            </div>
        </div>
    </div>

    <!-- first row -->
    <div id="Dont" class="genGallery">

        <div   name="book1"  class="book1">

            <div class="image1">
                <img src="images/dont-stop-believin.jpg" alt="Bookimage1">
            </div>
            <div class="nameOfBook1">
                <h3 class="namebk1">Dont stop</h3>
            </div>
            <div class="PriceDate1">
                <div class="date1">
                    <h3 class="dt1">DATE : 2020-2-12</h3>
                </div>

                <div class="price1">
                    <h3  class="pr1">PRIX : <span name="pr1" >120</span>$</h3>
                </div>
            </div>
        </div>

        <div name="book1"  class="book1">

            <div class="image1">
                <img src="images/dont-stop-believin.jpg" alt="Bookimage1">
            </div>
            <div class="nameOfBook1">
                <h3 class="namebk1">Dont stop</h3>
            </div>
            <div class="PriceDate1">
                <div class="date1">
                    <h3 class="dt1">DATE : 2020-2-12</h3>
                </div>

                <div class="price1">
                    <h3  class="pr1">PRIX : <span name="pr1" >230</span>$</h3>
                </div>
            </div>
        </div>

        <div name="book1"  class="book1">

            <div class="image1">
                <img src="images/dont-stop-believin.jpg" alt="Bookimage1">
            </div>
            <div class="nameOfBook1">
                <h3 class="namebk1">Dont stop</h3>
            </div>
            <div class="PriceDate1">
                <div class="date1">
                    <h3 class="dt1">DATE : 2020-2-12</h3>
                </div>

                <div class="price1">
                    <h3  class="pr1">PRIX : <span name="pr1" >350</span>$</h3>
                </div>
            </div>
        </div>

        <div name="book1"  class="book1">

            <div class="image1">
                <img src="images/dont-stop-believin.jpg" alt="Bookimage1">
            </div>
            <div class="nameOfBook1">
                <h3 class="namebk1">Dont stop</h3>
            </div>
            <div class="PriceDate1">
                <div class="date1">
                    <h3 class="dt1">DATE : 2020-2-12</h3>
                </div>

                <div class="price1">
                    <h3  class="pr1">PRIX : <span name="pr1" >400</span>$</h3>
                </div>
            </div>
        </div>

        
    </div>

    <!-- second row -->
    <div id="I" class="genGallery">

        <div name="book1"  class="book1">

            <div class="image1">
                <img src="images/iLikeProblems.jpg" alt="Bookimage1">
            </div>
            <div class="nameOfBook1">
                <h3 class="namebk1">I like Problems</h3>
            </div>
            <div class="PriceDate1">
                <div class="date1">
                    <h3 class="dt1">DATE : 2020-2-12</h3>
                </div>

                <div class="price1">
                    <h3  class="pr1">PRIX : <span name="pr1" >410</span>$</h3>
                </div>
            </div>
        </div>

        <div name="book1"  class="book1">

            <div class="image1">
                <img src="images/iLikeProblems.jpg" alt="Bookimage1">
            </div>
            <div class="nameOfBook1">
                <h3 class="namebk1">I like Problems</h3>
            </div>
            <div class="PriceDate1">
                <div class="date1">
                    <h3 class="dt1">DATE : 2020-2-12</h3>
                </div>

                <div class="price1">
                    <h3  class="pr1">PRIX : <span name="pr1" >290</span>$</h3>
                </div>
            </div>
        </div>

        <div name="book1"  class="book1">

            <div class="image1">
                <img src="images/iLikeProblems.jpg" alt="Bookimage1">
            </div>
            <div class="nameOfBook1">
                <h3 class="namebk1">I like Problems</h3>
            </div>
            <div class="PriceDate1">
                <div class="date1">
                    <h3 class="dt1">DATE : 2020-2-12</h3>
                </div>

                <div class="price1">
                    <h3  class="pr1">PRIX : <span name="pr1" >380</span>$</h3>
                </div>
            </div>
        </div>

        <div name="book1"  class="book1">

            <div class="image1">
                <img src="images/iLikeProblems.jpg" alt="Bookimage1">
            </div>
            <div class="nameOfBook1">
                <h3 class="namebk1">I like Problems</h3>
            </div>
            <div class="PriceDate1">
                <div class="date1">
                    <h3 class="dt1">DATE : 2020-2-12</h3>
                </div>

                <div class="price1">
                    <h3  class="pr1">PRIX : <span name="pr1" >170</span>$</h3>
                </div>
            </div>
        </div>

        
    </div>

<!-- third row -->

    <div id="Care" class="genGallery">

        <div name="book1"  class="book1">

            <div class="image1">
                <img src="images/iDontCareAnymore.jpg" alt="Bookimage1">
            </div>
            <div class="nameOfBook1">
                <h3 class="namebk1">I Don't Care Anymore</h3>
            </div>
            <div class="PriceDate1">
                <div class="date1">
                    <h3 class="dt1">DATE : 2020-2-12</h3>
                </div>

                <div class="price1">
                    <h3  class="pr1">PRIX : <span name="pr1" >200</span>$</h3>
                </div>
            </div>
        </div>

        <div name="book1"  class="book1">

            <div class="image1">
                <img src="images/iDontCareAnymore.jpg" alt="Bookimage1">
            </div>
            <div class="nameOfBook1">
                <h3 class="namebk1">I Don't Care Anymore</h3>
            </div>
            <div class="PriceDate1">
                <div class="date1">
                    <h3 class="dt1">DATE : 2020-2-12</h3>
                </div>

                <div class="price1">
                    <h3  class="pr1">PRIX : <span name="pr1" >450</span>$</h3>
                </div>
            </div>
        </div>

        <div name="book1"  class="book1">

            <div class="image1">
                <img src="images/iDontCareAnymore.jpg" alt="Bookimage1">
            </div>
            <div class="nameOfBook1">
                <h3 class="namebk1">I Don't Care Anymore</h3>
            </div>
            <div class="PriceDate1">
                <div class="date1">
                    <h3 class="dt1">DATE : 2020-2-12</h3>
                </div>

                <div class="price1">
                    <h3  class="pr1">PRIX : <span name="pr1" >310</span>$</h3>
                </div>
            </div>
        </div>

        <div name="book1"  class="book1">

            <div class="image1">
                <img src="images/iDontCareAnymore.jpg" alt="Bookimage1">
            </div>
            <div class="nameOfBook1">
                <h3 class="namebk1">I Don't Care Anymore</h3>
            </div>
            <div class="PriceDate1">
                <div class="date1">
                    <h3 class="dt1">DATE : 2020-2-12</h3>
                </div>

                <div class="price1">
                    <h3  class="pr1">PRIX : <span name="pr1" >210</span>$</h3>
                </div>
            </div>
        </div>

        
    </div>




    <div id="Care" class="genGallery">

    <?php foreach($books as $rs) {?>
        <div name="book1"  class="book1">

            <div class="image1">
            <?php echo "<img src='images/".$rs['Image']."' alt='Bookimage1'>"?>
            </div>
            <div class="nameOfBook1">
                <h3 class="namebk1"><?php echo  $rs['title']?></h3>
            </div>
            <div class="PriceDate1">
                <div class="date1">
                    <h3 class="dt1"><?php echo  $rs['Producte_Date']?></h3>
                </div>

                <div class="price1">
                    <h3  class="pr1">PRIX : <span name="pr1" ><?php echo  $rs['price']?></span>$</h3>
                </div>
            </div>
        </div>
        <?php }?>
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

    <script src="js/data.js"></script>
    <script src="js/gallery.js"></script>
</body>
</html>