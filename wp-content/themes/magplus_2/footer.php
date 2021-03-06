<footer class="footer">
    <div class="footer-wrap">
        <div class="foot-col copyright-sec">
            <div class="copyright-block">
                <a class="foot-logo" href="/">
                    <img class="logo" src="<?php bloginfo('template_directory'); ?>/images/foot-logo.svg" alt="Megaplus Logo" title="Megaplus Logo">
                </a>
                <span>Magplus is a registered Trademark Copyright &copy 2020</span>
            </div>
            <div class="follow-us-block">
                <h6>Follow Us</h6>
                <ul class="follow-us-listing">
                    <li><a href="" title="Slack"><img src="<?php bloginfo('template_directory'); ?>/images/icons/slack.svg" alt="Slack" /></a></li>
                    <li><a href="" title="Twitter"><img src="<?php bloginfo('template_directory'); ?>/images/icons/twitter.svg" alt="Twitter" /></a></li>
                    <li><a href="" title="facebook"><img src="<?php bloginfo('template_directory'); ?>/images/icons/facebook.svg" alt="facebook" /></a></li>
                    <li><a href="" title="G+"><img src="<?php bloginfo('template_directory'); ?>/images/icons/gplus.svg" alt="G+" /></a></li>
                    <li><a href="" title="Instagram"><img src="<?php bloginfo('template_directory'); ?>/images/icons/instagram.svg" alt="Instagram" /></a></li>
                </ul>
            </div>
        </div>
        <div class="foot-col">
            <h6 class="toggle resources">Resources</h6>
            <ul class="inner foot-link-block">
                <li><a href="?page_id=31670" class="foot-link" title="Case Studies ">Case Studies </a></li>
                <li><a href="?page_id=31675" class="foot-link" title="Tutorials ">Tutorials </a></li>
                <li><a href="?page_id=19" class="foot-link" title="Blogs">Blogs</a></li>
                <li><a href="?page_id=31257" class="foot-link" title="FAQs">FAQs</a></li>
            </ul>
        </div>
        <div class="foot-col">
            <h6 class="toggle">Legal</h6>
            <ul class="inner foot-link-block">
                <li><a href="?page_id=870" class="foot-link" title="Privacy Policy  ">Privacy Policy  </a></li>
                <li><a href="?page_id=867" class="foot-link" title="Terms of Use">Terms of Use</a></li>
                <li><a href="?page_id=608" class="foot-link" title="License and Agreement">License and Agreement</a></li>
            </ul>
        </div>
        <div class="foot-col">
            <h6 class="toggle">Products</h6>
            <ul class="inner foot-link-block">
                <li><a href="?page_id=22485" class="foot-link" title="Services ">Services </a></li>
                <li><a href="?page_id=27659" class="foot-link" title="Pricing">Pricing</a></li>
                <li><a href="?page_id=31672" class="foot-link" title="Mag Plus Pro">Mag Plus Pro</a></li>
            </ul>
        </div>
        <div class="foot-col">
            <h6 class="toggle">Company</h6>
            <ul class="inner foot-link-block">
                <li><a href="javascript:void(0)" class="foot-link" title="About Us">About Us</a></li>
                <li><a href="javascript:void(0)" class="foot-link" title="Events ">Events </a></li>
                <li><a href="javascript:void(0)" class="foot-link" title="Try For Free ">Try For Free </a></li>
            </ul>
        </div>
        <div class="foot-col subscription-sec">
            <h6>Subscribe</h6>
            <p class="small">At half-past eight the door opened, the policeman appeared.</p>
            <div class="subscription-form">
                <div class="inline-form error-block">
                    <input type="email" id="email" placeholder="Enter your email" name="email">
                    <button type="button" id="btnClick" alt="newsletter-submit" class="btn"></button>
                    <span class="error"></span>
                </div>
            </div>

            <h6>Contact: <a href="tel:+91 80876 00106" title="tel:+91 80876 00106">+91 80876 00106</a></h6>
        </div>
        <div class="mob-view">
            <div class="follow-us-block">
                <ul class="follow-us-listing">
                    <li><a href="" title="Twitter"><img src="<?php bloginfo('template_directory'); ?>/images/icons/twitter.svg" alt="Twitter" /></a></li>
                    <li><a href="" title="facebook"><img src="<?php bloginfo('template_directory'); ?>/images/icons/facebook.svg" alt="facebook" /></a></li>
                    <li><a href="" title="Instagram"><img src="<?php bloginfo('template_directory'); ?>/images/icons/instagram.svg" alt="Instagram" /></a></li>
                </ul>
                <span class="copy-text">Magplus is a registered Trademark Copyright &copy 2020</span>
            </div>
        </div>
    </div>
