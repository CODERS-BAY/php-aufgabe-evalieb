    <form id="delete_user" class="form_box">
        <select name="username">
            <?php
                include_once('inc/dbCon.php');
                $select = "SELECT user_username FROM user_list";
                $result = $dbcon->query($select);

                if($result->num_rows > 0){
                    while($row = $result->fetch_object()){
                        echo '<option value="' . $row->user_username . '">' . $row->user_username. '</option>';
                    }
                }?>
        </select>

        <input type="submit" value="User löschen">
    </form>