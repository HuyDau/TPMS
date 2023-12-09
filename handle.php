<?php
    session_start();
    require_once("config/config.php");

    // Category 
    $sqlBrand1 = mysqli_query($conn,"SELECT * FROM `tbl_categories` WHERE id BETWEEN 1 AND 18");

    function getImageCategory($conn, $id){
        
        $sqlCatImage = mysqli_query($conn,"SELECT * FROM `tbl_categories` WHERE Id = $id");
        $itemCatImage = mysqli_fetch_assoc($sqlCatImage);
        echo $itemCatImage['categoryImage'];
    }
    // GET NAME CATEGORY
    function getNameCategory($conn,$id){
        $sqlNameCategory = mysqli_query($conn,"SELECT * FROM `tbl_products` INNER JOIN `tbl_categories` ON tbl_categories.Id = tbl_products.idCategory WHERE tbl_products.id = $id ");
        $itemCatName = mysqli_fetch_assoc($sqlNameCategory);
        echo $itemCatName['categoryName'];
    }
    // Brand 
    $sqlBrand1 = mysqli_query($conn,"SELECT * FROM `tbl_brands` WHERE id BETWEEN 1 AND 18");

    function getBrand($conn, $i){
        if($i == 1){
            $querry = "SELECT * FROM `tbl_brands` WHERE id BETWEEN 1 AND 18";
        }else if($i === 2){
            $querry = "SELECT * FROM `tbl_brands` WHERE id BETWEEN 21 AND 33";
        }else if($i === 3){
            $querry = "SELECT * FROM `tbl_brands` WHERE id BETWEEN 21 AND 33";
        }
        return $querry;
        
    }
    // GET NAME BRAND
    function getNameBrand($conn,$id){
        $sqlNameBrand = mysqli_query($conn,"SELECT * FROM `tbl_products` INNER JOIN `tbl_brands` ON tbl_brands.id = tbl_products.idBrand WHERE tbl_products.id = $id ");
        $itemBrandName = mysqli_fetch_assoc($sqlNameBrand);
        echo $itemBrandName['brandName'];
    }

    // Slides

    function getSlide($conn){
        $sqlSlide = "SELECT * FROM `tbl_banners` ";
        return $sqlSlide;
    }

    // Product
    function getProduct($conn, $i){
        // GET Apple
        if($i == 1){
            $sqlApple = "SELECT * FROM `tbl_versions` INNER JOIN `tbl_products` ON tbl_versions.productId = tbl_products.id WHERE tbl_products.idBrand = $i";
            return $sqlApple;
        }
        
    }

    // GET IMAGE PRODUCT
    function getImageProduct($i){
        $sqlImageProduct = "SELECT * FROM `tbl_versions` WHERE productId = $i";
        return $sqlImageProduct;
    }

    // Detail Product
    function getDetailProduct($i){
        $sqlDetailProduct = "SELECT * FROM `tbl_versions` INNER JOIN `tbl_products` ON tbl_versions.productId = tbl_products.id WHERE idVersion = $i";
        return $sqlDetailProduct;
    }

?>