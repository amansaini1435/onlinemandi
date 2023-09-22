<template>
    <Loading v-model:active="store.isLoading" :is-full-page="state.fullPage">
        <template #default v-if="state.useSlot">
            <h3>Loading ...</h3>
        </template>
    </Loading>
    <div class="row" v-if="!store.isLoading">
        <div class="col-12">
            <div class="table-responsive bg-white border border-secondary shadow-sm rounded-3 p-3">
                <div class="d-flex justify-content-between mb-2 pb-3 border-bottom border-dark">
                    <h3 class="text-primary fw-bold">{{ state.stateData.name }} | Cities</h3>
                    <div class="d-flex">
                        <form class="position-relative">
                            <input class="form-control me-2 py-2 shadow-none" type="search" placeholder="Search"
                                aria-label="Search">
                            <button class="btn position-absolute top-0 end-0 shadow-none" type="submit"> <i
                                    class="bi bi-search"></i></button>
                        </form>
                        <button class="btn btn-sm btn-primary ms-2" @click="$router.back()">Back</button>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in state.stateData.cities" class="align-middle">
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

                                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuLink">
                                        
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin.state.delete', ['id' => $record->getId()])}}">Delete</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin.state.delete', ['id' => $record->getId()])}}">Edit</a>
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
<script setup>
import { ref, onMounted, watchEffect, reactive } from 'vue'
import { withAsync } from "../../api/helpers/withAsync"
import { fetchCities ,updateStatus} from "../../api/locationApi"
import { useStore } from '../../stores/main'
import { useRoute } from 'vue-router'

const route = useRoute()
const store = useStore()
const state = reactive({
    showModalNow: false,
    stateData: null,
    fullPage: true,
    useSlot: false
})

async function fetchCitiesData() {
    store.loading(true);
    const { response, error } = await withAsync(fetchCities, route.params.id);
    if (response) {
        state.stateData = response.data.state;
    }
    if (error) {
        console.log("error", error);
    }
    store.loading(false);
    return;
}

function closeMyModal() {
    state.showModalNow = false;
}

watchEffect(async () => {
    await fetchCitiesData();
})
function confirmStatus(item){
    state.stateData.cities.forEach(element => {
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