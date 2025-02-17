<?php
function csablona_enqueue_styles()
{
    wp_enqueue_style('csablona-style', get_stylesheet_uri());

    wp_enqueue_style('mytheme-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css');

    wp_enqueue_script('mytheme-bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', [], null, true);
}
add_action('wp_enqueue_scripts', 'csablona_enqueue_styles');

function mytheme_setup()
{
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'mytheme_setup');

function custom_breadcrumbs()
{
    if (is_front_page())
        return; // No breadcrumbs on homepage

    echo '<div aria-label="breadcrumb">';
    echo '<ol class="breadcrumb bg-transparent px-3 py-2">';

    // Home Link
    echo '<li class="breadcrumb-item"><a href="' . home_url() . '">Home</a></li>';

    if (is_category() || is_single()) {
        $category = get_the_category();
        if (!empty($category)) {
            echo '<li class="breadcrumb-item"><a href="' . get_category_link($category[0]->term_id) . '">' . $category[0]->name . '</a></li>';
        }
        if (is_single()) {
            echo '<li class="breadcrumb-item active" aria-current="page">' . get_the_title() . '</li>';
        }
    } elseif (is_page() && !is_front_page()) {
        global $post;
        if ($post->post_parent) {
            $parent_id = $post->post_parent;
            $breadcrumbs = [];
            while ($parent_id) {
                $page = get_post($parent_id);
                $breadcrumbs[] = '<li class="breadcrumb-item"><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
                $parent_id = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            echo implode('', $breadcrumbs);
        }
        echo '<li class="breadcrumb-item active" aria-current="page">' . get_the_title() . '</li>';
    } elseif (is_archive()) {
        echo '<li class="breadcrumb-item active" aria-current="page">' . post_type_archive_title('', false) . '</li>';
    } elseif (is_search()) {
        echo '<li class="breadcrumb-item active" aria-current="page">Search results for "' . get_search_query() . '"</li>';
    } elseif (is_404()) {
        echo '<li class="breadcrumb-item active" aria-current="page">Error 404</li>';
    }

    echo '</ol>';
    echo '</div>';
}