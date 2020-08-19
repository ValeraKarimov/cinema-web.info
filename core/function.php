<?php

function connect(){
    $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
    mysqli_set_charset($conn, "utf8");
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}

function select($conn){
    $sql = "SELECT * FROM films";
    $result = mysqli_query($conn, $sql);
    
    $a = array();
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $a[] = $row;
        }
    } 
    return $a;
}

function selectMain($conn){
    $offset = 0;
    if (isset($_GET['page']) AND trim($_GET['page'])!=''){
        $offset = trim($_GET['page']);
    }
    $sql = "SELECT * FROM films ORDER BY mov_id DESC LIMIT 5 OFFSET ".$offset*5;
    $result = mysqli_query($conn, $sql);
    
    $a = array();
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $a[] = $row;
        }
    } 
    return $a;
}

function selectCarousel($conn){
    $offset = 0;
    if (isset($_GET['page']) AND trim($_GET['page'])!=''){
        $offset = trim($_GET['page']);
    }
    $sql = "SELECT * FROM mov_carousel ORDER BY car_id DESC LIMIT 5 OFFSET ".$offset*5;
    $result = mysqli_query($conn, $sql);
    
    $a = array();
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $a[] = $row;
        }
    } 
    return $a;
}

function selectArticle($conn){
    $sql = "SELECT * FROM films WHERE mov_id=".$_GET['id'];
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        return $row;
    }
    return false;
}

function paginationCount($conn){
    $sql = "SELECT * FROM films";
    $result = mysqli_query($conn, $sql);
    $result = mysqli_num_rows($result);
    return ceil($result/5);
}

function deleteArticle($conn,$id){
    $sql = "DELETE FROM films WHERE mov_id=".$id;
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        return "Error deleting record: " . mysqli_error($conn);
    }
}

function generateHash($length = 5) {
    $symbol = "qwertyuiopasdfghjklzxcvbnmQWERTYUIOPLKJHGFDSAZXCVBNM";
    $code = "";
    for ($i = 0; $i <=$length; $i++) {
        $code .=$symbol[rand(0, strlen($symbol)-1)];
    }
    return $code;
}

function close($conn){
    mysqli_close($conn);
}

function selectCountries($conn){
    $sql = "SELECT  title_ua FROM _countries";
    $result = mysqli_query($conn, $sql);

    $a = array();
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $a[] = $row;
        }
    } 
    return $a;
}

function selectGenres($conn){
    $sql = "SELECT  gen_title FROM genres";
    $result = mysqli_query($conn, $sql);

    $a = array();
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $a[] = $row;
        }
    } 
    return $a;
}