<?php
include('conn.php');

$usid=0;
$email = isset($_POST['email'])?$_POST['email']:'';
$password = isset($_POST['password'])?$_POST['password']:'';
$username = isset($_POST['username'])?$_POST['username']:'';
$phone = isset($_POST['phone'])?(int)$_POST['phone']:'';
$role = isset($_POST['role'])?$_POST['role']:'';
 
if(isset($_POST['userinsert'])){

$users_id=oci_parse($connection,'select max(USID) from users');
oci_execute($users_id);
while(($row = oci_fetch_array($users_id,OCI_BOTH)) != false){
$usid = (int)$row[0]+1;
}

$sql = "insert into users(USID,name,email,phoneNo,password,role)values('$usid','$username','$email','$phone','$password','$role')";
$add_users=oci_parse($connection,$sql);
oci_execute($add_users);
user();
}else if(isset($_POST['userupdate'])){
	user();
}else if(isset($_POST['userdelete'])){

    echo "<script>
    const yesno = confirm('Are you sure you want to delete it?');
    if( yesno == true){
       ".delete()."
    }
    </script>";

}

$get_users = oci_parse($connection,'select * from users order by USID desc');
oci_execute($get_users);

function user(){
    echo "
    <script>
    document.getElementById('showUser').style.display = 'flex'
    document.getElementById('showFlight').style.display = 'none'
    document.getElementById('user').style.backgroundColor = 'black'
    document.getElementById('flight').style.backgroundColor = '#0505057e'
    document.getElementById('usertbl').style.display = 'flex'
    document.getElementById('usersearch').style.display = 'initial'
    document.getElementById('flightsearch').style.display = 'none'
    </script>
    ";
}

function delete(){
    echo "<script> console.log('nooooo99')</script>";
    global $connection;
   if(isset($_POST['userid'])){
       $usid = (int)$_POST['userid'];
       $sql = "delete users where usid = $usid";
       $delete_users = oci_parse($connection,$sql);
       oci_execute($delete_users);
   }
 
    user();
}


?>
