<template>
    <Loading v-model:active="store.isLoading" :is-full-page="users.fullPage">
        <template #default v-if="users.useSlot">
            <h3>Loading ...</h3>
        </template>
    </Loading>
    <div class="bg-white rounded-4 shadow p-4">
        <Form v-slot="{ resetForm }" @submit="onSubmit" :validation-schema="schema">
            <div class="row">
                <div class="col-4">
                    <div class="card border-1 rounded-4 p-4 h-100">
                        <div class="d-flex justify-content-center align-items-center">
                            <div class="imagesadd bg-info rounded-4 overflow-hidden" style="width: 300px; height: 300px;">
                                <img src="" alt="User Profile" style="width: 100%; height: 100%; object-fit: cover; object-position: top;">
                            </div>
                        </div>

                        <div class="form-group my-3">
                            <label for="image" class="form-label fw-bold mb-1">Add Profile Pic</label>
                            <Field class="form-control rounded-3" name="image" type="file" v-model="users.data.image" />
                            <ErrorMessage name="image" />
                        </div>
                    </div>


                </div>
                <div class="col-8">
                    <div class="card h-100 rounded-4 p-3 border-1">
                        <div class="form-group mb-3">
                            <label for="name" class="form-label fw-bold mb-1">User name</label>
                            <Field class="form-control rounded-3" name="name" type="text" v-model="users.data.name" />
                            <ErrorMessage name="name" />
                        </div>
                        <div class="form-group mb-3">
                            <label for="email" class="form-label fw-bold mb-1">Email id</label>
                            <Field class="form-control rounded-3" name="email" type="text" v-model="users.data.email" />
                            <ErrorMessage name="email" />
                        </div>
                        <div class="form-group mb-3">
                            <label for="address" class="form-label fw-bold mb-1">Address</label>
                            <Field class="form-control rounded-3" name="address" type="text" v-model="users.data.address" />
                            <ErrorMessage name="address" />
                        </div>

                        <div class="form-group mb-3">
                            <label for="phone" class="form-label fw-bold mb-1">Phone.Number</label>
                            <Field class="form-control rounded-3" name="phone" type="tel" v-model="users.data.phone" />
                            <ErrorMessage name="phone" />
                        </div>

                        <div class="d-flex justify-content-between  align-items-center ">
                            <div class="ms-3">
                                <div class="form-check form-switch">
                                    <Field class="form-check-input fs-5" type="checkbox" name="status"
                                        v-model="users.data.status" :value="true" :unchecked-value="false" />
                                    <label for="name" class="form-label fw-bold mb-1">Status</label>
                                </div>
                            </div>
                            <div class="text-end">
                                <button type="button" class="btn btn-secondary text-black me-2" data-bs-dismiss="modal"
                                    @click="returnBack()">
                                    Close
                                </button>
                                <button type="submit" class="btn btn-primary me-2">
                                   Update
                                </button>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </Form>
    </div>
</template>

<script setup>
import { ref, reactive, onMounted ,computed} from "vue";
import { withAsync } from "../../api/helpers/withAsync";
import { fetchUsers, updateUser,editUserData} from "../../api/userApi.js";
import { Form, Field, ErrorMessage } from "vee-validate";
import { useStore } from "../../stores/main";
import * as yup from "yup";
const props = defineProps(['image']);
import { useRoute, useRouter } from "vue-router";
const store = useStore();
const route = useRoute();
const router = useRouter();
const schema = yup.object().shape(
    {
        email: yup.string().email().required("Email is required"),
        name: yup.string().required("Name is required"),
        address: yup.string().required("Address is required"),
        phone: yup.string().required("Phone is required"),
        image: yup.string().required("Image is required"),
    },
);
const formInitialValues = {
    name: "",
    email: "",
    address: "",
    phone: "",
    image:"",
    status: false,
};
const users = reactive({
    data: formInitialValues,
});

async function onSubmit(values) {
    const { response, error } = await withAsync(updateUser, {
        id: route.params.id,
        values: values,
    });
    if (response) {
    }

    if (error) {
        console.log("error", error);
        return;
    }

    console.log("response end");
}

onMounted(async () => {
    store.loading(true);
    await fetchData();
});
async function fetchData() {
    store.loading(true);
    const response = await editUserData(route.params.id);
    users.data = response.data.items
    console.log(users.items);
    store.loading(false);
}
function returnBack() {
    router.push({ name: "users", params: {} });
}

async function onChangeState(event) {
    if (event.target.value) {
        store.loading(true);
        const { response, error } = await withAsync(
            fetchUsers,
            event.target.value
        );
        if (response) {
            users.items = response.data.users.items;
        }
        if (error) {
            console.log("error", error);
        }
        store.loading(false);
    }
}
</script>
