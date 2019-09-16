<?php
//This function is for swapping images and paragraphs left and right alternatively (img left-parag right and viceversa

function posts_image_paragraph_position($postNumber)
{   
    if (empty($postNumber)) {
        $postNumber = 0;
    }
    
    if (has_post_thumbnail()) :
        $featuredImgUrl = get_the_post_thumbnail_url(get_the_ID(), 'large');
        $thumbnail = esc_url($featuredImgUrl);
    endif;

    $postTitle = get_the_title();
    $postContent = get_the_content();

    $imgLeftParagRight = '
                        <div class="cell medium-4">
                            <img src="' . $thumbnail . '" class="img-left box-shadowed">
                        </div>
                        <div class="cell medium-6">
                                <div class="grid-container-fluid">
                                    <div class="grid-x grid-padding-x grid-padding-y">
                                        <div class="cell">
                                            <h2>' .
                                            $postTitle .
                                            '</h2>
                                        </div>
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
                                    <div class="cell">
                                        <h2>' .
                                        $postTitle .
                                        '</h2>
                                    </div>
                                    <div class="cell text-justify">' .
                                    $postContent .
                                    '</div>
                                </div>
                            </div>
                        </div>
                        <div class="cell medium-4">
                            <img src="' . $thumbnail . '" class="img-left box-shadowed">
                        </div>';

    if ($postNumber % 2 == 0) {
        return $imgLeftParagRight;
    } else {
        return $imgRightParagLeft;
    }
}
