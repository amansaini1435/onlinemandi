<script setup>
import { RouterView } from 'vue-router'
import Header from './header/Header.vue';
// import Footer from './Footer.vue';
import Sidevar from './sidebar/Sidebar.vue';
import {useStore} from '../../stores/main'
const store = useStore()

</script>
<template>
    <main id="main">
        <div id="sidebar" class="rounded-3 shadow">
            <Sidevar />
        </div>
        <div id="main_content" class="pt-5">
            <Header />
            
            <div class="container pe-0 mt-5 pt-5">
                <main class="p-4"
                    :class="{ 'main-content': store.isSidebarClose, 'main-content-open': !store.isSidebarClose }">  
                    <RouterView /> 
                </main>
            </div>
            <!-- <Footer /> -->
        </div>
    </main>
</template>

<style scoped>
/* hide scrollbar but allow scrolling */
#sidebar {
    -ms-overflow-style: none;
    /* for Internet Explorer, Edge */
    scrollbar-width: none;
    /* for Firefox */
    overflow-y: scroll;
}

#sidebar::-webkit-scrollbar {
    display: none;
    /* for Chrome, Safari, and Opera */
}

@media (min-width: 1500px) {
    .container {
        max-width: 1640px;
    }
}
</style>