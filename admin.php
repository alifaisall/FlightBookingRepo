<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>
    <link rel="stylesheet" href="table.css" />
    <link rel="stylesheet" href="admin.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet"
    />
    
  </head>
  <body>
  

    <div class="container">
      <div class="form-container">
       
        <div class="tab-btns">
          <button id="user" >User</button>
          <button id="flight" >Flight</button>
        </div>

        
        <!-- user form -->
        <div>
        <form id="showUser" class="user-form" name="showuser" method="POST">
          
        <h2>User Form</h2>

        <div class="inputcontainer-user">
          <input type="text" placeholder="User ID" name="userid" disabled/>
          <img src="images/user-icon.png" width="15px" height="auto" alt="" />
        </div>
        <div class="inputcontainer-user">
          <input type="text" placeholder="Email" name="email"  required />
          <img src="images/email-icon.png" width="15px" 
          height="auto" style="margin-top: 3px" />
        </div>
        <div class="inputcontainer-user">
          <input type="text" placeholder="Password" name="password" required />
          <img src="images/pass-icon.png" width="15px" height="auto" alt="" />
        </div>
        <div class="inputcontainer-user">
          <input type="text" placeholder="Username" name="username" required />
          <img src="images/user-icon.png" width="15px" height="auto" alt="" />
        </div>
        <div class="inputcontainer-user">
          <input type="text" placeholder="Phone" name="phone" required />
          <img src="images/tel-icon.png" width="12px" height="auto" alt="" />
        </div>
        <div class="inputcontainer-user">
          <input type="text" placeholder="Role" name="role" required />
          <img src="images/role-icon.jpg" width="15px" height="auto" alt="" />
        </div>
        <?php 
            $date = new DateTime();
            $dt= $date->format('Y-m-d\TH:i:s');
           ?>
        <div class="inputcontainer-user">
          <input type="datetime-local" name="udate" value='<?php echo $dt; ?>' />
          <img src="images/date-icon.png" width="15px" height="auto" alt="" />
        </div>
        
        <div class="btns-user">
          <button name="userinsert">Insert</button>
          <button name="userdelete">Delete</button>
          <button name="userupdate">Update</button>
        </div>
      </form>
        
       </div>
       <!-- end user form -->





       <!-- flight form -->
        <div>
        <form id="showFlight" class="flight-form" method="POST" name="showFlight">
          
        <h2>Available Flights</h2>

        <div class="inputcontainer-flight">
          <label for="afid">Flight ID</label>
          <input type="text" placeholder="Flight ID" disabled />
        </div>

        <div class="inputcontainer-flight">
          <label for="country">Country</label>
          <input type="text" placeholder="country" name="country" />
        </div>

        <div class="inputcontainer-flight">
          <label for="description">Description</label>
          <input type="text" placeholder="description" name="description" />
        </div>

        <div class="inputcontainer-flight">
          <label for="type">Type</label>
          <input type="text" placeholder="type" name="type" />
        </div>
          <?php 
            $date = new DateTime();
            $dt= $date->format('Y-m-d\TH:m:s');
           ?>
        <div class="inputcontainer-flight">
          <label for="date">Date</label>
          <input type="datetime-local" name="date" value='<?php echo $dt; ?>'>  
        </div>
        

        <div class="inputcontainer-flight">
          <label for="state">State</label>
          <input type="state" name="state" placeholder="state"/>
        </div>

        <div class="inputcontainer-flight">
          <label for="airline">Airline</label>
          <input type="text" placeholder="Airline" name="airline" />
        </div>

        <div class="inputcontainer-flight">
          <label for="price">Price</label>
          <input type="text" placeholder="price" name="price" />
        </div>

        <div class="inputcontainer-flight">
          <label for="imgurl">Image URL</label>
          <div>
             <button name="img" class="imgbtn" onclick="openInput()">choose image</button>
             <label for="img" class="imglabel">No file chosen</label>
             <input style='display:none;' type="file" placeholder="image url"name="imgurl" accept="image/x-png,image/gif,image/jpeg,image/jpg"/>
          </div>
        </div>

        <div class="btns-flight">
          <button name="flightinsert">Insert</button>
          <button name="flightdelete">Delete</button>
          <button name="flightupdate">Update</button>
        </div>
      </form>
        


      </div>
      <!-- end flight form -->

      </div>


    </div>
<!-- user table -->
<div id="usertbl">
   <div class="search-container">
      <h4 class="search-header">Search By:</h4>
      <input class="search-input" type="text" placeholder="Name">
      <input class="search-input" type="text" placeholder="Role">
      <input class="search-input" type="date">
      <button class="search-btn">Search</button>
    </div>
