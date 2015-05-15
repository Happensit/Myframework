<?php
/**
 * Created by PhpStorm.
 * User: Happensit
 * Date: 24.02.2015
 * Time: 14:31
 */

include('partials/header.php');?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1>Wellcome to Sft-framework!</h1>
            <p>This is a mini framework from Softformula Team!</p>
          <?php echo BASE_URL; ?>
        </div>
    </div>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <?php print $content;?>
        </div>

        <hr>

  <div class="products">
  <?php print_r($products);?>
  </div>

<?php include('partials/footer.php'); ?>