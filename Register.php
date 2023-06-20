
<!DOCTYPE html>
<html>
    <head><title>Welcome to BS5</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <meta name="viewport"
        content="width:device-width,initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css"> 
</head>

<?php
    include_once 'header.php';
    include_once 'connect.php';

    if(isset($_POST['register'])){
        $gender = $_POST['prpGender'];
        $password = $_POST['pass'];
        $fName = $_POST['usrname'];
        $email = $_POST['email'];
        $phone =  $_POST['tel'];
        $dateBrithday = date('Y-m-d', strtotime($_POST['txtBirth']));


        $c = new Connect();
        $dblink = $c->connectToPDO();
        
        // $sql = "SELECT * FROM product Where pname LIKE Concat('%',:NameP,'%')";
        // // <1>
        // $re = $dblink->prepare($sql);
        
        // $re->bindParam(':NameP',$nameP,PDO::PARAM_STR);
        
        $sql="INSERT INTO `users`(`email`, `fullname`, `gender`, `address`, `password`, `role`, `phone`, `birthday`) VALUES (?,?,?,?,?,?,?,?)";
        $re =$dblink->prepare($sql);
        $stmt = $re->execute(array("$email","$fName",$gender,"cantho","$password","users","$phone","$dateBrithday"));
        if($stmt == TRUE){
            echo "Congrats!";
        }else{  
            echo"Failed";
        }
    }
    ?>

    <body>
        <div class="container">
            <h2>Member Registration</h2>
            <form action=""
            id="form1"
            method="POST"
            class="needs-validation">
            <div class="row">
        <label for="Username"
            class="col-md-2 col-form-label">
            Username(*):
        </label>
        <div class="col-md-10">
            <input type="text"
            name="usrname"
            id="Username"
            required 
            class="form-control" />
        </div>
        </div>
        <br>
            <div class="row pb-3">
            <label for="password"
            class="col-md-2 col-form-label">
            Password(*):
        </label>
        <div class="col-md-10">
            <input type="password"
            name="pass"
            id="password"
            required 
            class="form-control" />
        </div>
        </div>
        <div class="row pb-3">
            <label for="password"
            class="col-md-2 col-form-label">
           confirm Password(*):
        </label>
        <div class="col-md-10">
            <input type="password"
            name="pass"
            id="password"
            required 
            class="form-control" />
        </div>
        </div>

        <div class="row pb-3">
            <label for="Phone"
            class="col-md-2 col-form-label">
           Phone(*):
        </label>
        <div class="col-md-10">
            <input type="Phone"
            name="tel"
            id="phone"
            required 
            class="form-control" />
        </div>
        </div>

        <div class="row pb-3">
            <label for="Email"
            class="col-md-2 col-form-label">
           Email(*):
        </label>
        <div class="col-md-10">
            <input type="Email"
            name="email"
            id="Email"
            required 
            class="form-control" />
        </div>
        </div>
        
        <div class="row pb-3">
            <label for="Gender"
                class="col-md-2 col-form-label">
                Gender:
            </label>
            <div class="col-md-10 d-flex">
                <div class="form-check pe-3">
                <input type="radio"
                name="prpGender" value="0"
                id="maleRd"
                checked
                class="form-check-input"> Male</label>
                    </div>
                    <div class="form-check">
                        <input type="radio"
                        name="prpGender" value="1"
                        id="FemaleRd"
                        checked
                        class="form-check-input"> Female</label>
                    </div>
                </div>
            </div>


            <div class="row pb-3">
                <label for="Country"
                    class="col-md-2 col-form-label">
                    Country:
                </label>
                <div class="col-md-10"> 
                    <select id="country" class="form-select">
                        <option selected>
                            chosse your country
                        </option>
                        <option value="vn">VietNam</option>
                        <option value="uk">UK</option>
                        <option value="canada">Canada</option>
                    </select> 
                </div>
             </div>
             
                             <div class="row pb-3">   
                    <label for="birthday" 
                        class="col-md-2 col-form-label">
                        Birthday:
                    </label>
                    <div class="col-md-10 ms-auto">
                        <input type="date" name="txtBirth" id="birthday"
                        required
                       class="form-control"/>
                    </div>          
                            </div>
                                                 
                             <div class="row pb-3">
                             <div class="col-md-10 ms-auto">
                             <input type="submit"

                                 value="Register"
                                 class="btn btn-primary"
                                 name="register"
                                 id="register">
                             </div>
                             </div>
                    </form>            
            </div>
    </body>
</html>
<?php
    include_once 'footer.php';
    ?>
