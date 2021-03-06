<style>
    /*.btn-default { background-color: {{ color }}; }*/
    .woocommerce .product_meta a { color: {{ color }}}
    .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce button.button.alt,
    .woocommerce button.button.alt { background-color: {{ color }}}
    .woocommerce button.button.alt:hover { color: {{ color }}}
    .woocommerce div.product p.price, .woocommerce div.product span.price {color: {{ color }} !important;}
    .woocommerce span.onsale { color: white;background-color: {{ color }}}
    .woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover { background-color: {{ color }}}
    .woocommerce #review_form a { color: {{ color }}}


    /* background-color */
    #bbpress-forums .bbp-submit-wrapper .button,
    header .hero-slider .slide .container .slide-caption .btn-default,
    header .hero-slider .slide .news-container .slide-caption .btn-default,
    header .nav-placeholder .search:before,
    header .slider-progress-bar .progress-line,
    .tournament .standings .col li:first-child,
    .tournament .view-brackets,
    .tournament-list .tournament-box .btn-default,
    .team-list .team-box .team-foot .col .btn-default,
    .teams .tab-nav li.active a,
    .teams .tab-nav li:hover a,
    .matches .tab-nav li:hover a.btn-default,
    .matches .tab-nav li.active a.btn-default,
    .page-hero .tab-nav li.active a,
    .page-hero .tab-nav li:hover a,
    ul.members li a::after,
    footer .bottom-bar,
    .section-header .actions .btn.btn-default,
    .section-footer>a.btn-default,
    .inner-page .inner-body article.bottom .col.textarea .scrollbar-outer>.scroll-element .scroll-bar,
    .inner-page .inner-body article.top .btn.btn-primary,
    .teams .filter-list li .checkbox-container input:checked ~ .checkmark,
    .teams .filter-list li .checkbox-container input:hover ~ .checkmark,
    .card-list.secondary-list .card .card-info .btn-default,
    header .nav-placeholder .navbar>li:not(.search)>a:after,
    .brackets .bracket-wrapper .jQBracket .team .score:before,
    .brackets .bracket-wrapper .jQBracket .team.lose .score:before,
    .matches .filter-list li .checkbox-container input:checked ~ .checkmark,
    .matches .filter-list li .checkbox-container input:hover ~ .checkmark,
    .matches .scrollbar-outer>.scroll-element .scroll-bar,
    .news-container aside .sidebar-widget .tagcloud a:hover,
    .page-hero .actions .btn-default,
    .sponsors .sp-list .sp-box .btn-default,
    .card-list .card .card-info .label,
    header .nav-placeholder .navbar li.menu-item-has-children .sub-menu li a,
    .tournament .match-schedule .section-header .tab-nav li a:hover,
    .tournament .teams .owl-carousel .owl-dots .owl-dot.active,
    .match-page .tab-nav li:hover a.btn-default, .match-page .tab-nav li.active a.btn-default,
    .section-header ul li a::after,
    .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,
    .single-page .post>.post-tags>a:hover,
    .single-page .post code,
    .single-page .comment-respond form button,
    .news .news-grid article .overlay .category,
    #bbp-search-form>div #bbp_search_submit,
    .card-list .card .card-info .label,
    .card-list .card .card-info .label {
        background-color: {{ color }}
    }

    /* border-color */
    .brackets .bracket-wrapper .jQBracket .team.highlight, .brackets .bracket-wrapper .jQBracket .team:hover,
    .brackets .bracket-wrapper .jQBracket .team.win, .brackets .bracket-wrapper .jQBracket .team.lose:hover,
    .brackets .bracket-wrapper .jQBracket .team.lose.win, .brackets .bracket-wrapper .jQBracket .team.lose.highlight,
    .brackets .bracket-wrapper .jQBracket .team.lose:hover, .brackets .bracket-wrapper .jQBracket .team.lose.win,
    .card-list.secondary-list .card .card-info .btn-default,
    .team-list .team-box .team-foot .col .btn-default,
    .woocommerce-message,
    .single-page .comment-respond form .form-field input:focus, .single-page .comment-respond form .form-field textarea:focus,
    .news-page .tab-content.content form,
    .brackets .zoomInOut button:hover,
    .news-container aside form,
    #bbp-search-form>div input:not(#bbp_search_submit),
    #bbp-search-form>div #bbp_search_submit:hover,
    .woocommerce .wc-proceed-to-checkout a.checkout-button,
    header .hero-slider .slide .container .slide-caption .btn-default,
    header .hero-slider .slide .news-container .slide-caption .btn-default {
        border-color: {{ color }}
    }

    /* color */
    #bbp-search-form>div #bbp_search_submit:hover,
    .sponsors .basic-sp .sp-box > ul > li >  a,
    header .hero-slider .slide .container .slide-caption span,
    header .hero-slider .slide .news-container .slide-caption span,
    header .nav-placeholder .navbar>li:not(.search).active>a,
    header .nav-placeholder .navbar>li:not(.search):hover>a,
    .match-box .box-title span.date a,
    .tournaments .section-header ul li:hover a, .tournaments .section-header ul li.active a,
    .stream-list .stream-box .stream-info .stream-name,
    .single-page .post span.author,
    .streams .section-footer span,
    footer .back-to-top,
    footer .headquarter .hq-info .city i,
    .logo>ul>li a:hover,
    header .nav-placeholder a:hover,
    .page-hero h4,
    .inner-page .inner-body article.bottom .col.textarea .text-head ul li a:hover,
    .single-page a,
    .single-page .post a,
    .inner-page .inner-body article.bottom .col.right ul.stats li span,
    .about-staff .section-header ul li.active a,
    .about-staff .section-header ul li:hover a,
    .inner-page .inner-header .inner-header-info .inner-header-details ul li,
    .tournament .standings .section-title span,
    .tournament .view-brackets .btn-default,
    .section-header ul li:hover>a,
    .section-header ul li.active>a,
    .single-page .social-widget .comment-counter span,
    .news-container aside .sidebar-widget li .categories a,
    .sponsors .sp-list .sp-box>ul li a:hover,
    .news-container aside .sidebar-widget ul li .categories a:before,
    .tournament .match-schedule .wrapper .days li a.active .date,
    .single-page .comment-respond form .logged-in-as a,
    .woocommerce-message::before,
    .about-staff ul.menu-list>li.menu-item-has-children>.sub-menu>li>a:hover,
    .news-container aside .sidebar-widget ul li .categories a:not(:last-child):after,
    .bypostauthor,
    .single-page .comment-container a,
    .card-list .card .card-info ul li a:hover {
        color: {{ color }} !important;
    }

    /* other */
    .matches .filter-list li .checkbox-container .checkmark,
    .teams .filter-list li .checkbox-container .checkmark {
        border-color: <?php echo esc_attr(pixiefreak_hex2rgba($customizedColor, '0.42')) ?>;
    }
    .tournament-list .tournament-box:after {
        background-color: <?php echo esc_attr(pixiefreak_hex2rgba($customizedColor, '0.1')) ?>;
    }
    .gallery .gallery-images a:after {
        background-color: <?php echo esc_attr(pixiefreak_hex2rgba($customizedColor, '0.6')) ?>;
    }
    .tab-nav li a {
        background-color: <?php echo esc_attr(pixiefreak_hex2rgba($customizedColor, '0.42')) ?>;
    }

    header .nav-placeholder .navbar li.menu-item-has-children .sub-menu li a:hover {
        background-color: <?php echo esc_attr(pixiefreak_hex2rgba($customizedColor, '0.8')) ?>;
    }

    .brackets .zoomInOut button {
        background-color: <?php echo esc_attr(pixiefreak_hex2rgba($customizedColor, '0.06')) ?>;
    }
    .brackets .bracket-wrapper .jQBracket .team.highlight, .brackets .bracket-wrapper .jQBracket .team:hover,
    .brackets .bracket-wrapper .jQBracket .team.win, .brackets .bracket-wrapper .jQBracket .team.lose:hover,
    .brackets .bracket-wrapper .jQBracket .team.lose.win, .brackets .bracket-wrapper .jQBracket .team.lose.highlight,
    .brackets .bracket-wrapper .jQBracket .team.lose:hover, .brackets .bracket-wrapper .jQBracket .team.lose.win {
        background-color: <?php echo esc_attr(pixiefreak_hex2rgba($customizedColor, '0.09')) ?>;
    }
    .news .news-grid article::after {
        background-color: <?php echo esc_attr(pixiefreak_hex2rgba($customizedColor, '0.3')) ?>;
    }

    .card-list.secondary-list .card .card-info .btn-default:hover,
    .team-list .team-box .team-foot .col .btn-default:hover,
    .tournament-list .tournament-box .btn-default:hover {
        box-shadow: -20px 0 0px 0px <?php echo esc_attr(pixiefreak_hex2rgba($customizedColor, '0.4')) ?>;
    }
    .card-list.secondary-list-left .card .card-info .btn-default:hover {
        box-shadow: 20px 0 0px 0px <?php echo esc_attr(pixiefreak_hex2rgba($customizedColor, '0.4')) ?>;
    }
</style>