<?php

if (post_password_required()) {
    return;
}
?>

<div class="grid-container">
    <div class="grid-x grid-margin-x grid-margin-y">
        <div class="cell">
            <div id="comments" class="c-comments">
                <?php if (have_comments()) { ?>
                    <h3 class="c-comments__title">

                        <?php
                            /* translators: 1 is number of comments  and 2 is post title*/
                            printf(
                                esc_html__(_n(
                                    '%1$s Reply to "%2$s"',
                                    '%1$s Replies to "%2$s"',
                                    get_comments_number(),
                                    'boom_radio'
                                )),
                                number_format_i18n(get_comments_number()),
                                get_the_title()
                            )
                            ?>
                    </h3>

                    <!--List the comment fo the post-->
                    <ul class="c-comments__list">
                        <?php wp_list_comments(array(
                                'short_ping' => true,
                                'avatar_size' => 50,
                                'reply_text' => 'Reply',
                                //Callback to function to create comment markup
                                'callback' => 'boom_radio_comment_callback'
                            ));
                            ?>
                    </ul>

                    <?php the_comments_pagination() ?>
                <?php } ?>
                <!--Send message if there are comments but comments are closed-->
                <?php if (!comments_open() && get_comments_number()) { ?>
                    <p class="c-comments_closed"><?php esc_html_e('Comments are closed for this post', '_themename') ?></p>
                <?php } ?>
                <!--Display the fomr outside the loop-->
                <div class="cell auto">
                    <?php comment_form() ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!--</div>-->