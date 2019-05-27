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
                    <p>6014421005</p>
                </div>  
                <div class="col-sm-12 col-md-9 col-lg-9">
                <h4>แก้ไขข้อมูลลูกค้า</h4>    
                <?php
                    include 'connectdb.php';
                    if(isset($_GET['submit'])){
                        $customer_id     = $_GET['customer_id'];
                        $cus_name   = $_GET['cus_name'];
                        $cus_address   = $_GET['cus_address'];
                        $cus_email   = $_GET['cus_email'];
                        $cus_pro_id   = $_GET['cus_pro_id'];
                        $sql   = "update customer set cus_name='$cus_name', cus_address='$cus_address',cus_email='$cus_email , cus_pro_id='$cus_pro_id'  where customer_id='$customer_id'";
                        mysqli_query($conn,$sql);
                        mysqli_close($conn);
                        echo "เปลี่ยนข้อมูลลูกค้า $cus_name เรียบร้อยแล้ว<br>";
                        echo '<a href="customer_list.php">แสดงข้อมูลลูกค้าทั้งหมด</a>';
                    }else{
                        $fcustomer_id = $_REQUEST['customer_id'];
                        $sql =  "SELECT * FROM customer where customer_id='$fcustomer_id'";
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $fcus_name = $row['cus_name'];
                        $fcus_address = $row['cus_address'];
                        $fcus_email = $row['cus_email'];
                        $fcus_pro_id = $row['cus_pro_id'];
                        mysqli_free_result($result);
                        mysqli_close($conn);                        
                ?>
                    <form class="form-horizontal" role="form" name="customer_edit" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <input type="hidden" name="customer_id" id="customer_id" value="<?php echo "$fcustomer_id";?>">
                        <div class="form-group">
                            <label for="cus_name" class="col-md-2 col-lg-2 control-label">ชื่อลูกค้า</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="cus_name" id="cus_name" class="form-control" value="<?php echo "$fcus_name";?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="cus_address" class="col-md-2 col-lg-2 control-label">ที่อยู่</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="cus_address" id="cus_address" class="form-control" value="<?php echo "$fcus_address";?>">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="cus_email" class="col-md-2 col-lg-2 control-label">อีเมล</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="cus_email" id="cus_email" class="form-control" value="<?php echo "$fcus_email";?>">
                            </div>    
                        </div>

                        <div class="form-group">
                            <label for="cus_pro_id" class="col-md-2 col-lg-2 control-label">สินค้า</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="cus_pro_id" id="cus_pro_id" class="form-control">                                
                                <?php
                                    include 'connectdb.php';
                                    $sql2 = "select * from customer where customer_id='$customer_id'";
                                    $result2 = mysqli_query($conn,$sql2);
                                    $row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC);
                                    $fcus_name = $row['cus_name'];
                                    $fcus_address = $row['cus_address'];
                                    $fcus_email = $row['cus_email'];
                                    $fcus_pro_id = $row['cus_pro_id'];
                                    $sql =  "SELECT * FROM product order by product_id";
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['product_id'].'"';
                                        if($row['product_id']==$fcus_pro_id){
                                            echo ' selected="selected" ';
                                        }
                                        echo ">";
                                        echo $row['pro_name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
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