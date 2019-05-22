<?php

   include("_includes/config.inc");
   include("_includes/dbconnect.inc");
   include("_includes/functions.inc");


   // check logged in
   if (isset($_SESSION['id'])) {

      echo template("templates/partials/header.php");
      echo template("templates/partials/nav.php");

      // Build SQL statment that selects a student's modules
      $sql = "SELECT * FROM `student` WHERE 1";

      $result = mysqli_query($conn,$sql);

      // prepare page content
      $data['content'] .= "<table class='table'><tr>";
      $data['content'] .= "<th  align='center'>Student ID</th>";
      $data['content'] .= "<th  align='center'>First Name</th>";
      $data['content'] .= "<th  align='center'>Last Name</th>";
      $data['content'] .= "<th  align='center'>House</th>";
      $data['content'] .= "<th  align='center'>Town</th>";
      $data['content'] .= "<th  align='center'>County</th>";
      $data['content'] .= "<th  align='center'>Country</th>";
      $data['content'] .= "<th  align='center'>Post Code</th>";
      $data['content'] .= "<th  align='center'>Check</th></tr>";
    //   $data['content'] .= "<tr><th>Code</th><th>Type</th><th>Level</th></tr>";
      // Display the modules within the html table
      while($row = mysqli_fetch_array($result)) {
         $data['content'] .= "<tr><td> $row[studentid] </td>";
         $data['content'] .= "<td> $row[firstname] </td>";
         $data['content'] .= "<td> $row[lastname] </td>";
         $data['content'] .= "<td> $row[house] </td>";
         $data['content'] .= "<td> $row[town] </td>";
         $data['content'] .= "<td> $row[county] </td>";
         $data['content'] .= "<td> $row[country] </td>";
         $data['content'] .= "<td> $row[postcode] </td>";
         $data['content'] .= "<td> <input type='checkbox'/> </td></tr>";
      }
      $data['content'] .= "</table>";
      $data['content'] .= "<button class='btn btn-danger'>Delete</button>";
      // render the template
      echo template("templates/default.php", $data);

   } else {
      header("Location: index.php");
   }

   echo template("templates/partials/footer.php");

?>
