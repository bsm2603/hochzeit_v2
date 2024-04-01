<?php

add_action( 'init', 'pc_integrateVC');
 
function pc_integrateVC() {

$target_arr = array( __("Same window", "pc") => "_self", __("New window", "pc") => "_blank" );

$animations =  array( "none" => "none", "bounce" => "bounce", "flash" => "flash", "pulse" => "pulse", "rubberBand" => "rubberBand", "shake" => "shake", "swing" => "swing", "tada" => "tada", "wobble" => "wobble", "bounceIn" => "bounceIn", "bounceInDown" => "bounceInDown", "bounceInLeft" => "bounceInLeft", "bounceInRight" => "bounceInRight", "bounceInUp" => "bounceInUp", "fadeIn" => "fadeIn", "fadeInDown" => "fadeInDown", "fadeInDownBig" => "fadeInDownBig", "fadeInLeft" => "fadeInLeft", "fadeInLeftBig" => "fadeInLeftBig", "fadeInRight" => "fadeInRight", "fadeInRightBig" => "fadeInRightBig", "fadeInUp" => "fadeInUp", "fadeInUpBig" => "fadeInUpBig", "flip" => "flip", "flipInX" => "flipInX", "flipInY" => "flipInY", "lightSpeedIn" => "lightSpeedIn", "rotateIn" => "rotateIn", "rotateInDownLeft" => "rotateInDownLeft", "rotateInDownRight" => "rotateInDownRight", "rotateInUpLeft" => "rotateInUpLeft", "rotateInUpRight" => "rotateInUpRight", "slideInDown" => "slideInDown", "slideInLeft" => "slideInLeft", "slideInRight" => "slideInRight", "hinge" => "hinge", "rollIn" => "rollIn" );

$icons = array( 'fa-adjust' => 'adjust', 'fa-anchor' => 'anchor', 'fa-archive' => 'archive', 'fa-arrows' => 'arrows', 'fa-arrows-h' => 'arrows-h', 'fa-arrows-v' => 'arrows-v', 'fa-asterisk' => 'asterisk', 'fa-automobile' => 'automobile', 'fa-ban' => 'ban', 'fa-bank' => 'bank', 'fa-bar-chart-o' => 'bar-chart-o', 'fa-barcode' => 'barcode', 'fa-bars' => 'bars', 'fa-beer' => 'beer', 'fa-bell' => 'bell', 'fa-bell-o' => 'bell-o', 'fa-bolt' => 'bolt', 'fa-bomb' => 'bomb', 'fa-book' => 'book', 'fa-bookmark' => 'bookmark', 'fa-bookmark-o' => 'bookmark-o', 'fa-briefcase' => 'briefcase', 'fa-bug' => 'bug', 'fa-building' => 'building', 'fa-building-o' => 'building-o', 'fa-bullhorn' => 'bullhorn', 'fa-bullseye' => 'bullseye', 'fa-cab' => 'cab', 'fa-calendar' => 'calendar', 'fa-calendar-o' => 'calendar-o', 'fa-camera' => 'camera', 'fa-camera-retro' => 'camera-retro', 'fa-car' => 'car', 'fa-caret-square-o-down' => 'caret-square-o-down', 'fa-caret-square-o-left' => 'caret-square-o-left', 'fa-caret-square-o-right' => 'caret-square-o-right', 'fa-caret-square-o-up' => 'caret-square-o-up', 'fa-certificate' => 'certificate', 'fa-check' => 'check', 'fa-check-circle' => 'check-circle', 'fa-check-circle-o' => 'check-circle-o', 'fa-check-square' => 'check-square', 'fa-check-square-o' => 'check-square-o', 'fa-child' => 'child', 'fa-circle' => 'circle', 'fa-circle-o' => 'circle-o', 'fa-circle-o-notch' => 'circle-o-notch', 'fa-circle-thin' => 'circle-thin', 'fa-clock-o' => 'clock-o', 'fa-cloud' => 'cloud', 'fa-cloud-download' => 'cloud-download', 'fa-cloud-upload' => 'cloud-upload', 'fa-code' => 'code', 'fa-code-fork' => 'code-fork', 'fa-coffee' => 'coffee', 'fa-cog' => 'cog', 'fa-cogs' => 'cogs', 'fa-comment' => 'comment', 'fa-comment-o' => 'comment-o', 'fa-comments' => 'comments', 'fa-comments-o' => 'comments-o', 'fa-compass' => 'compass', 'fa-credit-card' => 'credit-card', 'fa-crop' => 'crop', 'fa-crosshairs' => 'crosshairs', 'fa-cube' => 'cube', 'fa-cubes' => 'cubes', 'fa-cutlery' => 'cutlery', 'fa-dashboard' => 'dashboard', 'fa-database' => 'database', 'fa-desktop' => 'desktop', 'fa-dot-circle-o' => 'dot-circle-o', 'fa-download' => 'download', 'fa-edit' => 'edit', 'fa-ellipsis-h' => 'ellipsis-h', 'fa-ellipsis-v' => 'ellipsis-v', 'fa-envelope' => 'envelope', 'fa-envelope-o' => 'envelope-o', 'fa-envelope-square' => 'envelope-square', 'fa-eraser' => 'eraser', 'fa-exchange' => 'exchange', 'fa-exclamation' => 'exclamation', 'fa-exclamation-circle' => 'exclamation-circle', 'fa-exclamation-triangle' => 'exclamation-triangle', 'fa-external-link' => 'external-link', 'fa-external-link-square' => 'external-link-square', 'fa-eye' => 'eye', 'fa-eye-slash' => 'eye-slash', 'fa-fax' => 'fax', 'fa-female' => 'female', 'fa-fighter-jet' => 'fighter-jet', 'fa-file-archive-o' => 'file-archive-o', 'fa-file-audio-o' => 'file-audio-o', 'fa-file-code-o' => 'file-code-o', 'fa-file-excel-o' => 'file-excel-o', 'fa-file-image-o' => 'file-image-o', 'fa-file-movie-o' => 'file-movie-o', 'fa-file-pdf-o' => 'file-pdf-o', 'fa-file-photo-o' => 'file-photo-o', 'fa-file-picture-o' => 'file-picture-o', 'fa-file-powerpoint-o' => 'file-powerpoint-o', 'fa-file-sound-o' => 'file-sound-o', 'fa-file-video-o' => 'file-video-o', 'fa-file-word-o' => 'file-word-o', 'fa-file-zip-o' => 'file-zip-o', 'fa-film' => 'film', 'fa-filter' => 'filter', 'fa-fire' => 'fire', 'fa-fire-extinguisher' => 'fire-extinguisher', 'fa-flag' => 'flag', 'fa-flag-checkered' => 'flag-checkered', 'fa-flag-o' => 'flag-o', 'fa-flash' => 'flash', 'fa-flask' => 'flask', 'fa-folder' => 'folder', 'fa-folder-o' => 'folder-o', 'fa-folder-open' => 'folder-open', 'fa-folder-open-o' => 'folder-open-o', 'fa-frown-o' => 'frown-o', 'fa-gamepad' => 'gamepad', 'fa-gavel' => 'gavel', 'fa-gear' => 'gear', 'fa-gears' => 'gears', 'fa-gift' => 'gift', 'fa-glass' => 'glass', 'fa-globe' => 'globe', 'fa-graduation-cap' => 'graduation-cap', 'fa-group' => 'group', 'fa-hdd-o' => 'hdd-o', 'fa-headphones' => 'headphones', 'fa-heart' => 'heart', 'fa-heart-o' => 'heart-o', 'fa-history' => 'history', 'fa-home' => 'home', 'fa-image' => 'image', 'fa-inbox' => 'inbox', 'fa-info' => 'info', 'fa-info-circle' => 'info-circle', 'fa-institution' => 'institution', 'fa-key' => 'key', 'fa-keyboard-o' => 'keyboard-o', 'fa-language' => 'language', 'fa-laptop' => 'laptop', 'fa-leaf' => 'leaf', 'fa-legal' => 'legal', 'fa-lemon-o' => 'lemon-o', 'fa-level-down' => 'level-down', 'fa-level-up' => 'level-up', 'fa-life-bouy' => 'life-bouy', 'fa-life-ring' => 'life-ring', 'fa-life-saver' => 'life-saver', 'fa-lightbulb-o' => 'lightbulb-o', 'fa-location-arrow' => 'location-arrow', 'fa-lock' => 'lock', 'fa-magic' => 'magic', 'fa-magnet' => 'magnet', 'fa-mail-forward' => 'mail-forward', 'fa-mail-reply' => 'mail-reply', 'fa-mail-reply-all' => 'mail-reply-all', 'fa-male' => 'male', 'fa-map-marker' => 'map-marker', 'fa-meh-o' => 'meh-o', 'fa-microphone' => 'microphone', 'fa-microphone-slash' => 'microphone-slash', 'fa-minus' => 'minus', 'fa-minus-circle' => 'minus-circle', 'fa-minus-square' => 'minus-square', 'fa-minus-square-o' => 'minus-square-o', 'fa-mobile' => 'mobile', 'fa-mobile-phone' => 'mobile-phone', 'fa-money' => 'money', 'fa-moon-o' => 'moon-o', 'fa-mortar-board' => 'mortar-board', 'fa-music' => 'music', 'fa-navicon' => 'navicon', 'fa-paper-plane' => 'paper-plane', 'fa-paper-plane-o' => 'paper-plane-o', 'fa-paw' => 'paw', 'fa-pencil' => 'pencil', 'fa-pencil-square' => 'pencil-square', 'fa-pencil-square-o' => 'pencil-square-o', 'fa-phone' => 'phone', 'fa-phone-square' => 'phone-square', 'fa-photo' => 'photo', 'fa-picture-o' => 'picture-o', 'fa-plane' => 'plane', 'fa-plus' => 'plus', 'fa-plus-circle' => 'plus-circle', 'fa-plus-square' => 'plus-square', 'fa-plus-square-o' => 'plus-square-o', 'fa-power-off' => 'power-off', 'fa-print' => 'print', 'fa-puzzle-piece' => 'puzzle-piece', 'fa-qrcode' => 'qrcode', 'fa-question' => 'question', 'fa-question-circle' => 'question-circle', 'fa-quote-left' => 'quote-left', 'fa-quote-right' => 'quote-right', 'fa-random' => 'random', 'fa-recycle' => 'recycle', 'fa-refresh' => 'refresh', 'fa-reorder' => 'reorder', 'fa-reply' => 'reply', 'fa-reply-all' => 'reply-all', 'fa-retweet' => 'retweet', 'fa-road' => 'road', 'fa-rocket' => 'rocket', 'fa-rss' => 'rss', 'fa-rss-square' => 'rss-square', 'fa-search' => 'search', 'fa-search-minus' => 'search-minus', 'fa-search-plus' => 'search-plus', 'fa-send' => 'send', 'fa-send-o' => 'send-o', 'fa-share' => 'share', 'fa-share-alt' => 'share-alt', 'fa-share-alt-square' => 'share-alt-square', 'fa-share-square' => 'share-square', 'fa-share-square-o' => 'share-square-o', 'fa-shield' => 'shield', 'fa-shopping-cart' => 'shopping-cart', 'fa-sign-in' => 'sign-in', 'fa-sign-out' => 'sign-out', 'fa-signal' => 'signal', 'fa-sitemap' => 'sitemap', 'fa-sliders' => 'sliders', 'fa-smile-o' => 'smile-o', 'fa-sort' => 'sort', 'fa-sort-alpha-asc' => 'sort-alpha-asc', 'fa-sort-alpha-desc' => 'sort-alpha-desc', 'fa-sort-amount-asc' => 'sort-amount-asc', 'fa-sort-amount-desc' => 'sort-amount-desc', 'fa-sort-asc' => 'sort-asc', 'fa-sort-desc' => 'sort-desc', 'fa-sort-down' => 'sort-down', 'fa-sort-numeric-asc' => 'sort-numeric-asc', 'fa-sort-numeric-desc' => 'sort-numeric-desc', 'fa-sort-up' => 'sort-up', 'fa-space-shuttle' => 'space-shuttle', 'fa-spinner' => 'spinner', 'fa-spoon' => 'spoon', 'fa-square' => 'square', 'fa-square-o' => 'square-o', 'fa-star' => 'star', 'fa-star-half' => 'star-half', 'fa-star-half-empty' => 'star-half-empty', 'fa-star-half-full' => 'star-half-full', 'fa-star-half-o' => 'star-half-o', 'fa-star-o' => 'star-o', 'fa-suitcase' => 'suitcase', 'fa-sun-o' => 'sun-o', 'fa-support' => 'support', 'fa-tablet' => 'tablet', 'fa-tachometer' => 'tachometer', 'fa-tag' => 'tag', 'fa-tags' => 'tags', 'fa-tasks' => 'tasks', 'fa-taxi' => 'taxi', 'fa-terminal' => 'terminal', 'fa-thumb-tack' => 'thumb-tack', 'fa-thumbs-down' => 'thumbs-down', 'fa-thumbs-o-down' => 'thumbs-o-down', 'fa-thumbs-o-up' => 'thumbs-o-up', 'fa-thumbs-up' => 'thumbs-up', 'fa-ticket' => 'ticket', 'fa-times' => 'times', 'fa-times-circle' => 'times-circle', 'fa-times-circle-o' => 'times-circle-o', 'fa-tint' => 'tint', 'fa-toggle-down' => 'toggle-down', 'fa-toggle-left' => 'toggle-left', 'fa-toggle-right' => 'toggle-right', 'fa-toggle-up' => 'toggle-up', 'fa-trash-o' => 'trash-o', 'fa-tree' => 'tree', 'fa-trophy' => 'trophy', 'fa-truck' => 'truck', 'fa-umbrella' => 'umbrella', 'fa-university' => 'university', 'fa-unlock' => 'unlock', 'fa-unlock-alt' => 'unlock-alt', 'fa-unsorted' => 'unsorted', 'fa-upload' => 'upload', 'fa-user' => 'user', 'fa-users' => 'users', 'fa-video-camera' => 'video-camera', 'fa-volume-down' => 'volume-down', 'fa-volume-off' => 'volume-off', 'fa-volume-up' => 'volume-up', 'fa-warning' => 'warning', 'fa-wheelchair' => 'wheelchair', 'fa-wrench' => 'wrench', 'fa-file' => 'file', 'fa-file-archive-o' => 'file-archive-o', 'fa-file-audio-o' => 'file-audio-o', 'fa-file-code-o' => 'file-code-o', 'fa-file-excel-o' => 'file-excel-o', 'fa-file-image-o' => 'file-image-o', 'fa-file-movie-o' => 'file-movie-o', 'fa-file-o' => 'file-o', 'fa-file-pdf-o' => 'file-pdf-o', 'fa-file-photo-o' => 'file-photo-o', 'fa-file-picture-o' => 'file-picture-o', 'fa-file-powerpoint-o' => 'file-powerpoint-o', 'fa-file-sound-o' => 'file-sound-o', 'fa-file-text' => 'file-text', 'fa-file-text-o' => 'file-text-o', 'fa-file-video-o' => 'file-video-o', 'fa-file-word-o' => 'file-word-o', 'fa-file-zip-o' => 'file-zip-o', 'fa-circle-o-notch' => 'circle-o-notch', 'fa-cog' => 'cog', 'fa-gear' => 'gear', 'fa-refresh' => 'refresh', 'fa-spinner' => 'spinner', 'fa-check-square' => 'check-square', 'fa-check-square-o' => 'check-square-o', 'fa-circle' => 'circle', 'fa-circle-o' => 'circle-o', 'fa-dot-circle-o' => 'dot-circle-o', 'fa-minus-square' => 'minus-square', 'fa-minus-square-o' => 'minus-square-o', 'fa-plus-square' => 'plus-square', 'fa-plus-square-o' => 'plus-square-o', 'fa-square' => 'square', 'fa-square-o' => 'square-o', 'fa-bitcoin' => 'bitcoin', 'fa-btc' => 'btc', 'fa-cny' => 'cny', 'fa-dollar' => 'dollar', 'fa-eur' => 'eur', 'fa-euro' => 'euro', 'fa-gbp' => 'gbp', 'fa-inr' => 'inr', 'fa-jpy' => 'jpy', 'fa-krw' => 'krw', 'fa-money' => 'money', 'fa-rmb' => 'rmb', 'fa-rouble' => 'rouble', 'fa-rub' => 'rub', 'fa-ruble' => 'ruble', 'fa-rupee' => 'rupee', 'fa-try' => 'try', 'fa-turkish-lira' => 'turkish-lira', 'fa-usd' => 'usd', 'fa-won' => 'won', 'fa-yen' => 'yen', 'fa-align-center' => 'align-center', 'fa-align-justify' => 'align-justify', 'fa-align-left' => 'align-left', 'fa-align-right' => 'align-right', 'fa-bold' => 'bold', 'fa-chain' => 'chain', 'fa-chain-broken' => 'chain-broken', 'fa-clipboard' => 'clipboard', 'fa-columns' => 'columns', 'fa-copy' => 'copy', 'fa-cut' => 'cut', 'fa-dedent' => 'dedent', 'fa-eraser' => 'eraser', 'fa-file' => 'file', 'fa-file-o' => 'file-o', 'fa-file-text' => 'file-text', 'fa-file-text-o' => 'file-text-o', 'fa-files-o' => 'files-o', 'fa-floppy-o' => 'floppy-o', 'fa-font' => 'font', 'fa-header' => 'header', 'fa-indent' => 'indent', 'fa-italic' => 'italic', 'fa-link' => 'link', 'fa-list' => 'list', 'fa-list-alt' => 'list-alt', 'fa-list-ol' => 'list-ol', 'fa-list-ul' => 'list-ul', 'fa-outdent' => 'outdent', 'fa-paperclip' => 'paperclip', 'fa-paragraph' => 'paragraph', 'fa-paste' => 'paste', 'fa-repeat' => 'repeat', 'fa-rotate-left' => 'rotate-left', 'fa-rotate-right' => 'rotate-right', 'fa-save' => 'save', 'fa-scissors' => 'scissors', 'fa-strikethrough' => 'strikethrough', 'fa-subscript' => 'subscript', 'fa-superscript' => 'superscript', 'fa-table' => 'table', 'fa-text-height' => 'text-height', 'fa-text-width' => 'text-width', 'fa-th' => 'th', 'fa-th-large' => 'th-large', 'fa-th-list' => 'th-list', 'fa-underline' => 'underline', 'fa-undo' => 'undo', 'fa-unlink' => 'unlink', 'fa-angle-double-down' => 'angle-double-down', 'fa-angle-double-left' => 'angle-double-left', 'fa-angle-double-right' => 'angle-double-right', 'fa-angle-double-up' => 'angle-double-up', 'fa-angle-down' => 'angle-down', 'fa-angle-left' => 'angle-left', 'fa-angle-right' => 'angle-right', 'fa-angle-up' => 'angle-up', 'fa-arrow-circle-down' => 'arrow-circle-down', 'fa-arrow-circle-left' => 'arrow-circle-left', 'fa-arrow-circle-o-down' => 'arrow-circle-o-down', 'fa-arrow-circle-o-left' => 'arrow-circle-o-left', 'fa-arrow-circle-o-right' => 'arrow-circle-o-right', 'fa-arrow-circle-o-up' => 'arrow-circle-o-up', 'fa-arrow-circle-right' => 'arrow-circle-right', 'fa-arrow-circle-up' => 'arrow-circle-up', 'fa-arrow-down' => 'arrow-down', 'fa-arrow-left' => 'arrow-left', 'fa-arrow-right' => 'arrow-right', 'fa-arrow-up' => 'arrow-up', 'fa-arrows' => 'arrows', 'fa-arrows-alt' => 'arrows-alt', 'fa-arrows-h' => 'arrows-h', 'fa-arrows-v' => 'arrows-v', 'fa-caret-down' => 'caret-down', 'fa-caret-left' => 'caret-left', 'fa-caret-right' => 'caret-right', 'fa-caret-square-o-down' => 'caret-square-o-down', 'fa-caret-square-o-left' => 'caret-square-o-left', 'fa-caret-square-o-right' => 'caret-square-o-right', 'fa-caret-square-o-up' => 'caret-square-o-up', 'fa-caret-up' => 'caret-up', 'fa-chevron-circle-down' => 'chevron-circle-down', 'fa-chevron-circle-left' => 'chevron-circle-left', 'fa-chevron-circle-right' => 'chevron-circle-right', 'fa-chevron-circle-up' => 'chevron-circle-up', 'fa-chevron-down' => 'chevron-down', 'fa-chevron-left' => 'chevron-left', 'fa-chevron-right' => 'chevron-right', 'fa-chevron-up' => 'chevron-up', 'fa-hand-o-down' => 'hand-o-down', 'fa-hand-o-left' => 'hand-o-left', 'fa-hand-o-right' => 'hand-o-right', 'fa-hand-o-up' => 'hand-o-up', 'fa-long-arrow-down' => 'long-arrow-down', 'fa-long-arrow-left' => 'long-arrow-left', 'fa-long-arrow-right' => 'long-arrow-right', 'fa-long-arrow-up' => 'long-arrow-up', 'fa-toggle-down' => 'toggle-down', 'fa-toggle-left' => 'toggle-left', 'fa-toggle-right' => 'toggle-right', 'fa-toggle-up' => 'toggle-up', 'fa-arrows-alt' => 'arrows-alt', 'fa-backward' => 'backward', 'fa-compress' => 'compress', 'fa-eject' => 'eject', 'fa-expand' => 'expand', 'fa-fast-backward' => 'fast-backward', 'fa-fast-forward' => 'fast-forward', 'fa-forward' => 'forward', 'fa-pause' => 'pause', 'fa-play' => 'play', 'fa-play-circle' => 'play-circle', 'fa-play-circle-o' => 'play-circle-o', 'fa-step-backward' => 'step-backward', 'fa-step-forward' => 'step-forward', 'fa-stop' => 'stop', 'fa-youtube-play' => 'youtube-play', 'fa-adn' => 'adn', 'fa-android' => 'android', 'fa-apple' => 'apple', 'fa-behance' => 'behance', 'fa-behance-square' => 'behance-square', 'fa-bitbucket' => 'bitbucket', 'fa-bitbucket-square' => 'bitbucket-square', 'fa-bitcoin' => 'bitcoin', 'fa-btc' => 'btc', 'fa-codepen' => 'codepen', 'fa-css3' => 'css3', 'fa-delicious' => 'delicious', 'fa-deviantart' => 'deviantart', 'fa-digg' => 'digg', 'fa-dribbble' => 'dribbble', 'fa-dropbox' => 'dropbox', 'fa-drupal' => 'drupal', 'fa-empire' => 'empire', 'fa-facebook' => 'facebook', 'fa-facebook-square' => 'facebook-square', 'fa-flickr' => 'flickr', 'fa-foursquare' => 'foursquare', 'fa-ge' => 'ge', 'fa-git' => 'git', 'fa-git-square' => 'git-square', 'fa-github' => 'github', 'fa-github-alt' => 'github-alt', 'fa-github-square' => 'github-square', 'fa-gittip' => 'gittip', 'fa-google' => 'google', 'fa-google-plus' => 'google-plus', 'fa-google-plus-square' => 'google-plus-square', 'fa-hacker-news' => 'hacker-news', 'fa-html5' => 'html5', 'fa-instagram' => 'instagram', 'fa-joomla' => 'joomla', 'fa-jsfiddle' => 'jsfiddle', 'fa-linkedin' => 'linkedin', 'fa-linkedin-square' => 'linkedin-square', 'fa-linux' => 'linux', 'fa-maxcdn' => 'maxcdn', 'fa-openid' => 'openid', 'fa-pagelines' => 'pagelines', 'fa-pied-piper' => 'pied-piper', 'fa-pied-piper-alt' => 'pied-piper-alt', 'fa-pied-piper-square' => 'pied-piper-square', 'fa-pinterest' => 'pinterest', 'fa-pinterest-square' => 'pinterest-square', 'fa-qq' => 'qq', 'fa-ra' => 'ra', 'fa-rebel' => 'rebel', 'fa-reddit' => 'reddit', 'fa-reddit-square' => 'reddit-square', 'fa-renren' => 'renren', 'fa-share-alt' => 'share-alt', 'fa-share-alt-square' => 'share-alt-square', 'fa-skype' => 'skype', 'fa-slack' => 'slack', 'fa-soundcloud' => 'soundcloud', 'fa-spotify' => 'spotify', 'fa-stack-exchange' => 'stack-exchange', 'fa-stack-overflow' => 'stack-overflow', 'fa-steam' => 'steam', 'fa-steam-square' => 'steam-square', 'fa-stumbleupon' => 'stumbleupon', 'fa-stumbleupon-circle' => 'stumbleupon-circle', 'fa-tencent-weibo' => 'tencent-weibo', 'fa-trello' => 'trello', 'fa-tumblr' => 'tumblr', 'fa-tumblr-square' => 'tumblr-square', 'fa-twitter' => 'twitter', 'fa-twitter-square' => 'twitter-square', 'fa-vimeo-square' => 'vimeo-square', 'fa-vine' => 'vine', 'fa-vk' => 'vk', 'fa-wechat' => 'wechat', 'fa-weibo' => 'weibo', 'fa-weixin' => 'weixin', 'fa-windows' => 'windows', 'fa-wordpress' => 'wordpress', 'fa-xing' => 'xing', 'fa-xing-square' => 'xing-square', 'fa-yahoo' => 'yahoo', 'fa-youtube' => 'youtube', 'fa-youtube-play' => 'youtube-play', 'fa-youtube-square' => 'youtube-square', 'fa-ambulance' => 'ambulance', 'fa-h-square' => 'h-square', 'fa-hospital-o' => 'hospital-o', 'fa-medkit' => 'medkit', 'fa-plus-square' => 'plus-square', 'fa-stethoscope' => 'stethoscope', 'fa-user-md' => 'user-md', 'fa-wheelchair' => 'wheelchair' );

$button_style = array( 'Default' => 'btn-default', 'Primary' => 'btn-primary', 'Success' => 'btn-success', 'Info' => 'btn-info', 'Warning' => 'btn-warning', 'Danger' => 'btn-danger', 'Link' => 'btn-link' );

$button_size = array( 'Default' => '', 'Large' => 'btn-lg', 'Small' => 'btn-sm', 'Extra small' => 'btn-xs' );

$button_target = array( 'Self' => '_self', 'Blank' => '_blank' );

/* Person
-------------------------------------------------------------------------------------------------------------------*/

vc_map( array(
    "name" => __("Person", "pc"),
    "base" => "person",
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
		array(
			"type" => "attach_image",
			"heading" => __('Photo', 'pc'),
			"param_name" => "person_photo"
	    ),
        array(
            "type" => "textfield",
            "heading" => __("Name", "pc"),
            "param_name" => "person_name"
        ),
        array(
            "type" => "textarea",
            "heading" => __("Short Description", "pc"),
            "param_name" => "person_description"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Link", "pc"),
            "description" => __("Optional link.", "wpb"),
            "param_name" => "person_link"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Facebook", "pc"),
            "param_name" => "person_facebook"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Twitter", "pc"),
            "param_name" => "person_twitter"
        ),
        array(
            "type" => "textfield",
            "heading" => __("LinkedIn", "pc"),
            "param_name" => "person_linkedin"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Google+", "pc"),
            "param_name" => "person_google"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Flickr", "pc"),
            "param_name" => "person_flickr"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Pinterest", "pc"),
            "param_name" => "person_pinterest"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Instagram", "pc"),
            "param_name" => "person_instagram"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Vimeo", "pc"),
            "param_name" => "person_vimeo"
        ),
        array(
            "type" => "textfield",
            "heading" => __("YouTune", "pc"),
            "param_name" => "person_youtube"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Email", "pc"),
            "param_name" => "person_email"
        ),
      array(
        "type" => "textfield",
        "heading" => __("Extra class name", "pc"),
        "param_name" => "el_class",
        "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "pc")
      ),
    ),
) );

