<?php

function posts_image_paragraph_position($postNumber)
{
    if (has_post_thumbnail()) :
        if ($postNumber % 2 == 0) {
            $thumbnailLeft = the_post_thumbnail('large', array('class' => 'img-left box-shadowed'));
        } else {
            $thumbnailRight = the_post_thumbnail('large', array('class' => 'img-right box-shadowed'));
        }
    endif;
    $postTitle = the_title('<h2>', '</h2>', 0);
    $postContent = get_the_content();

    $imgLeftParagRight = '
                        <div class="cell medium-4">' .

                        $thumbnailLeft .

                        '</div>
                        <div class="cell medium-6">
                                <div class="grid-container-fluid">
                                    <div class="grid-x grid-padding-x grid-padding-y">
                                        <div class="cell">' .

                                        $postTitle .

                                        '</div>
                                        <div class="cell text-justify">' .

                                        $postContent .

                                        '</div>
                                    </div>
                                </div>
                            </div>';

    $imgRightParagLeft = '
                            <div class="cell medium-6">
                                <div class="grid-container-fluid">
                                    <div class="grid-x grid-padding-x grid-padding-y">
                                        <div class="cell">' .

                                        $postTitle .

                                        '</div>
                                        <div class="cell text-justify">' .
                                        $postContent .

                                        '</div>
                                    </div>
                                </div>
                            </div> 
                            <div class="cell medium-4">' .

                            $thumbnailLeft .

                            '</div>';

    if (empty($postNumber)) {
        $postNumber = 0;
    }

    if ($postNumber % 2 == 0) {
        return $imgLeftParagRight;
    } else {
        return $imgRightParagLeft;
    }
}