<div class="maintbldiv">
 
    <div class="headerdiv">
      <table class="table-fill">
        
          <tr >
            <th style="width: 90px;">User ID</th>
            <th style="width: 115px;">User Name</th>
            <th style="width: 200px;">Email</th>
            <th style="width: 90px;">Password</th>
            <th style="width: 110px; padding: 0px;" >Phone No</th>
            <th style="width: 100px; padding: 0px;">Role</th>
            <th style="width: 100px; padding: 0px;">Date</th>
          </tr> 
      </table>
    </div>
    <div class="bodydiv">
      <table class="table-fill">
        <tbody>
          
       <?php include('userrelate.php');  ?>
       <?php 
       while(($row = oci_fetch_array($get_users,OCI_BOTH)) != false){
        ?>
          <tr onclick='getUserRowIndex(this)'>
            <td class="text-left tdu1" style="width: 86px; padding: 3px;"><?php echo isset($row[0])?$row[0]:'' ?></td>
            <td class="text-left tdu2" style="width: 110px; padding: 3px;"><?php echo isset($row[1])?$row[1]:'' ?></td>
            <td class="text-left tdu3" style="width: 112px; padding: 3px;"><?php echo isset($row[2])?$row[2]:'' ?></td>
            <td class="text-left tdu4" style="width: 122px;  padding: 3px;"><?php echo isset($row[4])?$row[4]:'' ?></td>
            <td class="text-left tdu5" style="width: 105px;  padding: 3px;"><?php echo isset($row[3])?$row[3]:'' ?></td>
            <td class="text-left tdu6" style="width: 95px;  padding: 3px;"><?php echo isset($row[5])?$row[5]:'' ?></td>
            <td class="text-left tdu6" style="width: 95px;  padding: 3px;"><?php echo isset($row[6])?$row[6]:'' ?></td>
          </tr>
       <?php } ?>
       
       </tbody>
      </table>
      
    </div>
  </div>
  </div>
        <!-- end of user table -->
       

<!-- flight table -->
<div id="flighttbl">

<div class="search-container">
    <h4 class="search-header">Search By:</h4>
    <input class="search-input" type="text" placeholder="Country Name">
    <input class="search-input" type="text" placeholder="Type">
    <input class="search-input" type="text" placeholder="Price">
    <input class="search-input" type="date">
    <button class="search-btn">Search</button>
  </div>
<div class="maintbldiv" >
  
   
  <div class="headerdiv">
    <table class="table-fill">
      <tr>
        <th style="width: 110px;">Flight ID</th>
        <th style="width: 150px;">Country Name</th>
        <th style="width: 95px;">Type</th>
        <th style="width: 90px;">Price</th>
        <th style="width: 130px;">Inserted Date</th>
        <th style="width: 100px;">State</th>
        <th style="width: 100px;">Image Url</th>
        <th style="width: 160px;">Preferred Airline</th>
        <th style="width: 290px;">Description</th>
      </tr> 
    </table>
  </div>

  <div class="bodydiv">
    <table class="table-fill">
      <tbody style="height:48px; overflow:auto;">

      <?php include('aarelate.php') ?>
      <?php 
       while(($row = oci_fetch_array($get_airlines,OCI_BOTH)) != false){
         ?>

          <tr onclick='getFlightRowIndex(this)'>
            <td class="text-left tdf1" style="width: 112px;"><?php echo isset($row[0])?$row[0]:'' ?></td>
            <td class="text-left tdf2" style="width: 150px;"><?php echo isset($row[1])?$row[1]:'' ?></td>
            <td class="text-left tdf3" style="width: 97px;"><?php echo isset($row[3])?$row[3]:'' ?></td>
            <td class="text-left tdf4" style="width: 92px;"><?php echo isset($row[4])?$row[4]:'' ?></td>
            <td class="text-left tdf5" style="width: 133px;"><?php echo isset($row[5])?$row[5]:'' ?></td>
            <td class="text-left tdf6" style="width: 103px;"><?php echo isset($row[6])?$row[6]:'' ?></td>
            <td class="text-left tdf7" style="width: 103px;"><?php echo isset($row[7])?$row[7]:'' ?></td>
            <td class="text-left tdf8" style="width: 163px;"><?php echo isset($row[8])?$row[8]:'' ?></td>
            <td class="text-left tdf9" style="width: 300px;"><?php echo isset($row[2])?$row[2]:'' ?></td>
          </tr>
      <?php } ?>
  
      </tbody>
    </table>
  </div> 
</div>
</div>
     <!-- end of flight table -->

 <script src="admin.js"></script>
 <script>
function getUserRowIndex(index){
  var form = document.getElementById("showUser")
  form.elements[0].value=index.cells[0].innerText
  form.elements[1].value=index.cells[1].innerText
  form.elements[2].value=index.cells[2].innerText
  form.elements[3].value=index.cells[3].innerText
  form.elements[4].value=index.cells[4].innerText
  form.elements[5].value=index.cells[5].innerText
  // this two lines will convert space to T because the <input type"datetime-local"> only accept this type of format "d-m-yTh:i"
  const dte = (index.cells[6].innerText).replace(' ','T')
  form.elements[6].value=dte;
  

}

function getFlightRowIndex(index){
  var form = document.getElementById("showFlight")
  form.elements[0].value=index.cells[0].innerText
  form.elements[1].value=index.cells[1].innerText
  form.elements[2].value=index.cells[8].innerText
  form.elements[3].value=index.cells[2].innerText
  const dte = (index.cells[4].innerText).replace(' ','T')
  form.elements[4].value=dte;
  form.elements[5].value=index.cells[7].innerText
  form.elements[6].value=index.cells[5].innerText
  form.elements[7].value=index.cells[3].innerText
  
  form.elements[8].value='sdfsdfss'




}

</script>


<?php  
    $date = "12-05-2022 12:123 AM";  
    $newDate = date("Y-m-d\TH:i a", strtotime($date));  
    echo $newDate;  
?>  

  </body>
</html>
