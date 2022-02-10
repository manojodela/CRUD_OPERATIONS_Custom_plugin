<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<?php

global $wpdb;

// Add record
if (isset($_POST['but_submit'])) {

    $name = $_POST['txt_name'];
    $uname = $_POST['txt_uname'];
    $email = $_POST['txt_email'];
    $tablename = $wpdb->prefix . "customplugin";

    if ($name != '' && $uname != '' && $email != '') {
        $check_data = $wpdb->get_results("SELECT * FROM " . $tablename . " WHERE username='" . $uname . "' ");
        if (count($check_data) == 0) {
            $insert_sql = "INSERT INTO " . $tablename . "(name,username,email) values('" . $name . "','" . $uname . "','" . $email . "') ";
            $wpdb->query($insert_sql);
        }
         header('location: http://localhost:8080/wordpress/wp-admin/admin.php?page=allentries');
    } else {
        echo "<br>";
        echo "<h3 class='text-danger text-center'>Please Enter All Fields.</h3> ";
        echo "<br>";
    }
}

?>

<h1>Add New Entry</h1>

<form method='post' action='' id= "form">
    <table class="table">
        <tr>
            <td>Name</td>
            <td><input type='text' name='txt_name'></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type='text' name='txt_uname'></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type='text' name='txt_email'></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type='submit' class='btn btn-primary' name='but_submit' value='Submit'></td>
        </tr>
    </table>
</form>

