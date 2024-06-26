<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB directory)
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/webdevstudios/Custom-Metaboxes-and-Fields-for-WordPress
 */ 

/**
 * Conditionally displays a field when used as a callback in the 'show_on_cb' field parameter
 *
 * @param  CMB2_Field object $field Field object
 *
 * @return bool                     True if metabox should show
 */
function cmb2_hide_if_no_cats( $field ) {
	// Don't show this field if not in the cats category
	if ( ! has_tag( 'cats', $field->object_id ) ) {
		return false;
	}
	return true;
}

add_filter( 'cmb2_meta_boxes', 'cmb2_sample_metaboxes' );

/**
 * Define the metabox and field configurations.
 *
 * @param  array $meta_boxes
 * @return array
 */
function cmb2_sample_metaboxes( array $meta_boxes ) {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'pc_';

	$sliders = array();
	$sliders[0] = 'None';

	$sliders_query = new WP_Query( array ( 'post_type' => 'pc_slider', 'posts_per_page' => 99 ) );

	while ( $sliders_query->have_posts() ) : $sliders_query->the_post();
		$sliders[get_the_ID()] = get_the_title();
	endwhile;

	$icons = array( 'fa-adjust' => 'adjust', 'fa-adn' => 'adn', 'fa-align-center' => 'align-center', 'fa-align-justify' => 'align-justify', 'fa-align-left' => 'align-left', 'fa-align-right' => 'align-right', 'fa-ambulance' => 'ambulance', 'fa-anchor' => 'anchor', 'fa-android' => 'android', 'fa-angellist' => 'angellist', 'fa-angle-double-down' => 'angle-double-down', 'fa-angle-double-left' => 'angle-double-left', 'fa-angle-double-right' => 'angle-double-right', 'fa-angle-double-up' => 'angle-double-up', 'fa-angle-down' => 'angle-down', 'fa-angle-left' => 'angle-left', 'fa-angle-right' => 'angle-right', 'fa-angle-up' => 'angle-up', 'fa-apple' => 'apple', 'fa-archive' => 'archive', 'fa-area-chart' => 'area-chart', 'fa-arrow-circle-down' => 'arrow-circle-down', 'fa-arrow-circle-left' => 'arrow-circle-left', 'fa-arrow-circle-o-down' => 'arrow-circle-o-down', 'fa-arrow-circle-o-left' => 'arrow-circle-o-left', 'fa-arrow-circle-o-right' => 'arrow-circle-o-right', 'fa-arrow-circle-o-up' => 'arrow-circle-o-up', 'fa-arrow-circle-right' => 'arrow-circle-right', 'fa-arrow-circle-up' => 'arrow-circle-up', 'fa-arrow-down' => 'arrow-down', 'fa-arrow-left' => 'arrow-left', 'fa-arrow-right' => 'arrow-right', 'fa-arrow-up' => 'arrow-up', 'fa-arrows' => 'arrows', 'fa-arrows-alt' => 'arrows-alt', 'fa-arrows-h' => 'arrows-h', 'fa-arrows-v' => 'arrows-v', 'fa-asterisk' => 'asterisk', 'fa-at' => 'at', 'fa-automobile' => 'automobile', 'fa-backward' => 'backward', 'fa-ban' => 'ban', 'fa-bank' => 'bank', 'fa-bar-chart' => 'bar-chart', 'fa-bar-chart-o' => 'bar-chart-o', 'fa-barcode' => 'barcode', 'fa-bars' => 'bars', 'fa-beer' => 'beer', 'fa-behance' => 'behance', 'fa-behance-square' => 'behance-square', 'fa-bell' => 'bell', 'fa-bell-o' => 'bell-o', 'fa-bell-slash' => 'bell-slash', 'fa-bell-slash-o' => 'bell-slash-o', 'fa-bicycle' => 'bicycle', 'fa-binoculars' => 'binoculars', 'fa-birthday-cake' => 'birthday-cake', 'fa-bitbucket' => 'bitbucket', 'fa-bitbucket-square' => 'bitbucket-square', 'fa-bitcoin' => 'bitcoin', 'fa-bold' => 'bold', 'fa-bolt' => 'bolt', 'fa-bomb' => 'bomb', 'fa-book' => 'book', 'fa-bookmark' => 'bookmark', 'fa-bookmark-o' => 'bookmark-o', 'fa-briefcase' => 'briefcase', 'fa-btc' => 'btc', 'fa-bug' => 'bug', 'fa-building' => 'building', 'fa-building-o' => 'building-o', 'fa-bullhorn' => 'bullhorn', 'fa-bullseye' => 'bullseye', 'fa-bus' => 'bus', 'fa-cab' => 'cab', 'fa-calculator' => 'calculator', 'fa-calendar' => 'calendar', 'fa-calendar-o' => 'calendar-o', 'fa-camera' => 'camera', 'fa-camera-retro' => 'camera-retro', 'fa-car' => 'car', 'fa-caret-down' => 'caret-down', 'fa-caret-left' => 'caret-left', 'fa-caret-right' => 'caret-right', 'fa-caret-square-o-down' => 'caret-square-o-down', 'fa-caret-square-o-left' => 'caret-square-o-left', 'fa-caret-square-o-right' => 'caret-square-o-right', 'fa-caret-square-o-up' => 'caret-square-o-up', 'fa-caret-up' => 'caret-up', 'fa-cc' => 'cc', 'fa-cc-amex' => 'cc-amex', 'fa-cc-discover' => 'cc-discover', 'fa-cc-mastercard' => 'cc-mastercard', 'fa-cc-paypal' => 'cc-paypal', 'fa-cc-stripe' => 'cc-stripe', 'fa-cc-visa' => 'cc-visa', 'fa-certificate' => 'certificate', 'fa-chain' => 'chain', 'fa-chain-broken' => 'chain-broken', 'fa-check' => 'check', 'fa-check-circle' => 'check-circle', 'fa-check-circle-o' => 'check-circle-o', 'fa-check-square' => 'check-square', 'fa-check-square-o' => 'check-square-o', 'fa-chevron-circle-down' => 'chevron-circle-down', 'fa-chevron-circle-left' => 'chevron-circle-left', 'fa-chevron-circle-right' => 'chevron-circle-right', 'fa-chevron-circle-up' => 'chevron-circle-up', 'fa-chevron-down' => 'chevron-down', 'fa-chevron-left' => 'chevron-left', 'fa-chevron-right' => 'chevron-right', 'fa-chevron-up' => 'chevron-up', 'fa-child' => 'child', 'fa-circle' => 'circle', 'fa-circle-o' => 'circle-o', 'fa-circle-o-notch' => 'circle-o-notch', 'fa-circle-thin' => 'circle-thin', 'fa-clipboard' => 'clipboard', 'fa-clock-o' => 'clock-o', 'fa-close' => 'close', 'fa-cloud' => 'cloud', 'fa-cloud-download' => 'cloud-download', 'fa-cloud-upload' => 'cloud-upload', 'fa-cny' => 'cny', 'fa-code' => 'code', 'fa-code-fork' => 'code-fork', 'fa-codepen' => 'codepen', 'fa-coffee' => 'coffee', 'fa-cog' => 'cog', 'fa-cogs' => 'cogs', 'fa-columns' => 'columns', 'fa-comment' => 'comment', 'fa-comment-o' => 'comment-o', 'fa-comments' => 'comments', 'fa-comments-o' => 'comments-o', 'fa-compass' => 'compass', 'fa-compress' => 'compress', 'fa-copy' => 'copy', 'fa-copyright' => 'copyright', 'fa-credit-card' => 'credit-card', 'fa-crop' => 'crop', 'fa-crosshairs' => 'crosshairs', 'fa-css3' => 'css3', 'fa-cube' => 'cube', 'fa-cubes' => 'cubes', 'fa-cut' => 'cut', 'fa-cutlery' => 'cutlery', 'fa-dashboard' => 'dashboard', 'fa-database' => 'database', 'fa-dedent' => 'dedent', 'fa-delicious' => 'delicious', 'fa-desktop' => 'desktop', 'fa-deviantart' => 'deviantart', 'fa-digg' => 'digg', 'fa-dollar' => 'dollar', 'fa-dot-circle-o' => 'dot-circle-o', 'fa-download' => 'download', 'fa-dribbble' => 'dribbble', 'fa-dropbox' => 'dropbox', 'fa-drupal' => 'drupal', 'fa-edit' => 'edit', 'fa-eject' => 'eject', 'fa-ellipsis-h' => 'ellipsis-h', 'fa-ellipsis-v' => 'ellipsis-v', 'fa-empire' => 'empire', 'fa-envelope' => 'envelope', 'fa-envelope-o' => 'envelope-o', 'fa-envelope-square' => 'envelope-square', 'fa-eraser' => 'eraser', 'fa-eur' => 'eur', 'fa-euro' => 'euro', 'fa-exchange' => 'exchange', 'fa-exclamation' => 'exclamation', 'fa-exclamation-circle' => 'exclamation-circle', 'fa-exclamation-triangle' => 'exclamation-triangle', 'fa-expand' => 'expand', 'fa-external-link' => 'external-link', 'fa-external-link-square' => 'external-link-square', 'fa-eye' => 'eye', 'fa-eye-slash' => 'eye-slash', 'fa-eyedropper' => 'eyedropper', 'fa-facebook' => 'facebook', 'fa-facebook-square' => 'facebook-square', 'fa-fast-backward' => 'fast-backward', 'fa-fast-forward' => 'fast-forward', 'fa-fax' => 'fax', 'fa-female' => 'female', 'fa-fighter-jet' => 'fighter-jet', 'fa-file' => 'file', 'fa-file-archive-o' => 'file-archive-o', 'fa-file-audio-o' => 'file-audio-o', 'fa-file-code-o' => 'file-code-o', 'fa-file-excel-o' => 'file-excel-o', 'fa-file-image-o' => 'file-image-o', 'fa-file-movie-o' => 'file-movie-o', 'fa-file-o' => 'file-o', 'fa-file-pdf-o' => 'file-pdf-o', 'fa-file-photo-o' => 'file-photo-o', 'fa-file-picture-o' => 'file-picture-o', 'fa-file-powerpoint-o' => 'file-powerpoint-o', 'fa-file-sound-o' => 'file-sound-o', 'fa-file-text' => 'file-text', 'fa-file-text-o' => 'file-text-o', 'fa-file-video-o' => 'file-video-o', 'fa-file-word-o' => 'file-word-o', 'fa-file-zip-o' => 'file-zip-o', 'fa-files-o' => 'files-o', 'fa-film' => 'film', 'fa-filter' => 'filter', 'fa-fire' => 'fire', 'fa-fire-extinguisher' => 'fire-extinguisher', 'fa-flag' => 'flag', 'fa-flag-checkered' => 'flag-checkered', 'fa-flag-o' => 'flag-o', 'fa-flash' => 'flash', 'fa-flask' => 'flask', 'fa-flickr' => 'flickr', 'fa-floppy-o' => 'floppy-o', 'fa-folder' => 'folder', 'fa-folder-o' => 'folder-o', 'fa-folder-open' => 'folder-open', 'fa-folder-open-o' => 'folder-open-o', 'fa-font' => 'font', 'fa-forward' => 'forward', 'fa-foursquare' => 'foursquare', 'fa-frown-o' => 'frown-o', 'fa-futbol-o' => 'futbol-o', 'fa-gamepad' => 'gamepad', 'fa-gavel' => 'gavel', 'fa-gbp' => 'gbp', 'fa-ge' => 'ge', 'fa-gear' => 'gear', 'fa-gears' => 'gears', 'fa-gift' => 'gift', 'fa-git' => 'git', 'fa-git-square' => 'git-square', 'fa-github' => 'github', 'fa-github-alt' => 'github-alt', 'fa-github-square' => 'github-square', 'fa-gittip' => 'gittip', 'fa-glass' => 'glass', 'fa-globe' => 'globe', 'fa-google' => 'google', 'fa-google-plus' => 'google-plus', 'fa-google-plus-square' => 'google-plus-square', 'fa-google-wallet' => 'google-wallet', 'fa-graduation-cap' => 'graduation-cap', 'fa-group' => 'group', 'fa-h-square' => 'h-square', 'fa-hacker-news' => 'hacker-news', 'fa-hand-o-down' => 'hand-o-down', 'fa-hand-o-left' => 'hand-o-left', 'fa-hand-o-right' => 'hand-o-right', 'fa-hand-o-up' => 'hand-o-up', 'fa-hdd-o' => 'hdd-o', 'fa-header' => 'header', 'fa-headphones' => 'headphones', 'fa-heart' => 'heart', 'fa-heart-o' => 'heart-o', 'fa-history' => 'history', 'fa-home' => 'home', 'fa-hospital-o' => 'hospital-o', 'fa-html5' => 'html5', 'fa-ils' => 'ils', 'fa-image' => 'image', 'fa-inbox' => 'inbox', 'fa-indent' => 'indent', 'fa-info' => 'info', 'fa-info-circle' => 'info-circle', 'fa-inr' => 'inr', 'fa-instagram' => 'instagram', 'fa-institution' => 'institution', 'fa-ioxhost' => 'ioxhost', 'fa-italic' => 'italic', 'fa-joomla' => 'joomla', 'fa-jpy' => 'jpy', 'fa-jsfiddle' => 'jsfiddle', 'fa-key' => 'key', 'fa-keyboard-o' => 'keyboard-o', 'fa-krw' => 'krw', 'fa-language' => 'language', 'fa-laptop' => 'laptop', 'fa-lastfm' => 'lastfm', 'fa-lastfm-square' => 'lastfm-square', 'fa-leaf' => 'leaf', 'fa-legal' => 'legal', 'fa-lemon-o' => 'lemon-o', 'fa-level-down' => 'level-down', 'fa-level-up' => 'level-up', 'fa-life-bouy' => 'life-bouy', 'fa-life-buoy' => 'life-buoy', 'fa-life-ring' => 'life-ring', 'fa-life-saver' => 'life-saver', 'fa-lightbulb-o' => 'lightbulb-o', 'fa-line-chart' => 'line-chart', 'fa-link' => 'link', 'fa-linkedin' => 'linkedin', 'fa-linkedin-square' => 'linkedin-square', 'fa-linux' => 'linux', 'fa-list' => 'list', 'fa-list-alt' => 'list-alt', 'fa-list-ol' => 'list-ol', 'fa-list-ul' => 'list-ul', 'fa-location-arrow' => 'location-arrow', 'fa-lock' => 'lock', 'fa-long-arrow-down' => 'long-arrow-down', 'fa-long-arrow-left' => 'long-arrow-left', 'fa-long-arrow-right' => 'long-arrow-right', 'fa-long-arrow-up' => 'long-arrow-up', 'fa-magic' => 'magic', 'fa-magnet' => 'magnet', 'fa-mail-forward' => 'mail-forward', 'fa-mail-reply' => 'mail-reply', 'fa-mail-reply-all' => 'mail-reply-all', 'fa-male' => 'male', 'fa-map-marker' => 'map-marker', 'fa-maxcdn' => 'maxcdn', 'fa-meanpath' => 'meanpath', 'fa-medkit' => 'medkit', 'fa-meh-o' => 'meh-o', 'fa-microphone' => 'microphone', 'fa-microphone-slash' => 'microphone-slash', 'fa-minus' => 'minus', 'fa-minus-circle' => 'minus-circle', 'fa-minus-square' => 'minus-square', 'fa-minus-square-o' => 'minus-square-o', 'fa-mobile' => 'mobile', 'fa-mobile-phone' => 'mobile-phone', 'fa-money' => 'money', 'fa-moon-o' => 'moon-o', 'fa-mortar-board' => 'mortar-board', 'fa-music' => 'music', 'fa-navicon' => 'navicon', 'fa-newspaper-o' => 'newspaper-o', 'fa-openid' => 'openid', 'fa-outdent' => 'outdent', 'fa-pagelines' => 'pagelines', 'fa-paint-brush' => 'paint-brush', 'fa-paper-plane' => 'paper-plane', 'fa-paper-plane-o' => 'paper-plane-o', 'fa-paperclip' => 'paperclip', 'fa-paragraph' => 'paragraph', 'fa-paste' => 'paste', 'fa-pause' => 'pause', 'fa-paw' => 'paw', 'fa-paypal' => 'paypal', 'fa-pencil' => 'pencil', 'fa-pencil-square' => 'pencil-square', 'fa-pencil-square-o' => 'pencil-square-o', 'fa-phone' => 'phone', 'fa-phone-square' => 'phone-square', 'fa-photo' => 'photo', 'fa-picture-o' => 'picture-o', 'fa-pie-chart' => 'pie-chart', 'fa-pied-piper' => 'pied-piper', 'fa-pied-piper-alt' => 'pied-piper-alt', 'fa-pinterest' => 'pinterest', 'fa-pinterest-square' => 'pinterest-square', 'fa-plane' => 'plane', 'fa-play' => 'play', 'fa-play-circle' => 'play-circle', 'fa-play-circle-o' => 'play-circle-o', 'fa-plug' => 'plug', 'fa-plus' => 'plus', 'fa-plus-circle' => 'plus-circle', 'fa-plus-square' => 'plus-square', 'fa-plus-square-o' => 'plus-square-o', 'fa-power-off' => 'power-off', 'fa-print' => 'print', 'fa-puzzle-piece' => 'puzzle-piece', 'fa-qq' => 'qq', 'fa-qrcode' => 'qrcode', 'fa-question' => 'question', 'fa-question-circle' => 'question-circle', 'fa-quote-left' => 'quote-left', 'fa-quote-right' => 'quote-right', 'fa-ra' => 'ra', 'fa-random' => 'random', 'fa-rebel' => 'rebel', 'fa-recycle' => 'recycle', 'fa-reddit' => 'reddit', 'fa-reddit-square' => 'reddit-square', 'fa-refresh' => 'refresh', 'fa-remove' => 'remove', 'fa-renren' => 'renren', 'fa-reorder' => 'reorder', 'fa-repeat' => 'repeat', 'fa-reply' => 'reply', 'fa-reply-all' => 'reply-all', 'fa-retweet' => 'retweet', 'fa-rmb' => 'rmb', 'fa-road' => 'road', 'fa-rocket' => 'rocket', 'fa-rotate-left' => 'rotate-left', 'fa-rotate-right' => 'rotate-right', 'fa-rouble' => 'rouble', 'fa-rss' => 'rss', 'fa-rss-square' => 'rss-square', 'fa-rub' => 'rub', 'fa-ruble' => 'ruble', 'fa-rupee' => 'rupee', 'fa-save' => 'save', 'fa-scissors' => 'scissors', 'fa-search' => 'search', 'fa-search-minus' => 'search-minus', 'fa-search-plus' => 'search-plus', 'fa-send' => 'send', 'fa-send-o' => 'send-o', 'fa-share' => 'share', 'fa-share-alt' => 'share-alt', 'fa-share-alt-square' => 'share-alt-square', 'fa-share-square' => 'share-square', 'fa-share-square-o' => 'share-square-o', 'fa-shekel' => 'shekel', 'fa-sheqel' => 'sheqel', 'fa-shield' => 'shield', 'fa-shopping-cart' => 'shopping-cart', 'fa-sign-in' => 'sign-in', 'fa-sign-out' => 'sign-out', 'fa-signal' => 'signal', 'fa-sitemap' => 'sitemap', 'fa-skype' => 'skype', 'fa-slack' => 'slack', 'fa-sliders' => 'sliders', 'fa-slideshare' => 'slideshare', 'fa-smile-o' => 'smile-o', 'fa-soccer-ball-o' => 'soccer-ball-o', 'fa-sort' => 'sort', 'fa-sort-alpha-asc' => 'sort-alpha-asc', 'fa-sort-alpha-desc' => 'sort-alpha-desc', 'fa-sort-amount-asc' => 'sort-amount-asc', 'fa-sort-amount-desc' => 'sort-amount-desc', 'fa-sort-asc' => 'sort-asc', 'fa-sort-desc' => 'sort-desc', 'fa-sort-down' => 'sort-down', 'fa-sort-numeric-asc' => 'sort-numeric-asc', 'fa-sort-numeric-desc' => 'sort-numeric-desc', 'fa-sort-up' => 'sort-up', 'fa-soundcloud' => 'soundcloud', 'fa-space-shuttle' => 'space-shuttle', 'fa-spinner' => 'spinner', 'fa-spoon' => 'spoon', 'fa-spotify' => 'spotify', 'fa-square' => 'square', 'fa-square-o' => 'square-o', 'fa-stack-exchange' => 'stack-exchange', 'fa-stack-overflow' => 'stack-overflow', 'fa-star' => 'star', 'fa-star-half' => 'star-half', 'fa-star-half-empty' => 'star-half-empty', 'fa-star-half-full' => 'star-half-full', 'fa-star-half-o' => 'star-half-o', 'fa-star-o' => 'star-o', 'fa-steam' => 'steam', 'fa-steam-square' => 'steam-square', 'fa-step-backward' => 'step-backward', 'fa-step-forward' => 'step-forward', 'fa-stethoscope' => 'stethoscope', 'fa-stop' => 'stop', 'fa-strikethrough' => 'strikethrough', 'fa-stumbleupon' => 'stumbleupon', 'fa-stumbleupon-circle' => 'stumbleupon-circle', 'fa-subscript' => 'subscript', 'fa-suitcase' => 'suitcase', 'fa-sun-o' => 'sun-o', 'fa-superscript' => 'superscript', 'fa-support' => 'support', 'fa-table' => 'table', 'fa-tablet' => 'tablet', 'fa-tachometer' => 'tachometer', 'fa-tag' => 'tag', 'fa-tags' => 'tags', 'fa-tasks' => 'tasks', 'fa-taxi' => 'taxi', 'fa-tencent-weibo' => 'tencent-weibo', 'fa-terminal' => 'terminal', 'fa-text-height' => 'text-height', 'fa-text-width' => 'text-width', 'fa-th' => 'th', 'fa-th-large' => 'th-large', 'fa-th-list' => 'th-list', 'fa-thumb-tack' => 'thumb-tack', 'fa-thumbs-down' => 'thumbs-down', 'fa-thumbs-o-down' => 'thumbs-o-down', 'fa-thumbs-o-up' => 'thumbs-o-up', 'fa-thumbs-up' => 'thumbs-up', 'fa-ticket' => 'ticket', 'fa-times' => 'times', 'fa-times-circle' => 'times-circle', 'fa-times-circle-o' => 'times-circle-o', 'fa-tint' => 'tint', 'fa-toggle-down' => 'toggle-down', 'fa-toggle-left' => 'toggle-left', 'fa-toggle-off' => 'toggle-off', 'fa-toggle-on' => 'toggle-on', 'fa-toggle-right' => 'toggle-right', 'fa-toggle-up' => 'toggle-up', 'fa-trash' => 'trash', 'fa-trash-o' => 'trash-o', 'fa-tree' => 'tree', 'fa-trello' => 'trello', 'fa-trophy' => 'trophy', 'fa-truck' => 'truck', 'fa-try' => 'try', 'fa-tty' => 'tty', 'fa-tumblr' => 'tumblr', 'fa-tumblr-square' => 'tumblr-square', 'fa-turkish-lira' => 'turkish-lira', 'fa-twitch' => 'twitch', 'fa-twitter' => 'twitter', 'fa-twitter-square' => 'twitter-square', 'fa-umbrella' => 'umbrella', 'fa-underline' => 'underline', 'fa-undo' => 'undo', 'fa-university' => 'university', 'fa-unlink' => 'unlink', 'fa-unlock' => 'unlock', 'fa-unlock-alt' => 'unlock-alt', 'fa-unsorted' => 'unsorted', 'fa-upload' => 'upload', 'fa-usd' => 'usd', 'fa-user' => 'user', 'fa-user-md' => 'user-md', 'fa-users' => 'users', 'fa-video-camera' => 'video-camera', 'fa-vimeo-square' => 'vimeo-square', 'fa-vine' => 'vine', 'fa-vk' => 'vk', 'fa-volume-down' => 'volume-down', 'fa-volume-off' => 'volume-off', 'fa-volume-up' => 'volume-up', 'fa-warning' => 'warning', 'fa-wechat' => 'wechat', 'fa-weibo' => 'weibo', 'fa-weixin' => 'weixin', 'fa-wheelchair' => 'wheelchair', 'fa-wifi' => 'wifi', 'fa-windows' => 'windows', 'fa-won' => 'won', 'fa-wordpress' => 'wordpress', 'fa-wrench' => 'wrench', 'fa-xing' => 'xing', 'fa-xing-square' => 'xing-square', 'fa-yahoo' => 'yahoo', 'fa-yelp' => 'yelp', 'fa-yen' => 'yen', 'fa-youtube' => 'youtube', 'fa-youtube-play' => 'youtube-play', 'fa-youtube-square' => 'youtube-square' );

/* ===== Page Settings ===== */

	$meta_boxes['page_settings'] = array(
		'id'         => 'page_settings',
		'title'      => __( 'Page Settings', 'pc' ),
		'priority'   => 'default',
		'object_types' => array( 'page', ), // Post type
		'fields'     => array(
			array(
				'name' => __( 'Hide Title', 'pc' ),
				'id'   => $prefix . 'disable-title',
				'type' => 'checkbox',
			),
			array(
				'name'    => __( 'Title Icon', 'pc' ),
				'desc'    => __( 'choose the icon from <a href="http://fontawesome.io/icons/" target="_blank">FontAwesome</a> collection', 'pc' ),
				'id'      => $prefix . 'page-icon',
				'type'    => 'select',
				'options' => $icons
			),
			array(
				'name'    => __( 'Slider', 'pc' ),
				'id'      => $prefix . 'page_media',
				'type'    => 'select',
				'options' => $sliders,
			),
		)
	);

/* ===== Counter ===== */

	$meta_boxes['slider-video'] = array(
		'id'         => 'slider-video',
		'title'      => __( 'Slider / Video Settings', 'pc' ),
		'object_types' => array( 'pc_slider', ),
		'fields'     => array(
			array(
				'name'    => __( 'Media Option', 'pc' ),
				'id'      => $prefix . 'media-option',
				'type'    => 'select',
				'options' => array(
					'slider' => __( 'Slider', 'pc' ),
					'video' => __( 'Video', 'pc' )
				),
			),
			array(
				'name' => __( 'Slider / Video Height', 'pc' ),
				'desc' => __( 'In %, relative to screen height. Example: 20, 50, 80. Leave empty or set 100 to have a fullscreen slider.', 'pc' ),
				'id'   => $prefix . 'height',
				'type' => 'text_small',
			),
			
			array(
				'name'    => __( 'Main Title', 'pc' ),
				'id'      => $prefix . 'main-title',
				'type'    => 'text',
			),
			array(
				'name'    => __( 'First Subtitle', 'pc' ),
				'id'      => $prefix . 'first-subtitle',
				'type'    => 'text',
			),
			array(
				'name'    => __( 'Separator Icon', 'pc' ),
				'desc'    => __( 'choose the icon from <a href="http://fontawesome.io/icons/" target="_blank">FontAwesome</a> collection', 'pc' ),
				'id'      => $prefix . 'separator-icon',
				'type'    => 'select',
				'options' => $icons
			),
			array(
				'name'    => __( 'Second Subtitle', 'pc' ),
				'id'      => $prefix . 'second-subtitle',
				'type'    => 'text',
			),
			array(
			    'name' => 'Target Date (for countdown)',
			    'id'   => $prefix . 'date',
			    'type' => 'text_datetime_timestamp',
			    'default' => 0,
			),
			array(
				'name' => 'Disable Countdown',
				'id'   => $prefix . 'disable_countdown',
				'type' => 'checkbox',
			),
		),
	);

	$meta_boxes['slider_images'] = array(
		'id'         => 'slider_images',
		'title'      => __( 'Slider Settings', 'pc' ),
		'object_types' => array( 'pc_slider', ),
		'fields'     => array(
			array(
			    'name' => 'Slider Images',
			    'desc' => '',
			    'id' => $prefix . 'slides',
			    'type' => 'file_list',
			    'preview_size' => array( 100, 100 ),
			),
			array(
				'name' => __( 'Pause Time', 'pc' ),
				'desc' => __( 'Interval between slide change, in milliseconds (1 second = 1000 milliseconds). Set to 0 to disable automatic sliding.', 'pc' ),
				'id'   => $prefix . 'time',
				'type' => 'text_medium',
				'default' => '5000'
			),
			array(
				'name' => __( 'Animation Speed', 'pc' ),
				'desc' => __( 'Interval between slide change, in milliseconds (1 second = 1000 milliseconds). Set to 0 to disable automatic sliding.', 'pc' ),
				'id'   => $prefix . 'speed',
				'type' => 'text_medium',
				'default' => '1500'
			),
		),
	);

/* ===== Section Video ===== */

	$meta_boxes['video'] = array(
		'id'         => 'video',
		'title'      => __( 'Video Settings', 'cmb' ),
		'object_types' => array( 'pc_slider', ),
		'fields'     => array(
			array(
				'name' => 'MP4',
				'id'   => $prefix . 'video-mp4',
				'type' => 'file',
			),
			array(
				'name' => 'WEBM',
				'id'   => $prefix . 'video-webm',
				'type' => 'file',
			),
			array(
				'name' => 'OGV',
				'id'   => $prefix . 'video-ogv',
				'type' => 'file',
			),
			array(
				'name' => __( 'Preview Image', 'cmb' ),
				'id'   => $prefix . 'preview-image',
				'type' => 'file',
			),
			array(
				'name'    => __( 'Autoplay', 'cmb' ),
				'id'      => $prefix . 'video-autoplay',
				'type'    => 'select',
				'options' => array(
					'yes' => __( 'Yes', 'cmb' ),
					'no' => __( 'No', 'cmb' )
				)
			),
			array(
				'name'    => __( 'Loop', 'cmb' ),
				'id'      => $prefix . 'video-loop',
				'type'    => 'select',
				'options' => array(
					'yes' => __( 'Yes', 'cmb' ),
					'no' => __( 'No', 'cmb' )
				) 
			),
		),
	);


/* ===== Section Map ===== */

	$meta_boxes['section_map'] = array(
		'id'         => 'section_map',
		'title'      => __( 'Map Settings', 'pc' ),
		'object_types' => array( 'page', ),
		'show_on'    => array( 'key' => 'page-template', 'value' => 'page-section-map.php' ),
		'context'    => 'normal',
		'priority'   => 'default',
		'fields'     => array(
			array(
				'name'    => __( 'Min Height', 'pc' ),
				'id'      => $prefix . 'min-height',
				'type'    => 'text',
				'desc'    => 'Minimal height of the section. Set in pixels, example: 350.',
			),
			array(
				'name'    => __( 'Min Center Latitude', 'pc' ),
				'id'      => $prefix . 'map-center-lat',
				'type'    => 'text',
				'desc'    => 'Example: 30.000000',
			),
			array(
				'name'    => __( 'Min Center Longitude', 'pc' ),
				'id'      => $prefix . 'map-center-lng',
				'type'    => 'text',
				'desc'    => 'Example: 31.000000',
			),
			array(
				'name'    => __( 'Map Zoom', 'pc' ),
				'id'      => $prefix . 'map-zoom',
				'type'    => 'text',
				'desc'    => 'Number from 0 to 21.',
			),
			array(
				'name'    => __( 'Map Type', 'pc' ),
				'id'      => $prefix . 'map-type',
				'type'    => 'select',
				'options' => array(
					'ROADMAP' => 'Roadmap',
					'SATELLITE' => 'Satellite',
					'HYBRID' => 'Hybrid',
					'TERRAIN' => 'Terrain'
				),
			),
			array(
				'name'       => __( 'Marker Icon', 'pc' ),
				'id'          => $prefix . 'map-marker',
				'type'        => 'file',
			),
			array(
				'id'          => $prefix . 'locations',
				'type'        => 'group',
				'options'     => array(
					'group_title'   => __( 'Add Map Locations', 'pc' ), // {#} gets replaced by row number
					'add_button'    => __( 'Add Location', 'pc' ),
					'remove_button' => __( 'Remove Location', 'pc' ),
					'sortable'      => true, // beta
				),
				// Fields array works the same, except id's only need to be unique for this group. Prefix is not needed.
				'fields' => array(
					array(
						'name' => 'Title',
						'id'   => 'title',
						'type' => 'text',
						'validate' => 'js'
					),
			        array(
			            'name' => 'Latitude (find at <a href="http://www.latlong.net/">http://www.latlong.net/</a>)',
			            'id'   => 'map-lat',
			            'type' => 'text',
			            'desc' => 'Example: 30.000000',
			        ),
			        array(
			            'name' => 'Longitude (find at <a href="http://www.latlong.net/">http://www.latlong.net/</a>)',
			            'id'   => 'map-lng',
			            'type' => 'text',
			            'desc' => 'Example: 31.000000',
			        ),
			        array(
			            'name' => 'Popup Content',
			            'description' => 'Write a short description for this entry.',
			            'id'   => 'location-content',
			            'type' => 'textarea_small',
			            'validate' => 'js'
			        ),
				),
			),
		)
	);



/* ===== Section Image ===== */

	$meta_boxes['section_image'] = array(
		'id'         => 'section_image',
		'title'      => __( 'Background Image Settings', 'pc' ),
		'object_types' => array( 'page', ),
		'show_on'    => array( 'key' => 'page-template', 'value' => 'page-section-image-bg.php' ),
		'context'    => 'normal',
		'priority'   => 'default',
		'fields'     => array(
			array(
				'name' => __( 'Background Image', 'pc' ),
				'id'   => $prefix . 'bg-image',
				'type' => 'file',
			),
			array(
				'name'    => __( 'Background Color', 'pc' ),
				'id'      => $prefix . 'bg-color',
				'type'    => 'colorpicker',
			),
			array(
				'name'    => __( 'Background Repeat', 'pc' ),
				'id'      => $prefix . 'bg-repeat',
				'type'    => 'select',
				'options' => array(
					'no-repeat' => __( 'no repeat', 'pc' ),
					'repeat'    => __( 'repeat', 'pc' ),
					'repeat-x'  => __( 'repeat X', 'pc' ),
					'repeat-y'  => __( 'repeat Y', 'pc' ),
				)
			),
			array(
				'name'    => __( 'Background Position', 'pc' ),
				'id'      => $prefix . 'bg-position',
				'type'    => 'select',
				'options' => array(
					'left top'       => __( 'left top', 'pc' ),
					'left center'    => __( 'left center', 'pc' ),
					'left bottom'    => __( 'left bottom', 'pc' ),
					'right top'      => __( 'right top', 'pc' ),
					'right center'   => __( 'right center', 'pc' ),
					'right bottom'   => __( 'right bottom', 'pc' ),
					'center top'     => __( 'center top', 'pc' ),
					'center center'  => __( 'center center', 'pc' ),
					'center bottom'  => __( 'center bottom', 'pc' ),
				)
			),
			array(
				'name'    => __( 'Background Size', 'pc' ),
				'id'      => $prefix . 'bg-size',
				'type'    => 'select',
				'options' => array(
					'auto' => __( 'Auto', 'pc' ),
					'cover' => __( 'Cover', 'pc' ),
				)
			),
		),
	);



/* ===== Post Settings ===== */

	$meta_boxes['post_settings'] = array(
		'id'         => 'post_settings',
		'title'      => __( 'Post Settings', 'pc' ),
		'object_types' => array( 'post', ), // Post type
		'context'    => 'normal',
		'priority'   => 'default',
		'show_names' => true, // Show field names on the left
		'fields'     => array(
			array(
				'name'       => __( 'Event Date', 'pc' ),
				'id'         => $prefix . 'event-date',
				'type'       => 'text',
			),
		)
	);

	// Add other metaboxes as needed

	return $meta_boxes;
}