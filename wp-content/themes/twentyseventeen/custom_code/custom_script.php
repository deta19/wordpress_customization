<?php

function customRoles() {
    if ( get_option( 'client_version' ) < 1 ) {
        add_role( 'client_role', 'Client', array( 'read' => true, 'level_0' => true ) );
        update_option( 'client_version', 1 );
    }
}
add_action( 'init', 'custom_roles' );


function createUser() {
    $form_data = $_POST['data'];

    $user_id = 0;
    if ( $user_id = wp_create_user( esc_sql($form_data['fname']) . esc_sql($form_data['lname']), esc_sql($form_data['password']), esc_sql($form_data['email']) ) ) {

        //change role
        wp_update_user(array('ID'=>$user_id, 'role'=>'client_role'));
        echo json_encode(['succes' => true ]); 
    }else{
        echo json_encode(['error' => 'couldn creare account' ]); 

    }
    
    die;
    
}
add_action( 'wp_ajax_createUser', 'createUser' );
add_action( 'wp_ajax_nopriv_createUser', 'createUser' );