<template>
   
    <Form v-slot="{ resetForm }" @submit="onSubmit" :validation-schema="schema">
        
        <div class="row">
            <div class="col-12">
                <div class="card rounded-4 p-3 border-1">
                    <div class="form-group mb-3">
                        <label for="name" class="form-label fw-bold mb-1">User name</label>
                        <Field class="form-control" name="name" type="text" v-model="state.data.name" />
                        <ErrorMessage class="user-select-none text-danger fw-bold" name="name" />
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card rounded-4 p-3 border-1">
                    <div class="form-group mb-3">
                        <label for="email" class="form-label fw-bold mb-1">Email</label>
                        <Field class="form-control" name="email" type="text" v-model="state.data.email" />
                        <ErrorMessage class="user-select-none text-danger fw-bold" name="email" />
                    </div>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-between  align-items-center ">
                <div class="ms-3">
                    <div class="form-check form-switch">
                        <Field class="form-check-input fs-5" type="checkbox" name="status" v-model="state.data.status"
                            :value="true" :unchecked-value="false" />
                        <label for="name" class="form-label fw-bold mb-1">Status</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-end pb-5">
            <button type="button" class="btn btn-secondary me-2" @click="goBack">
                Close
            </button>
            <button type="submit" class="btn btn-primary me-2">
                Save
            </button>
            <!-- <button type="submit" class="btn btn-primary" @click="saveAndClose">
                Save & Close
            </button> -->
        </div>
    </Form>
</template>

<script setup>
import { ref, reactive, watchEffect, onMounted } from "vue";
import { withAsync } from "../../api/helpers/withAsync";
import { addUser,updateUser } from "../../api/userApi";
import { Form, Field, ErrorMessage } from "vee-validate";
import { useStore } from "../../stores/main";
import * as yup from "yup";
import { useRoute, useRouter } from "vue-router";
const store = useStore();
const route = useRoute();
const router = useRouter();
const formInitialValues = {
    name: "",
    email:"",
    status: false,
};
const state = reactive({
    data: formInitialValues,
});

async function onSubmit(values) {
    const { response, error } = await withAsync(updateUser, {
        id: route.params.id,
        values: values,
    });
    if (response && state.isClose) {
        returnBack()
    }

    if (error) {
        console.log("error", error);
        return;
    }

    console.log("response end");
}
// async function saveAndClose() {
//     state.isClose = true;
// }
function returnBack() {
    router.back();
}
onMounted(async () => {
    store.loading(true);
    await fetchData();
});
async function fetchData() {
    store.loading(true);
    const response = await addUser(route.params.id);
    state.data = response.data.item;
    store.loading(false);
}


</script>