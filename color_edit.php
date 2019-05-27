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
                <h4>แก้ไขสี</h4>    
                <?php
                    include 'connectdb.php';
                    if(isset($_GET['submit'])){
                        $color_id = $_GET['color_id'];
                        $color_name =$_GET['color_name'];   
                        $sql = "update color set color_name='$color_name where color_id='$color_id";
                        mysqli_query($conn,$sql);
                        mysqli_close($conn);
                        echo "เปลี่ยนสี $color_name เรียบร้อยแล้ว<br>";
                        echo '<a href="color_list.php">แสดงสีที่มีทั้งหมด</a>';
                    }else{
                        $color_id = $_REQUEST['color_id'];
                        $sql =  "SELECT * FROM color where color_id='$color_id'";
                        $result = mysqli_query($conn,$sql);
                        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                        $fcolor_name = $row['color_name'];
                        mysqli_free_result($result);
                       mysqli_close($conn);                        
                ?>
                    <form class="form-horizontal" role="form" name="color_edit" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="form-group">
                        <input type="hidden" name="color_id" id="color_id" value="<?php echo "$color_id";?>">


                        <div class="form-group">
                        <label for="color_name" class="col-md-2 col-lg-2 control-label">สี</label>
                        <div class="col-md-10 col-lg-10">
                        <input type="text" name="color_name" id="color_name" class="form-control" 
                        value="<?php echo $fcolor_name;?>">
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