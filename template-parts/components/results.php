<div class="grid-container">
    <div class="grid-x grid-padding-x grid-padding-y">
        <?php if (!is_singular()) { ?>
            <div class="cell">
                <h3>
                    <?php
                        /* translators: 1 is number of comments  and 2 is post title*/
                        printf(
                            esc_html__(
                                'Search results for: "%1$s"',
                                'boom_radio'
                            ),
                            get_search_query()
                        )
                        ?>
                </h3>
            </div>
        <?php } ?>
    </div>
</div>