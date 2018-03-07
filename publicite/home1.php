<?php
$format_in =  'Ymd';
$date_current = current_time('Ymd');
$arg = array(
    'post_type' => 'publicite',
    'posts_per_page' => -1,
    'orderby'   => 'rand',
    'meta_query' => array(
        array(
            'key'     => 'emplacement',
            'value'   => 'home1',
            'compare' => '='
        )
    )
);

$url = '#';
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
	    break;
    endif;
endwhile;
if($image):
?>


<div class="td-a-rec">
    <span class="td-adspot-title">- Publicité -</span>
    <div class="td-visible-desktop">
        <a href="<?= $url ?>" target="_blank"><img class="td-retina" style="max-height: 100px" src="<?= $image; ?>" alt="" width="728" height="90"></a>
    </div>
    <div class="td-visible-tablet-landscape">
        <a href="<?= $url ?>" target="_blank"><img class="td-retina" style="max-height: 100px" src="<?= $image; ?>" alt="" width="728" height="90"></a>
    </div>

    <div class="td-visible-tablet-portrait">
        <a href="<?= $url ?>" target="_blank"><img class="td-retina" style="max-height: 100px" src="<?= $image; ?>" alt="" width="468" height="60"></a>
    </div>
    <div class="td-visible-phone">
        <a href="<?= $url ?>" target="_blank"><img class="td-retina" style="max-height: 100px" src="<?= $image; ?>" alt="" width="300" height="250"></a>
    </div>
</div>

<?php else: ?>

    <div class="td-a-rec">
        <span class="td-adspot-title">- Publicité -</span>
        <div class="td-visible-desktop">
            <a href="#"><img class="td-retina" src="<?php echo get_template_directory_uri(); ?>/images/mutations/20ANSMUTATIONS-1.gif" alt="" width="728" height="90"></a>
        </div>
        <div class="td-visible-tablet-landscape">
            <a href="#"><img class="td-retina" src="<?php echo get_template_directory_uri(); ?>/images/mutations/20ANSMUTATIONS-1.gif" alt="" width="728" height="90"></a>
        </div>

        <div class="td-visible-tablet-portrait">
            <a href="#"><img class="td-retina" src="<?php echo get_template_directory_uri(); ?>/images/mutations/20ANSMUTATIONS-1.gif" alt="" width="468" height="60"></a>
        </div>
        <div class="td-visible-phone">
            <a href="#"><img class="td-retina" src="<?php echo get_template_directory_uri(); ?>/images/mutations/20ANSMUTATIONS-3.gif" alt="" width="300" height="250"></a>
        </div>
    </div>

<?php endif; ?>