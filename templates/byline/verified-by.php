<?php if ( in_array( 'verified-by', $byline ) );?>
<?php
// Check if the 'verified_by' field exists and has a value
$verified_by = get_field('verified_by');

if ($verified_by) {
    // Get the author (user) data by ID
    $author = get_userdata($verified_by);

    if ($author) {
        // Get the author name and the link to their author page
        $author_name = $author->display_name;
        $author_link = get_author_posts_url($verified_by);

        // Display the author name linked to their author page
        echo '<span class="byline-item editor">Verified by: <a href="' . esc_url($author_link) . '">' . esc_html($author_name) . '</a></p>';
    }
}
?>
<?php endif; ?>