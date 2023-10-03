<template>
    <div class="row">
        <div class="col-12">
            <div class="table-responsive bg-white border border-secondary shadow-sm rounded-3 p-3">
                <div class="d-flex justify-content-between mb-2 pb-3 border-bottom border-dark">
                    <h3 class="m-0">Products</h3>
                    <div class="d-flex">
                        <form class="position-relative">
                            <input class="form-control me-2 shadow-none" type="search" v-model="searchQuery"
                                placeholder="Search" aria-label="Search">
                            <button class="btn position-absolute top-0 end-0 shadow-none" type="submit"> <i
                                    class="bi bi-search"></i></button>
                        </form> 
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">S.No.</th>
                            <th scope="col">Code</th>
                            <th scope="col">Name</th>
                            <th scope="col">HName</th>
                            <th scope="col">Weight</th>
                            <th scope="col">Units</th>
                            <th scope="col">Category</th>
                            <th scope="col">Image</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in filteredProducts" class="align-middle">
                            <td>{{ index + 1 }}</td>
                            <td>{{ item.code }}</td>
                            <td>{{ item.name }}</td>
                            <td>{{ item.hname }}</td>
                            <td>{{ item.default_weight }}</td>
                            <td>{{ item.unit_id }}</td>
                            <td>{{ item.category_id }}</td>
                            <td class="text-center">
                                <div v-if="item.image">
                                    <img width="40" :src="setImage(item.image)">
                                </div>
                            </td>
                            <td>
                                <span v-if="item.pendingUpdate">
                                    <button class="btn btn-sm btn-success me-2" @click="changeStatus(item)">Confirm</button>
                                    <button class="btn btn-sm btn-danger"
                                        @click="item.pendingUpdate = false">Cancel</button>
                                </span>
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
                                        <!-- <li><a class="dropdown-item" @click="onDetails(item.id)">Detail</a>
                                        </li>
                                        <li><a class="dropdown-item" @click="onDelete(item.id)">Delete</a>
                                        </li> -->
                                        <!-- <li><a class="dropdown-item"
                                                href="{{ route('admin.products.delete', ['id' => $record->getId()])}}">Edit</a>
                                        </li> -->
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
import { onMounted, watchEffect, reactive,ref,computed } from 'vue'
import { withAsync } from "../../api/helpers/withAsync"
import { fetchProducts, updateStatus } from "../../api/productApi.js"
import { useStore } from '../../stores/main'
import { useRouter } from 'vue-router'
const searchQuery = ref('');
const store = useStore()
const router = useRouter()
const data = reactive({
    showModalNow: false,
    products: null,
    fullPage: true,
    useSlot: false
})

async function fetchRecords() {
    store.loading(true);
    const { response, error } = await withAsync(fetchProducts, {});

    if (error) {
        console.log("error", error);
        store.loading(false);
        return;
    }
    data.products = response.data.products;
    store.loading(false);
}
const filteredProducts = computed(() => {
    return data.products.filter((data) => {
        return data.name.toLowerCase().includes(searchQuery.value.toLowerCase())
    })
})

function closeMyModal() {
    data.showModalNow = false;
}
function setImage(img) {
    return `assets/images/products/${img}`;
}

watchEffect(async () => {
    await fetchRecords();
})

onMounted(() => {
})

function onDetails(id) {
    router.push({ name: 'products', params: { id: id } });
}
function confirmStatus(item) {
    data.products.forEach(element => {
        element.pendingUpdate = false;
    });
    item.pendingUpdate = true;
}
async function changeStatus(item) {
    const { response, error } = await withAsync(updateStatus, { id: item.id });
    if (error) {
        console.log("error", error);
        store.loading(false);
        return;
    }
    item.status = !item.status;
    item.pendingUpdate = false;
}
</script>
