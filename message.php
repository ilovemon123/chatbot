<?php
// database
$conn = mysqli_connect("sql12.freesqldatabase.com", "sql12652080", "IfmvW1LtNB", "sql12652080","3306") or die("Database Error");

// getting user message
$getMesg = mysqli_real_escape_string($conn, $_POST['text']);


$check_data = "SELECT replies FROM tblchatbot WHERE queries LIKE '%$getMesg%'";
$run_query = mysqli_query($conn, $check_data) or die("Error");

if(mysqli_num_rows($run_query) > 0){
    $fetch_data = mysqli_fetch_assoc($run_query);
    $replay = $fetch_data['replies'];
    echo $replay;
}else{
    echo "Sorry can't be able to understand you!";
}

?>