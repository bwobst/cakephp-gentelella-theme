<?php
/**
 * @param bool $show_close_button   Default false
 * @param array $links              Optional array of links to display in the dropdown menu
 */

 $show_close_button = isset($show_close_button) ? $show_close_button : false;
 $links = isset($links) ? $links : [];
?>
<ul class="nav navbar-right panel_toolbox">
    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
    </li>
    <?php if (!empty($links)) { ?>
    <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
            aria-expanded="false"><i class="fa fa-wrench"></i></a>
        <ul class="dropdown-menu" role="menu">
            <?php foreach ($links as $link) { ?>
            <li><?= $link ?></li>
            <?php } ?>
        </ul>
    </li>
    <?php }
    if ($show_close_button) { ?>
    <li><a class="close-link"><i class="fa fa-close"></i></a>
    </li>
    <?php
    } ?>
</ul>
<div class="clearfix"></div>
