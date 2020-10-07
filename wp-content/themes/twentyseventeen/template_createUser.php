<?php 
/*
* Template Name: create user
*
*
*/

get_header();
?>
<div style="display: inline-block; width: 50%; padding: 15px; float:left;">
    <h1>Login</h1>
    <?php echo wp_login_form(); ?>
</div>
<div style="display: inline-block; width: 50%; padding: 15px; float:left;">
    <h1>Register</h1>
    <form id="register" action="">
        <label for="fname">First name:</label><br>
        <input type="text" id="fname" name="fname" value="John"><br>
        <label for="lname">Last name:</label><br>
        <input type="text" id="lname" name="lname" value="Doe"><br><br>

        <label for="email">email:</label><br>
        <input type="text" id="email" name="email" value="email"><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" value="password"><br><br>


        <input type="submit" value="Submit">
    </form>
</div>


<script type="text/javascript">
jQuery(document).ready(function(){
    
    jQuery('#register').submit(function(e) {

        e.preventDefault();

        var values = {};
        var inputs = jQuery(this).find('input, select, textarea');
        inputs.each(function( index, value ) {
            values[value.name] = value.value;
        });


        jQuery.ajax({
            type : "post",
            dataType : "json",
            url : "/wp-admin/admin-ajax.php",
            data : {action: "createUser", data: values},
            success: function(response) {
                console.log( response );
            }
        })   
    })
    
});
</script>
<?php
get_footer();