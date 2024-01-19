<?php
    session_start();
    require_once("config/config.php");
    // GET TOP SALE
    function getTopSale($conn){
        $sqlTopSale = mysqli_query($conn,"SELECT *, SUM(tbl_detailcart.quantity) AS total_sales   FROM tbl_detailcart INNER JOIN tbl_versions ON tbl_detailcart.versionId = tbl_versions.idVersion INNER JOIN tbl_products ON tbl_products.id = tbl_versions.productId  GROUP BY tbl_detailcart.versionId ORDER BY total_sales DESC  LIMIT 10;");
        return  $sqlTopSale;
    }
    // GET INFO USER
    if (isset($_SESSION['userId'])){
        $userID = $_SESSION['userId'];
        $sqlUser = mysqli_query($conn,"SELECT * FROM tbl_customer WHERE id = $userID");
    }
    
    function getInfoUser($conn,$i){
        $sqlUser = mysqli_query($conn,"SELECT * FROM tbl_customer WHERE id = $i");
        $infoUser = mysqli_fetch_assoc($sqlUser);
        return $infoUser;
    }
    

    // CATEGORY 
    $sqlBrand1 = mysqli_query($conn,"SELECT * FROM `tbl_categories` WHERE id BETWEEN 1 AND 18");

    function getImageCategory($conn, $id){
        
        $sqlCatImage = mysqli_query($conn,"SELECT * FROM `tbl_categories` WHERE Id = $id");
        $itemCatImage = mysqli_fetch_assoc($sqlCatImage);
        return $itemCatImage['categoryImage'];
    }
    // GET NAME CATEGORY
    function getNameCategory($conn,$id){
        $sqlNameCategory = mysqli_query($conn,"SELECT * FROM `tbl_products` INNER JOIN `tbl_categories` ON tbl_categories.Id = tbl_products.idCategory WHERE tbl_products.id = $id ");
        $itemCatName = mysqli_fetch_assoc($sqlNameCategory);
        echo $itemCatName['categoryName'];
    }
    // BRAND 
    $sqlBrand1 = mysqli_query($conn,"SELECT * FROM `tbl_brands` WHERE id BETWEEN 1 AND 18");

    function getBrand($conn, $i){
        $querry = "SELECT * FROM `tbl_brands` WHERE categoryId =  $i";
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

    // GET PRODUCT WITH BRAND AND CATEGORY
    function getListProduct( $conn,$a,$b){
        if($b!=0){
            $sqlListProduct = mysqli_query($conn,"SELECT * FROM `tbl_versions` INNER JOIN tbl_products ON tbl_versions.productId = tbl_products.id WHERE tbl_products.idCategory = $a AND tbl_products.idBrand = $b AND tbl_products.isActive = 2");
        }else{
            $sqlListProduct = mysqli_query($conn,"SELECT * FROM `tbl_versions` INNER JOIN tbl_products ON tbl_versions.productId = tbl_products.id WHERE tbl_products.idCategory = $a  AND tbl_products.isActive = 2");
        }
        return $sqlListProduct;
    }

    // 
    function getListProductPrice( $conn,$a,$b,$c,$d){
        if($b!=0){
            $sqlListProduct = mysqli_query($conn,"SELECT * FROM `tbl_versions` INNER JOIN tbl_products ON tbl_versions.productId = tbl_products.id WHERE tbl_products.idCategory = $a AND tbl_products.idBrand = $b AND tbl_products.isActive = 2 AND versionPromotionalPrice BETWEEN $c AND $d");
        }else{
            $sqlListProduct = mysqli_query($conn,"SELECT * FROM `tbl_versions` INNER JOIN tbl_products ON tbl_versions.productId = tbl_products.id WHERE tbl_products.idCategory = $a  AND tbl_products.isActive = 2 versionPromotionalPrice BETWEEN $c AND $d");
        }
        return $sqlListProduct;
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

    function getSimilarProduct1($conn, $i){
        $price1 = $i - 5000000;
        $price2 = $i + 5000000;
        $sqlSimilarProduct = "SELECT * FROM `tbl_versions` INNER JOIN `tbl_products` ON tbl_versions.productId = tbl_products.id WHERE versionPromotionalPrice BETWEEN $price1 AND $price2 LIMIT 5";
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

    // GET LIST REP COMMENT
    function getListRepComment($i){
        $sqlGetListRepComment = "SELECT * FROM `tbl_repcomments` WHERE commentId = $i";
        return $sqlGetListRepComment;
    }

    // GET WISHLIST 
    function getWishList($conn, $a){
        $sqlWishList = mysqli_query($conn,"SELECT * FROM tbl_favorite WHERE userId = $a AND status = 2");
        return  $sqlWishList;
    }

    // GET COMMENT
    function getComments($conn, $a){
        $sqlComment = mysqli_query($conn,"SELECT * FROM tbl_comments WHERE userId = $a ");
        return $sqlComment;
    }
    // GET REP COMMENT
    function getRepComments($conn, $a){
        $sqlRepComment = mysqli_query($conn,"SELECT * FROM tbl_repcomments WHERE commentId = $a ");
        return $sqlRepComment;
    }

    // GET LAST CART 
    function getCart($conn,$a){
        $sqlCart = mysqli_query($conn,"SELECT * FROM tbl_cart INNER JOIN tbl_detailcart ON tbl_cart.id = tbl_detailcart.cartId WHERE userId = $a ORDER BY tbl_cart.id DESC LIMIT 1");
        return $sqlCart;
    }

    // GET CART
    function getCartDetail($conn,$a){
        $sqlCartDetail = mysqli_query($conn,"SELECT * FROM tbl_cart INNER JOIN tbl_detailcart ON tbl_cart.id = tbl_detailcart.cartId WHERE tbl_cart.id = $a ");
        return $sqlCartDetail;
    }

    

    // GET PAYMENT
    function getPayment($conn,$a){
        $sqlPayment = mysqli_query($conn,"SELECT * FROM tbl_payment WHERE id = $a");
        $infoPayment = mysqli_fetch_assoc($sqlPayment);
        return $infoPayment['paymentName'];
    }

    // GET STATUS
    function getStatus($conn,$a){
        $sqlStatus = mysqli_query($conn,"SELECT * FROM tbl_status WHERE id = $a");
        $infoStatus = mysqli_fetch_assoc($sqlStatus);
        return $infoStatus['statusName'];
    }

    // GET DETAIL CART 
    function getDetailCart($conn,$a){
        $sqlDetailCart = mysqli_query($conn,"SELECT * FROM tbl_detailcart WHERE cartId = $a");
        return $sqlDetailCart;
    }

    // GET DETAIL Product 
    function getDetailProd($conn,$a){
        $sqlDetailProd = mysqli_query($conn,"SELECT * FROM tbl_versions WHERE idVersion = $a");
        return $sqlDetailProd;
    }

    function getSpecifications($conn,$a){
        $getSpecifications = mysqli_query($conn,"SELECT * FROM tbl_specifications WHERE versionId = $a");
        return $getSpecifications;
    }
?>