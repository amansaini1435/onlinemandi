

<template>
      <Loading v-model:active="store.isLoading" :is-full-page="user.fullPage">
        <template #default v-if="user.useSlot">
            <h3>Loading ...</h3>
        </template>
    </Loading>
    <div class="row g-4"  v-if="!store.isLoading">
        <div class="col-12">
            <div class="border px-4 py-3 bg-white rounded">
                <h1 class="fs-4">Profile</h1>
            </div>
        </div>
        <div class="col-12">
            <div class="border bg-white p-4 pb-0 rounded">
                <div class="profile-cover rounded pb-5">
                    <div class="d-flex justify-content-end gap-2 p-3 pb-5 text-white">
                        <button class="btn btn-primary me-md-2" type="button"><i
                                class="bi bi-send-plus me-2"></i>Follow</button>
                        <button class="btn btn-success" type="button">
                            <i class="bi bi-envelope-fill me-2"></i>Message</button>
                    </div>
                </div>

                <div class="row align-items-center py-4 ps-4" >
                    <div class="col">
                        <div class="d-flex align-items-center">
                            <div class="user-profile overflow-hidden rounded-circle border border-5">
                                <img src="../../../assets/images/Sa.jpg" alt="Male-avtar" />
                            </div>
                            <div class="name ms-3">
                                <h6 class="d-flex fs-6 justify-content-between">
                                    <span class="fw-bold col-5"></span><b class="col-1"></b>
                                    <span class="col-6 text-end">{{
                                        user.data.name
                                    }}</span>
                                </h6>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="social d-flex gap-2 justify-content-end">
                            <a target="_blank" class="icons rounded-circle d-flex align-items-center justify-content-center"
                                href="https://www.facebook.com/">
                                <i class="bi bi-meta"></i>
                            </a>
                            <a target="_blank" href="https://www.instagram.com/"
                                class="icons rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-instagram"></i>
                            </a>
                            <a target="_blank" href="https://www.twitter.com/"
                                class="icons rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-twitter"></i>
                            </a>
                            <a target="_blank" href="https://www.youtube.com/"
                                class="icons rounded-circle d-flex align-items-center justify-content-center">
                                <i class="bi bi-youtube"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About -->
        <div class="col-sm-12 col-md-6">
            <div class="profile-about border bg-white rounded">
                <div class="px-4 py-3 border-bottom">
                    <h4>About</h4>
                </div>
                <div class="px-4 py-3">
                    <ul class="list-unstyled p-0 d-grid gap-2">
                        <li><i class="bi bi-envelope me-3"></i> <span class="col-6 text-end">{{
                           user.data.email
                        }}</span></li>
                        <li><i class="bi bi-briefcase me-3"></i> <span class="col-6 text-end"></span></li>
                        <li><i class="bi bi-geo-alt me-3"></i><span>Haryana, India</span></li>
                        <li><i class="bi bi-phone me-3"></i> <span class="col-6 text-end">9050710000</span></li>
                       
                        <li><i class="bi bi-pencil-square me-3"></i><span>Bio :-</span>
                            <ul class="list-unstyled mt-2 ps-3">
                                <li class="lh-base">
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae quasi eum sequi
                                    laborum et velit corporis animi nam dolorem iure, quia nobis quam, repellat officia
                                    vitae hic culpa voluptatem molestias!
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <!-- Work & Education -->
        <div class="col-sm-12 col-md-6">
            <div class="profile-about border">
                <div class="px-4 py-3 bg-white rounded border-bottom">
                    <h4>Work & Education</h4>
                </div>
                <div class="px-4 py-3">
                    <ul class="list-unstyled p-0 d-grid gap-2">
                        <li>
                            <i class="bi bi-mortarboard me-3"></i>
                            <span>Web Designer at 2018 - present Past Work: Spruko, Inc.</span>
                        </li>

                        <li>
                            <i class="bi bi-book me-3"></i>
                            <span>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem vitae minima placeat tempora
                                dolores officiis omnis
                            </span>
                        </li>

                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import { onMounted, reactive } from 'vue'
import { showUser } from "../../api/userApi";
import { useStore } from '../../stores/main'
import {  useRoute } from 'vue-router'


const route = useRoute()
const store = useStore()
const formInitialValues = {
    name: "",
    email: "",
};
const user = reactive({
    data: formInitialValues,
});

onMounted(async () => {
    store.loading(true);
    await fetchData();
});

async function fetchData() {
    store.loading(true);
    const response = await showUser(route.params.id);
    user.data = response.data.items;
    console.log(user.data);
    store.loading(false);
}



</script>