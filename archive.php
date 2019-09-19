<!--Placeholder file - Main archive folder for the site-->
<header class="page-header">
    <?php the_archive_title('
 
<h2 class="page-title">', '</h2>
 
');
    the_archive_description('
 
<div class="taxonomy-description">', '</div>

');
    ?>
</header>

<!-- .page-header

//------For use when building this page-------
// if ( is_category() || is_archive() ) {
// the_excerpt();
//} else {
// the_content();
//} // -->