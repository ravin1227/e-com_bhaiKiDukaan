<?php 
    require ('connection.inc.php');
    // require ('functions.inc.php');

    // $name=get_safe_value($con,$_POST['name']);
    // $email=get_safe_value($con,$_POST['email']);
    // $password=get_safe_value($con,$_POST['password']);

    // $check_user=mysqli_num_rows(mysqli_query($con,"SELECT * FROM users WHERE name='$name'"));
    // if($check_user>0){
    //     echo "email_present";
    // }else{
    //     $added_on=data('Y-m-d h:i:s');
    //     mysqli_query($con,"INSERT INTO users (name,password,email,added_on) 
    //     VALUES('$name','$password','$email','$added_on')");
    //     echo "inserted";
    // }


        $name=$_POST['name'];
        $email=$_POST['email'];
        // $pwd=$_POST['password'];
        // $password= md5($pwd);
        $password= $_POST['password'];;
        if(!empty($name) || !empty($email) || !empty($password)){
            if(mysqli_connect_error()){
                die('Connect Error('.mysqli_connect_errno().')'. mysqli_connect_error());
            }else{
                $SELECT = "SELECT email FROM users WHERE email = ? Limit 1";
                $INSERT = "INSERT INTO users (name,email,password)
                values(?,?,?)";

                $stmt = $con->prepare($SELECT);
                $stmt->bind_param("s",$email);
                $stmt->execute();
                $stmt->bind_result($email);
                $stmt->store_result();
                $rnum =$stmt->num_rows;

                if($rnum==0){
                    $stmt->close();

                    $stmt =$con->prepare($INSERT);
                    $stmt->bind_param("sss",$name, $email, $password);
                    $stmt->execute();
                    header("Location: {$hostname}/login.php");
                }else{
                    echo "Email id already used";
                }
                $stmt->close();
                $con->close();
            }

        }else{
            echo "ALL Field are Required";
            die();
        }

?>
