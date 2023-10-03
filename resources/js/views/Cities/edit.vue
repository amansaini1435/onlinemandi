<template>
    <Loading v-model:active="store.isLoading" :is-full-page="state.fullPage">
        <template #default v-if="state.useSlot">
            <h3>Loading ...</h3>
        </template>
    </Loading>
    <div class="row g-4">
        <div class="col-12">
            <div class="border px-4 py-3 bg-white rounded">
                <h1 class="fs-4">Profie</h1>
            </div>
        </div>
        <div class="col-sm-12 col-md-6" v-if="!store.isLoading">
            <div class="profile-about border bg-white rounded">
                <div class="px-4 py-3 border-bottom d-flex justify-content-evenly align-items-center">
                    <h4>About</h4>
                    <button type="button" class="btn btn-primary" @click="onActive()">Activate User</button>
                </div>
                <div class="px-4 py-3">
                    <h1> <i class="bi bi-briefcase me-3"></i><span>{{ state.name }}</span></h1>
                    <h1><i class="bi bi-geo-alt me-3"></i><span>{{ state.email }}</span></h1>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { onMounted, reactive } from 'vue'
import { showUser } from "../../api/userApi";
import { useStore } from '../../stores/main'
import { useRouter, useRoute } from 'vue-router'


const route = useRoute()
const store = useStore()
const router = useRouter()
const state = reactive({
    name: '',
    email: "",
    isClose: false,
});

onMounted(async () => {
    store.loading(true);
    await fetchUserData();
});

async function fetchUserData() {
    store.loading(true);
    const response = await showUser(route.params.id);
    state.name = response.data.user.name;
    state.email = response.data.user.email;
    console.log(state.data);
    store.loading(false);
}

function onActive(id) {
    router.push({ name: 'activateUser', params: { id: route.params.id } })
}


</script>