/* Story
-------------------------------------------------------------------------------------------------------------------*/

vc_map( array(
    "name" => __("Story", "pc"),
    "base" => "story",
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
		array(
			"type" => "attach_image",
			"heading" => __('Photo', 'pc'),
			"param_name" => "story_photo"
	    ),
        array(
            "type" => "textfield",
            "heading" => __("Title", "pc"),
            "param_name" => "story_title"
        ),
        array(
            "type" => "textarea",
            "heading" => __("Short Description", "pc"),
            "param_name" => "story_description"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Link", "pc"),
            "description" => __("Optional link.", "wpb"),
            "param_name" => "story_link"
        ),
      array(
        "type" => "textfield",
        "heading" => __("Extra class name", "pc"),
        "param_name" => "el_class",
        "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "pc")
      ),
    ),
) );

/* Fun Fact
-------------------------------------------------------------------------------------------------------------------*/

vc_map( array(
    "name" => __("Fun Fact", "pc"),
    "base" => "fact",
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
        array(
            "type" => "textfield",
            "heading" => __("Value", "pc"),
            "param_name" => "fact_value"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title", "pc"),
            "param_name" => "fact_title"
        ),
		array(
			"type" => "textfield",
			"heading" => __("Extra class name", "pc"),
			"param_name" => "el_class",
			"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "pc")
		),
    ),
) );

