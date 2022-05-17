var App = function() {
    var MediaSize = {
        xl: 1200,
        lg: 992,
        md: 991,
        sm: 576
    };
    var ToggleClasses = {
        headerhamburger: '.toggle-sidebar',
        inputFocused: 'input-focused',
    };

    var Selector = {
        getBody: 'body',
        mainHeader: '.header.navbar',
        headerhamburger: '.toggle-sidebar',
        fixed: '.fixed-top',
        mainContainer: '.main-container',
        sidebar: '#sidebar',
        sidebarContent: '#sidebar-content',
        sidebarSubmenu: '.submenu-sidebar',
        sidebarStickyContent: '.sticky-sidebar-content',
        ariaExpandedTrue: '#sidebar [aria-expanded="true"]',
        ariaExpandedFalse: '#sidebar [aria-expanded="false"]',
        contentWrapper: '#content',
        contentWrapperContent: '.container',
        mainContentArea: '.main-content',
        searchFull: '.toggle-search',
        overlay: {
            sidebar: '.overlay',
            cs: '.cs-overlay',
            search: '.search-overlay'
        }
    };

    var toggleFunction = {
        sidebar: function($recentSubmenu) {
            $('.sidebarCollapse').on('click', function (sidebar) {
                sidebar.preventDefault();

                get_SidebarWrapper = document.querySelector('.sidebar-wrapper');
                get_CompactSubmenuShow = document.querySelector('#compact_submenuSidebar');
                get_CompactSubmenuShowContainerActive = document.querySelector('#compact_submenuSidebar > .submenu.show');
                get_overlay = document.querySelector('.overlay');
                get_mainContainer = document.querySelector('.main-container');
                
                if (get_CompactSubmenuShow.classList.contains('show') || get_CompactSubmenuShow.classList.contains('submenu-enable') ) {
                    console.log('main1');

                    if ( window.innerWidth >= 1200 ) {

                        get_CompactSubmenuShow.classList.remove('show');
                        get_CompactSubmenuShow.classList.remove('submenu-enable');
                        get_SidebarWrapper.classList.remove('hide-mainMenu');
                        
                        get_CompactSubmenuShowContainerActive.classList.remove('show');
                        $(this).removeClass('bt-menu-open');
                        
                    } else {
                        get_mainContainer.classList.remove('sidebar-closed');
                        get_mainContainer.classList.add('sbar-open');
                        get_overlay.classList.add('show');
                    }

                } else  {
                    console.log('main2');
                    $(Selector.mainContainer).toggleClass("sidebar-closed");
                    $(Selector.mainContainer).toggleClass("sbar-open");
                    if (window.innerWidth <= 1199) {
                        if (get_overlay.classList.contains('show')) {
                            get_overlay.classList.remove('show');
                        } else {
                            get_overlay.classList.add('show');
                        }
                        console.log('ii');
                    }
                    $('html,body').toggleClass('sidebar-noneoverflow');
                    $('footer .footer-section-1').toggleClass('f-close');
                }
            });
        },
        fixedSubmenuCollapser: function() {
            document.querySelector('.sidebarCollapseFixed').addEventListener('click', function() {
                this.parentNode.classList.remove('hide-mainMenu');
                document.querySelector('.sidebarCollapse').classList.remove('bt-menu-open');
                this.parentNode.querySelector('.submenu-sidebar').classList.remove('submenu-enable');
                this.parentNode.querySelector('.submenu-sidebar').classList.remove('show');
                this.parentNode.querySelector('.submenu-sidebar .submenu.show').classList.remove('show');

                if (!(this.parentNode.querySelector('.submenu-sidebar').classList.contains('submenu-enable'))) {
                    this.classList.remove('show');
                }
                
            })
        },
        overlay: function() {
            $('.overlay').on('click', function () {
                // hide sidebar
                var windowWidth = window.innerWidth;
                if (windowWidth <= 1199) {
                    // mainContainer
                    $(Selector.mainContainer).addClass('sidebar-closed');
                    $(Selector.mainContainer).removeClass('sbar-open');
                    $('.sidebarCollapse').removeClass('bt-menu-open');

                    document.querySelector('.sidebar-wrapper').classList.remove('hide-mainMenu');
                    document.querySelector(Selector.sidebarSubmenu).classList.remove('show');
                    document.querySelector(Selector.sidebarSubmenu).classList.remove('submenu-enable');
                    document.querySelector('.submenu').classList.remove('show');
                }
                // hide overlay
                $('.overlay').removeClass('show');
                $('html,body').removeClass('sidebar-noneoverflow');
                $('.col-right').removeClass('show');

            });
        },
        search: function() {
            $(Selector.searchFull).click(function(event) {
               $(this).parents('.search-animated').find('.search-full').addClass(ToggleClasses.inputFocused);
               $(this).parents('.search-animated').addClass('show-search');
               $(Selector.overlay.search).addClass('show');
               $(Selector.overlay.search).addClass('show');
            });

            $(Selector.overlay.search).click(function(event) {
               $(this).removeClass('show');
               $(Selector.searchFull).parents('.search-animated').find('.search-full').removeClass(ToggleClasses.inputFocused);
               $(Selector.searchFull).parents('.search-animated').removeClass('show-search');
            });
        },
        notificationSidebar: function() {

            toogleNotification = document.querySelector('.toggle-notification-bar');
            
            if (toogleNotification) {
                document.querySelector('.toggle-notification-bar').addEventListener('click', function() {
                    document.querySelector('.col-right').classList.add('show');
                    document.querySelector('.overlay').classList.add('show');
                    document.querySelector('body').classList.add('sidebar-noneoverflow');
                    document.querySelector('html').classList.add('sidebar-noneoverflow');
                })
            }
            
            
        }
    }


    var inBuiltfunctionality = {
        mainCatActivateScroll: function() {
            const ps = new PerfectScrollbar('.menu-categories', {
                wheelSpeed:.5,
                swipeEasing:!0,
                minScrollbarLength:40,
                maxScrollbarLength:100,
                suppressScrollX: true

            });
        },
        subCatScroll: function() {
            const submenuSidebar = new PerfectScrollbar('#compact_submenuSidebar', {
                wheelSpeed:.5,
                swipeEasing:!0,
                minScrollbarLength:40,
                maxScrollbarLength:100,
                suppressScrollX: true

            });
        },
        colRightContentScroll: function() {

            const colRightContent = new PerfectScrollbar('.col-right-content-container', {
                wheelSpeed:.8,
                swipeEasing:!0,
                minScrollbarLength:40,
                maxScrollbarLength:100,
                suppressScrollX: true

            });
        },
        onSidebarHover: function() {
            var getMenu = document.querySelectorAll('.menu');

            for (var i = 0; i < getMenu.length; i++) {
                getMenu[i].addEventListener('click', function() {
                    
                    if ( this.classList.contains('menu-single') ) {

                        return;
                        
                    } else {

                        get_SidebarWrapper = document.querySelector('.sidebar-wrapper');
                        getHref = this.querySelectorAll('.menu-toggle')[0].getAttribute('href');
                        getElement = document.querySelectorAll('#compact_submenuSidebar > ' + getHref)[0];
                        getCompactSubmenu = document.querySelector('#compact_submenuSidebar');
                        getElementActiveClass = document.querySelector('#compact_submenuSidebar > .show');
                        get_mainContainer = document.querySelector('.main-container');
                        hamburgerMenuElement = document.querySelector('.sidebarCollapse');

                        if (getCompactSubmenu) {
                            getCompactSubmenu.classList.add("show");
                            getCompactSubmenu.classList.add('submenu-enable');
                            get_SidebarWrapper.classList.add('hide-mainMenu');
                        }

                        if (getElementActiveClass) {
                            getElementActiveClass.classList.remove("show");
                        }

                        getElement.className += " show";

                        hamburgerMenuElement.classList.add('bt-menu-open');
                        if ( document.documentElement.scrollTop >= getAdminDataContentElement.offsetTop ) {
                            if (getCompactSubmenu.classList.contains('submenu-enable')) {
                                document.querySelector('.sidebarCollapseFixed').classList.add('show');
                            }
                        }
                        
                    }
                    
                })
                getMenu[i].addEventListener('click', function(ev) {
                    if ( this.classList.contains('menu-single') ) {
                        return;
                    } else {
                        ev.preventDefault();
                    }
                })
            }

        },
        preventScrollBody: function() {
            $('#compactSidebar, #compact_submenuSidebar, .col-right-content-container').bind('mousewheel DOMMouseScroll', function(e) {
                var scrollTo = null;

                if (e.type == 'mousewheel') {
                    scrollTo = (e.originalEvent.wheelDelta * -1);
                }
                else if (e.type == 'DOMMouseScroll') {
                    scrollTo = 40 * e.originalEvent.detail;
                }

                if (scrollTo) {
                    e.preventDefault();
                    $(this).scrollTop(scrollTo + $(this).scrollTop());
                }
            });
        },
        toggleFixedSubmenuCollapserOnScroll() {
            getAdminDataContentElement = document.querySelector('.admin-data-content');

            document.addEventListener('scroll', function() {

                if (document.querySelector('.submenu-sidebar').classList.contains('submenu-enable')) {

                    if ( document.documentElement.scrollTop >= getAdminDataContentElement.offsetTop ) {
                        document.querySelector('.sidebarCollapseFixed').classList.add('show');
                    } else {
                        document.querySelector('.sidebarCollapseFixed').classList.remove('show');
                    }
                    
                } else {
                    document.querySelector('.sidebarCollapseFixed').classList.remove('show');
                }
                
            })
        },
        languageDropdown: function() {
            var getDropdownElement = document.querySelectorAll('.more-dropdown .dropdown-item');
            for (var i = 0; i < getDropdownElement.length; i++) {
                getDropdownElement[i].addEventListener('click', function() {
                    document.querySelectorAll('.more-dropdown .dropdown-toggle > span')[0].innerText = this.getAttribute('data-value');
                    document.querySelectorAll('.more-dropdown .dropdown-toggle > img')[0].setAttribute('src', 'assets/img/' + this.getAttribute('data-img-value') + '.svg' );
                })
            }
        },
        openSubmenuOnLoad: function() {
            const getListMenu = document.querySelector('li.menu.active')
            getChild = getListMenu.children;
            var getHref;
            for (let i = 0; i < getChild.length; i++) {
                const element = getChild[i];
                getHref = element.getAttribute('href');
            }
            if ( getHref != '#dashboard' && !(getListMenu.classList.contains('menu-single')) ) {
                if( !(getListMenu.classList.contains('submenu-closed'))) {

                    const selectSubmenu = document.querySelector(getHref);
                    selectSubmenu.parentNode.classList.add('show');
                    selectSubmenu.parentNode.classList.add('submenu-enable');
                    selectSubmenu.classList.add('show');
        
                    if ( window.innerWidth >= 1200 ) {
                        document.querySelector('.sidebarCollapse').classList.add('bt-menu-open');
                    }
                }
                
            }
        }
    }

    /*
        Production Functionality - Only for Online files not for user files
    */
    var productionFunctionality = {
        createButtons: function() {
            var form = [
                {
                    type: 'anchor',
                    label: 'Buy Now',
                    target: '_blank'
                },
                {
                    type: 'button',
                    label: ''
                }
            ];
            
            var element = document.createElement("div");
            var wrapHtmlAttr = document.createAttribute("class");
            wrapHtmlAttr.value = "online-actions";
            element.style.cssText = "position: fixed;bottom: 43px;right: 21px;z-index: 1055;";
            element.setAttributeNode(wrapHtmlAttr);
            for (var i = 0; i < form.length; i++) {
                var obj = form[i];
                switch (obj.type) {
                    case "button":
                        var button = document.createElement('button');
                        var textButton = document.createTextNode(obj.label);
                        button.innerHTML = '<svg style="width: 15px; height: 15px; stroke-width: 2; vertical-align: middle;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-up"><line x1="12" y1="19" x2="12" y2="5"></line><polyline points="5 12 12 5 19 12"></polyline></svg>';
                        button.style.cssText = " margin-left: 6px;padding: 6px 9px; display: none; border: none;box-shadow: 0 10px 20px -10px #4801FF; background-image: linear-gradient(-225deg, #AC32E4 0%, #7918F2 48%, #4801FF 100%);";
                        button.classList.add('btn', 'btn-secondary', 'scroll-top-btn');
                        button.appendChild(textButton);
                        element.appendChild(button);
                        break;
            
                    case "anchor":
                        var anchor = document.createElement('a');
                        var textanchor = document.createTextNode(obj.label);
                        anchor.setAttribute('href',"https://themeforest.net/item/cork-responsive-admin-dashboard-template/25582188");
                        anchor.style.cssText = "border: none; background-image: linear-gradient(to right, #ff0844 20%, #ffb199 141%);box-shadow: 0 10px 20px -10px #ff0844;";
                        anchor.classList.add('btn', 'btn-danger', 'buy-btn');
                        anchor.target = obj.target;
                        anchor.appendChild(textanchor);
                        element.appendChild(anchor);
                        break;
                }
                var div = document.querySelector("body");
                div.appendChild(element);
            }
        },

        scrollTop: function() {
            $(document).on('click', '.scroll-top-btn', function(event) {
                event.preventDefault();
                var body = $("html, body");
                body.stop().animate({scrollTop:0}, 500, 'swing');
            });
        },

        checkScrollPosition: function() {
            $(document).scroll(function(event) {
                var lanWrapper = $('.layout-spacing');
                var elementScrollToTop = $('.scroll-top-btn');
                var windowScroll = $(window).scrollTop()
                var elementoffset = lanWrapper.offset().top;
            
                // Check if window scroll > or == element offset?
                if (windowScroll >= elementoffset) {
                elementScrollToTop.addClass('d-inline-block');
                } else if (windowScroll < elementoffset) {
                elementScrollToTop.removeClass('d-inline-block');
                }
            });
        }
    }

    var _mobileResolution = {
        onRefresh: function() {
            var windowWidth = window.innerWidth;
            if ( windowWidth <= 1199 ) {
                toggleFunction.sidebar();
            }
        },
        
        onResize: function() {
            $(window).on('resize', function(event) {
                event.preventDefault();
                var windowWidth = window.innerWidth;
                if ( windowWidth <= 1199 ) {
                }
            });
        }
        
    }

    var _desktopResolution = {
        onRefresh: function() {
            var windowWidth = window.innerWidth;
            if ( windowWidth > 1199 ) {
                toggleFunction.sidebar(true);
                toggleFunction.fixedSubmenuCollapser();
            }
        },
        
        onResize: function() {
            $(window).on('resize', function(event) {
                event.preventDefault();
                var windowWidth = window.innerWidth;
                if ( windowWidth > 1199 ) {
                }
            });
        }
        
    }

    function sidebarFunctionality() {
        function sidebarCloser() {

            if (window.innerWidth <= 1199 ) {


                if (!$('body').hasClass('collapsable-menu')) {

                    $('.main-container').removeClass('sbar-open');
                    $("#container").addClass("sidebar-closed");
                    $('.overlay').removeClass('show');
                    $('#compact_submenuSidebar').removeClass('show');

                } else {
                    $(".navbar").removeClass("expand-header");
                    $('.overlay').removeClass('show');
                    $('#container').removeClass('sbar-open');
                    $('html, body').removeClass('sidebar-noneoverflow');
                }

            } else if (window.innerWidth > 1199 ) {

                if (!$('body').hasClass('collapsable-menu')) {
                    $("#container").removeClass("sidebar-closed");
                    $('#container').removeClass('sbar-open');
                } else {
                    $('html, body').addClass('sidebar-noneoverflow');
                    $("#container").addClass("sidebar-closed");
                    $(".navbar").addClass("expand-header");
                    $('.overlay').addClass('show');
                    $('#container').addClass('sbar-open');
                    $('.sidebar-wrapper [aria-expanded="true"]').parents('li.menu').find('.collapse').removeClass('show');
                }
            }

        }

        function sidebarMobCheck() {
            if (window.innerWidth <= 1199 ) {

                if ( $('.main-container').hasClass('sbar-open') || $('#compact_submenuSidebar').hasClass('show') || $('.col-right').hasClass('show') ) {
                    return;
                } else {
                    sidebarCloser()
                }
            } else if (window.innerWidth > 1199 ) {
                sidebarCloser();
            }
        }

        sidebarCloser();

        $(window).resize(function(event) {
            sidebarMobCheck();
        });

    }

    return {
        init: function() {
            toggleFunction.overlay();
            toggleFunction.search();
            toggleFunction.notificationSidebar();
            
            /*
                Desktop Resoltion fn
            */
            _desktopResolution.onRefresh();
            _desktopResolution.onResize();

            /*
                Mobile Resoltion fn
            */
            _mobileResolution.onRefresh();            
            _mobileResolution.onResize();

            sidebarFunctionality();

            /*
                In Built Functionality fn
            */
            inBuiltfunctionality.mainCatActivateScroll();
            inBuiltfunctionality.subCatScroll();
            inBuiltfunctionality.preventScrollBody();
            inBuiltfunctionality.languageDropdown();
            inBuiltfunctionality.onSidebarHover();
            inBuiltfunctionality.toggleFixedSubmenuCollapserOnScroll();
            inBuiltfunctionality.colRightContentScroll();

            if (document.querySelector('.alt-menu')) {
                inBuiltfunctionality.colRightContentScroll()
            }

            inBuiltfunctionality.openSubmenuOnLoad();

            /*
                Production Functionality - Only for Online files not for user files
            */
            // productionFunctionality.createButtons();
            // productionFunctionality.scrollTop();
            // productionFunctionality.checkScrollPosition();
        }
    }

}();