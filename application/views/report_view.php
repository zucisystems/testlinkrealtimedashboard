   <select class="form-control">
            <?php 

            foreach($groups as $row)
            { 
              echo '<option value="'.$row->description.'">'.$row->description.'</option>';
            }
            ?>
            </select>