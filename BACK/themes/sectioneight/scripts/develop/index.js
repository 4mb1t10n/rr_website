
// play video


function validateForm(form, func, noreset) {
    form.on("submit", function (e) {
        e.preventDefault();
    });
    $.validator.addMethod("goodMessage", function (value, element) {
        return this.optional(element) || /^[\sаА-яЯіІєЄїЇґҐa-zA-Z0-9._-]{2,100}$/i.test(value);
    }, "Please enter correct");

    $.validator.addMethod("goodEmail", function (value, element) {
        return this.optional(element) || /^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,62}$/i.test(value);
    }, "Please enter correct email");

    form.validate({
        rules: {
            name: {
                required: true,
                goodMessage: true
            },

            email: {
                required: true,
                goodEmail: true,
                email: true
            },
            phone: {
                required: true
            },
            terms_conditions: {
                required: true
            }
        },
        messages: {
            name: {
                required: "This field is required",
                email: "Please enter correct name"
            },
            phone: {
                required: "This field is required"
            },
            email: {
                required: "This field is required",
                email: "Please enter correct email"
            },
            terms_conditions: {
                required: "This field is required"
            }

        },
        errorPlacement: function (error, element) {
            if (element.attr("type") === "checkbox") {
                error.insertBefore(element.closest(".form__checkbox").find("input"));
            } else {
                error.insertBefore(element);
            }
        },
        submitHandler: function () {
            func();
            noreset ? null : form[0].reset();
        }
    });
};

function ajaxSend(form, funcSuccess, funcError) {
    let data = form.serialize();
    $.ajax({
        url: '/wp-admin/admin-ajax.php',
        data: data,
        method: 'POST',
        success: function (res) {
            console.log('success ajax');
            funcSuccess(res);
        },
        error: function (error) {
            console.log('error ajax');
            funcError(error);
        }
    });
}

const investment = new Swiper('.investment__slider', {
    slidesPerView: 2,
    spaceBetween: -10,
    loop: true,
    centeredSlides: true,
    // speed: 1000,
    // effect: 'slide',
    pagination: {
        el: '.investment__pagination'

    },
    navigation: {
        nextEl: ".investment__next",
        prevEl: ".investment__prev"
    },
    breakpoints: {
        '0': {
            slidesPerView: 1,
            centeredSlides: true,
            spaceBetween: 20
        },

        '667': {
            slidesPerView: 2,
            spaceBetween: -10,
            loop: true
        }
    }
});

function checkCounters() {
    const duration = 3000;
    function animateCounter($counter) {
        const target = parseInt($counter.attr('data-target'), 10);
        const start = 0;
        let startTime = null;

        const updateCount = function (timestamp) {
            if (!startTime) startTime = timestamp;
            const progress = timestamp - startTime;
            const currentValue = Math.min(Math.floor(progress / duration * target), target);

            $counter.text(currentValue);

            if (progress < duration) {
                requestAnimationFrame(updateCount);
            } else {
                $counter.text(target);
            }
        };

        requestAnimationFrame(updateCount);
    };

    function isElementInView(element) {
        const elementTop = $(element).offset().top;
        const elementBottom = elementTop + $(element).outerHeight();
        const viewportTop = $(window).scrollTop();
        const viewportBottom = viewportTop + $(window).height();
        return elementBottom > viewportTop && elementTop < viewportBottom;
    };

    $('.counter').each(function () {
        const $counter = $(this);
        if (isElementInView($counter) && !$counter.hasClass('animated')) {
            $counter.addClass('animated');
            animateCounter($counter);
        }
    });
};

function getHeight() {
    let totalHeight = $(".works__list").height();

    let lastItemHeight = $(".works__list .works__item:last").outerHeight(true);
    let heightWithoutLastItem = totalHeight - lastItemHeight;
    $('.works__gradient').css('height', `${heightWithoutLastItem}`);
    console.log("Height without the last item:", heightWithoutLastItem);
}

