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
                <h4>เพิ่มการชำระเงิน</h4>    
                <?php
                    if(isset($_GET['submit'])){
                        $order_pay_id = $_GET['order_pay_id'];
                        $pay_data = $_GET['pay_data'];
                        $total_price = $_GET['total_price'];
                        $bank_name = $_GET['bank_name'];
                        $p_tell = $_GET['p_tell'];
                        $sql = "insert into customer";
                        $sql = " values (null '$order_pay_id','$pay_data','$total_price','$bank_name',$p_tell)";
                        include 'connectdb.php';
                        mysqli_query($conn,$sql);
                        mysqli_close($conn);
                        echo "เพิ่มการชำระเงิน เรียบร้อยแล้ว<br>";
                        echo '<a href="payment_list.php">แสดงการชำระเงินทั้งหมด</a>';
                    }else{
                ?>
                    <form class="form-horizontal" role="form" name="payment_add" action="<?php echo $_SERVER['PHP_SELF']?>">                   
                        <div class="form-group">
                            <label for="order_pay_id" class="col-md-2 col-lg-2 control-label">เลขที่สั่งซื้อ</label> 
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="order_pay_id" id="order_pay_id" class="form-control">
                            </div>
                        </div>   
                      
                        <div class="form-group">
                            <label for="pay_data" class="col-md-2 col-lg-2 control-label">วันที่ชำระเงิน</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="pay_data" id="pay_data" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="total_price" class="col-md-2 col-lg-2 control-label">ราคารวม</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="total_price" id="total_price" class="form-control">
                            </div>    
                        </div>
                        <div class="form-group">
                            <label for="bank_name" class="col-md-2 col-lg-2 control-label">ธนาคาร</label>
                            <div class="col-md-10 col-lg-10">
                            <select name="bank_name" id="bank_name" class="form-control">                         
                            <option value="1">กรุงไทย</option>
                            <option value="2">กสิกรไทย</option>
                            <option value="3">ออมสิน</option>
                            <option value="4">ไทยพาณิชย์</option>
                            <option value="5">กรุงศรีอยุธยา</option>
                            <option value="6">ทหารไทย</option>
                            <option value="7">ธนชาติ</option>
                            <option value="8">กรุงเทพ</option>
                            </select>
                        </div>
                    </div>

                        <div class="form-group">
                            <label for="p_tell" class="col-md-2 col-lg-2 control-label">เบอร์โทรศัพท์</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="p_tell" id="p_tell" class="form-control">
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