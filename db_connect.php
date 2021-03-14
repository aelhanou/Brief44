<?php


    $connect = mysqli_connect('localhost','zer0','1234','brief4');

    //$connect1 = mysqli_connect('localhost','zer0','1234','brief4');
    

    if(!$connect)
    {
        echo "connection failed" . mysqli_connect_error();
    }

    $sql = 'SELECT * FROM books';
    $res = mysqli_query($connect,$sql);
    $books = mysqli_fetch_all($res,MYSQLI_ASSOC);



    $sql1 = 'SELECT * FROM authors';
    $res1 = mysqli_query($connect,$sql1);
    $authors = mysqli_fetch_all($res1,MYSQLI_ASSOC);


    
?>