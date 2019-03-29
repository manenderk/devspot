<?php
$pageTitle = get_the_title($post->ID);
$pageLink = get_permalink($post->ID);
$breadcrumb = " / <a class='banner-breadcrumb' href='$pageLink'>$pageTitle</a>";
$ancestors = get_ancestors( $post->ID, 'page'); 
foreach($ancestors as $ancestorId){
    $pageTitle = get_the_title($ancestorId);
    $pageLink = get_permalink($ancestorId);
    $breadcrumb = " / <a class='banner-breadcrumb' href='$pageLink'>$pageTitle</a>" . $breadcrumb;
}
$breadcrumb = "<a class='banner-breadcrumb' href='".esc_url( home_url( '/' ) )."'>Home</a>" . $breadcrumb;
echo $breadcrumb;