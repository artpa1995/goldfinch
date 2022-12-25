<?php
global $paged;
global $wp_query;
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$catObj = $wp_query->get_queried_object();
$catId = $catObj->term_id;
$filterData = $_GET;
$params = ['post_status' => 'publish', 'posts_per_page' => 12, 'paged' => $paged, 'post_type' => 'product'];
if (isset($filterData['orderby']))
{
    switch ($filterData['orderby'])
    {
        case 'date':
            $params['orderby'] = 'date';
            $params['order'] = 'DESC';
        break;
        case 'price':
            $params['orderby'] = 'meta_value_num';
            $params['order'] = 'ASC';
            $params['orderby_meta_key'] = '_price';
        break;
        case 'price-desc':
            $params['orderby'] = 'meta_value_num';
            $params['order'] = 'DESC';
            $params['orderby_meta_key'] = '_price';
        break;
        case 'popularity':
            $params['orderby'] = 'meta_value_num';
            $params['order'] = 'DESC';
            $params['orderby_meta_key'] = 'total_sales';
        break;
        case 'rating':
            $params['orderby'] = 'meta_value_num';
            $params['order'] = 'DESC';
            $params['orderby_meta_key'] = '_wc_average_rating';
        break;
    }
    unset($filterData['orderby']);
}
$meta_query = ['relation' => 'AND'];
$tax_query = ['relation' => 'AND'];
if ($catId != "") {
    $tax_query[] = array(
        'taxonomy' => 'product_cat',
        'field' => 'term_id',
        'terms' => $catId,
        'operator' => 'IN'
    );
}
foreach ($filterData as $key => $metaItem) {
if ($metaItem != ")
{
    $values = explode(',', $metaItem);
    $compare = '=';
    switch ($key)
    {
        case ('min_tempo'):
            $key = 'tempo';
            $compare = '>=';
        break;
        case ('max_tempo'):
            $key = 'tempo';
            $compare = '<=';
        break;
    }
    foreach ($values as $value)
    {
        if ($key == 'tempo')
        {
            $meta_query[] = ['key' => $key, 'value' => $value, 'compare' => $compare, 'type' => 'NUMERIC'];
        }
        else
        {
            $tax_query[] = ['taxonomy' => 'pa_' . $key, 'field' => 'slug', 'terms' => $value];
        }
    }
}
}
if (count($meta_query) > 1)
{
    $params['meta_query'] = $meta_query;
}
$params['tax_query'] = $tax_query;
$wc_query = new WP_Query($params);
if ($wc_query->have_posts())
{
    woocommerce_product_loop_start();
    woocommerce_product_subcategories();
    while ($wc_query->have_posts())
    {
        $wc_query->the_post();
        wc_get_template_part('content', 'product');
    }
    woocommerce_product_loop_end();
    if ($wc_query->max_num_pages > 1): ?>
<nav class="woocommerce-pagination">
<?php echo paginate_links(apply_filters('woocommerce_pagination_args', array(
            'base' = -- > esc_url_raw(str_replace(999999999, '%#%', remove_query_arg('add-to-cart', get_pagenum_link(999999999, false)))) ,
            'format' => ",
'add_args' => false,
'current' => max(1, get_query_var('paged')),
'total' => $wc_query->max_num_pages,
'prev_text' => '←',
'next_text' => '→',
'type' => 'list',
'end_size' => 3,
'mid_size' => 3
))); ?>
</nav>
<?php endif;
} elseif (!woocommerce_product_subcategories(array('before' =--> woocommerce_product_loop_start(false), 'after' => woocommerce_product_loop_end(false)))) {
wc_get_template('loop/no-products-found.php');
}
?>
