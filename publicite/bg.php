
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
            'value'   => 'bg',
            'compare' => '='
        )
    )
);

$image = null;
$the_query = new WP_Query( $arg );
while($the_query->have_posts()):
    $the_query->the_post();
    global $post;


    $date_debut = DateTime::createFromFormat($format_in, get_field('date_debut'));
    $date_fin = DateTime::createFromFormat($format_in, get_field('date_fin'));

    if ($date_current >= $date_debut->format($format_in) && $date_current <= $date_fin->format($format_in)):
        $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID), 'thumbnail' );
    endif;
endwhile;
if($image):
?>

<style>
    .td-main-content-wrap{
        background-image: url('<?= $image ?>');
        background-repeat: no-repeat;
    }
</style>

<?php else: ?>
    <style>
        .td-main-content-wrap{
            background-image: url('<?php echo get_template_directory_uri(); ?>/images/mutations/background.png');
            background-repeat: no-repeat;
        }
    </style>


<?php endif; ?>