/* Event
-------------------------------------------------------------------------------------------------------------------*/

vc_map( array(
    "name" => __("Event", "pc"),
    "base" => "event",
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
		array(
			"type" => "attach_image",
			"heading" => __('Photo', 'pc'),
			"param_name" => "event_photo"
	    ),
        array(
            "type" => "textfield",
            "heading" => __("Title", "pc"),
            "param_name" => "event_title"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Date", "pc"),
            "param_name" => "event_date"
        ),
        array(
            "type" => "textarea",
            "heading" => __("Short Description", "pc"),
            "param_name" => "event_description"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Link", "pc"),
            "description" => __("Optional link.", "wpb"),
            "param_name" => "event_link"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Button Text", "pc"),
            "description" => __("Will be used if link included.", "wpb"),
            "param_name" => "event_button_text"
        ),
		array(
			"type" => "textfield",
			"heading" => __("Extra class name", "pc"),
			"param_name" => "el_class",
			"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "pc")
		),
    ),
) );

/* Guest
-------------------------------------------------------------------------------------------------------------------*/

vc_map( array(
    "name" => __("Guest", "pc"),
    "base" => "guest",
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
		array(
			"type" => "attach_image",
			"heading" => __('Photo', 'pc'),
			"param_name" => "guest_photo"
	    ),
        array(
            "type" => "textfield",
            "heading" => __("Name", "pc"),
            "param_name" => "guest_name"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Title", "pc"),
            "param_name" => "guest_title"
        ),
        array(
            "type" => "textarea",
            "heading" => __("Short Description", "pc"),
            "param_name" => "guest_description"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Link", "pc"),
            "description" => __("Optional link.", "wpb"),
            "param_name" => "guest_link"
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Alignment", "pc"),
            "param_name" => "guest_alignment",
            "value" => array('Right' => 'right', 'Left' => 'left')
        ),
		array(
			"type" => "textfield",
			"heading" => __("Extra class name", "pc"),
			"param_name" => "el_class",
			"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "pc")
		),
    ),
) );

