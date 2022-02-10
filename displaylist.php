<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<?php

global $wpdb;
$tablename = $wpdb->prefix . "customplugin";

// Delete record
if (isset($_GET['delid'])) {
    $delid = $_GET['delid'];
    $wpdb->query("DELETE FROM " . $tablename . " WHERE id=" . $delid);
}
?>


<h1>All Entries</h1>

<table width='100%' border='1' style='border-collapse: collapse;' class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col" class="text-center">S.no</th>
            <th scope="col" class="text-center">Name</th>
            <th scope="col" class="text-center">Username</th>
            <th scope="col" class="text-center">Email</th>
            <th scope="col" class="text-center">Operations</th>
        </tr>
    </thead>
    <?php
    // Select records
    $entriesList = $wpdb->get_results("SELECT * FROM " . $tablename);
    if (count($entriesList) > 0) {
        $count = 1;
        foreach ($entriesList as $entry) {
            $id = $entry->id;
            $name = $entry->name;
            $uname = $entry->username;
            $email = $entry->email;

            echo "<tr>
                    <td class='text-center'>" . $count . "</td>
                    <td class='text-center'>" . $name . "</td>
                    <td class='text-center'>" . $uname . "</td>
                    <td class='text-center'>" . $email . "</td>
                    <td class='text-center'> <button type='button' class= 'btn btn-danger ' > 
                    <a class= 'text-white' href='?page=allentries&delid=" . $id . "'>Delete</a>
                    </button>
                    
                    <button type='button' class='btn btn-primary'> 
                     <a class= 'text-white' href='?page=updateEntry&updid=" . $id . "'>Update</a>
                    </button>
                    </td>
                </tr>
      ";
            $count++;
        }
    } else {
        echo "<tr><td colspan='5'>No record found</td></tr>";
    }
    ?>
</table>