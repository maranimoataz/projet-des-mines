/**
 * Template Name: Moderna - v2.2.1
 * Template URL: https://bootstrapmade.com/free-bootstrap-template-corporate-moderna/
 * Author: BootstrapMade.com
 * License: https://bootstrapmade.com/license/
 */
!(function ($) {
    "use strict";

    // Toggle .header-scrolled class to #header when page is scrolled
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $("#header").addClass("header-scrolled");
        } else {
            $("#header").removeClass("header-scrolled");
        }
    });

    if ($(window).scrollTop() > 100) {
        $("#header").addClass("header-scrolled");
    }

    // Smooth scroll for the navigation menu and links with .scrollto classes
    $(document).on(
        "click",
        ".nav-menu a, .mobile-nav a, .scrollto",
        function (e) {
            if (
                location.pathname.replace(/^\//, "") ==
                    this.pathname.replace(/^\//, "") &&
                location.hostname == this.hostname
            ) {
                e.preventDefault();
                var target = $(this.hash);
                if (target.length) {
                    var scrollto = target.offset().top;
                    var scrolled = 20;

                    if ($("#header").length) {
                        scrollto -= $("#header").outerHeight();

                        if (!$("#header").hasClass("header-scrolled")) {
                            scrollto += scrolled;
                        }
                    }

                    if ($(this).attr("href") == "#header") {
                        scrollto = 0;
                    }

                    $("html, body").animate(
                        {
                            scrollTop: scrollto,
                        },
                        1500,
                        "easeInOutExpo"
                    );

                    if ($(this).parents(".nav-menu, .mobile-nav").length) {
                        $(".nav-menu .active, .mobile-nav .active").removeClass(
                            "active"
                        );
                        $(this).closest("li").addClass("active");
                    }

                    if ($("body").hasClass("mobile-nav-active")) {
                        $("body").removeClass("mobile-nav-active");
                        $(".mobile-nav-toggle i").toggleClass("bx-menu bx-x");
                        $(".mobile-nav-overly").fadeOut();
                    }
                    return false;
                }
            }
        }
    );

    // Mobile Navigation
    if ($(".nav-menu").length) {
        var $mobile_nav = $(".nav-menu").clone().prop({
            class: "mobile-nav d-lg-none",
        });
        $("body").append($mobile_nav);
        $("body").prepend(
            '<button type="button" class="mobile-nav-toggle d-lg-none"><i class="bx bx-menu"></i></button>'
        );
        $("body").append('<div class="mobile-nav-overly"></div>');

        $(document).on("click", ".mobile-nav-toggle", function (e) {
            $("body").toggleClass("mobile-nav-active");
            $(".mobile-nav-toggle i").toggleClass("bx-menu bx-x");
            $(".mobile-nav-overly").toggle();
        });

        $(document).on("click", ".mobile-nav .drop-down > a", function (e) {
            e.preventDefault();
            $(this).next().slideToggle(300);
            $(this).parent().toggleClass("active");
        });

        $(document).click(function (e) {
            var container = $(".mobile-nav, .mobile-nav-toggle");
            if (
                !container.is(e.target) &&
                container.has(e.target).length === 0
            ) {
                if ($("body").hasClass("mobile-nav-active")) {
                    $("body").removeClass("mobile-nav-active");
                    $(".mobile-nav-toggle i").toggleClass("bx-menu bx-x");
                    $(".mobile-nav-overly").fadeOut();
                }
            }
        });
    } else if ($(".mobile-nav, .mobile-nav-toggle").length) {
        $(".mobile-nav, .mobile-nav-toggle").hide();
    }

    // Intro carousel
    var heroCarousel = $("#heroCarousel");

    heroCarousel.on("slid.bs.carousel", function (e) {
        $(this).find("h2").addClass("animate__animated animate__fadeInDown");
        $(this)
            .find("p, .btn-get-started")
            .addClass("animate__animated animate__fadeInUp");
    });
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $(".back-to-top").fadeIn("slow");
        } else {
            $(".back-to-top").fadeOut("slow");
        }
    });

    $(".back-to-top").click(function () {
        $("html, body").animate(
            {
                scrollTop: 0,
            },
            1500,
            "easeInOutExpo"
        );
        return false;
    });

    // Initiate the venobox plugin
    $(window).on("load", function () {
        $(".venobox").venobox();
    });

    // jQuery counterUp
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 1000,
    });

    // Skills section
    $(".skills-content").waypoint(
        function () {
            $(".progress .progress-bar").each(function () {
                $(this).css("width", $(this).attr("aria-valuenow") + "%");
            });
        },
        {
            offset: "80%",
        }
    );

    // Testimonials carousel (uses the Owl Carousel library)
    $(".testimonials-carousel").owlCarousel({
        autoplay: true,
        dots: true,
        loop: true,
        items: 1,
    });

    // Porfolio isotope and filter
    $(window).on("load", function () {
        var portfolioIsotope = $(".portfolio-container").isotope({
            layoutMode: "fitRows",
        });

        $("#portfolio-flters li").on("click", function () {
            $("#portfolio-flters li").removeClass("filter-active");
            $(this).addClass("filter-active");

            portfolioIsotope.isotope({
                filter: $(this).data("filter"),
            });
            aos_init();
        });
    });

    // Portfolio details carousel
    $(".portfolio-details-carousel").owlCarousel({
        autoplay: true,
        dots: true,
        loop: true,
        items: 1,
    });

    // Initi AOS
    function aos_init() {
        AOS.init({
            duration: 1000,
            once: true,
        });
    }
    $(window).on("load", function () {
        aos_init();
    });
})(jQuery);

function getDeletingProduction(id, titre) {
    document.getElementById("production_title").innerText = titre;
    document.getElementById("delete_production_button").href =
        "/acces_partenaire/productions/" + id + "/destroy";
}

function getDeletingActualite(id, titre) {
    document.getElementById("actualite_title").innerText = titre;
    document.getElementById("delete_actualite_button").href =
        "/acces_partenaire/actualites/" + id + "/destroy";
}

function getDeletingUser(id, first_name, last_name) {
    document.getElementById("user_name").innerText =
        last_name + " " + first_name;
    document.getElementById("delete_user_button").href =
        "/acces_partenaire/users/" + id + "/destroy";
}

function getUpdatingProduction(id, titre, resume, lien) {
    document.getElementById("id").value = id;
    document.getElementById("titre").value = titre;
    document.getElementById("resume").value = resume;
    document.getElementById("lien").value = lien;
    document.getElementById("update_form").action =
        "/acces_partenaire/productions/" + id + "/update";
}

function getUpdatingActualite(a) {
    tinymce.get("edit_resume").setContent(a.resume);

    document.getElementById("edit_titre").value = a.titre;
    document.getElementById("edit_date").value = a.date;
    document.getElementById("edit_importance").value = a.importance;
    if (a.type == "evenement")
        document.getElementById("edit_evenement").checked = true;
    else document.getElementById("edit_actualite").checked = true;
    document.getElementById("update_form").action =
        "/acces_partenaire/actualites/" + a.id + "/update";
}

function getUpdatingUser(id, first_name, last_name, email, institut) {
    document.getElementById("id").value = id;
    document.getElementById("first_name").value = first_name;
    document.getElementById("last_name").value = last_name;
    document.getElementById("email").value = email;
    document.getElementById("institut").value = institut;
    document.getElementById("update_form").action =
        "/acces_partenaire/users/" + id + "/update";
}

// Validation Wizard

function validerTitre() {
    var titre = document.getElementById("add_titre").value;
}