/* Gallery
-------------------------------------------------------------------------------------------------------------------*/

vc_map( array(
    "name" => __("Gallery", "pc"),
    "base" => "gallery",
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
		array(
			"type" => "attach_images",
			"heading" => __('Photos', 'pc'),
			"param_name" => "ids"
	    ),
        array(
            "type" => "dropdown",
            "heading" => __("Columns", "pc"),
            "param_name" => "columns",
            "value" => array('6' => '6', '4' => '4', '3' => '3', '2' => '2')
        ),
    ),
) );

/* Accomodation
-------------------------------------------------------------------------------------------------------------------*/

vc_map( array(
    "name" => __("Accomodation", "pc"),
    "base" => "accomodation",
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
		array(
			"type" => "attach_image",
			"heading" => __('Photo', 'pc'),
			"param_name" => "accomodation_photo"
	    ),
        array(
            "type" => "textfield",
            "heading" => __("Title", "pc"),
            "param_name" => "accomodation_title"
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Rating", "pc"),
            "param_name" => "accomodation_rating",
            "value" => array(
            	'1 star' => 1,
            	'2 stars' => 2,
            	'3 stars' => 3,
            	'4 stars' => 4,
            	'5 stars' => 5
            )
        ),
        array(
            "type" => "textarea",
            "heading" => __("Short Description", "pc"),
            "param_name" => "accomodation_description"
        ),
        array(
            "type" => "textfield",
            "heading" => __("Link", "pc"),
            "description" => __("Optional link.", "wpb"),
            "param_name" => "accomodation_link"
        ),
        array(
            "type" => "dropdown",
            "heading" => __("Alignment", "pc"),
            "param_name" => "accomodation_alignment",
            "value" => array('Right' => 'right', 'Left' => 'left')
        ),
		array(
			"type" => "textfield",
			"heading" => __("Extra class name", "pc"),
			"param_name" => "el_class",
			"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "pc")
		),
    ),
) );

