

<template>
    <div class="sidebar_contant w-100 h-100 py-3 px-3">
        <div class="logo d-flex justify-content-between">
            <RouterLink to="/">
                <img src="../../../../assets/images/logotopntech.png" width="150" class="h-100 logotext" alt="">
                <img src="../../../../assets/images/logo.png" class=" logo_icon" alt="">
            </RouterLink>

            <a class="navbar-brand d-lg-none d-inline-block " href="#">
                <div @click="opensidenev()" class="spinner"></div>
            </a>
        </div>
        <hr class="mt-1 d-inline-block w-100" />

        <div class="sidenav">
            <ul class="list-unstyled">
                <li class="nav-item border-bottom border-1 py-3 px-2">
                    <RouterLink to="/" class="text-primary fs-20 nav-link d-flex justify-content-start align-items-center ">
                        <i class="bi bi-house fs-3 text-primary ms-1"></i> <span
                            class="fw-bold ms-4 text-primary">Deshboard</span></RouterLink>
                </li>
                <li class="nav-item border-bottom border-1 py-3 px-2">
                    <RouterLink to="/users"
                        class=" text-primary fs-20 nav-link d-flex justify-content-start align-items-center ">
                          <i  class="bi bi-fingerprint fs-3 text-primary ms-1"></i> <span
                            class="fw-bold ms-4 text-primary">Users</span>
                    </RouterLink>
                </li>
                <li class="nav-item border-bottom border-1 py-3 px-2">
                    <RouterLink to="/settings" 
                        class=" text-primary fs-20 nav-link d-flex justify-content-start align-items-center "><i
                            class="bi bi-gear fs-3 text-primary ms-1"></i> <span
                            class="fw-bold ms-4 text-primary">Settings</span>
                    </RouterLink>
                </li>
        
                <li class="nav-item border-bottom border-1 py-3 px-2">
                    <RouterLink to="/states"
                        class=" text-primary fs-20 nav-link d-flex justify-content-start align-items-center "><i
                            class="bi bi-android fs-3 text-primary ms-1"></i> <span
                            class="fw-bold ms-4 text-primary">Location Management</span>
                    </RouterLink>
                </li>
                <li class="nav-item border-bottom border-1 py-3 px-2">
                    <RouterLink to="/products"
                        class=" text-primary fs-20 nav-link d-flex justify-content-start align-items-center "><i
                            class="bi bi-shop fs-3 text-primary ms-1"></i> <span
                            class="fw-bold ms-4 text-primary">Products</span>
                    </RouterLink>
                </li>
                <li class="nav-item border-bottom border-1 py-3 px-2">
                    <RouterLink to=""
                        class=" text-primary fs-20 nav-link d-flex justify-content-start align-items-center "><i
                            class="bi bi-table fs-3 text-primary ms-1"></i> <span
                            class="fw-bold ms-4 text-primary">Sellers</span>
                    </RouterLink>
                </li>
                <li class="nav-item border-bottom border-1 py-3 px-2">
                    <RouterLink to=""
                        class=" text-primary fs-20 nav-link d-flex justify-content-start align-items-center "><i
                            class="bi bi-person-badge fs-3 text-primary ms-1"></i> <span
                            class="fw-bold ms-4 text-primary">User_Table</span>
                    </RouterLink>
                </li>
                <li class="nav-item border-bottom border-1 py-3 px-2">
                    <RouterLink to=""
                        class=" text-primary fs-20 nav-link d-flex justify-content-start align-items-center "><i
                            class="bi bi-person-lines-fill fs-3 text-primary ms-1"></i> <span
                            class="fw-bold ms-4 text-primary">Contact_Us</span>
                    </RouterLink>
                </li>
                <li class="nav-item border-bottom border-1 py-3 px-2">
                    <RouterLink to=""
                        class=" text-primary fs-20 nav-link d-flex justify-content-start align-items-center "><i
                            class="bi bi-image fs-3 text-primary ms-1"></i> <span
                            class="fw-bold ms-4 text-primary">Gallery</span>
                    </RouterLink>
                </li>
            </ul>
        </div>
    </div>
</template>

<script setup> 
import { RouterLink } from 'vue-router'
function opensidenev() {
    var element = document.getElementById("main");
    element.classList.toggle("openClose");
}
</script>


<style scoped>
.logo {
    position: relative;
}

.logotext {
    display: inline-block;
    transition: all 0.3s ease;
    opacity: 1;
}

.logo_icon {
    position: absolute;
    top: 0;
    left: 0;
    width: 50px;
    height: 100%;
}

.openClose .logotext {
    transition: all 0.3s ease;
    opacity: 0;
}

.openClose .logo_icon {
    display: inline-block;
}
</style>