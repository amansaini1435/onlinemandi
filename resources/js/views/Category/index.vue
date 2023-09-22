<template>
  
    <div class="row">
        <div class="col-12">
            <div class="table-responsive bg-white border border-secondary shadow-sm rounded-3 p-3">
                <div class="d-flex justify-content-between mb-2 pb-3 border-bottom border-dark">
                    <h3 class="m-0">Category</h3>
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
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in data.categorys" class="align-middle">
                            <td>{{ index + 1 }}</td>
                            <td>{{ item.name }}</td>
                            <td><i class="bi"
                                    :class='{ "text-success bi-check-lg": item.status, "text-danger bi-x-lg": !item.status }'></i>
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
                                        <li><a class="dropdown-item"
                                                href="{{ route('admin.users.delete', ['id' => $record->getId()])}}">Edit</a>
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
import { fetchUsers } from "../../api/userApi"
import { useStore } from '../../stores/main'
import { useRouter } from 'vue-router'

const store = useStore()
const router = useRouter()
const data = reactive({
    showModalNow: false,
    records: null,
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
    data.categorys = response.data.categorys;
    store.loading(false);
}

function closeMyModal() {
    data.showModalNow = false;
}

watchEffect(async () => {
    await fetchRecords();
})

onMounted(() => {
})

function onDetails(id) {
    router.push({ name: 'category', params: { id: id } });
}
function onDelete(id) {

}
</script>