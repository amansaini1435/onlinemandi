<template>
  
    <div class="row">
        <div class="col-12">
            <div class="table-responsive bg-white border border-secondary shadow-sm rounded-3 p-3">
                <div class="d-flex justify-content-between mb-2 pb-3 border-bottom border-dark">
                    <h3 class="m-0">Users</h3>
                    <div class="d-flex">
                        <form class="position-relative">
                            <input class="form-control me-2 shadow-none" type="search" placeholder="Search"
                                aria-label="Search">
                            <button class="btn position-absolute top-0 end-0 shadow-none" type="submit"> <i
                                    class="bi bi-search"></i></button>
                        </form>
                        
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Joining date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in users.items" class="align-middle">
                            <td>{{ index + 1 }}</td>
                            <td>{{ item.name }}</td>
                            <td>{{ item.email }}</td>
                            <td>{{ item.created_at }}</td>
                            <td>  <span v-if="item.pendingUpdate">
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
                                        <li><a class="dropdown-item" @click="onDetails(item.id)">Detail</a>
                                        </li>
                                        <li><a class="dropdown-item" @click="onDelete(item.id)">Delete</a>
                                        </li>
                                        <li><a class="dropdown-item" @click="onEdit(item.id)">Edit</a>
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
import { onMounted, watchEffect, reactive } from 'vue'
import { withAsync } from "../../api/helpers/withAsync"
import { fetchUsers, deleteRecord ,updateStatus } from "../../api/userApi"
import { useStore } from '../../stores/main'
import { useRouter } from 'vue-router'

const props = defineProps(["users"]);
const store = useStore()
const router = useRouter()
const users = reactive({
    showModalNow: false,
    users: null,
    fullPage: true,
    useSlot: false
})

async function fetchRecords() {
    store.loading(true);
    const { response, error } = await withAsync(fetchUsers, {});

    if (error) {
        console.log("error", error);
        store.loading(false);
        return;
    }
    users.items = response.data.items;
    store.loading(false);
}

function closeMyModal() {
    users.showModalNow = false;
}

watchEffect(async () => {
    await fetchRecords();
})

onMounted(() => {
})

function onDetails(id) {
    router.push({ name: 'userDetails', params: { id: id } });
}
function onEdit(id) {
    router.push({ name: 'edit', params: { id: id } });
}
async function onDelete(id) {
    var res = confirm('Do you want to delete?');
    if(res){
        const { response, error } = await withAsync( deleteRecord , id);
    if (error) {
        console.log("error", error);
        store.loading(false);
        return;
    }
    await fetchRecords();
    store.loading(false);
    }  
}


function confirmStatus(item){
    users.items.forEach(element => {
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