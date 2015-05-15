<?php
/**
 * Created by PhpStorm.
 * User: Happensit
 * Date: 24.02.2015
 * Time: 14:31
 */

include('partials/header.php'); ?>
  <div class="container">
  <div class="row">
    <?php print_r($portfolios); ?>
    <?php //foreach($portfolios as $portfolio):?>
    <div id="room-<?php //print $portfolio->nid;?>"
         class="title"><?php //print $portfolio->title;?></div>
    <div class="content"><?php //print $portfolio->type;?></div>
    --------------
    <?php //endforeach; ?>
  </div>
  <hr>


<?php include('partials/footer.php'); ?>