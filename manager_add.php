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
                <h4>เพิ่มผู้จัดการ</h4>    
                <?php
                    if(isset($_GET['submit'])){
                        $mrg_address = $_GET['mrg_address'];
                        $mrg_name = $_GET['mrg_name'];                        
                        $mrg_email = $_GET['mrg_email'];
                        $mrg_tell = $_GET['mrg_tell'];
                        $sql = "insert into manager" ;
                        $sql .= " values (null,'$mrg_name','$mrg_address','$mrg_email','$mrg_tell')";
                        //echo $sql;
                        include 'connectdb.php'; //ประกาศ ..เชื่อมต่อกับhost
                        mysqli_query($conn,$sql); //เอาคำสั่งลงไป
                        mysqli_close($conn); 
                        echo "เพิ่มผู้จัดการ $mrg_name  เรียบร้อยแล้ว<br>";
                        echo '<a href="manager_list.php">แสดงชื่อผู้จัดการทั้งหมด</a>';
                    }else{
                ?>
                    <form class="form-horizontal" role="form" name="manager_add" action="<?php echo $_SERVER['PHP_SELF']?>">
                        <div class="form-group">
                            <label for="mrg_name" class="col-md-2 col-lg-2 control-label">ชื่อ</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="mrg_name" id="mrg_name" class="form-control">
                            </div>    
                        </div>
             
                    
                        <div class="form-group">
                        <label for="mrg_address" class="col-md-2 col-lg-2 control-label">ที่อยู่</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="mrg_address" id="mrg_address" class="form-control">
                            </div>    
                        </div>                       
                   

                        <div class="form-group">
                        <label for="mrg_email" class="col-md-2 col-lg-2 control-label">อีเมล</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="mrg_email" id="mrg_email" class="form-control">
                            </div>    
                        </div>                       
                  
                        <div class="form-group">
                        <label for="mrg_tell" class="col-md-2 col-lg-2 control-label">เบอร์โทรศัพท์</label>
                            <div class="col-md-10 col-lg-10">
                                <input type="text" name="mrg_tell" id="mrg_tell" class="form-control">
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