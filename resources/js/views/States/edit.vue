<template>
    <Loading v-model:active="store.isLoading" :is-full-page="state.fullPage">
        <template #default v-if="state.useSlot">
            <h3>Loading ...</h3>
        </template>
    </Loading>
    <Form v-slot="{ resetForm }" @submit="onSubmit" :validation-schema="schema">
        <div class="row">
            <div class="col-6">
                <div class="card rounded-4 p-3 border-1">
                    <div class="form-group mb-3">
                        <label for="name" class="form-label fw-bold mb-1">City name</label>
                        <Field class="form-control" name="name" type="text" v-model="state.data.name" />
                        <ErrorMessage name="name" />
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
                <div class="text-end">
                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal" @click="returnBack()">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary me-2">
                        Save
                    </button>
                    <button type="button" class="btn btn-primary" @click="saveAndClose">
                        Save & Close
                    </button>
                </div>
            </div>
        </div>
    </Form>
</template>

<script setup>
import { ref, reactive, watchEffect, onMounted } from "vue";
import { withAsync } from "../../api/helpers/withAsync";
import { fetchCities } from "../../api/locationApi";
import { Form, Field, ErrorMessage } from "vee-validate";
import { useStore } from "../../stores/main";
import * as yup from "yup";
import { useRoute, useRouter } from "vue-router";
const store = useStore();
const route = useRoute();
const router = useRouter();
const schema = yup.object().shape(
    {
      
        name: yup.string().required("Name is required"),
    },
);
const formInitialValues = {
    name: "",
    status: false,
};

async function onSubmit(values) {
    const { response, error } = await withAsync(updateClient, {
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
async function saveAndClose() {
    const { response, error } = await withAsync(updateClient, {
        id: route.params.id,
        values: state.data,
    });
    if (response) {
        router.push({ name: "clients", params: {} });
    }

    if (error) {
        console.log("error", error);
        return;
    }
}

onMounted(async () => {
    store.loading(true);
    await fetchData();
});
async function fetchData() {
    store.loading(true);
    const response = await editClientData(route.params.id);
    state.data = response.data.item;
    console.log(state.item);
    store.loading(false);
}
function returnBack() {
    router.push({ name: "clients", params: {} });
}

async function onChangeState(event) {
    if (event.target.value) {
        store.loading(true);
        const { response, error } = await withAsync(
            fetchCities,
            event.target.value
        );
        if (response) {
            state.cities = response.data.state.cities;
        }
        if (error) {
            console.log("error", error);
        }
        store.loading(false);
    } else {
        state.cities = "";
    }
    state.data.city_id = "";
    return;
}
</script>