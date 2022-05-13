<?php
$connection=null;
    $con=oci_connect('flightbooking', 'flightbooking', 'localhost/XE')
                      or die(oci_error());
      if(!$con){
      echo "Sorry, there is some issue";
      return;
      }else{
        $connection=$con;
      return $con;
      }
      
      //close the connection
      oci_close($con);
      
    // dsfdsfdsfsd

  
?>