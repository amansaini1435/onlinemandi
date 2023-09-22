<template>
   <Loading v-model:active="store.isLoading" :is-full-page="state.fullPage">
        <template #default v-if="state.useSlot">
            <h3>Loading ...</h3>
        </template>
    </Loading>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive bg-white border border-secondary shadow-sm rounded-3 p-3">
                <div class="d-flex justify-content-between mb-2 pb-3 border-bottom border-dark">
                    <h3 class="m-0">States</h3>
                    <div class="d-flex">
                        <form class="position-relative">
                            <input class="form-control me-2 shadow-none" type="search" v-model="searchQuery"
                                placeholder="Search" aria-label="Search">
                            <button class="btn position-absolute top-0 end-0 shadow-none" type="submit"> <i
                                    class="bi bi-search"></i></button>
                        </form>

                    </div>
                </div>
                <div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Name</th>
                            <th scope="col" style="width:200px">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in  state.states" class="align-middle">
                            <td>{{ index + 1 }}</td>
                            <td>{{ item.name }}</td>
                            <td>
                                <span v-if="item.pendingUpdate">
                                    <button class="btn btn-sm btn-success me-2" @click="changeStatus(item)">Confirm</button>
                                    <button class="btn btn-sm btn-danger" @click="item.pendingUpdate = false">Cancel</button> </span>
                                <span v-else>
                                    <i class="fs-4 bi" role="button" @click="confirmStatus(item)"
                                        :class='{ "text-success bi-check-lg": item.status, "text-danger bi-x-lg": !item.status }'></i>
                                </span>
                            </td>  
                                                     
                            <td>
                                <div class="dropdown">
                                    <a class="text-decoration-none fs-4" role="button" id="dropdownMenuLink"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-three-dots"></i>
                                    </a>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <li><a class="dropdown-item" @click="onDetails(item.id)">Detail</a>
                                        </li>
                                        <li><a class="dropdown-item" @click="onDelete(item.id)">Delete</a>
                                        </li>
                                        
                                    </ul>
                                </div>
                            </td>
                       
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<style>
.v-enter-active,
.v-leave-active {
    transition: opacity 0.5s ease;
}

.v-enter-from,
.v-leave-to {
    opacity: 0;
}
</style>
<script setup>
import { ref, onMounted, onBeforeMount, watchEffect, reactive, onBeforeUpdate, onBeforeUnmount } from 'vue'
import { withAsync } from "../../api/helpers/withAsync"
import { fetchStates, deleteState, updateStatus } from "../../api/locationApi"
import { useStore } from '../../stores/main'
import { useRouter } from 'vue-router'



const store = useStore()
const router = useRouter()
const state = reactive({
    showModalNow: false,
    items: null,
    fullPage: true,
    useSlot: false,
    show: true
})

async function fetchState() {
    store.loading(true);
    const { response, error } = await withAsync(fetchStates, {});

    if (error) {
        console.log("error", error);
        store.loading(false);
        return;
    }
    state.states = response.data.states;
    store.loading(false);
}

function closeMyModal() {
    state.showModalNow = false;
}

watchEffect(async () => {
    await fetchState();
})

function onDetails(id) {
    router.push({ name: 'StateCities', params: { id: id } });
}
function edit(id) {
    router.push({ name: 'edit', params: { id: id } })
}
async function onDelete(id) {
    var res = confirm('Do you want to delete?');
    if(res){
        const { response, error } = await withAsync(deleteState, id);
    if (error) {
        console.log("error", error);
        store.loading(false);
        return;
    }
    await fetchState();
    store.loading(false);
    }    

}
function confirmStatus(item){
    state.states.forEach(element => {
        element.pendingUpdate = false;
    });
    item.pendingUpdate = true;
}
async function changeStatus(item){
    const { response, error } = await withAsync(updateStatus, {id : item.id});
    if (error) {
        console.log("error", error);
        store.loading(false);
        return;
    }
    item.status = !item.status;
    item.pendingUpdate = false;
}
</script>