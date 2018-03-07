
<?php get_header(); ?>
<div class="header-page">
    <div class="container">
        <div class="infos-opacity"></div>
        <div class="col-xs-12 col-md-12">
            <h1 class="pos-relative">Resultat de la recherche</h1>
        </div>
        <div class="col-xs-12 col-md-12"><br class="hidden-xs hidden-sm">
            <?php if ( function_exists('yoast_breadcrumb') )
            {yoast_breadcrumb('<p class="breadcrumb" style="color: #000">','</p>');} ?>
        </div>
    </div>
</div>

<div class="container content">
    <div class="row" style="margin: 20px;">
        <div class="col-xs-6 col-xs-offset-3">
            <h2 style="text-align: center">Recherche</h2>
            <form action="<?php bloginfo('url'); ?>">
                <div class="input-group">
                    <input type="text" class="form-control" value="<?php the_search_query(); ?>" name="s" id="s" placeholder="recherche">
                    <span class="input-group-btn">
                        <button class="btn btn-default rechercher-btn" type="submit" name="submit"><span class="glyphicon glyphicon-search"></span></button>
                    </span>
                </div>
            </form>

        </div>
    </div>

        <?php if (have_posts()) : ?>
        <div class="col-xs-12">
            <?php while (have_posts()) : the_post(); ?>
                <div class="col-sm-12 block block-bottom">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12">
                            <span class="titre-block" style="margin: 0;"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></span>
                            <hr class="separateur-2 hidden-xs">
                            <hr class="separateur hidden-lg hidden-md hidden-sm">
                            <p class="text-block">
                                <?php echo substr(get_the_content(), 0, 500); ?> ...
                            </p>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <?php else: ?>
            <div class="jumbotron" style="text-align: center">
                <h1>Opps !!! aucun resultat</h1>
            </div>

        <?php endif; ?>

</div>


<?php get_footer(); ?>