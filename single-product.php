<?php
/* Template Name: Single Product */
get_header();
/*global $wpdb;

// Get product ID from URL
$product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Fetch product from the database
$product = $wpdb->get_row($wpdb->prepare("SELECT * FROM wp_products WHERE id = %d", $product_id));


if (!$product) {
    echo "<div class='container mt-5'><h2>Product not found!</h2></div>";
    get_footer();
    exit;
}
*/
?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-6">
            <img src="<?= esc_url($product->image_url); ?>" class="img-fluid rounded"
                alt="<?= esc_attr($product->name); ?>">
        </div>
        <div class="col-md-6">
            <h2><?= esc_html($product->name); ?></h2>
            <p class="text-muted"><?= esc_html($product->category); ?></p>
            <p class="lead"><?= esc_html($product->description); ?></p>
            <h4 class="text-primary">$<?= esc_html($product->price); ?></h4>
        </div>
    </div>
</div>

<?php get_footer(); ?>