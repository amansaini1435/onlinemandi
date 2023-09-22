<script>
// Import Swiper Vue.js components
import { Swiper, SwiperSlide } from 'swiper/vue';

// Import Swiper styles
import 'swiper/css';

import 'swiper/css/pagination';


// import required modules
import { Mousewheel, Pagination } from 'swiper/modules';

export default {
    components: {
        Swiper,
        SwiperSlide,
    },
    setup() {
        return {
            modules: [Mousewheel, Pagination],
        };
    },
};

</script>
  
<template>
    <swiper :direction="'vertical'" :loop="true" :autoplay="true" :slidesPerView="1" :spaceBetween="0" :mousewheel="true" :pagination="{
    clickable: true,
}" :modules="modules" class="mySwiper rounded-5">
        <swiper-slide>
            <img src="../../../assets/images/card1.png" class="w-100 h-100 object-fit-cover" alt="">
        </swiper-slide>
        <swiper-slide>
            <img src="../../../assets/images/card2.png" class="w-100 h-100 object-fit-cover" alt="">
        </swiper-slide>
        <swiper-slide>
            <img src="../../../assets/images/card3.png" class="w-100 h-100 object-fit-cover" alt="">
        </swiper-slide>
        <swiper-slide>
            <img src="../../../assets/images/card4.png" class="w-100 h-100 object-fit-cover" alt="">
        </swiper-slide>
    </swiper>
</template>

<style>
.swiper {
    width: 100%;
    height: 100%;
}

.swiper-slide {
    text-align: center;
    font-size: 18px;
    background: #fff;

    /* Center slide text vertically */
    display: flex;
    justify-content: center;
    align-items: center;
}

.swiper-slide img {
    display: block;
    width: 100%;
    height: 100%;
    object-fit: cover;
}
</style>

  