const why = new Swiper('.why__slider', {
    slidesPerView: 1,
    spaceBetween: 24,
    loop: true,
    // speed: 1000,
    // effect: 'slide',
    navigation: {
        nextEl: ".why__next",
        prevEl: ".why__prev"
    },
    breakpoints: {
        '0': {
            slidesPerView: 1,
            centeredSlides: true,
            spaceBetween: 20
        },

        '667': {
            slidesPerView: 1,
            spaceBetween: 24,
            loop: true
        }
    }
});
const solution = new Swiper('.solution__slider', {
    slidesPerView: 3,
    spaceBetween: 24,
    loop: true,
    // speed: 1000,
    // effect: 'slide',
    navigation: {
        nextEl: ".solution__next",
        prevEl: ".solution__prev"
    },
    speed: 1000,
    effect: 'slide',
    autoplay: {
        delay: 2000,
        disableOnInteraction: false
    },
    pagination: {
        el: '.solution__pagination'

    },
    breakpoints: {
        '0': {
            slidesPerView: 1,
            centeredSlides: true,
            spaceBetween: 20
        },

        '667': {
            slidesPerView: 3,
            spaceBetween: 24,
            loop: true
        }
    }
});

$('.solution__slider .swiper-slide').on('mouseenter', function () {
    solution.autoplay.stop();
});

$('.solution__slider .swiper-slide').on('mouseleave', function () {
    solution.autoplay.start();
});

function resetModal() {}

function accordionFAQ() {
    $('.faq__item:first-child').addClass('faq__open');
    $(document).on('click', '.faq__header', function () {
        let wrap = $(this).closest('.faq__item');
        wrap.prevAll().removeClass('faq__open');
        wrap.nextAll().removeClass('faq__open');

        if (wrap.hasClass('faq__open')) {
            wrap.removeClass('faq__open');
        } else {
            wrap.addClass('faq__open');
        }
    });
}

function menuOpen() {
    $(document).on('click', '.header__burger, .header__close, .header__menu-list > *', function () {
        $('.header__menu').toggleClass('active');
        $('.header__burger').toggleClass('header__burger-open');
        $('.header__close').toggleClass('show');
        $('.header__phone-mob').toggleClass('hide');
        $('body').toggleClass('hidden');
    });
}

function toggleModal(modal, btn) {
    if (!btn) {
        modal.show();
        $('body').addClass('hidden');
    } else {
        btn.click(function () {
            button = $(this);
            modal.show();
            $('body').addClass('hidden');
        });
    }

    $('.modal__close').click(function () {
        $(this).closest(modal).hide();
        $('body').removeClass('hidden');
        resetModal();
        return false;
    });
    $('.modal__btn-close').click(function () {
        $(this).closest(modal).hide();
        $('body').removeClass('hidden');
        resetModal();
        return false;
    });
    $(document).keydown(function (e) {
        if (e.keyCode === 27) {
            e.stopPropagation();
            resetModal();
            $('body').removeClass('hidden');
        }
    });
    modal.click(function (e) {
        if ($(e.target).closest('.modal__content').length == 0) {
            $(this).hide();
            resetModal();
            $('body').removeClass('hidden');
        }
    });
}

function changeMob() {
    if (window.innerWidth <= 666) {

        $('.header__menu').append($('.header__phone'));
    }
}

