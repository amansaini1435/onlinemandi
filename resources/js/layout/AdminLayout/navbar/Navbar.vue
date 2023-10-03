<script>
import { useStore } from '../../../stores/main.js'
import { RouterLink } from 'vue-router';
export default {
    setup() {
        const store = useStore()
        return {
            // you can return the whole store instance to use it in the template
            store,
        }
    },
    data() {
        return {
            csrf_token: this.$csrfToken
        }
    },
    methods: {
        toggleSidebar() {
            this.store.toggleSidebar();
        },
        logout() {
            document.getElementById('logout').submit();
        },
    },
}
</script>
<template>
    <nav>
        <nav class="navbar navbar-expand-lg shadow rounded-3 py-2">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <div @click="opensidenev()" class="spinner"></div>
                </a>
                <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <i class="bi bi-caret-down fs-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <form class="mx-auto" role="search">
                        <input class=" rounded-pill form-control  py-2 px-3 w-100 d-inline-block  me-2" type="search"
                            placeholder="Search" aria-label="Search">
                    </form>
                 
                    <div class="nev_profile d-flex  justify-content-between align-items-center">
                        <div class="profile_pic me-5">
                            <img src="../../../../assets//images/Sa.jpg" class="h-100 w-100 object-fit-cover " alt="">
                        </div>

                        <div class="nav_notify rounded-0 me-5 d-flex justify-content-center ">
                            <i class="bi bi-bell fs-3"></i>
                        </div>


                        <div class="new_add_nav">
                            <button type="button" @click="logout"
                                class="py-2 px-4 fs-18 btn-success  border-0 rounded-pill">
                                Log out
                            </button>
                            <form action="/logout" method="POST" id="logout">
                                <input type="hidden" name="_token" :value="csrf_token" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </nav>
</template>


<script setup>
function opensidenev() {
    var element = document.getElementById("main");
    element.classList.toggle("openClose");
    console.log('Hello Check');
}

</script>

<style scoped>
.form-control:focus {
    border-color: #4fb16e;
    outline: 0;
    box-shadow: 0 0 #4fb16e;
}

.navbar-toggler:focus {
    box-shadow: 0 0 0 transparent !important;
}


/* .spinner {
    width: 56px;
    height: 56px;
    display: grid;
    border: 4.5px solid #0000;
    border-radius: 50%;
    border-color: #dbdcef #0000;
    transform: rotate(90deg);
    transition: all 1s;
}

.openClose .spinner {
    transform: rotate(-180deg);
}

.spinner::before,
.spinner::after {
    content: "";
    grid-area: 1/1;
    margin: 2.2px;
    border: inherit;
    border-radius: 50%;
}

.spinner::before {
    border-color: #4fb16e #0000;
    transition: all 0.7s;
    transform: rotate(-90deg);
}

.openClose .spinner::before {
    transform: rotate(-360deg);
}

.spinner::after {
    margin: 8.9px;
} */

/* 
.spinner {
    width: 40px;
    height: 40px;
    display: grid;
    color: #239246;
    background: radial-gradient(farthest-side, currentColor calc(100% - 4.8px), #0000 calc(100% - 4px) 0);
    -webkit-mask: radial-gradient(farthest-side, #0000 calc(100% - 10.4px), #000 calc(100% - 9.6px));
    border-radius: 50%;
    animation: spinner-sm4bhi 2.8s infinite linear;
}

.spinner::before,
.spinner::after {
    content: "";
    grid-area: 1/1;
    background: linear-gradient(currentColor 0 0) center,
        linear-gradient(currentColor 0 0) center;
    background-size: 100% 8px, 8px 100%;
    background-repeat: no-repeat;
    transition: all 0.5s ease;
    transform: rotate(0deg);
}
.openClose .spinner::before{
    transform: rotate(360deg);
}

.openClose .spinner::after {
    transform: rotate(315deg);
}

.spinner::after {
    transform: rotate(45deg);
    transition: all 0.5s ease;
}

@keyframes spinner-sm4bhi {
    100% {
        transform: rotate(1turn);
    }
} */

/* nev profile */
.profile_pic,
.nav_notify {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    overflow: hidden;
}

/* \nev profile */

/* search bar */
.navbar form {
    width: 25% !important;
}

@media (max-width:991.98px) {
    .navbar form {
        width: 100% !important;
        margin-bottom: 15px;
    }
}
</style>
