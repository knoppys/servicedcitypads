<?php get_header('header2'); ?>

<script type="text/javascript">

    jQuery(document).ready(function(){
        jQuery.getJSON("http://jsonip.com?callback=?", function (data) {
            document.getElementById("ipaddress").innerHTML = "Your ip: " + data.ip;
        });
    });

</script>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    
    <section class="home-content" style="text-align:center;padding:50px 0;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form>
                        <p>You do not have permission to access this page / file. As a result of your attempt,  <span id = "ipaddress"></span> has been logged.</p>
                        <p>Try going back to our <a href="<?php echo get_site_url(); ?>">Home Page</a></p>
                    </form>
                </div>
            </div>
        </div>
    </section>

<?php endwhile; else : ?>
    <p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
<?php endif; ?>

<?php get_footer(); ?>