<?php 

    require_once('../includes/db.php');


    if(isset($_POST['edit_cat'])){
        $up_id = $_POST['edit_id'];
        $up_cat = $_POST['cat_to_edit'];

        $sql = "update categories set cat_title='$up_cat' where cat_id='$up_id'";
        $result = mysqli_query($con, $sql);

        if($result)
        {
            echo "<div class='col-4 mb-0 alert alert-success' role='alert'>Changed $cat_to_edit to $up_cat successfully!</div>";
            header("location: categories.php");
        }
        else
        {
            echo "Query Filed";
        }
    }
?>