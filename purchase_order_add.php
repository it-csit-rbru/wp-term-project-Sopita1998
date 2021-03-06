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
    <body style="background-color: AntiqueWhite ;">        
        <div class="container">
            <div class="row"> 
                <div class="jumbotron" style="background-image: url(mypic/005.jpg);">
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
                    <h4>เพิ่มใบสั่งซื้อ</h4>
                    <?php
                        if(isset($_GET['submit'])){
                            $po_qty = $_GET['po_qty'];
                            $po_pro_id = $_GET['po_pro_id'];
                            $po_cus_id = $_GET['po_cus_id'];
                            $sql = "insert into purchase_order";
                            $sql .= " values (null,'$po_qty','$po_pro_id','$po_cus_id')";
                            include 'connectdb.php';
                            mysqli_query($conn,$sql);
                            mysqli_close($conn);
                            echo "เพิ่มใบสั่งซื้อ เรียบร้อยแล้ว<br>";
                            echo '<a href="purchase_order_list.php">แสดงใบสั่งซื้อทั้งหมด</a>';
                        }else{
                    ?>
                    <form class="form-horizontal" role="form" name="purchase_order_add" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="form-group">
                            <label for="po_qty" class="col-md-2 col-lg-2 control-label">จำนวน</label>
                            <div class="col-md-10 col-lg-10">
                            <select name="po_qty" id="po_qty" class="form-control">                         
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="7">9</option>
                            <option value="8">10</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="po_pro_id" class="col-md-2 col-lg-2 control-label">ชื่อสินค้า</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="po_pro_id" id="po_pro_id" class="form-control"> 
                                <?php
                                    include 'connectdb.php';  //ตั้งแต่ 56-69 สร้างแถบตัวเลือกคำนำหน้า
                                    $sql =  'SELECT * FROM product order by product_id';
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value='; 
                                        echo '"' . $row['product_id'] . '">'; 
                                        echo $row['pro_name'];
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
                            <label for="po_cus_id" class="col-md-2 col-lg-2 control-label">ชื่อลูกค้า</label>
                            <div class="col-md-10 col-lg-10">
                                <select name="po_cus_id" id="po_cus_id" class="form-control"> 
                                <?php
                                    include 'connectdb.php';  //ตั้งแต่ 56-69 สร้างแถบตัวเลือกคำนำหน้า
                                    $sql =  'SELECT * FROM customer order by customer_id';
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value='; 
                                        echo '"' . $row['customer_id'] . '">'; 
                                        echo $row['cus_name'];
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
            
        </div>    
    </body>
</html>