/* Blog
-------------------------------------------------------------------------------------------------------------------*/

vc_map( array(
    "name" => __("Blog Posts", "pc"),
    "base" => "recent_blog",
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
	    array(
	      "type" => "textfield",
	      "heading" => __("Posts Count", "pc"),
	      "param_name" => "posts_limit",
	    ),
	    array(
	      "type" => "dropdown",
	      "heading" => __("Columns", "pc"),
	      "param_name" => "columns",
	      "value" => array(
	      	__("4", "pc") => 4,
	      	__("3", "pc") => 3,
	      	__("2", "pc") => 2,
	      )
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Extra class name", "pc"),
	      "param_name" => "el_class",
	      "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", "pc")
	    ),
    ),
) );

/* Social / Brand
-------------------------------------------------------------------------------------------------------------------*/

vc_map( array(
    "name" => __("Social / Brand Profiles", "pc"),
    "base" => "social_brand",
    "content_element" => true,
    "show_settings_on_create" => true,
    "params" => array(
	    array(
	      "type" => "textfield",
	      "heading" => __("Behance Title", "pc"),
	      "param_name" => "behance_title",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Behance URL", "pc"),
	      "param_name" => "behance_url",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Deviantart Title", "pc"),
	      "param_name" => "deviantart_title",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Deviantart URL", "pc"),
	      "param_name" => "deviantart_url",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Flickr Title", "pc"),
	      "param_name" => "flickr_title",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Flickr URL", "pc"),
	      "param_name" => "flickr_url",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Reddit Title", "pc"),
	      "param_name" => "reddit_title",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Reddit URL", "pc"),
	      "param_name" => "reddit_url",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Skype Title", "pc"),
	      "param_name" => "skype_title",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Skype URL", "pc"),
	      "param_name" => "skype_url",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Stumbleupon Title", "pc"),
	      "param_name" => "stumbleupon_title",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Stumbleupon URL", "pc"),
	      "param_name" => "stumbleupon_url",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Tumblr Title", "pc"),
	      "param_name" => "tumblr_title",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Tumblr URL", "pc"),
	      "param_name" => "tumblr_url",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Vimeo Title", "pc"),
	      "param_name" => "vimeo_title",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Vimeo URL", "pc"),
	      "param_name" => "vimeo_url",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Weibo Title", "pc"),
	      "param_name" => "weibo_title",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Weibo URL", "pc"),
	      "param_name" => "weibo_url",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Xing Title", "pc"),
	      "param_name" => "xing_title",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Xing URL", "pc"),
	      "param_name" => "xing_url",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("YouTube Title", "pc"),
	      "param_name" => "youtube_title",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("YouTube URL", "pc"),
	      "param_name" => "youtube_url",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Foursquare Title", "pc"),
	      "param_name" => "foursquare_title",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Foursquare URL", "pc"),
	      "param_name" => "foursquare_url",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Google+ Title", "pc"),
	      "param_name" => "google_title",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Google+ URL", "pc"),
	      "param_name" => "google_url",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Linkedin Title", "pc"),
	      "param_name" => "linkedin_title",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Linkedin URL", "pc"),
	      "param_name" => "linkedin_url",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Dribbble Title", "pc"),
	      "param_name" => "dribbble_title",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Dribbble URL", "pc"),
	      "param_name" => "dribbble_url",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Facebook Title", "pc"),
	      "param_name" => "facebook_title",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Facebook URL", "pc"),
	      "param_name" => "facebook_url",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Instagram Title", "pc"),
	      "param_name" => "instagram_title",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Instagram URL", "pc"),
	      "param_name" => "instagram_url",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Pinterest Title", "pc"),
	      "param_name" => "pinterest_title",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Pinterest URL", "pc"),
	      "param_name" => "pinterest_url",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Soundcloud Title", "pc"),
	      "param_name" => "soundcloud_title",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Soundcloud URL", "pc"),
	      "param_name" => "soundcloud_url",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Twitter Title", "pc"),
	      "param_name" => "twitter_title",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("Twitter URL", "pc"),
	      "param_name" => "twitter_url",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("VK Title", "pc"),
	      "param_name" => "vk_title",
	    ),
	    array(
	      "type" => "textfield",
	      "heading" => __("VK URL", "pc"),
	      "param_name" => "vk_url",
	    ),
    ),
) );


