<?php

    $magazine_express_theme_css= "";

    /*--------------------------- Scroll to top positions -------------------*/

    $magazine_express_scroll_position = get_theme_mod( 'magazine_express_scroll_top_position','Right');
    if($magazine_express_scroll_position == 'Right'){
        $magazine_express_theme_css .='#button{';
            $magazine_express_theme_css .='right: 20px;';
        $magazine_express_theme_css .='}';
    }else if($magazine_express_scroll_position == 'Left'){
        $magazine_express_theme_css .='#button{';
            $magazine_express_theme_css .='left: 20px;';
        $magazine_express_theme_css .='}';
    }else if($magazine_express_scroll_position == 'Center'){
        $magazine_express_theme_css .='#button{';
            $magazine_express_theme_css .='right: 50%;left: 50%;';
        $magazine_express_theme_css .='}';
    }

    /*--------------------------- Slider Opacity -------------------*/

    $magazine_express_theme_lay = get_theme_mod( 'magazine_express_slider_opacity_color','');
    if($magazine_express_theme_lay == '0'){
        $magazine_express_theme_css .='.slider-imagebox img{';
            $magazine_express_theme_css .='opacity:0';
        $magazine_express_theme_css .='}';
        }else if($magazine_express_theme_lay == '0.1'){
        $magazine_express_theme_css .='.slider-imagebox img{';
            $magazine_express_theme_css .='opacity:0.1';
        $magazine_express_theme_css .='}';
        }else if($magazine_express_theme_lay == '0.2'){
        $magazine_express_theme_css .='.slider-imagebox img{';
            $magazine_express_theme_css .='opacity:0.2';
        $magazine_express_theme_css .='}';
        }else if($magazine_express_theme_lay == '0.3'){
        $magazine_express_theme_css .='.slider-imagebox img{';
            $magazine_express_theme_css .='opacity:0.3';
        $magazine_express_theme_css .='}';
        }else if($magazine_express_theme_lay == '0.4'){
        $magazine_express_theme_css .='.slider-imagebox img{';
            $magazine_express_theme_css .='opacity:0.4';
        $magazine_express_theme_css .='}';
        }else if($magazine_express_theme_lay == '0.5'){
        $magazine_express_theme_css .='.slider-imagebox img{';
            $magazine_express_theme_css .='opacity:0.5';
        $magazine_express_theme_css .='}';
        }else if($magazine_express_theme_lay == '0.6'){
        $magazine_express_theme_css .='.slider-imagebox img{';
            $magazine_express_theme_css .='opacity:0.6';
        $magazine_express_theme_css .='}';
        }else if($magazine_express_theme_lay == '0.7'){
        $magazine_express_theme_css .='.slider-imagebox img{';
            $magazine_express_theme_css .='opacity:0.7';
        $magazine_express_theme_css .='}';
        }else if($magazine_express_theme_lay == '0.8'){
        $magazine_express_theme_css .='.slider-imagebox img{';
            $magazine_express_theme_css .='opacity:0.8';
        $magazine_express_theme_css .='}';
        }else if($magazine_express_theme_lay == '0.9'){
        $magazine_express_theme_css .='.slider-imagebox img{';
            $magazine_express_theme_css .='opacity:0.9';
        $magazine_express_theme_css .='}';
        }

    /*---------------- Single post Settings ------------------*/

    $magazine_express_single_post_navigation_show_hide = get_theme_mod('magazine_express_single_post_navigation_show_hide',true);
    if($magazine_express_single_post_navigation_show_hide != true){
        $magazine_express_theme_css .='.nav-links{';
            $magazine_express_theme_css .='display: none;';
        $magazine_express_theme_css .='}';
    }

    /*--------------------------- Woocommerce Product Sale Positions -------------------*/

    $magazine_express_product_sale = get_theme_mod( 'magazine_express_woocommerce_product_sale','Right');
    if($magazine_express_product_sale == 'Right'){
        $magazine_express_theme_css .='.woocommerce ul.products li.product .onsale{';
            $magazine_express_theme_css .='left: auto; right: 15px;';
        $magazine_express_theme_css .='}';
    }else if($magazine_express_product_sale == 'Left'){
        $magazine_express_theme_css .='.woocommerce ul.products li.product .onsale{';
            $magazine_express_theme_css .='left: 15px; right: auto;';
        $magazine_express_theme_css .='}';
    }else if($magazine_express_product_sale == 'Center'){
        $magazine_express_theme_css .='.woocommerce ul.products li.product .onsale{';
            $magazine_express_theme_css .='right: 50%;left: 50%;';
        $magazine_express_theme_css .='}';
    }

    /*--------------------------- Woocommerce Related Products -------------------*/

    $magazine_express_woocommerce_related_product_show_hide = get_theme_mod('magazine_express_woocommerce_related_product_show_hide',true);
    if($magazine_express_woocommerce_related_product_show_hide != true){
        $magazine_express_theme_css .='.related.products{';
            $magazine_express_theme_css .='display: none;';
        $magazine_express_theme_css .='}';
    }

    /*--------------------------- Footer background image -------------------*/

    $magazine_express_footer_bg_image = get_theme_mod('magazine_express_footer_bg_image');
    if($magazine_express_footer_bg_image != false){
        $magazine_express_theme_css .='#colophon{';
            $magazine_express_theme_css .='background: url('.esc_attr($magazine_express_footer_bg_image).')!important;';
        $magazine_express_theme_css .='}';
    }

    /*--------------------------- Copyright Background Color -------------------*/

    $magazine_express_copyright_background_color = get_theme_mod('magazine_express_copyright_background_color');
    if($magazine_express_copyright_background_color != false){
        $magazine_express_theme_css .='.footer_info{';
            $magazine_express_theme_css .='background-color: '.esc_attr($magazine_express_copyright_background_color).' !important;';
        $magazine_express_theme_css .='}';
    }

    /*--------------------------- Featured Image Border Radius -------------------*/

    $magazine_express_post_page_image_border_radius = get_theme_mod('magazine_express_post_page_image_border_radius', 0);
    if($magazine_express_post_page_image_border_radius != false){
        $magazine_express_theme_css .='.article-box img{';
            $magazine_express_theme_css .='border-radius: '.esc_attr($magazine_express_post_page_image_border_radius).'px;';
        $magazine_express_theme_css .='}';
    }

    /*--------------------------- Site Title And Tagline Color -------------------*/

    $magazine_express_logo_title_color = get_theme_mod('magazine_express_logo_title_color');
    if($magazine_express_logo_title_color != false){
        $magazine_express_theme_css .='p.site-title a, .navbar-brand a{';
            $magazine_express_theme_css .='color: '.esc_attr($magazine_express_logo_title_color).' !important;';
        $magazine_express_theme_css .='}';
    }

    $magazine_express_logo_tagline_color = get_theme_mod('magazine_express_logo_tagline_color');
    if($magazine_express_logo_tagline_color != false){
        $magazine_express_theme_css .='.logo p.site-description, .navbar-brand p{';
            $magazine_express_theme_css .='color: '.esc_attr($magazine_express_logo_tagline_color).'  !important;';
        $magazine_express_theme_css .='}';
    }