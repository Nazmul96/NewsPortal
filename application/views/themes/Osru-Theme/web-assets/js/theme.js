(function ($) {
    "use strict";
    var osru = {
        initialize: function () {
            this.imgLoaded();
            this.mobileMenu();
            this.dropDownMenu();
            this.toTop();
            this.stickySidebar();
            this.pageLoader();
            this.calendar();
            this.youtubeVideo();
        },
        // -------------------------------------------------------------------------- //
        // Page Loader Animsition
        // -------------------------------------------------------------------------- //
        imgLoaded: function () {
            $('body').imagesLoaded(function () {
                // images have loaded
            });
        },
        // -------------------------------------------------------------------------- //
        // Metis Mobile Menu
        // -------------------------------------------------------------------------- //
        mobileMenu: function () {
            $("#mobile-menu").metisMenu();

            $('.dismiss, .overlay').on('click', function () {
                $('.sidebar-nav, .sidebar-search').removeClass('active');
                $('.overlay').fadeOut();
            });

            $('#sidebarCollapse').on('click', function () {
                $('.sidebar-nav').addClass('active');
                $('.overlay').fadeIn();
            });

            $('#sidebarSearch').on('click', function () {
                $('.sidebar-search').addClass('active');
                $('.overlay').fadeIn();
            });
        },
        // -------------------------------------------------------------------------- //
        // DropDown Menu
        // -------------------------------------------------------------------------- //
        dropDownMenu: function () {
            $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
                if (!$(this).next().hasClass('show')) {
                    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
                }
                var $subMenu = $(this).next(".dropdown-menu");
                $subMenu.toggleClass('show'); // appliqué au ul
                $(this).parent().toggleClass('show'); // appliqué au li parent

                $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
                    $('.dropdown-submenu .show').removeClass('show'); // appliqué au ul
                    $('.dropdown-submenu.show').removeClass('show'); // appliqué au li parent
                });
                return false;
            });
        },
        // -------------------------------------------------------------------------- //
        // Back to top
        // -------------------------------------------------------------------------- //  
        toTop: function () {
            $('body').append('<div id="toTop" class="btn btn-top"><span class="ti-arrow-up"></span></div>');
            $(window).scroll(function () {
                if ($(this).scrollTop() !== 0) {
                    $('#toTop').fadeIn();
                } else {
                    $('#toTop').fadeOut();
                }
            });
            $('#toTop').on('click', function () {
                $("html, body").animate({scrollTop: 0}, 600);
                return false;
            });
        },
        // -------------------------------------------------------------------------- //
        // Sticky Sidebar
        // -------------------------------------------------------------------------- //
        stickySidebar: function () {
            $('.leftSidebar, .content, .rightSidebar, .stickyshare, .stickydetails').theiaStickySidebar({
                additionalMarginTop: 30
            });
        },
        // -------------------------------------------------------------------------- //
        // Page Loader Animsition
        // -------------------------------------------------------------------------- //
        pageLoader: function () {
            $('.animsition').animsition();
        },

        // -------------------------------------------------------------------------- //
        // Calendar
        // -------------------------------------------------------------------------- //
        calendar: function () {
            var base_url = $('#base_url').val();
           $( "#datepicker" ).datepicker({
                inline: true,
                showOtherMonths: true,
                dateFormat: "yy-mm-dd",
                maxDate: 0,
                onSelect: function (dateText, inst) {
                    window.location = base_url + 'archive?date=' + dateText, '_parent';
                }
            });
        },

        // -------------------------------------------------------------------------- //
        // Youtube video
        // -------------------------------------------------------------------------- //    
        youtubeVideo: function () {
            // poster frame click event
            $(document).on("click", ".js-videoPoster", function (ev) {
                ev.preventDefault();
                var $poster = $(this);
                var $wrapper = $poster.closest(".js-videoWrapper");
                videoPlay($wrapper);
            });
            // play the targeted video (and hide the poster frame)
            function videoPlay($wrapper) {
                var $iframe = $wrapper.find(".js-videoIframe");
                var src = $iframe.data("src");
                // hide poster
                $wrapper.addClass("videoWrapperActive");
                // add iframe src in, starting the video
                $iframe.attr("src", src);
            }

            // stop the targeted/all videos (and re-instate the poster frames)
            function videoStop($wrapper) {
                // if we're stopping all videos on page
                if (!$wrapper) {
                    var $wrapper = $(".js-videoWrapper");
                    var $iframe = $(".js-videoIframe");
                    // if we're stopping a particular video
                } else {
                    var $iframe = $wrapper.find(".js-videoIframe");
                }
                // reveal poster
                $wrapper.removeClass("videoWrapperActive");
                // remove youtube link, stopping the video from playing in the background
                $iframe.attr("src", "");
            }

        }
    };


    /*---------------------------
        Sticky Menu
    -----------------------------*/
    $(window).on('scroll', function() {
        if ($(window).scrollTop() > 100) {
            $('.mainHeader').addClass('menu_fixed');
        } else {
            $('.mainHeader').removeClass('menu_fixed');
        }
    });

    // Initialize
    $(document).ready(function () {

        osru.initialize();
        //Reading Time
        $('.post_details').readingTime({
            readingTimeTarget: $(this).find('.eta'),
            wordCountTarget: $(this).find('.words')
        });


    });
}(jQuery));



    "use strict";
    function pollTest()
    {
        var question_id = document.getElementById('question_id').value;
        var vote = document.getElementsByName('radio2');
        var base_url = $('#base_url').val();

        var vote_value;
        for (var i = 0; i < vote.length; i++) {
            if (vote[i].checked) {
                vote_value = vote[i].value;
            }
        }
        $.ajax({ 
            'url': base_url + 'home_controller/save/'+question_id+'/'+vote_value,
            'type': 'GET', 
            'data': {'vote_value': vote_value },
            'success': function(data) {
               
               $("#resultview").load(location.href+" #resultview>*","");   
               $(".result").html(data).hide(4000);        
            }
        });              
    }



        "use strict";
        $("#UserLogin").on('submit',function(event){ 

            event.preventDefault(); 
            var formdata = new FormData($(this)[0]);
            $.ajax({
                url: $(this).attr("action"),
                type: $(this).attr("method"),
                data: formdata, 
                processData: false,
                contentType: false,

                success: function (msg){
                    if(msg == 1){
                        toastr.error('Error! - Email or Password is Missing!.');
                    } else if (msg == 2) {
                        toastr.error('Error! - Email or Password are Invalid!.');
                    } else if (msg == 3) {
                        toastr.error('Error! - Email or Password are Invalid!.');
                    } else {
                        toastr.success('Login Successfully!');
                        setTimeout(function(){
                            window.location.href = window.location.href;
                        }, 3000);
                    }
                },
                error: function (xhr, desc, err){
                    alert('failed');
                }
            });        
        });


        "use strict";
        $("#SignUp").submit(function(event){ 

            event.preventDefault(); 
            var formdata = new FormData($(this)[0]);
            $.ajax({

                url: $(this).attr("action"),
                type: $(this).attr("method"),

                data: formdata, 
                processData: false,
                contentType: false,

                success: function (msg){

                    if(msg == 1){
                        toastr.error('Error! - Anyone  field does not missing!, Please try again.');
                    } else if (msg == 2) {
                        toastr.warning(' You are already Registered!, Login Please');
                    } else {
                        toastr.success('Registration Successfully!!, Login Please');
                        setTimeout(function(){
                            window.location.href = window.location.href;
                        }, 3000);
                    } 

                },

                error: function (xhr, desc, err){
                    alert('failed');
                }
            });        
        });

