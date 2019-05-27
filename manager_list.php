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
    <body background="mypic/001.jpg">        
        <div class="container">
            <div class="row"> 
                <div class="jumbotron" style="background-image: url(mypic/004.jpg);">
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
                    <h2>ผู้จัดการร้าน</h2>
                    <a href="manager_add.php" class="btn btn-link">เพิ่ม</a>
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>รหัส</th>
                                <th>ชื่อ</th>
                                <th>ที่อยู่</th>
                                <th>อีเมล</th>
                                <th colspan="2">เบอร์โทรศัพท์</th>
                            </tr>                
                        </thead>
                        <tbody>
                            <?php
                                include 'connectdb.php';
                                $sql =  'SELECT * FROM manager order by manager_id';
                                $result = mysqli_query($conn,$sql);
                                while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                    echo '<tr>';
                                    echo '<td>' . $row['manager_id'] . '</td>';
                                    echo '<td>' . $row['mrg_name'] . '</td>';
                                    echo '<td>' . $row['mrg_address'] . '</td>';
                                    echo '<td>' . $row['mrg_email'] . '</td>';
                                    echo '<td>' . $row['mrg_tell'] . '</td>';
                                    echo '<td>';
                            ?>
                                <a href="manager_edit.php?manager_id=<?php echo $row['manager_id'];?>" class="btn btn-warning">แก้ไข</a>
                                <a href="JavaScript:if(confirm('ยืนยันการลบ')==true)
                                    {window.location='manager_delete.php?manager_id=<?php echo $row["manager_id"];?>'}" class="btn btn-danger">ลบ</a>
                            <?php
                                    echo '</td>';
                                    echo '</tr>';
                                }
                                mysqli_free_result($result);
                                echo '</table>';
                                mysqli_close($conn);
                            ?>
                        </tbody>    
                    </table>
                </div>    
            </div>
            <div class="row">
            <div class="row">
                <address>กระเป๋าแฟชั่น By bagfashion</address>
                <address>เทคโนโลยีสารสนเทศปี2</address>
            </div>
            </div>
        </div>    
    </body>
</html>