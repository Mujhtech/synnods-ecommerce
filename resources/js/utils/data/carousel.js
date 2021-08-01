export const baseSlider1 = {
    slidesPerView: 1,
    spaceBetween: 0,
    navigation: {
        nextEl: ".swiper-nav .swiper-next",
        prevEl: ".swiper-nav .swiper-prev"
    }
}

export const baseSlider2 = {
    slidesPerView: 4,
    spaceBetween: 8,
    nav: true,
    navigation: {
        nextEl: ".swiper-nav .swiper-next",
        prevEl: ".swiper-nav .swiper-prev"
    }
}

export const baseSlider3 = {
    spaceBetween: 20,
    autoplay: false,
    slidesPerView: 4,
    breakpoints: {
        576: {
            slidesPerView: 2
        },
        992: {
            slidesPerView: 3
        }
    }
}

export const baseSlider4 = {
    loop: false,
    spaceBetween: 20,
    autoplay: false,
    slidesPerView: 2,
    breakpoints: {
        992: {
            slidesPerView: 1
        }
    }
}

export const baseSlider5 = {
    loop: false,
    spaceBetween: 30,
    autoplay: false,
    slidesPerView: 3,
    breakpoints: {
        480: {
            slidesPerView: 1
        },
        1200: {
            slidesPerView: 2
        }
    },
    pagination: {
        el: '.swiper-dots',
        clickable: true
    }
}

export const baseSlider6 = {
    slidesPerView: 1,
    spaceBetween: 0
}

export const baseSlider7 = {
    center: true,
    slidesPerView: 3,
    spaceBetween: 0,
    centeredSlides: true,
    loop: true,
    breakpoints: {
        768: {
            slidesPerView: 1
        }
    }
}

export const baseSlider8 = {
    slidesPerView: 3,
    spaceBetween: 8,
    direction: 'vertical',
    navigation: {
        nextEl: ".vertical-thumbs .thumb-up",
        prevEl: ".vertical-thumbs .thumb-down"
    },
    isCustomNav: true
}

// home
export const topBarSlider = {
    slidesPerView: 3,
    spaceBetween: 0,
    breakpoints: {
        768: {
            slidesPerView: 1
        },
        992: {
            slidesPerView: 2
        }
    }
}

export const featuredSlider = {
    spaceBetween: 20,
    autoplay: false,
    slidesPerView: 4,
    isCustomNav: true,
    breakpoints: {
        576: {
            slidesPerView: 2
        },
        992: {
            slidesPerView: 3
        }
    },
    navigation: {
        nextEl: '.outer-nav .swiper-next',
        prevEl: '.outer-nav .swiper-prev'
    }
}

export const instaSlider = {
    spaceBetween: 20,
    slidesPerView: 9,
    breakpoints: {
        480: {
            slidesPerView: 2
        },
        768: {
            slidesPerView: 3
        },
        992: {
            slidesPerView: 6
        },
        1200: {
            slidesPerView: 7
        },
        1600: {
            slidesPerView: 8
        }
    }
}

export const brandSlider = {
    spaceBetween: 0,
    slidesPerView: 6,
    breakpoints: {
        0: {
            slidesPerView: 1
        },
        480: {
            slidesPerView: 2
        },
        768: {
            slidesPerView: 3
        },
        991: {
            slidesPerView: 4
        },
        1200: {
            slidesPerView: 5
        }
    }
}