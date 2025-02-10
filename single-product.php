<?php
/* Template Name: Single Product */
get_header();
/*
global $wpdb;

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
<div class="container mt-4">
    <!-- Breadcrumbs -->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light p-2 rounded">
            <li class="breadcrumb-item"><a href="<?= esc_url(home_url('/')); ?>">Home</a></li>
            <li class="breadcrumb-item"><a href="<?= esc_url(home_url('/products')); ?>">Products</a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= esc_html($product->name); ?></li>
        </ol>
    </nav>

    <div class="row">
        <!-- Left Column - Product Image -->
        <div class="col-md-6">
            <img src="<?= esc_url($product->image_url); ?>" class="img-fluid rounded shadow-sm"
                alt="<?= esc_attr($product->name); ?>">
        </div>

        <!-- Right Column - Product Details -->
        <div class="col-md-6 d-flex flex-column justify-content-center">
            <h2><?= esc_html($product->name); ?></h2>
            <p class="text-muted"><?= esc_html($product->category); ?></p>
            <p class="lead"><?= esc_html($product->description); ?></p>
            <h4 class="text-primary">$<?= esc_html($product->price); ?></h4>

            <!-- Call-to-Action Button -->
            <a href="#" class="btn btn-success mt-3">Buy Now</a>
        </div>
    </div>
</div>

<?php get_footer(); ?>
