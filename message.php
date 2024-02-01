<?php if(!empty($errors)):?>
        <div class="alert alert-danger">
        <?php foreach ($errors as $error):?>
          <?=$error?>
          <br>
        <?php endforeach;?>
        </div>
        <?php endif;
        ?>
         <?php if(!empty($success)):?>
          <div class="alert alert-success">
          <?=$success?>
          </div>
          <?php endif;
        ?>