<?php 
/*
* Template Name: Account page
*
*
*/

//check if user is logged in and is role != admin
$current_user = wp_get_current_user();


// if( !empty($current_user->roles) && isset($current_user->roles) ) {
//     if( $current_user->roles[0] == 'administrator' ) {
//         wp_redirect( home_url() );
//         exit;
//     }
// }

get_header();
?>
<div style="display: inline-block; width: 100%; padding: 15px;">
    <h1><?php the_title(); ?></h1>
    <form id="update_account" >
        <label for="fname">First name
            <input type="text" name="fname" id="fname" value="" />
        </label>
        <label for="lname">Last name
            <input type="text" name="lname" id="lname" value="" />
        </label>
        <label for="email">Email
            <input type="text" name="email" id="email" value="" />
        </label>
        <label for="website">Website
            <input type="text" name="website" id="website" value="" />
        </label>
        <label for="description">Description
            <Textarea name="description" id="description">textarea</Textarea>
        </label>
        <input type="submit" value="Update">
    </form>

</div>

<?php
get_footer();