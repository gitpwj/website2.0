<?php
/*
Template Name:Landing No Menu Simple Footer
*/

use Roots\Sage\Assets;
?>
<?php get_template_part('template-parts/header', 'no-menu'); ?>


<div class="c-layout-page c-layout-page-fixed">


    <?php

        if( have_rows('tabs') ):

            // loop through the rows of data
            while ( have_rows('tabs') ) : the_row();
                $header_headline = get_sub_field('h1_title');
                $header_slogan = get_sub_field('subtitle');

                // check if the nested repeater field has rows of data
                if( have_rows('tab_content') ):

                    echo '<div class="c-content-box c-size-md">';
                    echo '<div class="container">';
                    echo '<div class="row">';

                    echo '<div class="col-sm-12 c-center">' .
                            '<h1>' . $header_headline . '</h1>' .
                            '<h2>' .
                                $header_slogan .
                            '</h2>' .
                        '</div>';

                    echo '<div class="col-sm-12 pricing">';
                    echo '<div class="threeTab__Index--Wrap clearfix" data-wheel="true">';
                        // loop through the rows of data
                    $tabMobileLC = '';
                    $tabMobileMC = '';
                    $tabMobileAI = '';
                    while ( have_rows('tab_content') ) : the_row();

                        $color = get_sub_field('color');
                        $tag = get_sub_field('tag');
                        $headline = get_sub_field('headline');
                        $body = get_sub_field('body');
                        $link = get_sub_field('link');

                        if ( $tag == 'LC' ):
                            $tabMobileLC = '<div class="threeTab__Index--mobile">' .
                                        '<div class="product-item__tag product-item__tag--large product-item__tag' . $color . '">' . $tag . '</div>' .
                                        '<h3>' . $headline . '</h3>' .
                                        '<div class="threeTab__Index--desc">' .
                                            '<p class="product-item__desc"> ' . $body . ' </p>' .
                                        '</div>' .
                                    '</div>';
                        endif;
                        if ( $tag == 'MC' ):
                            $tabMobileMC = '<div class="threeTab__Index--mobile">' .
                                        '<div class="product-item__tag product-item__tag--large product-item__tag' . $color . '">' . $tag . '</div>' .
                                        '<h3>' . $headline . '</h3>' .
                                        '<div class="threeTab__Index--desc">' .
                                            '<p class="product-item__desc"> ' . $body . ' </p>' .
                                        '</div>' .
                                    '</div>';
                        endif;
                        if ( $tag == 'AI' ):
                            $tabMobileAI = '<div class="threeTab__Index--mobile">' .
                                        '<div class="product-item__tag product-item__tag--large product-item__tag' . $color . '">' . $tag . '</div>' .
                                        '<h3>' . $headline . '</h3>' .
                                        '<div class="threeTab__Index--desc">' .
                                            '<p class="product-item__desc"> ' . $body . ' </p>' .
                                        '</div>' .
                                    '</div>';
                        endif;

                        echo    '<div class="threeTab__Index">' .
                                    '<div class="product-item__tag product-item__tag--large product-item__tag' . $color . '">' . $tag . '</div>' .
                                    '<h3>' . $headline . '</h3>' .
                                    '<div class="threeTab__Index--desc">' .
                                        '<p class="product-item__desc"> ' . $body . ' </p>' .
                                        '<div class="threeTab__Index--link">' .
                                            '<a class="c-redirectLink" href="' . $link['url'] . '" target="' . $link['target'] . '">' .
                                                $link['title'] .
                                            '</a>' .
                                        '</div>' .
                                    '</div>' .
                                '</div>';

                    endwhile;

                    echo '</div>';
                    echo '<div class="threeTab__Detail-wrap">';

                    // pricing live chat details
                    echo '<div class="threeTab__Detail clearfix">';
                    echo $tabMobileLC;
                    echo '<div class="threeTab__Detail--col-wrap clearfix">';
                    while ( have_rows('pricing_details_live_chat') ) : the_row();

                        $title = get_sub_field('title');
                        $if_show_price = get_sub_field('if_show_price');
                        $price = get_sub_field('price');
                        $request_quote = get_sub_field('request_quote');
                        $feature_list_title = get_sub_field('feature_list_title');

                        $priceContent = '<span class="threeTab__Detail--priceQuote"><strong>' . $request_quote . '</strong></span>';
                        if ($if_show_price):
                            while ( have_rows('price') ) : the_row();
                                $price_number = get_sub_field('price_number');
                                $price_unit = get_sub_field('price_unit');
                                $priceContent = '<span class="threeTab__Detail--priceNum"><strong>$' . $price_number . '</strong></span>' .
                                '<span class="threeTab__Detail--priceUnit">' . $price_unit . '</span>';
                            endwhile;

                        endif;

                        $li_feature_list = '';
                        while ( have_rows('feature_list') ) : the_row();
                            $feature_point = get_sub_field('feature_point');

                            $li_feature_list .= '<li>' . $feature_point . '</li>';
                        endwhile;


                        $cta = get_sub_field('cta');
                        $linkcontent = '';

                        if ($cta):
                            while ( have_rows('cta') ) : the_row();
                                $cta_link_type = get_sub_field('cta_link_type');
                                $cta_link = get_sub_field('cta_link');
                                if ($cta_link):
                                    switch ($cta_link_type) {
                                        case 'green' :
                                                $linkcontent = '<a class="btn btn-xlg btn-link--green" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                        $cta_link['title'] .
                                                    '</a>';
                                                break;
                                        case 'blue' :
                                                $linkcontent = '<a class="btn btn-xlg c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                        $cta_link['title'] .
                                                    '</a>';
                                                break;
                                        case 'white' :
                                                $linkcontent = '<a class="btn btn-xlg c-btn-border-2x c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                        $cta_link['title'] .
                                                    '</a>';
                                                break;
                                        case 'link' :
                                                $linkcontent = '<a class="c-redirectLink" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                        $cta_link['title'] .
                                                    '</a>';
                                                break;
                                        default: break;
                                    }
                                endif;
                            endwhile;
                            if ($linkcontent !== ''):
                                $linkcontent = '<div class="threeTab__Detail--action"> ' . $linkcontent . ' </div>';
                            endif;
                        endif;

                        echo    '<div class="col-sm-4 threeTab__Detail--col">' .
                                    '<div class="threeTab__Detail--title">' . $title . '</div>' .
                                    '<div class="threeTab__Detail--price">' . $priceContent . '</div>' .
                                    '<p class="threeTab__Detail--subTitle">' . $feature_list_title . '</p>' .
                                    '<ul class="threeTab__Detail--contentList">' .
                                        $li_feature_list .
                                    '</ul>' .
                                    $linkcontent .
                                '</div>';

                    endwhile;
                    echo '</div>';
                    echo '</div>';
                    // end pricing live chat details

                    // pricing multichannel details
                    echo '<div class="threeTab__Detail clearfix">';
                    echo $tabMobileMC;
                    echo '<div class="threeTab__Detail--col-wrap clearfix">';
                    $pricing_details_multichannel_note = get_sub_field('pricing_details_multichannel_note');
                    while ( have_rows('pricing_details_multichannel') ) : the_row();

                        $title = get_sub_field('title');
                        $if_show_price = get_sub_field('if_show_price');
                        $price = get_sub_field('price');
                        $request_quote = get_sub_field('request_quote');
                        $feature_list_title = get_sub_field('feature_list_title');

                        if (trim($feature_list_title, ' ') == ''):
                            $feature_list_title = '&nbsp;';
                        endif;

                        $priceContent = '<span class="threeTab__Detail--priceQuote"><strong>' . $request_quote . '</strong></span>';
                        if ($if_show_price):
                            while ( have_rows('price') ) : the_row();
                                $price_number = get_sub_field('price_number');
                                $price_unit = get_sub_field('price_unit');
                                $priceContent = '<span class="threeTab__Detail--priceNum"><strong>$' . $price_number . '</strong></span>' .
                                '<span class="threeTab__Detail--priceUnit">' . $price_unit . '</span>';
                            endwhile;

                        endif;

                        $li_feature_list = '';
                        while ( have_rows('feature_list') ) : the_row();
                            $feature_point = get_sub_field('feature_point');

                            $li_feature_list .= '<li>' . $feature_point . '</li>';
                        endwhile;


                        $cta = get_sub_field('cta');
                        $linkcontent = '';

                        if ($cta):
                            while ( have_rows('cta') ) : the_row();
                                $cta_link_type = get_sub_field('cta_link_type');
                                $cta_link = get_sub_field('cta_link');
                                if ($cta_link):
                                    switch ($cta_link_type) {
                                        case 'green' :
                                                $linkcontent = '<a class="btn btn-xlg btn-link--green" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                        $cta_link['title'] .
                                                    '</a>';
                                                break;
                                        case 'blue' :
                                                $linkcontent = '<a class="btn btn-xlg c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                        $cta_link['title'] .
                                                    '</a>';
                                                break;
                                        case 'white' :
                                                $linkcontent = '<a class="btn btn-xlg c-btn-border-2x c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                        $cta_link['title'] .
                                                    '</a>';
                                                break;
                                        case 'link' :
                                                $linkcontent = '<a class="c-redirectLink" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                        $cta_link['title'] .
                                                    '</a>';
                                                break;
                                        default: break;
                                    }
                                endif;
                            endwhile;
                            if ($linkcontent !== ''):
                                $linkcontent = '<div class="threeTab__Detail--action"> ' . $linkcontent . ' </div>';
                            endif;
                        endif;

                        echo    '<div class="col-sm-6 threeTab__Detail--col">' .
                                    '<div class="threeTab__Detail--title">' . $title . '</div>' .
                                    '<div class="threeTab__Detail--price">' . $priceContent . '</div>' .
                                    '<p class="threeTab__Detail--subTitle">' . $feature_list_title . '</p>' .
                                    '<ul class="threeTab__Detail--contentList">' .
                                        $li_feature_list .
                                    '</ul>' .
                                    $linkcontent .
                                '</div>';

                    endwhile;
                    echo '<div class="clear"></div>'.
                          '<div class="threeTab__Detail--note">' . $pricing_details_multichannel_note . '</div>';
                    echo '</div>';
                    echo '</div>';
                    // end pricing multichannel details


                    // pricing AI details
                    while ( have_rows('pricing_details_ai') ) : the_row();

                        $pricing_details_ai_title = get_sub_field('title');
                        $ai_logo = get_sub_field('ai_logo');
                        $feature_list_title = get_sub_field('feature_list_title');

                        $ai_logo_content = '';
                        if ($ai_logo):
                            $ai_logo_content = '<div class="ai-logo-wrap">' .
                                                '<img src="' . $ai_logo['url'] . '" alt="' . $ai_logo['alt'] . '" width="276" height="209" />' .
                                            '</div>';
                        endif;

                        $columnFirst = '';
                        while ( have_rows('column_first') ) : the_row();
                            $title = get_sub_field('title');
                            $feature_list = '';
                            while ( have_rows('feature_list') ) : the_row();
                                $feature_list .= '<li>' . get_sub_field('feature_point') . '</li>';
                            endwhile;
                            $columnFirst = '<div class="col-sm-8 threeTab__Detail--col">' .
                                            '<p class="threeTab__Detail--subTitle">' . $feature_list_title . '</p>' .
                                            '<ul class="threeTab__Detail--contentList">' .
                                                $feature_list .
                                            '</ul>' .
                                        '</div>';
                        endwhile;



                        $columnSecond = '';
                        while ( have_rows('column_second') ) : the_row();
                            $price = get_sub_field('price');

                            $cta = get_sub_field('cta');
                            $linkcontent='';
                            if ($cta):
                                while ( have_rows('cta') ) : the_row();
                                    $cta_link_type = get_sub_field('cta_link_type');
                                    $cta_link = get_sub_field('cta_link');
                                    if ($cta_link):
                                        switch ($cta_link_type) {
                                            case 'green' :
                                                    $linkcontent = '<a class="btn btn-xlg btn-link--green" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                            $cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            case 'blue' :
                                                    $linkcontent = '<a class="btn btn-xlg c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                            $cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            case 'white' :
                                                    $linkcontent = '<a class="btn btn-xlg c-btn-border-2x c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                            $cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            case 'link' :
                                                    $linkcontent = '<a class="c-redirectLink" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                            $cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            default: break;
                                        }
                                    endif;
                                endwhile;
                            endif;

                            $columnSecond = '<div class="col-sm-4 threeTab__Detail--col">' .
                                                '<div class="threeTab__Detail--price">' .
                                                    '<span class="threeTab__Detail--priceQuote"><strong>' . $price . '</strong></span>' .
                                                '</div>' .
                                                '<div class="threeTab__Detail--action">' .
                                                    $linkcontent .
                                                '</div>' .
                                            '</div>';
                        endwhile;

                        echo    '<div class="threeTab__Detail clearfix">' .
                                    $tabMobileAI .
                                    '<div class="threeTab__Detail--col-wrap clearfix">' .

                                        '<div class="threeTab__Detail--title">' .
                                            $pricing_details_ai_title .
                                        '</div>' .

                                        $columnFirst .
                                        $columnSecond .
                                    '</div>' .
                                    $ai_logo_content .
                                '</div>';

                    endwhile;
                    // end pricing AI details


                    echo '</div>';

                    $pricing_details_bottom_link = get_sub_field('pricing_details_bottom_link');
                    if ($pricing_details_bottom_link):
                        echo '<div class="threeTab__Detail--bottomLink">' .
                                '<a href="' . $pricing_details_bottom_link['url'] . '" target="' . $pricing_details_bottom_link['target'] . '">' .
                                    $pricing_details_bottom_link['title'] .
                                '</a>' .
                            '</div>';
                    endif;

                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';

                endif;
            endwhile;
        endif;
        // check if the flexible content field has rows of data
        if( have_rows('modules') ):

            // loop through the rows of data
            while ( have_rows('modules') ) : the_row();
                if( get_row_layout() == 'hero_banner' ):
                    $banner_type = get_sub_field('type');
                    $banner_size = get_sub_field('size');
                    $banner_align = get_sub_field('align');
                    $banner_icon = get_sub_field('icon');
                    // $page_tag = get_sub_field('page_tag');
                    $banner_headline = get_sub_field('h1_title');
                    $banner_slogan = get_sub_field('subtitle');
                    $banner_description = get_sub_field('description');
                    $banner_background_image = get_sub_field('background_image');
                    $style_bg = '';
                    if ($banner_background_image):
                        $style_bg = 'style="background-image: url(' . $banner_background_image['url'] . ')"';
                    endif;
                    $banner_cta = get_sub_field('cta');

                    echo '<div class="c-content-box c-size-lg c-margin-b-30 banner banner--' . $banner_size . ' banner--' . $banner_align . ' banner--' . $banner_type . '" '  . $style_bg . '>';
                    echo '<div class="container">';
                    echo '<div class="row">';
                    echo '<div class="col-sm-7">';

                    if ($banner_icon):
                        echo '<div class="banner_icon">' .
                                '<img src="' . $banner_icon['url'] . '" alt="' . $banner_icon['alt'] . '" width="64" height="64" />' .
                            '</div>';
                    endif;
                    if ($banner_headline):
                        echo '<h1>' .
                                $banner_headline .
                            '</h1>';
                    endif;
                    if ($banner_slogan):
                        echo '<p class="subtitle">' .
                                $banner_slogan .
                            '</p>';
                    endif;
                    if ($banner_description):
                        echo '<div class="desc">' .
                                $banner_description .
                            '</div>';
                    endif;

                    if ($banner_cta):

                        while ( have_rows('cta') ) : the_row();
                            $cta_link_type = get_sub_field('cta_link_type');
                            $cta_link = get_sub_field('cta_link');
                            if ($cta_link):
                                switch ($cta_link_type) {
                                    case 'green' :
                                            echo '<a class="banner_cta_link btn btn-xlg btn-link--green" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                    $cta_link['title'] .
                                                '</a>';
                                            break;
                                    case 'blue' :
                                            echo '<a class="banner_cta_link btn btn-xlg c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                    $cta_link['title'] .
                                                '</a>';
                                            break;
                                    case 'white' :
                                            echo '<a class="banner_cta_link btn btn-xlg c-btn-border-2x c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                    $cta_link['title'] .
                                                '</a>';
                                            break;
                                    case 'link' :
                                            echo '<a class="banner_cta_link" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                    $cta_link['title'] .
                                                '</a>';
                                            break;
                                    default: break;
                                }
                            endif;
                        endwhile;


                    endif;
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                endif;
                    // check current row layout
                if( get_row_layout() == 'hero_head' ):

                    $header_align = get_sub_field('align');
                    $header_icon = get_sub_field('icon');
                    // $page_tag = get_sub_field('page_tag');
                    $header_headline = get_sub_field('h1_title');
                    $header_slogan = get_sub_field('subtitle');
                    $header_description = get_sub_field('description');
                    $header_cta = get_sub_field('cta');

                    echo '<div class="c-content-box c-size-md">';
                    echo '<div class="container header header--' . $header_align . '">';
                    echo '<div class="row">';
                    echo '<div class="col-sm-12">';

                    if ($header_icon):
                        echo '<div class="header_icon">' .
                                '<img src="' . $header_icon['url'] . '" alt="' . $header_icon['alt'] . '" width="64" height="64" />' .
                            '</div>';
                    endif;
                    if ($header_headline):
                        echo '<h1>' .
                                $header_headline .
                            '</h1>';
                    endif;
                    if ($header_slogan):
                        echo '<p class="subtitle">' .
                                $header_slogan .
                            '</p>';
                    endif;
                    if ($header_description):
                        echo '<div class="desc">' .
                                $header_description .
                            '</div>';
                    endif;

                    if ($header_cta):

                        while ( have_rows('cta') ) : the_row();
                            $cta_link_type = get_sub_field('cta_link_type');
                            $cta_link = get_sub_field('cta_link');
                            if ($cta_link):
                                switch ($cta_link_type) {
                                    case 'green' :
                                            echo '<a class="header_cta_link btn btn-xlg btn-link--green" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                    $cta_link['title'] .
                                                '</a>';
                                            break;
                                    case 'blue' :
                                            echo '<a class="header_cta_link btn btn-xlg c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                    $cta_link['title'] .
                                                '</a>';
                                            break;
                                    case 'white' :
                                            echo '<a class="header_cta_link btn btn-xlg c-btn-border-2x c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                    $cta_link['title'] .
                                                '</a>';
                                            break;
                                    case 'link' :
                                            echo '<a class="header_cta_link" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                    $cta_link['title'] .
                                                '</a>';
                                            break;
                                    default: break;
                                }
                            endif;
                        endwhile;


                    endif;
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                endif;

                if( get_row_layout() == 'hero_banner_form' ):

                    $header_headline = get_sub_field('h1_title');
                    $header_slogan = get_sub_field('subtitle');
                    $header_background_image = get_sub_field('background_image');
                    $header_form_code = get_sub_field('form_code');
                    $form_note = get_sub_field('form_note');

                    $style_bg = '';
                    if ($header_background_image):
                        $style_bg = 'style="background-image: url(' . $header_background_image['url'] . ')"';
                    endif;


                    echo '<div class="c-content-box c-size-lg banner banner--requestdemo"' . $style_bg . '>';
                    echo '<div class="container header">';
                    echo '<div class="row">';
                    echo '<div class="col-sm-12 request-demo">';


                    if ($header_headline):
                        echo '<h1>' .
                                $header_headline .
                            '</h1>';
                    endif;
                    if ($header_slogan):
                        echo '<h2>' .
                                $header_slogan .
                            '</h2>';
                    endif;
                    if ($header_form_code):
                        echo '<div class="row">' .
                                '<div class="col-sm-5">' .
                                    $header_form_code .
                                    '<script src="'.Assets\asset_path('scripts/marketo-form.js').'?v=3"></script>' .
                                    '<div class="form-note">' . $form_note . '</div>'.
                                '</div>'.
                            '</div>';

                    endif;

                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                endif;

                // check current row layout
                if( get_row_layout() == '2-column_for_feature_left_image' ):
                    $rows = get_sub_field('repeater_feature');
                    $row_count = count($rows);
                    echo '<div class="c-content-box">';
                    echo '<div class="container">';
                    echo '<div class="row">';
                    foreach ($rows as $row) {
                        $featureImage = $row['feature_image'];
                        $featureDescription = $row['feature_description'];
                        echo '<div class="col-sm-' . strval(12/$row_count) . '">' .
                            '<div class="c-content-feature-2 c-option-2 c-theme-bg-parent-hover">' .
                                '<div class="c-icon-wrapper">' .
                                    '<span aria-hidden="true">' .
                                        '<img src="' . $featureImage['url'] . '" alt="' . $featureImage['alt'] . '" width="50" height="50">' .
                                    '</span>' .
                                '</div>' .
                                '<p>' . $featureDescription . '</p>' .
                            '</div>' .
                        '</div>';
                    }
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                endif;

                // check current row layout
                if( get_row_layout() == 'card' ):
                    $rows = get_sub_field('cards');
                    $row_count = count($rows);

                    $headline = get_sub_field('headline');

                    // check if the nested repeater field has rows of data
                    if( have_rows('cards') ):
                        echo '<div class="c-content-box c-size-md c-padding-t-0">';
                        echo '<div class="container">';
                        echo '<div class="row">';
                        echo '<div class="col-sm-12 card card--block card-col-' . $row_count . '">';


                        echo '<h3>' . $headline . '</h3>';
                            // loop through the rows of data
                        while ( have_rows('cards') ) : the_row();

                            $card_themecolor = get_sub_field('color');
                            $card_img = get_sub_field('icon');
                            $card_title = get_sub_field('title');
                            $card_subtitle = get_sub_field('subtitle');
                            $card_description = get_sub_field('description');

                            $card_subtitle_wrap = '';
                            if ($card_subtitle):
                                $card_subtitle_wrap = '<div class="card-item__subtitle">' . $card_subtitle . '</div>';
                            endif;


                            $cta = get_sub_field('cta');
                            $linkcontent='';
                            if ($cta):

                                while ( have_rows('cta') ) : the_row();
                                    $cta_link_type = get_sub_field('cta_link_type');
                                    $cta_link = get_sub_field('cta_link');
                                    if ($cta_link):
                                        switch ($cta_link_type) {
                                            case 'green' :
                                                    $linkcontent = '<a class="btn btn-xlg btn-link--green" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                            $cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            case 'blue' :
                                                    $linkcontent = '<a class="btn btn-xlg c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                            $cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            case 'white' :
                                                    $linkcontent = '<a class="btn btn-xlg c-btn-border-2x c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                            $cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            case 'link' :
                                                    $linkcontent = '<a class="c-redirectLink" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                            $cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            default: break;
                                        }
                                    endif;
                                endwhile;


                            endif;

                            echo    '<div class="card-item card-item--platform card-item--' . $card_themecolor . '" data-link="' . $cta_link['url'] . '">' .
                                        '<div class="card__icon-wrap"><img src="' . $card_img['url'] . '" alt="' . $card_img['alt'] . '" class="card__icon--small" width="70" height="70" /></div>' .
                                        '<h3>' . $card_title . '</h3>' .
                                        $card_subtitle_wrap .
                                        $card_description .
                                        '<div class="card-item__link">' . $linkcontent . '</div>' .
                                    '</div>';
                        endwhile;

                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';

                    endif;

                endif;

                // check current row layout
                // if( get_row_layout() == 'paragraph' ):
                //     $paragraph_item = get_sub_field('paragraph_item');
                //     $paragraph_itemClass = get_sub_field('paragraph_item')['paragraph_class'];
                //     $paragraph_itemText = get_sub_field('paragraph_item')['paragraph_text'];

                //     echo '<div class="col-sm-12"><p class="' . $paragraph_itemClass . '">' . $paragraph_itemText . '</p></div>';

                // endif;

                // check current row layout
                if( get_row_layout() == 'navigation_button' ):
                    $type = get_sub_field('type');
                    // check if the nested repeater field has rows of data
                    if( have_rows('btn_repeater') ):
                        echo '<div class="c-content-box c-size-md">';
                        echo '<div class="container">';
                        echo '<div class="row">';
                        echo '<div class="col-sm-12 btn-link-group btn-link-group--' . $type . '">';

                            // loop through the rows of data
                        while ( have_rows('btn_repeater') ) : the_row();


                            $btn_link = get_sub_field('button');

                            echo  '<a href="' . $btn_link['url'] . '" target="' . $btn_link['target'] . '" class="btn-link">' . $btn_link['title'] . '</a>';

                        endwhile;

                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';

                    endif;

                endif;

                // check current row layout
                if( get_row_layout() == 'cta' ):

                    $calltoaction_type = get_sub_field('type');
                    $calltoaction_title = get_sub_field('title');
                    $calltoaction_subtitle = get_sub_field('subtitle');
                    $calltoaction_description = get_sub_field('description');
                    $calltoaction_bg = get_sub_field('background_image');
                    $calltoaction_cta = get_sub_field('cta');

                    $style_bg = '';
                    if ($calltoaction_bg):
                        $style_bg = 'style="background-image: url(' . $calltoaction_bg['url'] . ')"';
                    endif;

                    echo '<div class="c-content-box c-size-md c-content-box--bg" ' . $style_bg . '>';
                    echo '<div class="container">';
                    echo '<div class="row">';
                    echo '<div class="col-sm-12 callToAction callToAction--' . $calltoaction_type . '">';

                    if ($calltoaction_title):
                        echo '<h3>' .
                                $calltoaction_title .
                            '</h3>';
                    endif;
                    if ($calltoaction_subtitle):
                        echo '<p class="subtitle">' .
                                $calltoaction_subtitle .
                            '</p>';
                    endif;
                    if ($calltoaction_cta):

                        while ( have_rows('cta') ) : the_row();
                            $cta_link_type = get_sub_field('cta_link_type');
                            $cta_link = get_sub_field('cta_link');
                            if ($cta_link):
                                switch ($cta_link_type) {
                                    case 'green' :
                                            echo '<a class="btn btn-xlg btn-link--green" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                    $cta_link['title'] .
                                                '</a>';
                                            break;
                                    case 'blue' :
                                            echo '<a class="btn btn-xlg c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                    $cta_link['title'] .
                                                '</a>';
                                            break;
                                    case 'white' :
                                            echo '<a class="btn btn-xlg c-btn-border-2x c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                    $cta_link['title'] .
                                                '</a>';
                                            break;
                                    case 'link' :
                                            echo '<a class="c-redirectLink" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                    $cta_link['title'] .
                                                '</a>';
                                            break;
                                    default: break;
                                }
                            endif;
                        endwhile;


                    endif;

                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                endif;

                // check current row layout
                if( get_row_layout() == 'logo' ):

                    $logo_repeater = get_sub_field('logo_repeater');
                    // check if the nested repeater field has rows of data
                    if( have_rows('logo_repeater') ):

                        echo '<div class="container">';
                        echo '<div class="row">';
                        echo '<div class="c-content-client-logos-slider-1  c-bordered" data-slider="owl" data-items="6" data-desktop-items="6" data-desktop-small-items="3" data-tablet-items="3" data-mobile-small-items="1" data-auto-play="5000">';
                        echo '<div class="owl-carousel owl-theme c-theme owl-bordered1">';
                            // loop through the rows of data
                        while ( have_rows('logo_repeater') ) : the_row();

                            $logo_image = get_sub_field('logo_image');

                            echo    '<div class="item">' .
                                        '<img class="c-img-pos grayscale" src="' . $logo_image['url'] . '" alt="' . $logo_image['alt'] . '" width="180" height="140" />' .
                                    '</div>';
                        endwhile;

                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';

                    endif;


                endif;

                // check current row layout
                if( get_row_layout() == 'resource' ):

                    $headline = get_sub_field('title');
                    $slogan = get_sub_field('subtitle');
                    $description = get_sub_field('description');
                    $promotion_cta = get_sub_field('cta');
                    $bg_image = get_sub_field('background_image');

                    $style_bg = '';
                    if ($bg_image):
                        $style_bg = 'style="background-image: url(' . $bg_image['url'] . ')"';
                    endif;

                    echo '<div class="c-content-box c-content-box--bg c-size-xlg promotion" ' . $style_bg . '>';
                    echo '<div class="container">';
                    echo '<div class="row">';
                    echo '<div class="col-sm-6">';

                    if ($headline):
                        echo '<div class="promotion_headline">' .
                                $headline .
                            '</div>';
                    endif;
                    if ($slogan):
                        echo '<h3>' .
                                $slogan .
                            '</h3>';
                    endif;
                    if ($description):
                        echo $description;
                    endif;
                    if ($promotion_cta):

                        while ( have_rows('cta') ) : the_row();
                            $cta_link_type = get_sub_field('cta_link_type');
                            $cta_link = get_sub_field('cta_link');
                            echo '<div class="action">';
                            if ($cta_link):
                                switch ($cta_link_type) {
                                    case 'green' :
                                            echo '<a class="btn btn-xlg btn-link--green" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                    $cta_link['title'] .
                                                '</a>';
                                            break;
                                    case 'blue' :
                                            echo '<a class="btn btn-xlg c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                    $cta_link['title'] .
                                                '</a>';
                                            break;
                                    case 'white' :
                                            echo '<a class="btn btn-xlg c-btn-border-2x c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                    $cta_link['title'] .
                                                '</a>';
                                            break;
                                    case 'link' :
                                            echo '<a class="c-redirectLink" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                    $cta_link['title'] .
                                                '</a>';
                                            break;
                                    default: break;
                                }
                            endif;
                            echo '</div>';
                        endwhile;


                    endif;

                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                endif;

                // check current row layout
                if( get_row_layout() == 'image-text_card' ):

                    // check if the nested repeater field has rows of data
                    if( have_rows('image_text_card_repeater') ):

                        echo '<div class="c-content-box c-size-md">';
                        echo '<div class="container">';
                        echo '<div class="row">';
                        echo '<div class="col-sm-12">';
                            // loop through the rows of data
                        while ( have_rows('image_text_card_repeater') ) : the_row();

                            $headline = get_sub_field('title');
                            $body = get_sub_field('description');
                            $image = get_sub_field('image');
                            $image_position = get_sub_field('image_position');
                            $color = get_sub_field('color');
                            $cta = get_sub_field('cta');
                            $linkcontent = '';

                            $cta_link = '';

                            if ($cta):
                                while ( have_rows('cta') ) : the_row();
                                    $cta_link_type = get_sub_field('cta_link_type');
                                    $cta_link = get_sub_field('cta_link');
                                    if ($cta_link):
                                        switch ($cta_link_type) {
                                            case 'green' :
                                                    $linkcontent = '<a class="btn btn-xlg btn-link--green" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                            $cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            case 'blue' :
                                                    $linkcontent = '<a class="btn btn-xlg c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                            $cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            case 'white' :
                                                    $linkcontent = '<a class="btn btn-xlg c-btn-border-2x c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                            $cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            case 'link' :
                                                    $linkcontent = '<a class="c-redirectLink" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                            $cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            default: break;
                                        }
                                    endif;
                                endwhile;
                            endif;

                            echo    '<div class="img-text-card img-text-card--' . $color . ' img-text-card--' . $image_position . ' clearfix" data-link="' . $cta_link['url'] . '">' .
                                        '<div class="img-text-card__img">' .
                                            '<img src="' . $image['url'] . '" alt="' . $image['alt'] . '" width="" height="" />' .
                                        '</div>' .
                                        '<div class="img-text-card__text">' .
                                            '<h3 class="highlight highlight--' . $color . '">' . $headline . '</h3>' .
                                            '<p>' . $body . '</p>' .
                                            '<div class="img-text-card__link">' . $linkcontent . '</div>' .
                                        '</div>' .
                                    '</div>';
                        endwhile;

                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';

                    endif;


                endif;

                // check current row layout
                if( get_row_layout() == 'image-text' ):
                    $background_color = get_sub_field('background_color');
                    // check if the nested repeater field has rows of data
                    if( have_rows('image_text_column_repeater') ):

                        echo '<div class="c-content-box c-content-box--' . $background_color . ' c-size-md">';
                        echo '<div class="container">';
                        echo '<div class="row">';
                            // loop through the rows of data
                        while ( have_rows('image_text_column_repeater') ) : the_row();

                            $headline = get_sub_field('title');
                            $title_color = get_sub_field('title_color');
                            $body = get_sub_field('description');
                            $image = get_sub_field('image');
                            $image_position = get_sub_field('image_position');
                            $cta = get_sub_field('cta');
                            $pull6 = '';
                            $push6 = '';
                            if ($image_position == 'right') :
                                $pull6 = 'col-sm-pull-6';
                                $push6 = 'col-sm-push-6';
                            endif;
                            $linkcontent = '';

                            if ($cta):
                                while ( have_rows('cta') ) : the_row();
                                    $cta_link_type = get_sub_field('cta_link_type');
                                    $cta_link = get_sub_field('cta_link');
                                    if ($cta_link):
                                        switch ($cta_link_type) {
                                            case 'green' :
                                                    $linkcontent = '<a class="btn btn-xlg btn-link--green" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                            $cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            case 'blue' :
                                                    $linkcontent = '<a class="btn btn-xlg c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                            $cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            case 'white' :
                                                    $linkcontent = '<a class="btn btn-xlg c-btn-border-2x c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                            $cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            case 'link' :
                                                    $linkcontent = '<a class="c-redirectLink" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                            $cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            default: break;
                                        }
                                    endif;
                                endwhile;
                                if ($linkcontent !== ''):
                                    $linkcontent = '<div class="img-text-column__link"> ' . $linkcontent . ' </div>';
                                endif;
                            endif;

                            echo    '<div class="img-text-column img-text-column--' . $image_position . ' clearfix">' .
                                        '<div class="col-sm-6 ' . $push6 . ' img-text-column__img">' .
                                            '<img src="' . $image['url'] . '" alt="' . $image['alt'] . '" width="" height="" />' .
                                        '</div>' .
                                        '<div class="col-sm-6 ' . $pull6 . ' img-text-column__text">' .
                                            '<h3 class="highlight highlight--' . $title_color . '">' . $headline . '</h3>' .
                                            $body .
                                            $linkcontent .
                                        '</div>' .
                                    '</div>';
                        endwhile;

                        echo '</div>';
                        echo '</div>';
                        echo '</div>';

                    endif;


                endif;

                // check current row layout
                if( get_row_layout() == '1-column' ):

                    $headimage = get_sub_field('image');
                    $headicon = get_sub_field('icon');
                    $headline = get_sub_field('title');
                    $body = get_sub_field('description');
                    $cta = get_sub_field('cta');
                    $btn_group = get_sub_field('btn_group');


                    echo '<div class="c-content-box c-size-md">';
                    echo '<div class="container">';
                    echo '<div class="row">';
                    echo '<div class="col-sm-10 col-sm-push-1 c-center">';

                    if ($headimage):
                        echo '<img src="' . $headimage['url'] . '" alt="' . $headimage['alt'] . '"/>';
                    endif;

                    if ($headicon):
                        echo '<div class="header_icon">' .
                                '<img src="' . $headicon['url'] . '" alt="' . $headicon['alt'] . '" width="64" height="64" />' .
                            '</div>';
                    endif;
                    if ($headline):
                        echo '<h3>' .
                                $headline .
                            '</h3>';
                    endif;
                    if ($body):
                        echo $body;
                    endif;
                    if ($cta):
                        while ( have_rows('cta') ) : the_row();
                            $cta_link_type = get_sub_field('cta_link_type');
                            $cta_link = get_sub_field('cta_link');

                            if ($cta_link):
                                switch ($cta_link_type) {
                                    case 'green' :
                                            echo '<a class="c-margin-t-30 btn btn-xlg btn-link--green" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                    $cta_link['title'] .
                                                '</a>';
                                            break;
                                    case 'blue' :
                                            echo '<a class="c-margin-t-30 btn btn-xlg c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                    $cta_link['title'] .
                                                '</a>';
                                            break;
                                    case 'white' :
                                            echo '<a class="c-margin-t-30 btn btn-xlg c-btn-border-2x c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                    $cta_link['title'] .
                                                '</a>';
                                            break;
                                    case 'link' :
                                            echo '<div class="c-margin-t-30"><a class="c-redirectLink" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                    $cta_link['title'] .
                                                '</a></div>';
                                            break;
                                    default: break;
                                }
                            endif;
                        endwhile;


                    endif;

                    if ($btn_group):
                        while ( have_rows('btn_group') ) : the_row();
                            $type = get_sub_field('type');
                            // check if the nested repeater field has rows of data
                            if( have_rows('btn_repeater') ):

                                echo '<div class="btn-link-group c-margin-t-60 btn-link-group--' . $type . '">';

                                    // loop through the rows of data
                                while ( have_rows('btn_repeater') ) : the_row();

                                    $btn_link = get_sub_field('button');

                                    echo  '<a href="' . $btn_link['url'] . '" target="' . $btn_link['target'] . '" class="btn-link">' . $btn_link['title'] . '</a>';

                                endwhile;

                                echo '</div>';

                            endif;
                        endwhile;
                    endif;


                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                endif;

                // check current row layout
                if( get_row_layout() == '2-column' ):
                    $rows = get_sub_field('columns');
                    $row_count = count($rows);
                    $row_index = 0;
                    // check if the nested repeater field has rows of data
                    if( have_rows('columns') ):

                        echo '<div class="c-content-box c-size-md">';
                        echo '<div class="container">';
                        echo '<div class="row">';
                            // loop through the rows of data
                        $push = '';
                        while ( have_rows('columns') ) : the_row();
                            $row_index++;
                            if ($row_index == $row_count):
                                $push = 'col-sm-push-2';
                            endif;
                            $headline = get_sub_field('headline');
                            $body = get_sub_field('body');
                            $icon = get_sub_field('icon');
                            $cta = get_sub_field('cta');

                            $headerIcon = '';
                            if ($icon):
                                $headerIcon = '<div class="header_icon">' .
                                                '<img src="' . $icon['url'] . '" alt="' . $icon['alt'] . '" width="64" height="64" />' .
                                            '</div>';
                            endif;

                            $linkcontent = '';

                            if ($cta):
                                while ( have_rows('cta') ) : the_row();
                                    $cta_link_type = get_sub_field('cta_link_type');
                                    $cta_link = get_sub_field('cta_link');
                                    if ($cta_link):
                                        switch ($cta_link_type) {
                                            case 'green' :
                                                    $linkcontent = '<a class="btn btn-xlg btn-link--green" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                            $cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            case 'blue' :
                                                    $linkcontent = '<a class="btn btn-xlg c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                            $cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            case 'white' :
                                                    $linkcontent = '<a class="btn btn-xlg c-btn-border-2x c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                            $cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            case 'link' :
                                                    $linkcontent = '<a class="c-redirectLink" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                            $cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            default: break;
                                        }
                                    endif;
                                endwhile;
                            endif;

                            echo    '<div class="col-sm-5 ' . $push . '">' .
                                        $headerIcon .
                                        '<h3>' . $headline . '</h3>' .
                                        $body .
                                        '<div class="c-margin-t-30">' . $linkcontent . '</div>' .
                                    '</div>';
                        endwhile;

                        echo '</div>';
                        echo '</div>';
                        echo '</div>';

                    endif;


                endif;

                // check current row layout
                if( get_row_layout() == 'testimonial' ):

                    $alignment = get_sub_field('alignment');
                    $background_image = get_sub_field('background_image');
                    $quote = get_sub_field('quote');
                    $signature = get_sub_field('signature');
                    $signature_image = get_sub_field('signature_image');
                    $story_link = get_sub_field('story_link');
                    $background_color = get_sub_field('background_color');

                    $colsType = '';
                    if ($alignment == 'left'):
                        $colsType = 'col-sm-7';
                    elseif ($alignment == 'center'):
                        $colsType = 'col-sm-10 col-sm-push-1';
                    endif;

                    $style_bg = '';
                    if ($background_image):
                        $style_bg = 'style="background-image: url(' . $background_image['url'] . ')"';
                    endif;

                    echo '<div class="c-content-box c-content-box__quote c-size-xlg c-content-box--' . $background_color . ' " ' . $style_bg . '>';
                    echo '<div class="container">';
                    echo '<div class="row">';
                    echo '<div class="' . $colsType . ' c-quote">';

                    if ($quote):
                        echo '<div class="c-quote__content">' .
                                $quote .
                            '</div>';
                    endif;

                    $signatureImage = '';
                    if ($signature_image):
                        $signatureImage = '<img src="' . $signature_image['url'] . '" alt="' . $signature_image['alt'] . '" width="80" height="80" />';
                    endif;

                    if ($signature):
                        echo '<div class="c-quote__signature">' .
                                $signatureImage .
                                $signature .
                            '</div>';
                    endif;
                    if ($story_link):
                        echo '<div class="c-quote__link">' .
                                '<a class="c-redirectLink" href="' . $story_link['url'] . '" target="' . $story_link['target'] . '">' .
                                    $story_link['title'] .
                                '</a>' .
                            '</div>';
                    endif;


                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';

                endif;


                // check current row layout
                if( get_row_layout() == '3-column' ):

                    // check if the nested repeater field has rows of data
                    $title = get_sub_field('title');
                    $background_color = get_sub_field('background_color');
                    if( have_rows('columns') ):

                        echo '<div class="c-content-box c-size-md c-content-box--' . $background_color . '">';
                        echo '<div class="container">';
                        echo '<div class="row">';


                        if ($title):
                            echo '<h3 class="three-column-title">' . $title . '</h3>';
                        endif;

                        echo '<div class="col-sm-12 three-column">';
                            // loop through the rows of data

                        while ( have_rows('columns') ) : the_row();

                            $headline = get_sub_field('headline');
                            $body = get_sub_field('body');
                            $icon = get_sub_field('icon');
                            $cta = get_sub_field('cta');
                            $linkcontent = '';

                            if ($cta):
                                while ( have_rows('cta') ) : the_row();
                                    $cta_link_type = get_sub_field('cta_link_type');
                                    $cta_link = get_sub_field('cta_link');
                                    if ($cta_link):
                                        switch ($cta_link_type) {
                                            case 'green' :
                                                    $linkcontent = '<a class="btn btn-xlg btn-link--green" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                            $cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            case 'blue' :
                                                    $linkcontent = '<a class="btn btn-xlg c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                            $cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            case 'white' :
                                                    $linkcontent = '<a class="btn btn-xlg c-btn-border-2x c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                            $cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            case 'link' :
                                                    $linkcontent = '<a class="c-redirectLink" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                            $cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            default: break;
                                        }
                                    endif;
                                endwhile;
                            endif;

                            if ($linkcontent !== ''):
                                $linkcontent = '<div class="c-margin-t-30">' . $linkcontent . '</div>';
                            endif;

                            echo    '<div class="three-column__item">' .
                                        '<img src="' . $icon['url'] . '" alt="' . $icon['alt'] . '" width="" height="80" />' .
                                        '<h5 class="three-column__title">' . $headline . '</h3>' .
                                        $body .
                                        $linkcontent .
                                    '</div>';
                        endwhile;

                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';

                    endif;


                endif;

                // check current row layout
                if( get_row_layout() == '2-column_for_feature' ):
                    $background_color = get_sub_field('background_color');
                    $color = get_sub_field('color');
                    // check if the nested repeater field has rows of data
                    if( have_rows('column') ):

                        echo '<div class="c-content-box c-content-box--' . $background_color . ' c-size-md">';
                        echo '<div class="container">';
                        echo '<div class="row">';
                        echo '<div class="col-sm-12 feature-column">';
                            // loop through the rows of data

                        while ( have_rows('column') ) : the_row();

                            $headline = get_sub_field('headline');
                            $body = get_sub_field('body');
                            $icon = get_sub_field('icon');


                            if ($linkcontent !== ''):
                                $linkcontent = '<div class="c-margin-t-30">' . $linkcontent . '</div>';
                            endif;

                            echo    '<div class="feature-column__item">' .
                                        '<div><img src="' . $icon['url'] . '" alt="' . $icon['alt'] . '" width="60" height="60" /></div>' .
                                        '<h5 class="feature-column__title highlight highlight--' . $color . '">' . $headline . '</h5>' .
                                        $body .
                                        $linkcontent .
                                    '</div>';

                        endwhile;

                        $cta = get_sub_field('cta');
                            $linkcontent = '';

                        if ($cta):
                            while ( have_rows('cta') ) : the_row();
                                $cta_link_type = get_sub_field('cta_link_type');
                                $cta_link = get_sub_field('cta_link');
                                if ($cta_link):
                                    switch ($cta_link_type) {
                                        case 'green' :
                                                $linkcontent = '<a class="btn btn-xlg btn-link--green" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                        $cta_link['title'] .
                                                    '</a>';
                                                break;
                                        case 'blue' :
                                                $linkcontent = '<a class="btn btn-xlg c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                        $cta_link['title'] .
                                                    '</a>';
                                                break;
                                        case 'white' :
                                                $linkcontent = '<a class="btn btn-xlg c-btn-border-2x c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                        $cta_link['title'] .
                                                    '</a>';
                                                break;
                                        case 'link' :
                                                $linkcontent = '<a class="c-redirectLink" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                        $cta_link['title'] .
                                                    '</a>';
                                                break;
                                        default: break;
                                    }
                                endif;
                            endwhile;
                            if ($linkcontent !== ''):
                                $linkcontent = '<div class="feature-column__link"> ' . $linkcontent . ' </div>';
                            endif;
                        endif;
                        echo '<div class="clear"></div>' . $linkcontent;
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';

                    endif;


                endif;


                // check current row layout
                if( get_row_layout() == 'pricing' ):

                    $header_headline = get_sub_field('h1_title');
                    $header_slogan = get_sub_field('subtitle');

                    // check if the nested repeater field has rows of data
                    if( have_rows('pricing_tab') ):

                        echo '<div class="c-content-box c-size-md">';
                        echo '<div class="container">';
                        echo '<div class="row">';

                        echo '<div class="col-sm-12 c-center">' .
                                '<h1>' . $header_headline . '</h1>' .
                                '<h2>' .
                                    $header_slogan .
                                '</h2>' .
                            '</div>';

                        echo '<div class="col-sm-12">';
                        echo '<div class="threeTab__Index--Wrap clearfix" data-wheel="true">';
                            // loop through the rows of data

                        while ( have_rows('pricing_tab') ) : the_row();

                            $color = get_sub_field('color');
                            $tag = get_sub_field('tag');
                            $headline = get_sub_field('headline');
                            $body = get_sub_field('body');
                            $link = get_sub_field('link');

                            echo    '<div class="threeTab__Index">' .
                                        '<div class="product-item__tag product-item__tag--large product-item__tag' . $color . '">' . $tag . '</div>' .
                                        '<h3>' . $headline . '</h3>' .
                                        '<div class="threeTab__Index--desc">' .
                                            '<p class="product-item__desc"> ' . $body . ' </p>' .
                                            '<div class="threeTab__Index--link">' .
                                                '<a class="c-redirectLink" href="' . $link['url'] . '" target="' . $link['target'] . '">' .
                                                    $link['title'] .
                                                '</a>' .
                                            '</div>' .
                                        '</div>' .
                                    '</div>';

                        endwhile;

                        echo '</div>';
                        echo '<div class="threeTab__Detail-wrap">';

                        // pricing live chat details
                        echo '<div class="threeTab__Detail clearfix">';
                        while ( have_rows('pricing_details_live_chat') ) : the_row();

                            $title = get_sub_field('title');
                            $if_show_price = get_sub_field('if_show_price');
                            $price = get_sub_field('price');
                            $request_quote = get_sub_field('request_quote');
                            $feature_list_title = get_sub_field('feature_list_title');

                            $priceContent = '<span class="threeTab__Detail--priceQuote"><strong>' . $request_quote . '</strong></span>';
                            if ($if_show_price):
                                while ( have_rows('price') ) : the_row();
                                    $price_number = get_sub_field('price_number');
                                    $price_unit = get_sub_field('price_unit');
                                    $priceContent = '<span class="threeTab__Detail--priceNum"><strong>$' . $price_number . '</strong></span>' .
                                    '<span class="threeTab__Detail--priceUnit">' . $price_unit . '</span>';
                                endwhile;

                            endif;

                            $li_feature_list = '';
                            while ( have_rows('feature_list') ) : the_row();
                                $feature_point = get_sub_field('feature_point');

                                $li_feature_list .= '<li>' . $feature_point . '</li>';
                            endwhile;


                            $cta = get_sub_field('cta');
                            $linkcontent = '';

                            if ($cta):
                                while ( have_rows('cta') ) : the_row();
                                    $cta_link_type = get_sub_field('cta_link_type');
                                    $cta_link = get_sub_field('cta_link');
                                    if ($cta_link):
                                        switch ($cta_link_type) {
                                            case 'green' :
                                                    $linkcontent = '<a class="btn btn-xlg btn-link--green" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                            $cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            case 'blue' :
                                                    $linkcontent = '<a class="btn btn-xlg c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                            $cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            case 'white' :
                                                    $linkcontent = '<a class="btn btn-xlg c-btn-border-2x c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                            $cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            case 'link' :
                                                    $linkcontent = '<a class="c-redirectLink" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                            $cta_link['title'] .
                                                        '</a>';
                                                    break;
                                            default: break;
                                        }
                                    endif;
                                endwhile;
                                if ($linkcontent !== ''):
                                    $linkcontent = '<div class="threeTab__Detail--action"> ' . $linkcontent . ' </div>';
                                endif;
                            endif;

                            echo    '<div class="col-sm-4 threeTab__Detail--col">' .
                                        '<div class="threeTab__Detail--title">' . $title . '</div>' .
                                        '<div class="threeTab__Detail--price">' . $priceContent . '</div>' .
                                        '<p class="threeTab__Detail--subTitle">' . $feature_list_title . '</p>' .
                                        '<ul class="threeTab__Detail--contentList">' .
                                            $li_feature_list .
                                        '</ul>' .
                                        $linkcontent .
                                    '</div>';

                        endwhile;

                        echo '</div>';
                        // end pricing live chat details

                        // pricing multichannel details
                        while ( have_rows('pricing_details_multichannel') ) : the_row();

                            $pricing_details_multichannel_title = get_sub_field('title');

                            $columnFirst = '';
                            while ( have_rows('column_first') ) : the_row();
                                $title = get_sub_field('title');
                                $feature_list = '';
                                while ( have_rows('feature_list') ) : the_row();
                                    $feature_list .= '<li>' . get_sub_field('feature_point') . '</li>';
                                endwhile;
                                $columnFirst = '<div class="col-sm-4 threeTab__Detail--col">' .
                                                '<p class="threeTab__Detail--subTitle">' . $title . '</p>' .
                                                '<ul class="threeTab__Detail--contentList">' .
                                                    $feature_list .
                                                '</ul>' .
                                            '</div>';
                            endwhile;

                            $columnSecond = '';
                            while ( have_rows('column_second') ) : the_row();
                                $title = get_sub_field('title');
                                $feature_list = '';
                                while ( have_rows('feature_list') ) : the_row();
                                    $feature_list .= '<li>' . get_sub_field('feature_point') . '</li>';
                                endwhile;
                                $columnSecond = '<div class="col-sm-4 threeTab__Detail--col">' .
                                                '<p class="threeTab__Detail--subTitle">' . $title . '</p>' .
                                                '<ul class="threeTab__Detail--contentList">' .
                                                    $feature_list .
                                                '</ul>' .
                                            '</div>';
                            endwhile;

                            $columnThird = '';
                            while ( have_rows('column_third') ) : the_row();
                                $price_number = get_sub_field('price_number');
                                $price_unit = get_sub_field('price_unit');

                                $cta = get_sub_field('cta');
                                $linkcontent='';
                                if ($cta):
                                    while ( have_rows('cta') ) : the_row();
                                        $cta_link_type = get_sub_field('cta_link_type');
                                        $cta_link = get_sub_field('cta_link');
                                        if ($cta_link):
                                            switch ($cta_link_type) {
                                                case 'green' :
                                                        $linkcontent = '<a class="btn btn-xlg btn-link--green" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                                $cta_link['title'] .
                                                            '</a>';
                                                        break;
                                                case 'blue' :
                                                        $linkcontent = '<a class="btn btn-xlg c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                                $cta_link['title'] .
                                                            '</a>';
                                                        break;
                                                case 'white' :
                                                        $linkcontent = '<a class="btn btn-xlg c-btn-border-2x c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                                $cta_link['title'] .
                                                            '</a>';
                                                        break;
                                                case 'link' :
                                                        $linkcontent = '<a class="c-redirectLink" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                                $cta_link['title'] .
                                                            '</a>';
                                                        break;
                                                default: break;
                                            }
                                        endif;
                                    endwhile;
                                endif;

                                $columnThird = '<div class="col-sm-4 threeTab__Detail--col">' .
                                                    '<div class="threeTab__Detail--price">' .
                                                        '<span class="threeTab__Detail--priceNum"><strong>$' . $price_number . '</strong></span>' .
                                                        '<span class="threeTab__Detail--priceUnit">' . $price_unit . '</span>' .
                                                    '</div>' .
                                                    '<div class="threeTab__Detail--action">' .
                                                        $linkcontent .
                                                    '</div>' .
                                                '</div>';
                            endwhile;

                            echo    '<div class="threeTab__Detail clearfix">' .

                                        '<div class="threeTab__Detail--title">' .
                                            $pricing_details_multichannel_title .
                                        '</div>' .

                                        $columnFirst .
                                        $columnSecond .
                                        $columnThird .
                                    '</div>';

                        endwhile;
                        // end pricing multichannel details


                        // pricing AI details
                        while ( have_rows('pricing_details_ai') ) : the_row();

                            $pricing_details_ai_title = get_sub_field('title');

                            $columnFirst = '';
                            while ( have_rows('column_first') ) : the_row();
                                $title = get_sub_field('title');
                                $feature_list = '';
                                while ( have_rows('feature_list') ) : the_row();
                                    $feature_list .= '<li>' . get_sub_field('feature_point') . '</li>';
                                endwhile;
                                $columnFirst = '<div class="col-sm-4 threeTab__Detail--col">' .
                                                '<p class="threeTab__Detail--subTitle">' . $title . '</p>' .
                                                '<ul class="threeTab__Detail--contentList">' .
                                                    $feature_list .
                                                '</ul>' .
                                            '</div>';
                            endwhile;

                            $columnSecond = '';
                            while ( have_rows('column_second') ) : the_row();
                                $title_01 = get_sub_field('title_01');
                                $feature_list_01 = '';
                                while ( have_rows('feature_list_01') ) : the_row();
                                    $feature_list_01 .= '<li>' . get_sub_field('feature_point') . '</li>';
                                endwhile;

                                $title_02 = get_sub_field('title_02');
                                $feature_list_02 = '';
                                while ( have_rows('feature_list_02') ) : the_row();
                                    $feature_list_02 .= '<li>' . get_sub_field('feature_point') . '</li>';
                                endwhile;

                                $columnSecond = '<div class="col-sm-4 threeTab__Detail--col">' .
                                                '<p class="threeTab__Detail--subTitle">' . $title_01 . '</p>' .
                                                '<ul class="threeTab__Detail--contentList">' .
                                                    $feature_list_01 .
                                                '</ul>' .
                                                '<p class="threeTab__Detail--subTitle">' . $title_02 . '</p>' .
                                                '<ul class="threeTab__Detail--contentList">' .
                                                    $feature_list_02 .
                                                '</ul>' .
                                            '</div>';
                            endwhile;

                            $columnThird = '';
                            while ( have_rows('column_third') ) : the_row();
                                $price = get_sub_field('price');

                                $cta = get_sub_field('cta');
                                $linkcontent='';
                                if ($cta):
                                    while ( have_rows('cta') ) : the_row();
                                        $cta_link_type = get_sub_field('cta_link_type');
                                        $cta_link = get_sub_field('cta_link');
                                        if ($cta_link):
                                            switch ($cta_link_type) {
                                                case 'green' :
                                                        $linkcontent = '<a class="btn btn-xlg btn-link--green" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                                $cta_link['title'] .
                                                            '</a>';
                                                        break;
                                                case 'blue' :
                                                        $linkcontent = '<a class="btn btn-xlg c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                                $cta_link['title'] .
                                                            '</a>';
                                                        break;
                                                case 'white' :
                                                        $linkcontent = '<a class="btn btn-xlg c-btn-border-2x c-theme-btn" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                                $cta_link['title'] .
                                                            '</a>';
                                                        break;
                                                case 'link' :
                                                        $linkcontent = '<a class="c-redirectLink" href="' . $cta_link['url'] . '" target="' . $cta_link['target'] . '">' .
                                                                $cta_link['title'] .
                                                            '</a>';
                                                        break;
                                                default: break;
                                            }
                                        endif;
                                    endwhile;
                                endif;

                                $columnThird = '<div class="col-sm-4 threeTab__Detail--col">' .
                                                    '<div class="threeTab__Detail--price">' .
                                                        '<span class="threeTab__Detail--priceQuote"><strong>' . $price . '</strong></span>' .
                                                    '</div>' .
                                                    '<div class="threeTab__Detail--action">' .
                                                        $linkcontent .
                                                    '</div>' .
                                                '</div>';
                            endwhile;

                            echo    '<div class="threeTab__Detail clearfix">' .

                                        '<div class="threeTab__Detail--title">' .
                                            $pricing_details_ai_title .
                                        '</div>' .

                                        $columnFirst .
                                        $columnSecond .
                                        $columnThird .
                                    '</div>';

                        endwhile;
                        // end pricing AI details


                        echo '</div>';

                        $pricing_details_bottom_link = get_sub_field('pricing_details_bottom_link');
                        if ($pricing_details_bottom_link):
                            echo '<div class="threeTab__Detail--bottomLink">' .
                                    '<a href="' . $pricing_details_bottom_link['url'] . '" target="' . $pricing_details_bottom_link['target'] . '">' .
                                        $pricing_details_bottom_link['title'] .
                                    '</a>' .
                                '</div>';
                        endif;

                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';

                    endif;


                endif;


                // check current row layout
                if( get_row_layout() == 'feature_list' ):
                    if( have_rows('feature_list_repeater') ):

                        echo '<div class="c-content-box">';
                        echo '<div class="container">';
                        echo '<div class="row">';
                        echo '<div class="col-sm-12">';
                        while ( have_rows('feature_list_repeater') ) : the_row();
                            $feature_list_header = get_sub_field('feature_list_header');
                            if ($feature_list_header):
                                echo '<div class="featurelist-header-container">';
                                echo '<div class="featurelist-header clearfix">';
                                while ( have_rows('feature_list_header') ) : the_row();
                                    $feature_list_header_feature_name = get_sub_field('feature_list_header_feature_name');
                                    if ($feature_list_header_feature_name):
                                        echo '<span class="featurelist-content">' . $feature_list_header_feature_name . '</span>';
                                    endif;

                                    $feature_list_header_plan = get_sub_field('feature_list_header_plan');
                                    if ( have_rows('feature_list_header_plan') ):
                                        while ( have_rows('feature_list_header_plan') ) : the_row();
                                            $plan_name = get_sub_field('plan_name');
                                            echo '<span class="featurelist-plan">' . $plan_name . '</span>';
                                        endwhile;
                                    endif;
                                endwhile;
                                echo '</div>';
                                echo '</div>';
                            endif;

                            $feature_list_content = get_sub_field('feature_list_content');
                            if( have_rows('feature_list_content') ):
                                echo '<div class="featurelist clearfix">';
                                while ( have_rows('feature_list_content') ) : the_row();
                                    echo '<ul class="clearfix">';
                                    $feature_list_content_feature = get_sub_field('feature_list_content_feature');
                                    if ($feature_list_content_feature):
                                        while ( have_rows('feature_list_content_feature') ) : the_row();
                                            $if_link = get_sub_field('if_link');
                                            $name_link = get_sub_field('name_link');
                                            $name_text = get_sub_field('name_text');
                                            $featurename = '';
                                            if ($if_link):
                                                $featurename = '<a href="' . $name_link['url'] . '" target="' . $name_link['target'] . '">' . $name_link['title'] . '</a>';
                                            else:
                                                $featurename = $name_text;
                                            endif;

                                            $tooltip = get_sub_field('tooltip');
                                            echo '<li class="option-title tooltips" data-placement="right" title="" data-original-title="' . $tooltip . '">' .
                                                    $featurename .
                                                '</li>';
                                        endwhile;
                                    endif;

                                    $featurecontentTeam = '&nbsp;';
                                    $featurecontentBusiness = '&nbsp;';
                                    $featurecontentEnt = '&nbsp;';
                                    $if_show_tick = get_sub_field('if_show_tick');
                                    if ($if_show_tick):
                                        $feature_list_content_if_team_have = get_sub_field('feature_list_content_if_team_have');
                                        $feature_list_content_if_business_have = get_sub_field('feature_list_content_if_business_have');
                                        $feature_list_content_if_ent_have = get_sub_field('feature_list_content_if_ent_have');

                                        if ($feature_list_content_if_team_have):
                                            $featurecontentTeam = '<i class="fa fa-check c-font-20"></i>';
                                        endif;
                                        if ($feature_list_content_if_business_have):
                                            $featurecontentBusiness = '<i class="fa fa-check c-font-20"></i>';
                                        endif;
                                        if ($feature_list_content_if_ent_have):
                                            $featurecontentEnt = '<i class="fa fa-check c-font-20"></i>';
                                        endif;
                                    else:
                                        $featurecontentTeam = get_sub_field('feature_list_content_for_team') == '' ? '&nbsp;' : get_sub_field('feature_list_content_for_team');
                                        $featurecontentBusiness = get_sub_field('feature_list_content_for_business') == '' ? '&nbsp;' : get_sub_field('feature_list_content_for_business');
                                        $featurecontentEnt = get_sub_field('feature_list_content_for_ent') == '' ? '&nbsp;' : get_sub_field('feature_list_content_for_ent');
                                    endif;


                                    echo '<li>' . $featurecontentTeam . '</li>';
                                    echo '<li>' . $featurecontentBusiness . '</li>';
                                    echo '<li>' . $featurecontentEnt . '</li>';

                                    echo '</ul>';
                                endwhile;
                                echo '</div>';
                            endif;

                        endwhile;
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    endif;
                endif;

                // check current row layout
                if( get_row_layout() == 'share_this' ):

                    $title = get_sub_field('title');
                    $share_this_code = get_sub_field('share_this_code');

                    echo '<div class="container">';
                    echo '<div class="row">';
                    echo '<div class="col-sm-12">';
                        echo '<div class="social-share">';
                        echo '<h3 style="line-height: 1.285714em;">' . $title . '</h3>';
                        echo $share_this_code;
                        echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '
                    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-4e2faac9507104da"></script>
                    ';
                endif;

                // check current row layout
                if( get_row_layout() == 'frequent_questions' ):

                    $title = get_sub_field('title');
                    // check if the nested repeater field has rows of data
                    if( have_rows('questions') ):

                        echo '<div class="c-content-box c-size-md">';
                        echo '<div class="container">';
                        echo '<div class="row">';
                        echo '<div class="col-sm-12">';
                            // loop through the rows of data

                        echo '<h3 class="c-center">' . $title . '</h3>';
                        echo '<div class="questions">';

                        while ( have_rows('questions') ) : the_row();

                            $question_title = get_sub_field('question_title');
                            $question_content = get_sub_field('question_content');



                            echo    '<div class="question-item">' .
                                        '<div class="question-item__title">' . $question_title . '</div>' .
                                        '<div class="question-item__content">' . $question_content . '</div>' .
                                    '</div>';
                        endwhile;

                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';

                    endif;


                endif;

                // check current row layout
                if( get_row_layout() == 'user_review' ):

                    $logo = get_sub_field('logo');
                    $headline = get_sub_field('headline');
                    $quote = get_sub_field('quote');
                    $signature = get_sub_field('signature');
                    $user_review_link = get_sub_field('user_review_link');
                    $background_color = get_sub_field('background_color');


                    echo '<div class="c-content-box c-size-md c-content-box--' . $background_color . ' ">';
                    echo '<div class="container">';
                    echo '<div class="row">';
                    echo '<div class="col-sm-12 user-review">';

                    if ($logo):
                        echo '<img src="' . $logo['url'] . '" alt="' . $logo['alt'] . '" width="" height="">';
                    endif;

                    if ($headline):
                        echo '<h4>' .
                                $headline .
                            '</h4>';
                    endif;

                    echo '<div class="simple-quote">';
                    if ($quote):
                        echo '<div class="simple-quote__content">' .
                                $quote .
                            '</div>';
                    endif;
                    if ($signature):
                        echo '<div class="simple-quote__name">' .
                                $signature .
                            '</div>';
                    endif;
                    echo '</div>';

                    if ($user_review_link):
                        echo '<div class="user-review-link">' .
                                '<a class="c-redirectLink" href="' . $user_review_link['url'] . '" target="' . $user_review_link['target'] . '">' .
                                    $user_review_link['title'] .
                                '</a>' .
                            '</div>';
                    endif;


                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';

                endif;

                // check current row layout
                if( get_row_layout() == 'leads_form' ):
                    $anchor = get_sub_field('anchor');
                    $background_color = get_sub_field('background_color');
                    $title = get_sub_field('title');
                    $form = get_sub_field('form');
                    $form_note = get_sub_field('form_note');

                    echo '<div id="' . $anchor . '" class="c-content-box c-size-md c-content-box--' . $background_color . '">' .
                            '<div class="container">' .
                                '<div class="row">' .
                                    '<div class="col-sm-6 col-sm-push-3">' .
                                        '<div class="leads-form">' .
                                            '<h3 class="highlight highlight--blue">' . $title . '</h3>' .
                                            $form .
                                            '<script src="'.Assets\asset_path('scripts/marketo-form.js').'?v=3"></script>' .
                                            '<div class="form-note">' . $form_note . '</div>'.
                                        '</div>' .
                                    '</div>' .
                                '</div>' .
                            '</div>' .
                        '</div>';

                endif;

                // check current row layout
                if( get_row_layout() == 'partner_form' ):
                    $image = get_sub_field('image');
                    $title = get_sub_field('title');
                    $contact_form = get_sub_field('contact_form');
                    $form_note = get_sub_field('form_note');

                    echo '<div class="c-content-box c-size-md">' .
                            '<div class="container">' .
                                '<div class="row">' .

                                    '<div class="col-sm-5"><img class="avatar" src="' . $image['url'] . '" alt="' . $image['alt'] . '" width="380" height="380" /></div>' .
                                    '<div class="col-sm-7">' .
                                        '<div class="contact-form">' .
                                            '<h3 class="highlight highlight--blue">' . $title . '</h3>' .
                                            $contact_form .
                                            '<script src="'.Assets\asset_path('scripts/marketo-form.js').'?v=3"></script>' .
                                            '<div class="form-note">' . $form_note . '</div>'.
                                        '</div>' .
                                    '</div>' .

                                '</div>' .
                            '</div>' .
                        '</div>';

                endif;

                // check current row layout
                if( get_row_layout() == 'compare_list' ):
                    $title = get_sub_field('title');
                    echo '<div class="c-content-box c-size-md">';
                    echo '<div class="container">';
                    echo '<div class="row">';
                    echo '<div class="col-sm-12 comparelist">';
                    echo '<h3>' . $title . '</h3>';
                    echo '<div class="threeTab__Detail-wrap">';
                    echo '<div class="threeTab__Detail clearfix">';
                    echo '<div class="threeTab__Detail--col-wrap clearfix">';

                    while ( have_rows('feature_list') ) : the_row();
                        $color = get_sub_field('color');
                        $compare_name = get_sub_field('compare_name');
                        $feature_list_title = get_sub_field('feature_list_title');

                        $if_show_price = get_sub_field('if_show_price');
                        $request_quote = get_sub_field('request_quote');

                        $priceContent = '<span class="threeTab__Detail--priceQuote"><strong>' . $request_quote . '</strong></span>';
                        if ($if_show_price):
                            while ( have_rows('price') ) : the_row();
                                $price_number = get_sub_field('price_number');
                                $price_unit = get_sub_field('price_unit');
                                $priceContent = '<span class="threeTab__Detail--priceNum"><strong>$' . $price_number . '</strong></span>' .
                                '<span class="threeTab__Detail--priceUnit">' . $price_unit . '</span>';
                            endwhile;

                        endif;

                        echo '<div class="col-sm-6 threeTab__Detail--col">' .
                            '<div class="threeTab__Detail--title threeTab__Detail--title--' . $color . '">' . $compare_name . '</div>' .
                            '<div class="threeTab__Detail--price">' . $priceContent . '</div>' .
                            '<p class="threeTab__Detail--subTitle"> ' . $feature_list_title . ' </p>' .
                            '<ul class="threeTab__Detail--contentList">';
                        while ( have_rows('feature_pointer_list') ) : the_row();

                            echo '<li>' . get_sub_field('feature_pointer') . '</li>';
                        endwhile;
                        echo '</ul>' .
                            '</div>';
                    endwhile;

                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';

                endif;

                // check current row layout
                if( get_row_layout() == 'line' ):

                    $height = get_sub_field('height');
                    $color = get_sub_field('color');
                    $background_color = get_sub_field('background_color');

                    echo '<div class="c-content-box c-content-box--' . $background_color . '">';
                    echo '<div class="container">';
                    echo '<div class="row">';
                    echo '<div class="col-sm-12">';

                    if ($height):
                        echo '<hr style="border-top-color: ' . $color . '; border-top-width: ' . $height . 'px " />';
                    endif;



                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                endif;

                // check current row layout
                if( get_row_layout() == 'left_text_-_right_form' ):
                    $left_title = get_sub_field('left_title');
                    $left_description = get_sub_field('left_description');
                    $left_image = get_sub_field('left_image');
                    $right_form_title = get_sub_field('right_form_title');
                    $right_form_description = get_sub_field('right_form_description');
                    $right_form_code = get_sub_field('right_form_code');
                    $right_form_note = get_sub_field('right_form_note');

                    echo '<div class="c-content-box c-size-md">' .
                            '<div class="container">' .
                                '<div class="row">' .
                                    '<div class="col-sm-6 form-aside">' .
                                        '<h3>' . $left_title . '</h3>' .
                                        '<p>' . $left_description . '</p>' .
                                        '<img src="' . $left_image['url'] . '" alt="' . $left_image['alt'] . '"/>' .
                                    '</div>' .
                                    '<div class="col-sm-6 form-main">' .
                                        '<h3 class="highlight highlight--blue">' . $right_form_title . '</h3>' .
                                        '<div class="form-description">' . $right_form_description . '</div>' .
                                        $right_form_code .
                                        '<div class="form-note">' . $right_form_note . '</div>'.
                                    '</div>' .
                                '</div>' .
                            '</div>' .
                        '</div>';
                endif;

                // check current row layout
                if( get_row_layout() == 'hero_banner_free_trial_form' ):

                    $h1_tag = get_sub_field('h1_tag');
                    $h1_title = get_sub_field('h1_title');
                    $description = get_sub_field('description');
                    $header_background_image = get_sub_field('background_image');
                    $background_image_align = get_sub_field('background_image_align');
                    $header_form_code = get_sub_field('form_code');
                    $form_note = get_sub_field('form_note');

                    $style_bg = '';
                    if ($header_background_image):
                        $style_bg = 'style="background-image: url(' . $header_background_image['url'] . ')"';
                    endif;


                    $banner_description_style = '';
                    if ($background_image_align == 'bottom'):
                        $banner_description_style = 'banner--freetrial__description--top';
                    endif;

                    echo '<div class="c-content-box c-size-lg banner--freetrial"' . $style_bg . '>';
                    echo '<div class="container">';
                    echo '<div class="row">';

                    echo '<div class="col-sm-6">';
                        echo '<div class="banner--freetrial__description ' . $banner_description_style . '">';
                            if ($h1_tag):
                                echo '<div class="h1-tag">' .
                                        $h1_tag .
                                    '</div>';
                            endif;
                            if ($h1_title):
                                echo '<h1>' .
                                        $h1_title .
                                    '</h1>';
                            endif;
                            if ($description):
                                echo $description;
                            endif;
                        echo '</div>';
                    echo '</div>';

                    if ($header_form_code):
                        echo
                            '<div class="col-sm-5 col-sm-push-1">' .
                                $header_form_code .
                                // '<script src="'.Assets\asset_path('scripts/marketo-form.js').'"></script>' .
                                '<div class="form-note">' . $form_note . '</div>'.
                            '</div>';


                    endif;

                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                endif;


                // check current row layout
                if( get_row_layout() == 'hero_banner_demo_form' ):

                    $h1_tag = get_sub_field('h1_tag');
                    $h1_title = get_sub_field('h1_title');
                    $description = get_sub_field('description');
                    $header_background_image = get_sub_field('background_image');
                    $background_image_align = get_sub_field('background_image_align');
                    $header_form_code = get_sub_field('form_code');
                    $form_note = get_sub_field('form_note');

                    $style_bg = '';
                    if ($header_background_image):
                        $style_bg = 'style="background-image: url(' . $header_background_image['url'] . ')"';
                    endif;


                    $banner_description_style = '';
                    if ($background_image_align == 'bottom'):
                        $banner_description_style = 'banner--freetrial__description--top';
                    endif;

                    echo '<div class="c-content-box c-size-lg banner--freetrial"' . $style_bg . '>';
                    echo '<div class="container">';
                    echo '<div class="row">';

                    echo '<div class="col-sm-6">';
                        echo '<div class="banner--freetrial__description ' . $banner_description_style . '">';
                            if ($h1_tag):
                                echo '<div class="h1-tag">' .
                                        $h1_tag .
                                    '</div>';
                            endif;
                            if ($h1_title):
                                echo '<h1>' .
                                        $h1_title .
                                    '</h1>';
                            endif;
                            if ($description):
                                echo $description;
                            endif;
                        echo '</div>';
                    echo '</div>';

                    if ($header_form_code):
                        echo
                            '<div class="col-sm-5 col-sm-push-1">' .
                                $header_form_code .
                                '<script src="'.Assets\asset_path('scripts/marketo-form.js').'?v=3"></script>' .
                                '<div class="form-note">' . $form_note . '</div>'.
                            '</div>';


                    endif;

                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                endif;


                // check current row layout
                if( get_row_layout() == 'custom_story' ):
                    $background_color = get_sub_field('background_color');
                    $logo = get_sub_field('logo');
                    $title = get_sub_field('title');
                    $industry = get_sub_field('industry');
                    $headquarters = get_sub_field('headquarters');
                    echo '<div class="c-content-box c-size-md c-content-box--' . $background_color . '">' .
                            '<div class="container">' .
                                '<div class="row">' .
                                    '<div class="col-sm-4">' .
                                        '<img src="' . $logo['url'] . '" alt="' . $logo['alt'] . '"/>' .
                                    '</div>' .
                                    '<div class="col-sm-8">' .
                                        '<h4 class="c-margin-b-25">' . $title . '</h4>' .
                                        '<p>Industry: <strong>' . $industry . '</strong></p>' .
                                        '<p>Headquartered: <strong>' . $headquarters . '</strong></p>' .
                                    '</div>' .
                                '</div>' .
                            '</div>' .
                        '</div>';
                endif;

                // check current row layout
                if( get_row_layout() == 'landing_context' ):
                    if( have_rows('paragraph_repeater') ):
                        echo '<div class="c-content-box c-size-md">' .
                                    '<div class="container">' .
                                        '<div class="row">' .
                                            '<div class="col-sm-12">' .
                                                '<div class="landingContent">';
                                                    while ( have_rows('paragraph_repeater') ) : the_row();
                                                        echo get_sub_field('paragraph');
                                                    endwhile;
                        echo                    '</div>' .
                                            '</div>' .
                                        '</div>' .
                                    '</div>' .
                                '</div>';
                    endif;
                endif;

                // check current row layout
                if( get_row_layout() == 'icon_content_list' ):
                    if( have_rows('icon_content_list_repeater') ):
                        echo '<div class="c-content-box">' .
                                    '<div class="container">' .
                                        '<div class="row">' .
                                            '<div class="col-sm-12">' .
                                                '<div class="icon-content-list">';
                        while ( have_rows('icon_content_list_repeater') ) : the_row();
                            $icon = get_sub_field('icon');
                            $title = get_sub_field('title');
                            $content = get_sub_field('content');

                            echo '<div class="icon-content-list__element clearfix">' .
                                    '<div class="icon-content-list__icon">' .
                                        '<img src="' . $icon['url'] . '" alt="' . $icon['alt'] . '" width="50" height="50" />' .
                                    '</div>' .
                                    '<div class="icon-content-list__content">' .
                                        '<div class="icon-content-list__title">' .
                                            '<strong>' . $title . '</strong>' .
                                        '</div>' .
                                        '<div class="icon-content-list__desc">' .
                                            $content .
                                        '</div>' .
                                    '</div>' .
                                '</div>';
                        endwhile;
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    endif;
                endif;

                // check current row layout
                if( get_row_layout() == 'sticky_content' ):
                    $distance_of_top = get_sub_field('distance_of_top');
                    echo '<div class="c-content-box">' .
                            '<div class="container">' .
                                '<div class="row">' .
                                    '<div class="col-sm-12" style="margin-top: ' . $distance_of_top . 'px">';

                                    if( have_rows('sticky_nav') ):
                                        echo '<nav class="nav--sticky hidden-xs">' .
                                                '<ul>';
                                        while ( have_rows('sticky_nav') ) : the_row();
                                            $if_divider = get_sub_field('if_divider');
                                            $sticky_nav_element_text = get_sub_field('sticky_nav_element_text');
                                            $anchor = get_sub_field('anchor');

                                            if ($if_divider):
                                                while ( have_rows('sticky_nav_element_divider') ) : the_row();
                                                    echo '<li><hr style="border-top-color: ' . get_sub_field('sticky_nav_element_divider_color') . '; border-top-width: 1px;"></li>';
                                                endwhile;

                                            else:
                                                echo '<li><a href="#' . $anchor . '">' . $sticky_nav_element_text . '</a></li>';
                                            endif;

                                        endwhile;
                                        echo '</ul>';
                                        echo '</nav>';
                                    endif;

                                    if ( have_rows('sticky_details_list') ):
                                        echo '<section class="content--sticky">';
                                        while ( have_rows('sticky_details_list') ) : the_row();
                                            while ( have_rows('sticky_details') ) : the_row();
                                            $id = get_sub_field('id');
                                            $logo = get_sub_field('logo');
                                            $url = get_sub_field('url');
                                            $headquarters = get_sub_field('headquarters');
                                            $founded = get_sub_field('founded');
                                            $integration = get_sub_field('integration');
                                            $best_for = get_sub_field('best_for');

                                            echo '<article id="' . $id . '">';
                                            echo '<div class="companyInfo">' .
                                                    '<img src="' . $logo['url'] . '" alt="' . $logo['alt'] . '" />' .
                                                    '<div class="companyInfo__url">' .
                                                        $url .
                                                    '</div>' .
                                                    '<div class="companyInfo__details">' .
                                                        '<div class="companyInfo__detailsInfo companyInfo__location">' .
                                                            'Headquartered<br>' .
                                                            '<strong>' . $headquarters . '</strong>' .
                                                        '</div>' .
                                                        '<div class="companyInfo__detailsInfo companyInfo__founded">' .
                                                            'Founded<br>' .
                                                            '<strong>' . $founded . '</strong>' .
                                                        '</div>' .
                                                        '<div class="clear"></div>' .
                                                        '<div class="companyInfo__detailsInfo companyInfo__integration">' .
                                                            '<strong>' . $integration . '</strong>' .
                                                        '</div>' .
                                                        '<div class="companyInfo__detailsInfo companyInfo__wards">' .
                                                            'Best for<br>' .
                                                            '<strong>' . $best_for . '</strong>' .
                                                        '</div>' .
                                                    '</div>' .
                                                '</div>';
                                                echo '<hr style="border-top-color: #7F868e; border-top-width: 1px; margin-bottom: 30px; ">';
                                                if (have_rows('collapse_content')):
                                                    echo '<div class="collapse-container">';
                                                        while (have_rows('collapse_content')) : the_row();
                                                            $icon = get_sub_field('icon');
                                                            $title = get_sub_field('title');
                                                            $content = get_sub_field('content');
                                                            echo '<div class="collapse">' .
                                                                    '<img src="' . $icon['url'] . '" alt="' . $icon['alt'] . '" width="50" height="50" />' .
                                                                    '<div class="collapse__title">' .
                                                                        $title .
                                                                    '</div>';


                                                                    echo '<div class="collapse__content">' .
                                                                            $content .
                                                                        '</div>';


                                                            echo  '</div>';
                                                        endwhile;
                                                    echo '</div>';
                                                endif;

                                                if (have_rows('icon_content_list')):
                                                    echo '<div class="row icon-content-list-1">';
                                                        while (have_rows('icon_content_list')) : the_row();
                                                            $icon = get_sub_field('icon');
                                                            $title = get_sub_field('title');
                                                            echo '<div class="col-sm-6">' .
                                                                    '<img src="' . $icon['url'] . '" alt="' . $icon['alt'] . '" width="50" height="50" />' .
                                                                    '<div class="icon-content-list-1__title">' .
                                                                        $title .
                                                                    '</div>';

                                                                    if (have_rows('content_list')):
                                                                        echo '<div class="icon-content-list-1__desc">' .
                                                                                '<ul>';
                                                                        while (have_rows('content_list')) : the_row();
                                                                            echo '<li>' . get_sub_field('content_list_element') . '</li>';
                                                                        endwhile;
                                                                        echo  '</ul>' .
                                                                            '</div>';
                                                                    endif;


                                                                echo '</div>';
                                                        endwhile;
                                                    echo '</div>';
                                                endif;
                                            echo '</article>';

                                            endwhile;
                                        endwhile;
                                        echo '</section>';
                                    endif;

                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                endif;

                // check current row layout
                if( get_row_layout() == 'table' ):
                    echo '<div class="c-content-box c-size-md">' .
                            '<div class="container">' .
                                '<div class="row">' .
                                    '<div class="col-sm-10 col-sm-push-1">';
                            $anchor = get_sub_field('anchor');
                            $title = get_sub_field('title');
                            $subtitle = get_sub_field('subtitle');
                            echo '<div class="docs-main" id="' . $anchor . '">';
                            echo '<h3 class="three-column-title">' . $title . '</h3>';

                            $subtitle_container = '';
                            if ($subtitle):
                                $subtitle_container = '<h5 class="tablesaw-subtitle">' . $subtitle . '</h5>';
                            endif;

                            echo $subtitle_container;

                            $table = get_sub_field( 'table_content' );
                            if ( $table ):
                                echo '<table class="tablesaw" data-tablesaw-mode="swipe" data-tablesaw-minimap>';
                                    if ( $table['header'] ) {
                                        echo '<thead>';
                                            echo '<tr>';
                                                $i = 0;
                                                foreach ( $table['header'] as $th ) {
                                                    $i++;
                                                    echo '<th scope="col"' . ($i == 1 ? 'data-tablesaw-priority="persist"' : '') . '>';
                                                        echo $th['c'];
                                                    echo '</th>';
                                                }
                                            echo '</tr>';
                                        echo '</thead>';
                                    }
                                    echo '<tbody>';
                                        $i = 0;
                                        foreach ( $table['body'] as $tr ) {
                                            echo '<tr>';
                                                foreach ( $tr as $td ) {
                                                    $i++;
                                                    echo '<td class="' . ($i == 1 ? 'title' : '') . '">';
                                                        echo $td['c'];
                                                    echo '</td>';
                                                }
                                            echo '</tr>';
                                        }
                                    echo '</tbody>';
                                echo '</table>';

                                echo '<script src="https://www.comm100.com/wp-content/themes/comm100/dist/scripts/tablesaw.js" type="text/javascript"></script>';
                            endif;
                            echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                endif;

                // check current row layout
                if( get_row_layout() == 'feature_header' ):



                    echo '<div class="c-content-box c-size-md">';
                    echo '<div class="container">';
                    echo '<div class="row">';
                    echo '<div class="col-sm-12 feature__header">';

                    $feature_header = get_sub_field('feature_header');
                    if ($feature_header):
                        while ( have_rows('feature_header') ) : the_row();
                            $h1_tag = get_sub_field('h1_tag');
                            $h1 = get_sub_field('h1');
                            $description = get_sub_field('description');
                            $download = get_sub_field('download');
                            $image = get_sub_field('image');
                            $video = get_sub_field('video');
                                if ($h1_tag):
                                    echo '<div class="h1-tag">' .
                                            $h1_tag .
                                        '</div>';
                                endif;
                                if ($h1):
                                    echo '<h1>' .
                                            $h1 .
                                        '</h1>';
                                endif;

                                if ($description):
                                    echo $description;
                                endif;
                                if ($download):
                                    while ( have_rows('download') ) : the_row();
                                        $installuninstall = get_sub_field('installuninstall');
                                        if (have_rows('download_content')):
                                            echo '<div class="download">';
                                            while ( have_rows('download_content') ) : the_row();
                                                $download_link = get_sub_field('download_link');
                                                $download_img = get_sub_field('download_img');

                                                if (!$download_img) {
                                                    echo '<a class="btn btn-xlg c-btn-border-2x c-theme-btn c-margin-l-60" href="' . $download_link['url'] . '" target="' . $download_link['target'] . '">' . $download_link['title'] . '</a>';
                                                } else {
                                                    echo '<a href="' . $download_link['url'] . '">' .
                                                            '<img src="' . $download_img['url'] . '" alt="' . $download_img['alt'] . '" width="160" height="56">' .
                                                        '</a>';
                                                }
                                            endwhile;
                                            echo '<div class="c-margin-t-10 c-font-14">' .
                                                        '<a href="/eula/" target="_blank">EULA</a> | ' .
                                                        '<a href="' . $installuninstall['url'] . '" target="' . $installuninstall['target'] . '">' .
                                                                $installuninstall['title'] .
                                                            '</a>' .
                                                    '</div>';
                                            echo '</div>';
                                        endif;
                                    endwhile;
                                endif;
                                if ($image):
                                    echo '<img src="' . $image['url'] . '" alt="' . $image['alt'] . '" width="" height="" />';
                                endif;
                                if ($video):
                                    echo '<div class="row video-content">' .
                                            '<div class="col-sm-10 col-sm-push-1">' .
                                                $video .
                                            '</div>' .
                                        '</div>';
                                endif;
                        endwhile;
                    endif;

                    $normal_content = get_sub_field('normal_content');
                    if ($normal_content):
                        while ( have_rows('normal_content') ) : the_row();
                            $header_headline = get_sub_field('h1_title');
                            $header_slogan = get_sub_field('subtitle');
                            $header_description = get_sub_field('description');
                            $call_to_action = get_sub_field('call_to_action');
                            echo '<div id="notInServiceCountry" class="thankyou" style="display: none">';
                                if ($header_headline):
                                    echo '<h1>' .
                                            $header_headline .
                                        '</h1>';
                                endif;
                                if ($header_slogan):
                                    echo '<h2>' .
                                            $header_slogan .
                                        '</h2>';
                                endif;
                                if ($header_description):
                                    echo '<div class="thankyou__desc">' .
                                            $header_description .
                                        '</div>';
                                endif;

                                if ($call_to_action):
                                    echo '<div class="thankyou__calltoaction">' .
                                            '<a class="btn btn-xlg btn-link--green" href="' . $call_to_action['url'] . '" target="' . $call_to_action['target'] . '">' .
                                                $call_to_action['title'] .
                                            '</a>';
                                        '</div>';
                                endif;
                            echo '</div>';
                        endwhile;
                    endif;



                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                endif;

            endwhile;
        else :

        // no layouts found

        endif;


    ?>

</div>

<?php get_template_part('template-parts/footer', 'simple'); ?>

<!--Begin Comm100 Live Chat Code-->
<div id="comm100-button-5000239"></div>
<script type="text/javascript">
var Comm100API=Comm100API||{};(function(t){function e(e){var a=document.createElement("script"),c=document.getElementsByTagName("script")[0];a.type="text/javascript",a.async=!0,a.src=e+t.site_id,c.parentNode.insertBefore(a,c)}t.chat_buttons=t.chat_buttons||[],t.chat_buttons.push({code_plan:5000239,div_id:"comm100-button-5000239"}),t.site_id=10000,t.main_code_plan=5000239,e("https://chatserver.comm100.com/livechat.ashx?siteId="),setTimeout(function(){t.loaded||e("https://hostedmax.comm100.com/chatserver/livechat.ashx?siteId=")},5e3)})(Comm100API||{})
</script>
<!--End Comm100 Live Chat Code-->
<script>
    jQuery(document).ready(function()
    {
        App.init(); // init core
    });
</script>
