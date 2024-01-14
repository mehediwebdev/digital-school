<?php

if ( !function_exists('digital_school_activate')){
    function digital_school_activate(){
        global $wpdb;

      $table_name1 = $wpdb->prefix . 'students';

      $table_name2 = $wpdb->prefix . 'teachers';

      $charset_collate = $wpdb->get_charset_collate();

          // sql to create your table
          $sql1 = "CREATE TABLE " . $table_name1 . " (
            id int(11) NOT NULL AUTO_INCREMENT,
            studentname VARCHAR(255) NOT NULL,
            classname VARCHAR(255) NOT NULL,
            shift VARCHAR(255) NOT NULL,
            roll INT(11),
            year INT(11),
            PRIMARY KEY (id)
        );";

        $sql2 = "CREATE TABLE " . $table_name2 . " (
            id int(11) NOT NULL AUTO_INCREMENT,
            teachername VARCHAR(255) NOT NULL,
            teacheremail VARCHAR(255) NOT NULL,
            subject VARCHAR(255) NOT NULL,
            designation VARCHAR(255),
            PRIMARY KEY (id)
        );";



        if( !function_exists('dbDelta')){
            require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
         }

        // dbDelta($sql);

        dbDelta($sql1);
        dbDelta($sql2);

    }

}


function digital_school_admin_menu(){
    add_menu_page( 
		__( 'Digital School', 'simple-todo' ),  //Page title
		__( 'Digital School', 'simple-todo'),         //Menu title
		'manage_options',     //capabilities
		'digital-school',        //Menu slug
		'digital_school_admin_page', //callback function
		'dashicons-welcome-learn-more',
		6
	); 

}



function digital_school_admin_page(){

    $show_students = digital_school_get_students();


    // Insert Students
    if( isset($_POST['digital-school-nonce']) && wp_verify_nonce($_POST['digital-school-nonce'], 'digital-school-nonce-action')){
        digital_school_insert_students();
      }
      
 //if( isset($_POST['submit'])){
       // digital_school_insert_students();
     // }
      

     // Delete Students

    if(isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])){

        $id = intval($_GET['id']);
        digital_school_delete_students($id);

    }

    include_once DIGITAL_SCHOOL_PLUGIN_DIR . 'inc/digital-school-table.php';
}


function digital_school_enqueue_scripts() {
    wp_enqueue_style( 'digital-school-bootstrap-min', DIGITAL_SCHOOL_PLUGIN_URL . 'assets/css/bootstrap.min.css', array(), DIGITAL_SCHOOL_VERSION, 'all' );
    wp_enqueue_style( 'digital-school-style', DIGITAL_SCHOOL_PLUGIN_URL . 'assets/css/style.css', array(), DIGITAL_SCHOOL_VERSION, 'all' );
}



// Insert Student Function

function digital_school_insert_students(){
    global $wpdb;
   
    $table_name1 = $wpdb->prefix . 'students';

    	
	$studentname = sanitize_text_field($_POST['studentname']);
	$classname = sanitize_text_field($_POST['classname']);
    $shift = sanitize_text_field($_POST['shift']);
    $roll = sanitize_text_field($_POST['roll']);
    $year = sanitize_text_field($_POST['year']);
   
	
	$wpdb->insert(
	  $table_name1,
	  array(
	  'studentname' => $studentname,
	  'classname' => $classname,
      'shift' => $shift,
      'roll' => $roll,
      'year' => $year,
	  )
	
	);
}


// Show Students function 

function digital_school_get_students(){
    
    global $wpdb;
   
    $table_name1 = $wpdb->prefix . 'students';
   
     $sql_students =  " SELECT * FROM  $table_name1 ORDER BY id ASC ";
   //$sql =  'SELECT * FROM' . $table_name . 'ORDER BY id DESC' ;

     $items = $wpdb->get_results($sql_students);

     return $items; 

}


// Delete Students function

function digital_school_delete_students($id){
    global $wpdb;

    $table_name1 = $wpdb->prefix . 'students';

   // $id = $_GET['id'];

    $wpdb->delete( $table_name1, array( 'id' => $id ) );
}