<?php

/**
 * The template for displaying Footer for the site
 *
 * @package WordPress
 * @subpackage boom_radio
 * @since Boom Radio 1.0
 */ ?>


<!--Closing tag for off canvas div-->
</div>

</body>
<?php wp_footer(); ?>
<!-- BEGINNING OF FOOTER -->
<footer class="grid-container">
    <div class="grid-x grid-margin-y align-center">
        <!-- Empty cell/s used  for spacing-->
        <div class="cell"></div>
        <div class="cell shrink">
            <ul class="menu text-center">
                <li><a href="https://www.facebook.com/boomradioau/" target="blank"><i class="fab fa-facebook-f fa-1x"></i>
                        <p class="show-for-sr">Facebook link icon</p>
                    </a>
                </li>
                <li><a href="https://twitter.com/boomradioau" target="blank"><i class="fab fa-twitter fa-1x"></i>
                        <p class="show-for-sr">Twitter link icon</p>
                    </a>
                </li>
                <li><a href="https://www.instagram.com/boomradioau/" target="blank"><i class="fab fa-instagram fa-1x"></i>
                        <p class="show-for-sr">Instagram link icon</p>
                    </a>
                </li>
                <li><a href="https://www.snapchat.com/" target="blank"><i class="fab fa-snapchat-ghost fa-1x"></i>
                        <p class="show-for-sr">Snapchat link icon</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="grid-x grid-margin-y align-center">
        <div class="cell shrink text-center">
            <ul class="menu text-center">
                <li><a href="<?php echo esc_url(get_permalink(get_page_by_title('General Terms'))); ?>"><?php esc_html_e('Terms &amp; Conds', 'boom_radio'); ?></a></li>
            </ul>
        </div>
    </div>
    <div class="grid-x grid-margin-y align-center">
        <div class="cell text-center">
            <small id="copyright">&copy; Boomradio 2019</small>
        </div>
    </div>
</footer>

</html>