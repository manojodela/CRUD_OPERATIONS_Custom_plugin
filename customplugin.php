<?php
/*
   Plugin Name: Custom plugin
   description: A simple custom plugin
   Version: 1.0.0
   Author: Manoj
  
*/


// Create a new table
function customplugin_table()
{

    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    $tablename = $wpdb->prefix . "customplugin";

    $sql = "CREATE TABLE $tablename (
  id mediumint(11) NOT NULL AUTO_INCREMENT,
  name varchar(80) NOT NULL,
  username varchar(80) NOT NULL,
  email varchar(80) NOT NULL,
  PRIMARY KEY  (id)
  ) $charset_collate;";

    require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
    dbDelta($sql);
}
register_activation_hook(__FILE__, 'customplugin_table');



// Add menu
function customplugin_menu()
{
    add_menu_page("Custom Plugin", "Custom Plugin", "manage_options", "myplugin", "displayList", plugins_url('/custom_plugin/img/icon.png'), 4);
    add_submenu_page("myplugin", "All Entries", "All entries", "manage_options", "allentries", "displayList");
    add_submenu_page("myplugin", "Add new Entry", "Add new Entry", "manage_options", "addnewentry", "addEntry");
    add_submenu_page("myplugin", "Update Entry", "Update Entry", "manage_options", "updateEntry", "updateEntry");
}
add_action("admin_menu", "customplugin_menu");

function displayList()
{
    include "displaylist.php";
}

function addEntry()
{
    include "addentry.php";
}

function updateEntry()
{
    include "updateEntry.php";
}

function form()
{
    include "form.php";
}
add_shortcode('form_registration', 'custom_form_shortcode');


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
            echo "<br>";
            echo "<br>";
            echo "<h3 class='text-primary text-center'>Entry Saved Sucessfully.</h3> ";
            echo "<br>";
        }
    } else {
        echo "<br>";
        echo "<h3 class='text-danger text-center'>Please Enter All Fields.</h3> ";
        echo "<br>";
    }
}
