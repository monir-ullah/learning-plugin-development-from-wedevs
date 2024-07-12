<?php


/*
*   In this file wee will add custom columns in post
*/

class weDevs_Academy_WP_Plugin_Post_Column {
    public function __construct() {
        add_action("manage_post_posts_columns", array( $this,"manage_post_custom_column_function") );
        add_action("manage_post_posts_custom_column", array( $this,"manage_posts_columns_item_function") , 10,2);
        add_action("manage_edit-post_sortable_columns", array( $this,"manage_view_count_sortable_function") );
        add_action("wp_head", array( $this,"add_post_views_count_function") , 10,2);
    }

    /*
    * Adding custom column in the posts table.
    *
    */ 

    public function manage_post_custom_column_function($columns) {
      
        print_r( $columns );
       
        foreach ($columns as $key => $value) {
            if( $key == "cb") {
                $new_columns[$key] = $value;
                $new_columns['image'] = 'Image';
               
            }elseif($key == 'categories') {
                $new_columns[$key] = $value;
                $new_columns['view_count'] = 'Views';
            }
            else{
                $new_columns[$key] = $value;
            };
        }
        return $new_columns;

    }



    /*
    * Add feature image in the table
    */

    public function manage_posts_columns_item_function($post_columns, $post_id) {
              
        if($post_columns === 'image') {
            if(has_post_thumbnail($post_id)) {
                echo get_the_post_thumbnail( $post_id, 'thumbnail', array('class'=> 'custom-post-image-column') );
                
            }else{
                echo 'No feature image found.';
            }
        }else if($post_columns === 'view_count'){
            global $post;
            $post_view_count = get_post_meta( $post->ID,'_post_views_count', true );
            if($post_view_count) { 
                echo $post_view_count;
            }else{
                echo 0;
            }
           
        }

        
    }

    /*
    * Calculating total post video
    */

    public function add_post_views_count_function(){

        global $post;

        if(is_singular('post')){
            $post_view_count =  (int) get_post_meta( $post->ID,'_post_views_count', true );

            if($post_view_count) {

                 update_post_meta( $post->ID, '_post_views_count', intval($post_view_count + 1) );
            }else{
                update_post_meta( $post->ID, '_post_views_count', intval(1) );
            }
          

        }
    }

    /*
    * View COunt Sortable
    */

    public function manage_view_count_sortable_function($columns){
        $columns['view_count'] = 'view_count';

        return $columns;
    }
}