// CTA
vc_add_param("vc_button2", array(
      "type" => "dropdown",
      "heading" => __("Style", "pc"),
      "param_name" => "button_style",
      "value" => $button_style
));
vc_add_param("vc_button2", array(
      "type" => "dropdown",
      "heading" => __("Size", "pc"),
      "param_name" => "button_size",
      "value" => $button_size
));
vc_add_param("vc_column", array(
      "type" => "dropdown",
      "heading" => __("Animation Direction", "pc"),
      "param_name" => "animation_direction",
      "value" => array(
	      	__("None", "pc") => 'none',
	      	__("Default (vertical)", "pc") => 'default',
	      	__("From left", "pc") => 'enter from the left',
	      	__("From Right", "pc") => 'enter from the right',
	      	__("From Top", "pc") => 'enter from the top',
	      	__("From Bottom", "pc") => 'enter from the bottom',
      )
));
vc_add_param("vc_column", array(
      "type" => "textfield",
      "heading" => __("Animation Delay", "pc"),
      "param_name" => "animation_delay",
	  "description" => __("In seconds, example: 0.25s.", "pc"),
    )
);
vc_add_param("vc_column", array(
      "type" => "dropdown",
      "heading" => __("Text Align", "pc"),
      "param_name" => "text_align",
      "value" => array(
	      	__("Default", "pc") => 'default',
	      	__("Left", "pc") => 'align-left',
	      	__("Center", "pc") => 'text-center',
	      	__("Right", "pc") => 'align-right',
      )
));

vc_remove_param('vc_button2', 'style');
vc_remove_param('vc_button2', 'color');
vc_remove_param('vc_button2', 'size');

}