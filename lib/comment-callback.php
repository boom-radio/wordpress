<?php
function boom_radio_comment_callback($comment, $args, $depth)
{
    $tag = ($args['style'] === 'div') ? 'div' : 'li';
    ?>
    <<?php echo $tag ?> id="comment-<?php comment_ID(); ?>" <?php comment_class(['c-comment', $comment->comment_parent ? 'c-comment--child' : '']) ?>>
        <article id="div-comment-<?php comment_ID(); ?>" class="c-comment__body">

            <?php if ($args['avatar_size'] != 0) echo get_avatar($comment, $args['avatar_size'], false, false, array('class' => 'c-comment__avatar')); ?>
            <?php edit_comment_link(esc_html__('Edit Comment', 'boom_radio'), '<span class="c-comment__edit-link">', '</span>'); ?>

            <div class="c-comment__content">

                <div class="c-comment__author">
                    <?php echo get_comment_author_link($comment); ?>
                </div>

                <a class="c-comment__time" href="<?php echo esc_url(get_comment_link($comment, $args)) ?>">
                    <time datetime="<?php comment_time('c') ?>">
                        <?php
                            printf(esc_html__('%s ago', 'boom_radio'), human_time_diff(get_comment_time('U'), current_time('U')));
                            ?>
                    </time>
                </a>

                <!--Display the content of the comment-->
                <?php if ($comment->comment_approved == '0') { ?>
                    <p class="c-comment__awaiting-moderation"><?php esc_html_e('Your comment is awaiting moderation.', 'boom_radio'); ?></p>
                <?php } ?>

                <?php
                    //echo $comment->comment_type;
                    //Check to see if the comment is a ping or track and if the short_ping arg is false, then deliver entire comment text
                    if ($comment->comment_type == 'comment' || (($comment->comment_type == 'pingback' || $comment->comment_type == 'trackback') && !$args['short_ping'])) {
                        comment_text();
                    }
                    ?>

                <?php
                    comment_reply_link(array_merge($args, array(
                        'depth' => $depth,
                        'add_below' => 'div-comment',
                        'before' => '<div class="c-comment__reply-link">',
                        'after' => '</div>'
                    )));
                    ?>
            </div>

        </article>
    <?php
    }
