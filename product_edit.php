<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>bagfashion</title>
        <!-- Bootstrap -->
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css">
        <link href="bootstrap/css/bootstrap-theme.css" rel="stylesheet" type="text/css">
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="bootstrap/js/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="bootstrap/js/bootstrap.min.js"></script>        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="bootstrap/js/html5shiv.min.js"></script>
            <script src="bootstrap/js/respond.min.js"></script>
        <![endif]-->
    </head>
    <body background="mypic/007.jpg">        
        <div class="container">
            <div class="row"> 
                <div class="jumbotron" style="background-image: url(mypic/006.jpg);">
                    <?php include 'topbanner.php';?>
                </div>
            </div>
            <div class="row">
                <?php include 'menu.php';?>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-3">
                    <p>Login Area</p>
                </div>  
                <div class="col-sm-12 col-md-9 col-lg-9">
                <h4>แก้ไขข้อมูลสินค้า</h4>    
                <?php
                    include 'connectdb.php';
                    if(isset($_GET['submit'])){
                        $product_id     = $_GET['product_id'];
                        $price  = $_GET['price'];
                        $color_pro_id = $_GET['color_pro_id'];
                        $sql = "update product set price='$price' , color_pro_id ='$color_pro_id where product_id='$product_id'";
                        mysqli_query($conn,$sql);
                        mysqli_close($conn);
                        echo "เปลี่ยนข้อมูลสินค้า เรียบร้อยแล้ว<br>";
                        echo '<a href="product_list.php">แสดงสินค้าทั้งหมด</a>';
                    }else{
                        $product_id = $_REQUEST['product_id'];
                        $sql =  "SELECT * FROM product where product_id='$product_id'";
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $fpro_name = $row['pro_name'];
                        $fprice = $row['price'];
                        $fcolor_pro_id = $row['color_pro_id'];
                        mysqli_free_result($result);
                        mysqli_close($conn);                        
                ?>
                    <form class="form-horizontal" role="form" name="product_edit" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <input type="hidden" name="product_id" id="product_id" value="<?php echo "$fproduct_id";?>">
                        <div class="form-group">
                            <label for="pro_name" class="col-md-2 col-lg-2 control-label">ชื่อสินค้า</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="pro_name" id="pro_name" class="form-control" value="<?php echo "$fpro_name";?>">
                            </div>    
                        </div>

                        <div class="form-group">
                            <label for="price" class="col-md-2 col-lg-2 control-label">ราคา</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="price" id="price" class="form-control" value="<?php echo "$fprice";?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="color_pro_id" class="col-md-2 col-lg-2 control-label">สีของสินค้า</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="color_pro_id" id="color_pro_id" class="form-control">
                                <?php
                                    include 'connectdb.php';
                                    $sql =  'SELECT * FROM color order by color_id';
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['color_id'] . '">';
                                        echo $row['color_name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    echo '</table>';
                                    mysqli_close($conn);
                                ?>
                                </select>                                
                           </div>    
                        </div>

                        <div class="form-group">
                            <div class="col-md-10 col-lg-10">
                                <input type="submit" name="submit" value="ตกลง" class="btn btn-default">
                            </div>    
                        </div>
                    </form>
                <?php
                    }
                ?>
                </div>    
            </div>
            <div class="row">
                <address>กระเป๋าแฟชั่น By bagfashion(Web Programming) </address>
            </div>
        </div>    
    </body>
</html>