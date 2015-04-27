<?php
/**
 * The template that displays the hero image on the homepage.
 * This file can be used to hard code a slider. For this demo, we're relying on the GC Kit plugin
 * that has a banner widget.
 *
 * @subpackage Custom_Platform
 */
?>
<div class="hero">
    <?php if (function_exists('custom_kit_get_banners')): custom_kit_get_banners(); endif; ?>
</div>