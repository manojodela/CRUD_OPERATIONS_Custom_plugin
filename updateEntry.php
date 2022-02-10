<?php

global $wpdb;

$tablename = $wpdb->prefix . "customplugin";
$updid = $_GET['updid'];

$entriesList = $wpdb->get_results("SELECT * FROM " . $tablename . " where id =" . $updid);
if (count($entriesList) > 0) {
    $count = 1;
    foreach ($entriesList as $entry) {
        $id = $entry->id;
        $name = $entry->name;
        $uname = $entry->username;
        $email = $entry->email;
    }
}

if (isset($_POST['upd_submit'])) {
    $tablename = $wpdb->prefix . "customplugin";

    $name = $_POST["txt_name"];
    $uname = $_POST["txt_uname"];
    $email = $_POST["txt_email"];
    // update record
    $updid = $_GET['updid'];
    $wpdb->query("UPDATE `wp_customplugin` SET `name` = '$name', `username` = '$uname', `email` = '$email' WHERE `id` = $updid ");
    header('location: http://localhost:8080/wordpress/wp-admin/admin.php?page=allentries');
}




?>


<form method='post' action='' id='form'>
    <table class='table'>
       
        <tr>
            <td>Name</td>
            <td><input type='text' name='txt_name' value='<?php echo $name; ?>'></td>
        </tr>
        <tr>
            <td>Username</td>
            <td><input type='text' name='txt_uname' value='<?php echo $uname; ?>'></td>
        </tr>
        <tr>
            <td>Email</td>
            <td><input type='text' name='txt_email' value='<?php echo $email; ?>'></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type='submit' class='btn btn-primary' name='upd_submit' value='Update'></td>
        </tr>
    </table>
</form>