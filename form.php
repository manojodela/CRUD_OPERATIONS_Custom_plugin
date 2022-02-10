<?php

function custom_form_shortcode()
{
    ob_start();
?>
    <h1>Add New Entry</h1>

    <form method='post' action=''>
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

<?php

    return ob_get_clean();
}
