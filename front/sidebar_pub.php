<?php
$format_in =  'Ymd';
$date_current = current_time('Ymd');
$arg = array(
    'post_type' => 'publicite',
    'posts_per_page' => -1,
    'meta_query' => array(
        array(
            'key'     => 'emplacement',
            'value'   => 'sidebar',
            'compare' => '='
        )
    )
);

$url = null;
$image = null;
$the_query = new WP_Query( $arg );
while($the_query->have_posts()):
    $the_query->the_post();
    global $post;


    $date_debut = DateTime::createFromFormat($format_in, get_field('date_debut'));
    $date_fin = DateTime::createFromFormat($format_in, get_field('date_fin'));

    if ($date_current >= $date_debut->format($format_in) && $date_current <= $date_fin->format($format_in)):
        $url = get_field('url');
        $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );
    endif;
endwhile;
if($url && $image):
    ?>

    <span class="td-adspot-title">- Publicité -</span>
    <div class="td-visible-desktop">
        <a href="<?= $url ?>" target="_blank"><img class="td-retina" style="max-width:300px" src="<?= $image ?>" alt="" width="300" height="250"></a>
    </div>
    <div class="td-visible-tablet-landscape">
        <a href="<?= $url ?>" target="_blank"><img class="td-retina" style="max-width:300px" src="<?= $image ?>" alt="" width="300" height="250"></a>
    </div>
    <div class="td-visible-tablet-portrait">
        <a href="<?= $url ?>" target="_blank"><img class="td-retina" style="max-width:200px" src="<?= $image ?>" alt="" width="200" height="200"></a>
    </div>
    <div class="td-visible-phone">
        <a href="<?= $url ?>" target="_blank"><img class="td-retina" style="max-width:300px" src="<?= $image ?>" alt="" width="300" height="250"></a>
    </div>

<?php else: ?>

    <span class="td-adspot-title">- Publicité -</span>
    <div class="td-visible-desktop">
        <a href="#"><img class="td-retina" style="max-width:300px" src="<?php echo get_template_directory_uri(); ?>/images/mutations/20ANSMUTATIONS-3.gif" alt="" width="300" height="250"></a>
    </div>
    <div class="td-visible-tablet-landscape">
        <a href="#"><img class="td-retina" style="max-width:300px" src="<?php echo get_template_directory_uri(); ?>/images/mutations/20ANSMUTATIONS-3.gif" alt="" width="300" height="250"></a>
    </div>
    <div class="td-visible-tablet-portrait">
        <a href="#"><img class="td-retina" style="max-width:200px" src="<?php echo get_template_directory_uri(); ?>/images/mutations/20ANSMUTATIONS-3.gif" alt="" width="200" height="200"></a>
    </div>
    <div class="td-visible-phone">
        <a href="#"><img class="td-retina" style="max-width:300px" src="<?php echo get_template_directory_uri(); ?>/images/mutations/20ANSMUTATIONS-3.gif" alt="" width="300" height="250"></a>
    </div>


<?php endif; ?>