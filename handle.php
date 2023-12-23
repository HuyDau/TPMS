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

    // GET PRODUCT
    function getProduct( $i){
        // GET Apple
        if($i == 1){
            $sqlApple = "SELECT * FROM `tbl_versions` INNER JOIN `tbl_products` ON tbl_versions.productId = tbl_products.id WHERE (tbl_products.idBrand = 1 OR tbl_products.idBrand = 21 OR tbl_products.idBrand = 35) AND tbl_versions.isActive = 2 LIMIT 5  ";
            return $sqlApple;
        }else if($i == 2){
            // GET LAPTOP PRODUCT
            $sqlLaptop = "SELECT * FROM `tbl_versions` INNER JOIN `tbl_products` ON tbl_versions.productId = tbl_products.id WHERE tbl_products.idCategory = $i AND tbl_versions.isActive = 2";
            return $sqlLaptop;
        }if($i == 3){
            // GET SMARTPHONE PRODUCT
            $sqlSmartPhone = "SELECT * FROM `tbl_versions` INNER JOIN `tbl_products` ON tbl_versions.productId = tbl_products.id WHERE tbl_products.idCategory = 1 AND tbl_versions.isActive = 2 LIMIT 10";
            return $sqlSmartPhone;
        }if($i == 4){
            // GET TABLET PRODUCT
            $sqlSmartPhone = "SELECT * FROM `tbl_versions` INNER JOIN `tbl_products` ON tbl_versions.productId = tbl_products.id WHERE tbl_products.idCategory = 3 AND tbl_versions.isActive = 2 LIMIT 15";
            return $sqlSmartPhone;
        }if($i == 5){
            // GET MONITOR PRODUCT
            $sqlSmartPhone = "SELECT * FROM `tbl_versions` INNER JOIN `tbl_products` ON tbl_versions.productId = tbl_products.id WHERE tbl_products.idCategory = 4 AND tbl_versions.isActive = 2 LIMIT 15";
            return $sqlSmartPhone;
        }if($i == 6){
            // GET SMART TV PRODUCT
            $sqlSmartPhone = "SELECT * FROM `tbl_versions` INNER JOIN `tbl_products` ON tbl_versions.productId = tbl_products.id WHERE tbl_products.idCategory = 5 AND tbl_versions.isActive = 2 LIMIT 15";
            return $sqlSmartPhone;
        }if($i == 7){
            // GET WATCH PRODUCT
            $sqlSmartPhone = "SELECT * FROM `tbl_versions` INNER JOIN `tbl_products` ON tbl_versions.productId = tbl_products.id WHERE tbl_products.idCategory = 6 AND tbl_versions.isActive = 2 LIMIT 15";
            return $sqlSmartPhone;
        }
    }

    // GET LAPTOP PRODUCTS

    function getLaptopProduct($conn, $i){
        
        
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

    // GET SIMILAR PRODUCT
    function getSimilarProduct($conn, $i){
        $sqlGetDetailProd = mysqli_query($conn,"SELECT * FROM `tbl_products` INNER JOIN `tbl_versions` ON tbl_products.id = tbl_versions.productId WHERE idVersion = $i");
        $iGetDetailProd = mysqli_fetch_assoc($sqlGetDetailProd);
        $idBrand = $iGetDetailProd['idBrand'];
        $sqlSimilarProduct = "SELECT * FROM `tbl_versions` INNER JOIN `tbl_products` ON tbl_versions.productId = tbl_products.id WHERE idBrand = $idBrand LIMIT 5";
        return $sqlSimilarProduct;
    }

    // GET LIST VERSION
    function getListVersion($i){
        $sqlGetListVersion = "SELECT * FROM `tbl_versions` WHERE productId = $i";
        return $sqlGetListVersion;
    }


    // GET COMMENT
    function getListComment($i){
        $sqlGetListComment = "SELECT * FROM `tbl_comments` WHERE versionId = $i";
        return $sqlGetListComment;
    }

    // GET REP COMMENT
    function getListRepComment($i){
        $sqlGetListRepComment = "SELECT * FROM `tbl_repcomments` WHERE commentId = $i";
        return $sqlGetListRepComment;
    }
?>