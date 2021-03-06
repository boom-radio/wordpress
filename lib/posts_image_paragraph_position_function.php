<?php
//This function is for swapping images and paragraphs left and right alternatively (img left-parag right and viceversa

if (!function_exists('posts_image_paragraph_position')) {
    function posts_image_paragraph_position($postNumber)
    {
        // Check if the post number (basically the post order, first post on page, second post etc.) is empty; if it is, is set to 0
        if (empty($postNumber)) {
            $postNumber = 0;
        }

        // Check if the post has thumbnail image (featured image)
        if (has_post_thumbnail()) {
            // If there is a thumbnail get the URL and set it to the variable $featuredImgUrl
            $featuredImgUrl = get_the_post_thumbnail_url(get_the_ID(), 'card');
            // Clean the URL and set the result into $thumbnail 
            $thumbnail = esc_url($featuredImgUrl);
        } else {
            $thumbnail = get_bloginfo("template_url") . esc_html__('/src/assets/img/img-default.png', 'boom_radio');
        }


        // Get the post title and set it into the variable $postTitle
        $postTitle = get_the_title();
        // Get the post content and set it into the variable $postContent
        //$postContent = get_the_content();
        // Get the post excerpt and set it into the variable $postContent
        $postContent = get_the_excerpt();
        // Get the post button and set it into the variable $postReadMoreButton
        //$postReadMoreButton = boom_radio_readmore_link();

        // Put the HTML for a left image and a right paragraph into the variable $imgLeftParagRight
        $imgLeftParagRight = '
                        <div class="cell medium-4">
                            <img src="' . $thumbnail . '" class="img-left box-shadowed" alt="Boom Image">
                        </div>
                        <div class="cell medium-6">
                            <div class="grid-container-fluid">
                                <div class="grid-x grid-padding-x grid-padding-y">
                                    <div class="cell">
                                        <h2>' . $postTitle . '</h2>
                                    </div>
                                    <div class="cell text-justify">' . $postContent . '</div>
                                    <div class="cell"><a class="boom-button-white float-right" href="' . esc_url(get_permalink()) . '" title="' . esc_html__(the_title_attribute(['echo' => false])) . '">Read More...</a></div>
                                </div>
                            </div>
                        </div>';

        // Put the HTML for a right image and a left paragraph into the variable $imgRightParagLeft
        $imgRightParagLeft = '
                        <div class="cell medium-6">
                            <div class="grid-container-fluid">
                                <div class="grid-x grid-padding-x grid-padding-y">
                                    <div class="cell">
                                        <h2>' . $postTitle . '</h2>
                                    </div>
                                    <div class="cell text-justify">' . $postContent . '</div>
                                    <div class="cell"><a class="boom-button-white float-left" href="' . esc_url(get_permalink()) . '" title="' . esc_html__(the_title_attribute(['echo' => false])) . '">Read More...</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="cell medium-4">
                            <img src="' . $thumbnail . '" class="img-left box-shadowed" alt="Boom Image">
                        </div>';

        // Check whether the post number (basically the post order, first post on page, second post etc.) is even or odd
        if ($postNumber % 2 == 0) {
            // If the post number is even return the image on the left and the paragraph on the right
            return $imgLeftParagRight;
        } else {
            // If the post number is odd return the image on the right and the paragraph on the left
            return $imgRightParagLeft;
        }
    }
}
