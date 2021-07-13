<?php theme_add_template_option('Blog Template', 'blogTemplate', __('Blog Template (default)', 'default')); ?>
<?php theme_add_template_query_option('Blog Template', 'blogTemplate', __('Blog Template (default)', 'default')); ?>
<?php theme_add_template_option('Post Template', 'postTemplate', __('Post Template (default)', 'default')); ?>
<?php theme_add_template_query_option('Post Template', 'postTemplate', __('Post Template (default)', 'default')); ?>
<?php if (theme_woocommerce_enabled()) theme_add_template_option('Products Template', 'productsTemplate', __('Products Template (default)', 'default')); ?>
<?php if (theme_woocommerce_enabled()) theme_add_template_option('Product Template', 'productTemplate', __('Product Template (default)', 'default')); ?>
<?php if (theme_woocommerce_enabled()) theme_add_template_option('Shopping Cart Template', 'shoppingCartTemplate', __('Shopping Cart Template (default)', 'default')); ?>
