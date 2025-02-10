<?php
/* Template Name: Product */
get_header();
?>

<div class="container my-5">
    <h1 class="text-center mb-4">Our Products</h1>

    <div class="row">
        <?php
        // Example product data (Replace with database query later)
        $products = [
            ['id' => 1, 'name' => 'Product 1', 'price' => '$29.99', 'image' => 'https://via.placeholder.com/300', 'description' => 'Short description of product 1.'],
            ['id' => 2, 'name' => 'Product 2', 'price' => '$49.99', 'image' => 'https://via.placeholder.com/300', 'description' => 'Short description of product 2.'],
            ['id' => 3, 'name' => 'Product 3', 'price' => '$19.99', 'image' => 'https://via.placeholder.com/300', 'description' => 'Short description of product 3.'],
        ];

        /*
        global $wpdb;
        $products = $wpdb->get_results("SELECT * FROM wp_products ORDER BY created_at DESC");
        */

        foreach ($products as $product): ?>
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <img src="<?= esc_url($product['image']); ?>" class="card-img-top"
                        alt="<?= esc_attr($product['name']); ?>">
                    <div class="card-body text-center">
                        <h5 class="card-title"><?= esc_html($product['name']); ?></h5>
                        <p class="card-text text-muted"><?= esc_html($product['description']); ?></p>
                        <p class="font-weight-bold"><?= esc_html($product['price']); ?></p>
                        <a href="product-detail.php?id=<?= $product['id']; ?>" class="btn btn-primary">View Product</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php get_footer(); ?>