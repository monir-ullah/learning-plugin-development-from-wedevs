<div class="wrap">

    <h1 class="wp-heading-inline">Customized Post</h1>
    <?php 
        $posts_args = array(
            "post_type"=> "post",
        );
        
       $category_terms = get_terms(array(
        'taxonomy'=>'category',
        'orderby'=>'name',
        'order'=>'ASC'
       ));


    ?>
    <div class="tablenav top">

        <form  name="customized_category" method="get">
            <input type="hidden" name="page" value="wp-academy">
          
            <div class="alignleft actions bulkactions">
                <label for="bulk-action-selector-top" class="screen-reader-text">Select bulk action</label>

                <?php 
                    $selected_category = isset($_GET["customized_category"])?  $_GET["customized_category"] : '-1';
                    if($selected_category != '-1'){
                        $posts_args['tax_query']= array(
                            array(
                                'taxonomy' => 'category',
                                'field' => 'term_id',
                                'terms' => $_GET["customized_category"]
                            )
                        ) ;
                    }

                ?>

                <select name="customized_category" id="bulk-action-selector-top" >
                    <option value="-1" <?php selected( -1, 1 ); ?>>Bulk actions</option>
                
                    <?php 
                        foreach ($category_terms as $cat_term) {
                            ?>
                                <option value="<?php echo $cat_term->term_id; ?>" <?php selected($cat_term->term_id , $selected_category ); ?>><?php echo $cat_term->name; ?></option>
                            <?php
                        }
                    ?>
                </select>


                <input type="submit"  class="button action" value="Apply">          
            </div>
        </form>

        <br class="clear">
    </div>

    <table class="wp-list-table widefat fixed striped table-view-list posts">
        <thead>
            <tr>
                <th>Title</th>
                <th>Author</th>
                <th>Category</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $posts = get_posts($posts_args);
                foreach ($posts as $post) {
                  $post_category = get_the_category($post->ID);
                //   print_r($post_category);
                   ?>

                    <tr>
                        <td><?php echo $post->post_title ?></td>
                        <td> <a href="<?php echo get_the_author_meta('user_url', $post->post_author)?>"><?php echo ucfirst(get_the_author_meta('nicename', $post->post_author));  ?></a>   </td>
                        <td> <a href="<?php echo get_category_link($post_category[0]->cat_ID  )?>"><?php echo $post_category[0]->cat_name ;  ?></a>   </td>
                        <td></td>
                    </tr>

                    <?php
                }
            
            ?>
        </tbody>
    </table>

</div>