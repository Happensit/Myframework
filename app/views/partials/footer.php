<?php
/**
 * Created by PhpStorm.
 * User: Happensit
 * Date: 24.02.2015
 * Time: 14:34
 */
?>
<footer>
    <p> <?php echo Config::get('AppName'); ?> &copy; Softformula version <?= Sft::getVersion();?></p>
</footer>
</div> <!-- /container -->
<?php print $js; ?>
</body>
</html>