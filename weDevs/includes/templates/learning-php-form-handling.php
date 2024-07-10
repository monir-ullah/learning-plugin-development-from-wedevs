<div id="main">
        <form action="<?php echo admin_url() . "admin.php?page=wp-academy" ?>" method="POST">
            <label for="firstname">Firstname:</label>
            <input type="text" name="firstname" id="firstname" placeholder="Firstname ...">

            <label for="lastname">Lastname:</label>
            <input type="text" name="lastname" id="lastname" placeholder="Lastname ...">

            <label for="favouritepet">Lastname:</label>
            <select name="favouritepet" id="favouritepet">
                <option value="none">None</option>
                <option value="dog">Dog</option>
                <option value="cat">Cat</option>
                <option value="bird">Bird</option>
            </select>

            <button type="submit">Submit</button>

        </form>


        <?php 
            

            $form_array = array();
            $first_name = isset( $_POST["firstname"] ) ? $form_array[$_POST["firstname"]] = $_POST["firstname"] : null;
            $last_name = isset( $_POST["lastname"] ) ? $form_array[$_POST["lastname"]] = $_POST["lastname"] : null;
            $last_name = isset( $_POST["favouritepet"] ) ? $form_array[$_POST["favouritepet"]] = $_POST["favouritepet"] : null;
           

            
           if(!empty(($form_array)))  print_r($form_array) ;
        
        

        ?>
    </div>