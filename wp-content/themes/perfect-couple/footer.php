<?php
/**
 * The template for displaying the footer.
 *
 * @package Perfect Couple
 */

global $theme_pc;

if( !empty($theme_pc['opt-footer-text']) ) { ?>

<footer id="footer">
	<div class="container text-center" data-scroll-reveal>
		<?php echo $theme_pc['opt-footer-text']; ?>
	</div>
</footer>

<?php }

wp_footer(); ?>

</body>
</html>