</footer>

<div class="sticky-drawer-section">
    <div class="drawer-head">
        <h4 class="contact-us">Contact Us</h4>
        <span class="sharing-icon"></span>
    </div>
    <div class="drawer-body">
        <div class="form-section form-container sign-up-form contact-us-form">
            <div class="form-block">
                <h2 class="form-block-title">Contact</h2>
                <p>Feel free to contact us. We are willing to help you with any issues you may encounter with our products.<br />
                    Your privacy is important to us. We’ll never share your information</p>
                <?php echo do_shortcode('[salesforce form="25"]'); ?>
            </div>
            <!---<form class="form-block" action="">
                <h2 class="form-block-title">Contact</h2>
                <p>Feel free to contact us. We are willing to help you with any issues you may encounter with our products.<br/> Your privacy is important to us. We’ll never share your information</p>
                <div class="form-field-group">
                    <div class="styled-input">
                        <input type="text" required />
                        <label>Name</label>
                        <span class="error">Welcome to Magplus</span>
                    </div>
                    
                    <div class="styled-input">
                        <input type="email" required />
                        <label>Email</label>
                        <span class="error">Welcome to Magplus</span>
                    </div>
                </div>   
                <div class="form-field-group">
                    <div class="styled-input">
                        <input type="tel" required autocomplete="off" />
                        <label>phone number</label>
                        <span class="error">This is secure with us</span>
                    </div>
                    <div class="styled-input">
                        <input type="text" required />
                        <label>Subject</label>
                        <span class="error">Please specify the Inquiry subject</span>
                    </div>
                </div>    
                <div class="form-field-group message-field">
                    <label>Message</label>
                    <textarea name="" id="" cols="30" rows="3"></textarea>
                </div>    
                <div class="tmc-block ">
                    <label class="checkbox-container" for="i-agree">
                        <input type="checkbox" id="i-agree">
                        <span class="checkmark"></span>
                        I agree to receive timely updates with the latest blog posts
                    </label>
                </div> 
                <div class="btn-block align-center">
                    <a href="/mega-plus/www/tutorials.php" class="primary-btn" title="Try for Free">Try for Free
                        <span class="span1">Try for Free</span>
                        <span class="span2">Try for Free</span>
                        <span class="span3">Try for Free</span>
                    </a>
                </div>
            </form>-->
            <span id="close-popup"></span>
        </div>
    </div>
</div>

<div class="chat-section">
    <span class="chat-icon"></span>
</div>

