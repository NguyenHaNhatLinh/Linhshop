<?php
include_once 'Header.php';
?>

<div class="container px-4 py-5">
    <div class="row d-flex justify-content-center align-items-center p-3">

    <div class="col-md-8">
        <div class="search">
        <form class="example1" action="Search.php">     
        <input type="text" class="form-control" placeholder="Search..."  name="Search">
        <button class="btn btn-primary" name="btnSearch" Style="position: relative; top:-40px ; left:820px ;">Search</button>
    </form>  
        </div>
    </div>
</div>
    <h2>All product</h2>
        <div class="row">
            <?php
            //MySQLi
            include_once 'connect.php';
            $c = new Connect();
            $dblink = $c->connectToPDO();
            $nameP = $_GET['Search'];
            $sql = "SELECT * FROM product where pname like ?";

            //
            $re = $dblink->prepare($sql);
            // $nameP = $_GET['search'];
            //$re->bindParam(':nameP', $nameP, PDO::PARAM_STR);
            $re->execute(array("%$nameP%"));
            $rows = $re->fetchAll(PDO::FETCH_BOTH);
            
            foreach($rows as $r):

            // $row1 = $re -> fetch_row();//fetch_row lấy kết quả dựa vào thứ tự cột
            // echo $row1[5];
            // echo "<br>";
            // $re->data_seek(0);

            // if($re->num_rows > 0):

            //     while($row=$re->fetch_assoc())://Fetch_assoc lấy kết quả dựa trên tên cột
            ?>

            <div class="col-md-4 pb-3">
                    <div class="card">
                        <img
                        src="../simpleweb/images/<?=$r['image']?>"
                        class="card-img-top"
                        alt="Product>" style="margin: auto;
                        width: 300px;"
                        />
                        <div class="card-body">
                            <!-- id -->
                        <a href="Detail.php?id=<?=$row['Pid']?>" 
                        class="text-decoration-none"><h5 class="card-title">
                        <?=$r['pname']?>
                        </h5></a>
                        <h6 class="card-subtitle mb-2 text-muted"><span>&#8363;</span> 
                        <!-- Price -->
                        <?=$r['price']?>
                        </h6>
                        
                        </div>
                    </div>
            </div>
        <?php
        endforeach;
        // endwhile;

        // else:
        //     echo "Not found!!!!!!!!";
        // endif;
        ?>
        </div>
<?php
include_once 'footer.php';
?>