function chart() {
    let ctx = document.querySelector("#mychart").getContext('2d');

    // Extract the data from the data attribute of the div
    let chartData = JSON.parse(document.getElementById('chartData').getAttribute('data-chart'));

    let myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: chartData.labels, // Get labels from the data object
            datasets: chartData.series.map((data, index) => {
                return {
                    label: chartData.legend ? chartData.legend[index] : `Series ${index + 1}`, // Use legend labels

                    data: data, // Data for each series
                    borderColor: index === 0 ? '#7F56D9' : index === 1 ? '#5DFFF7' : '#BA93FF',
                    backgroundColor: index === 0 ? '#7F56D9' : index === 1 ? '#5DFFF7' : '#BA93FF',
                    tension: 0.4,
                    fill: false,
                    borderWidth: 2
                };
            })
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            elements: {
                point: {
                    radius: 0
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function (value) {
                            return `${value}.000 $`; // Add $ symbol to Y-axis labels
                        }
                    }
                }
            },
            plugins: {

                legend: {
                    display: true, // Ensure the legend is displayed
                    labels: {
                        boxWidth: 12, // Set the size of the square label
                        boxHeight: 12, // Adjust if necessary for a perfect square
                        usePointStyle: false, // Use a square instead of a circular point style
                        font: {
                            size: 12
                        },
                        padding: 10 // Add spacing between legend items
                    },
                    position: 'top' // Place the legend at the top
                }
            },
            animation: {
                duration: 2000, // Animation duration in milliseconds
                easing: 'easeOutQuad', // Easing function for smooth animation
                onProgress: function (animation) {
                    // Optional: Add progress-related actions here if needed
                },
                onComplete: function () {
                    console.log("Animation completed!");
                }
            }
        }
    });
}
function animate() {
    const viewportBottom = $(window).scrollTop() + $(window).height();

    function checkAndAnimate(selector, animationClass, offset = 80) {
        $(selector).each(function () {
            if ($(this).offset().top < viewportBottom - offset) {
                $(this).addClass(animationClass);
            }
        });
    }

    checkAndAnimate('.invest__item', 'opacity');
    checkAndAnimate('.section__title:not(.no-effect)', 'animate-top');
    checkAndAnimate('.center', 'animate-top-slowly');
    checkAndAnimate('.center', 'animate-top-slowly');
}

function showVideo() {
    $(document).on('click', '.banner__video-poster', function () {
        let video = '<iframe allowFullScreen allow=" fullscreen; accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" frameBorder="0" src="' + $(this).attr('data-video') + '" title="' + $(this).attr('data-title') + '"></iframe>';

        $('.modal__video-content').append(video);
        let modal = $('.modal__video');
        modal.show();

        $('.modal__close').click(function () {
            $(this).closest(modal).hide();
            $('.modal__video-content > *').remove();
        });
        $(document).keydown(function (e) {
            if (e.keyCode === 27) {
                $('.modal__video-content > *').remove();
                e.stopPropagation();
            }
        });
        modal.click(function (e) {
            if ($(e.target).closest('.modal__content').length == 0) {
                $('.modal__video-content > *').remove();
                $(this).hide();
            }
        });
    });
}

let init = false;
function showChart() {
    const viewportBottom = $(window).scrollTop() + $(window).height();
    const offset = 80;

    $('.chart__canvas').each(function () {
        if ($(this).offset().top < viewportBottom - offset) {
            $(this).attr('id', 'mychart');

            if (init == false) {
                chart();
            }
            init = true;
        }
    });
}

$(document).ready(function () {

    showVideo();
    showChart();
    menuOpen();
    changeMob();
    getHeight();
    scroll();
    animate();
    accordionFAQ();
    let contactForm = $('.form__contact');
    validateForm(contactForm, function () {
        ajaxSend(contactForm, function (res) {
            toggleModal($('.modal__thank'));
        }, function () {
            toggleModal($('.modal__thank'));
        });
    });
    let contactFormModal = $('.form__contact-modal');
    validateForm(contactFormModal, function () {
        ajaxSend(contactFormModal, function (res) {
            toggleModal($('.modal__thank'));
            $('.modal__contact').hide();
        }, function () {
            toggleModal($('.modal__thank'));
            $('.modal__contact').hide();
        });
    });

    toggleModal($('.modal__contact'), $('.packages__reserved'));

    $(window).on('load scroll', animate);
    $(window).on('load scroll', showChart);
    $(window).on('load scroll', checkCounters);
});
//# sourceMappingURL=index.js.map
