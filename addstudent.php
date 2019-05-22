<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");


   // check logged in
   if (isset($_SESSION['id'])) {
    if(isset($_POST) && isset($_POST['studentid']) && $_POST['studentid']){
        echo "Submitting";
        // $sql = "INSERT INTO `student`
        //     (`studentid`, `password`, `dob`, `firstname`, `lastname`, `house`, `town`, `county`, `country`, `postcode`)
        //      VALUES 
        //      (
        //          '{$_POST['studentid']}',
        //          '{$_POST['password']}',
        //          '{$_POST['dob']}',
        //          '{$_POST['firstname']}',
        //          '{$_POST['lastname']}',
        //          '{$_POST['house']}',
        //          '{$_POST['town']}',
        //          '{$_POST['county']}',
        //          '{$_POST['country']}',
        //          '{$_POST['postcode']}'
        //     )
        //      ";
        $studentid = mysqli_real_escape_string($conn, $_POST['studentid']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $dob = mysqli_real_escape_string($conn, $_POST['dob']);
        $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
        $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
        $house = mysqli_real_escape_string($conn, $_POST['house']);
        $town = mysqli_real_escape_string($conn, $_POST['town']);
        $county = mysqli_real_escape_string($conn, $_POST['county']);
        $country = mysqli_real_escape_string($conn, $_POST['country']);
        $postcode = mysqli_real_escape_string($conn, $_POST['postcode']);
        $sql = "INSERT INTO `student`
            (`studentid`, `password`, `dob`, `firstname`, `lastname`, `house`, `town`, `county`, `country`, `postcode`)
             VALUES 
             (
                 '$studentid',
                 '$password',
                 '$dob',
                 '$firstname',
                 '$lastname',
                 '$house',
                 '$town',
                 '$county',
                 '$country',
                 '$postcode'
            )
             ";
        $result = mysqli_query($conn,$sql);
        // var_dump($result);
        // exit;
        $_POST = null;
        header("Location: addstudent.php");
    }

        echo template("templates/partials/header.php");
        echo template("templates/partials/nav.php");


        $data['content'] = <<<EOD
        <form method="post" class="form">
        <div class="form-group">
            <label for="studentid">Student ID</label>
            <input type="text" class="form-control" id="studentid" name="studentid" >
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
       
       
        <div class="form-group">
            <label for="password">Password</label>
            <input type="text" class="form-control" id="password" name="password" >
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
            <label for="firstname">firstname</label>
            <input type="text" class="form-control" id="firstname" name="firstname" >
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
            <label for="lastname">lastname</label>
            <input type="text" class="form-control" id="lastname" name="lastname" >
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>

        <div class="form-group">
            <label for="dob">Dob</label>
            <input type="text" class="form-control" id="dob" name="dob" >
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
       
        <div class="form-group">
            <label for="house">house</label>
            <input type="text" class="form-control" id="house" name="house" >
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
            <label for="town">town</label>
            <input type="text" class="form-control" id="town" name="town" >
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
            <label for="county">county</label>
            <input type="text" class="form-control" id="county" name="county" >
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
       
        <div class="form-group">
            <label for="country">country</label>
            <input type="text" class="form-control" id="country" name="country" >
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
        <div class="form-group">
            <label for="postcode">postcode</label>
            <input type="text" class="form-control" id="postcode" name="postcode" >
            <!-- <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> -->
        </div>
       
        <button type="submit" class="btn btn-primary">Add Student</button>
    </form>
EOD;
        
        echo template("templates/default.php", $data);
     ?>
     
     <?php

   } else {
      header("Location: index.php");
   }

   echo template("templates/partials/footer.php");

?>
