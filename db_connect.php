<?php


    $connect = mysqli_connect('localhost','zer0','1234','brief4');

    $connect1 = mysqli_connect('localhost','zer0','1234','brief4');
    

    if(!$connect)
    {
        echo "connection failed" . mysqli_connect_error();
    }

    $sql = 'SELECT * FROM books';
    $sql1 = 'SELECT * FROM authors';


    $res = mysqli_query($connect,$sql);
    $res1 = mysqli_query($connect1,$sql1);
    
    $books = mysqli_fetch_all($res,MYSQLI_ASSOC);
    $authors = mysqli_fetch_all($res1,MYSQLI_ASSOC);


    
?>