<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/jquery-1.1.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/owl.carousel.min.js"></script>
<!-- <script type="text/javascript" src="/js/jquery.fancybox.js"></script>  -->
<script src="<?php bloginfo('template_directory'); ?>/js/aos.js"></script>
<script src='<?php bloginfo('template_directory'); ?>/js/jquery.fancybox.min.js'></script> 
<script type="text/javascript">
    $(document).ready(function() {
        $(".icon-burger").click(function() {
            if ($(this).hasClass("is-open")) {
                $(this).removeClass("is-open");
                $(".sticky-nav-tabs").removeClass("open-slide");
                return false;
            } else {
                $(this).addClass("is-open");
                $(".sticky-nav-tabs").addClass("open-slide");
                return false;
            }
        });
        var selector = '.sticky-nav-tabs-container li';
        $(selector).on('click', function() {
            $(selector).removeClass('active');
            $(this).addClass('active');
        });
        $('.acc-item').click(function() {
            if ($(this).hasClass("open")) {
                $(this).removeClass("open");
                $(".acc-item").children(".acc-ans").slideUp();
            } else {
                $(".acc-item").removeClass("open");
                $(this).addClass("open");
                $(".acc-item").children(".acc-ans").slideUp();
                $(this).children(".acc-ans").slideDown();
            }
            return false;
        });
        $(".loop").owlCarousel({
            items: 1,
            dots: true,
            nav: false,
            center: true,
            loop: false,
            responsive: {
                767: {
                    items: 3,
                    dots: false,
                    nav: true,
                    loop: true,
                    margin: 10,
                }
            }
        });
        $(".full-wrap-carousel").owlCarousel({
            items: 1,
            loop: false,
            center: false,
            margin: 10,
            nav: false,
            dots: true,
            autoplay: true,
            autoplayHoverPause: true,
            responsive: {
                600: {
                    loop: true,
                    center: true,
                    items: 3,
                    margin: 30,
                    nav: false,
                    dots: true,
                    autoplay: true
                }
            }
        });
        $('.section-carousel, .five-col-carousel').on('initialized.owl.carousel changed.owl.carousel', function(e) {
            if (!e.namespace) {
                return;
            }
            var carousel = e.relatedTarget;
            $('.slider-counter').text(carousel.relative(carousel.current()) + 1 + '/' + carousel.items().length);

        })
        $(".section-carousel").owlCarousel({
            items: 1,
            loop: true,
            margin: 10,
            nav: true,
            dots: true,
            responsive: {
                767: {
                    items: 1,
                    dots: false
                }
            }
        });
        $(".two-col-carousel").owlCarousel({
            items: 1,
            loop: false,
            margin: 10,
            nav: false,
            dots: true,
            responsive: {
                600: {
                    items: 2,
                    margin: 20,
                    loop: true,
                    nav: true,
                    dots: false,
                }
            }
        });
        $(".five-col-carousel").owlCarousel({
            items: 1,
            loop: false,
            margin: 10,
            nav: true,
            dots: true,
            responsive: {
                600: {
                    items: 3,
                    margin: 30,
                    loop: true,
                    nav: true,
                    dots: false,
                }
            }
        });
        $('.sticky-sidebar a').on('click', function() {
            var scrollAnchor = $(this).attr('data-scroll');
            if ($(window).width() < 1024) {
                var scrollPoint = $('#' + $(this).attr("data-scroll")).offset().top - 60;
            } else {
                var scrollPoint = $('#' + $(this).attr("data-scroll")).offset().top - 60;
            }
            $('body,html').animate({
                scrollTop: scrollPoint
            }, 500);
            $('.sticky-sidebar a').removeClass('active');
            $(this).addClass('active');
            // return false;

        });
        $('.contact-us').on('click', function() {
            $(this).closest('.drawer-head').next('.drawer-body').addClass('active');
        });
        $('#close-popup').on('click', function() {
            $(this).closest('.drawer-body').removeClass('active');
        });
        $('.card-deck a').fancybox({
            caption: function(instance, item) {
                return $(this).parent().find('.card-text').html();
            }
        });
        $('.toggle').click(function(e) {
            e.preventDefault();
            var $this = $(this);
            if ($this.next().hasClass('show')) {
                $this.next().removeClass('show');
                $this.next().slideUp(350);
            } else {
                $this.parent().parent().find('.inner').removeClass('show');
                $this.parent().parent().find('.inner').slideUp(350);
                $this.next().toggleClass('show');
                $this.next().slideToggle(350);
            }
        });
        $('.click-card-block').click(function(e) {
            e.preventDefault();
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
            } else {
                $(this).addClass('active');
            }
        });
        $(".js-anchor-link").click(function(e) {
            e.preventDefault();
            var target = $($(this).attr("href"));
            if (target.length) {
                var scrollTo = target.offset().top + 500;
                $("body, html").animate({
                    scrollTop: scrollTo + "px"
                }, 800);
            }
        });
        AOS.init({
            disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
            startEvent: 'DOMContentLoaded', // name of the event dispatched on the document, that AOS should initialize on
            initClassName: 'aos-init', // class applied after initialization
            animatedClassName: 'aos-animate', // class applied on animation
            useClassNames: true, // if true, will add content of `data-aos` as classes on scroll
            disableMutationObserver: false, // disables automatic mutations' detections (advanced)
            debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
            throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)


            // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
            offset: 450, // offset (in px) from the original trigger point   
            delay: 0, // values from 0 to 3000, with step 50ms
            duration: 600, // values from 0 to 3000, with step 50ms 
            easing: 'ease', // default easing for AOS animations
            once: false, // whether animation should happen only once - while scrolling down
            mirror: false, // whether elements should animate out while scrolling past them
            anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation
        });

        if ($(window).width() < 767) {
            $('.sidebar-header').click(function() {
                $(this).parent('.sidebar').toggleClass("active");
            })
            $('.sidebar-listing .checkbox-container').click(function() {
                $(this).closest('.sidebar').removeClass("active");
            });
        }

        $(".drop-down .selected a").click(function() {
            $(".drop-down .options ul").toggle();
        });

        //SELECT OPTIONS AND HIDE OPTION AFTER SELECTION
        $(".drop-down .options ul li a").click(function() {
            var text = $(this).html();
            var target = $($(this).attr("href"));
            $(".drop-down .selected a span").html(text);
            $(".drop-down .options ul").hide();
            if (target.length) {
                $(this).addClass("active");
            } else {
                $(this).removeClass("active");
            }
        });


        //HIDE OPTIONS IF CLICKED ANYWHERE ELSE ON PAGE
        $(document).bind('click', function(e) {
            var $clicked = $(e.target);
            if (!$clicked.parents().hasClass("drop-down"))
                $(".drop-down .options ul").hide();
        });



        $(".mob-select .selected a").click(function() {
            $(".mob-select .options ul").toggle();
        });

        //SELECT OPTIONS AND HIDE OPTION AFTER SELECTION
        $(".mob-select .options ul li a").click(function() {
            var text = $(this).html();
            var target = $($(this).attr("href"));
            $(".mob-select .selected a span").html(text);
            $(".mob-select .options ul").hide();
            if (target.length) {
                $(this).addClass("active");
            } else {
                $(this).removeClass("active");
            }
        });
        $(".mob-select .options ul li a").click(function() {
            var select = this.id; 
            if (select == 'publish') {
                $('.plan-td').hide();
                $('.plan-td.publish').show();
                
            }else if (select == 'multi'){ 
                $('.plan-td').hide();
                $('.plan-td.multi').show();
            }
            else if (select == 'multi-pro'){
                $('.plan-td').hide();
                $('.plan-td.multi-pro').show();
            }
            else if (select == 'unlimited'){
                $('.plan-td').hide();
                $('.plan-td.unlimited').show();
            }
            else{
                alert();
                $('.plan-td').hide();
            } 
        });

        //HIDE OPTIONS IF CLICKED ANYWHERE ELSE ON PAGE
        $(document).bind('click', function(e) {
            var $clicked = $(e.target);
            if (!$clicked.parents().hasClass("mob-select"))
                $(".mob-select .options ul").hide();
        });
    });

    

    function tabNav(evt, tabHead) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(tabHead).style.display = "block";
        evt.currentTarget.className += " active";
    }
    $(window).scroll(function() {
        // if ($(this).scrollTop() > 130) {
        //     $('.sticky-nav-block').addClass('fixed');
        // } else {
        //     $('.sticky-nav-block').removeClass('fixed');
        // }

        var windscroll = $(window).scrollTop();
        if (windscroll >= 130) {
            $('.sticky-nav-block').addClass('fixed');
            $('.scrrol-sec').each(function(i) {
                // alert(i);
                if ($(this).position().top <= windscroll + 60) {
                    $('.sticky-sidebar a').removeClass('active');
                    $('.sticky-sidebar a').eq(i).addClass('active');
                }
            });

        } else {
            $('.sticky-sidebar a.active').removeClass('active');
            $('.sticky-nav-block').removeClass('fixed');
        }

        // if (windscroll >= 130 + 260) {
        //     $('.sidebar').addClass('fixed');
        // } else {
        //     $('.sidebar').removeClass('fixed');
        // }

    });

    // $(document).ready(function() {
    //     var $window = $(window);
    //     var $sidebar = $(".post-sidebar"); 
    //     var $sidebarHeight = $sidebar.innerHeight();
    //     var $footerOffsetTop = $(".footer").offset().top;
    //     var $sidebarOffset = $sidebar.offset();

    //     $window.scroll(function() {
    //         var windscroll = $(window).scrollTop();
    //         if (windscroll >= 300) { 
    //             if ($window.scrollTop() > $sidebarOffset.top + 68) { 
    //                 $sidebar.addClass("fixed");
    //             } else {
    //                 $sidebar.removeClass("fixed");
    //             }
    //             if ($window.scrollTop() + $sidebarHeight > $footerOffsetTop) {
    //                 $sidebar.css({
    //                     "top": -($window.scrollTop() + $sidebarHeight - $footerOffsetTop)
    //                 });
    //             } else {
    //                 $sidebar.css({
    //                     "top": "0", 
    //                 });
    //             }
    //         }
    //         else{

    //         }
    //     });
    // });
</script>

<!-- </div> -->
<!-- #page -->

<?php wp_footer(); ?>

</body>

</html>