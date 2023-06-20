<?php
    include_once 'header.php';
    ?>
        <div class="container px-4 py-5">
     <div class="row d-flex justify-content-center align-items-center p-3">
    <div class="col-md-8">
        <div class="Search">
        
            <form class="example1" action="Search.php">   
            <input type="text" class="form-control" placeholder="Search"  name="Search">
            <button class="btn btn-primary" name="btnSearch" Style="position: relative; top:-40px ; left:820px ;">Search<br></button>
            </form>  
        </div>

    </div>
    <div class="container px-4 py-5">
        <h2>All product</h2>
        <div class="row">
            <?php
            include_once 'connect.php';
            $c = new Connect();
            $dblink = $c->connectToMySQL();
            $sql = "SELECT * FROM product ";
            // <1>
            $re = $dblink->query($sql);
            $row1 = $re->fetch_row();
            // echo$row1[5];
            // echo "<br>";
            $re->data_seek(0);
            if($re->num_rows>0):
                while($row=$re->fetch_assoc()):// fetch_assoc dựa trên tên cột dữ liệu
            ?>
            <div class="col-md-4 pb-3">
                    <div class="card">
                        <img
                        src="./images/<?=$row['image']?>"
                        class="card-img-top"
                        alt="Product" style="margin: auto;
                        width: 300px;"
                        />
                        <div class="card-body">
                        <a href="detail.php?id=<?=$row['pid']?>" 
                        class="text-decoration-none"><h5 class="card-title"><?=$row['pname']?>
                        </h5></a>
                        <h6 class="card-subtitle mb-2 text-muted"><span>&#8363;</span><?=$row['price']?>
                        </h6>
                        
                        </div>
                    </div>
            </div>
            <?php
             endwhile;
            else:
                echo "Not found";
            endif;
            ?>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <?php
include_once 'footer.php';
?>