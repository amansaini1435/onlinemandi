<script setup>

import { ref, reactive } from 'vue'

import { withAsync } from "../../api/helpers/withAsync"
import { addProducts } from "../../api/productApi"
import { Form, Field, ErrorMessage } from 'vee-validate'

import Modal from "../../components/common/FormModal.vue";
import * as yup from 'yup';

const emit = defineEmits(['onSuccess'])
const modal = ref(null)
const schema = yup.object({  
  name: yup.string().required().label('Product name'),
  hname: yup.string().required().label('Product hname'),
  weight: yup.string().required().label('Product  weight'),
  unit: yup.string().required().label('Product unit'),
  category: yup.string().required().label('Product category'),
});
const product = reactive({
  active: false,
  name: "BootstrapModal",
  emits: ["closeModal"],
  data: {
    name : '',
    hname : '',
    weight : '',
    unit :'',
    category :'',
    
    productId : props.id,
    status : false
  }
})
const props = defineProps(['showModal', 'id'])

function showModal() {
  
  modal.value.show();
}

async function onSubmit(values) {
  console.log(values);
  const { response, error } = await withAsync(addProducts, values);
  if (response) {
    emit('onSuccess');
    modal.value.hide();
  }

  if (error) {
    console.log("error", error);
    return;
  }
  
  console.log("response end");
}

</script>
<template>
  <button class="btn btn-primary ms-2" @click="showModal">Add new</button>
  <Modal title="Add new Product" ref="modal">
    <template #body>
      <Form @submit="onSubmit" :validation-schema="schema">
        <div class="row g-3">
          <Field class="form-control" name="productId" type="hidden" v-model="product.data.productId" />
          
          <div class="col-12">
            <label for="name" class="form-label">Name</label>
            <Field class="form-control" name="name" type="text" v-model="product.data.name" />
            <ErrorMessage name="name" />
          </div>
          <div class="col-12">
            <label for="hname" class="form-label">Hname</label>
            <Field class="form-control" name="hname" type="text" v-model="product.data.hname" />
            <ErrorMessage name="hname" />
          </div>
          <div class="col-12">
            <label for="weight" class="form-label">Weight</label>
            <Field class="form-control" name="weight" type="text" v-model="product.data.weight" />
            <ErrorMessage name="weight" />
          </div>
          <div class="col-12">
            <label for="unit" class="form-label">Units</label>
            <Field class="form-control" name="unit" type="text" v-model="product.data.unit" />
            <ErrorMessage name="unit" />
          </div>
          <div class="col-12">
            <label for="category" class="form-label">Category</label>
            <Field class="form-control" name="category" type="text" v-model="product.data.category" />
            <ErrorMessage name="category" />
          </div>
          
          <div class="col-12">
            <div class="form-check form-switch">
              <Field class="form-check-input" type="checkbox" name="status" v-model="product.data.status" :value="true"
                :unchecked-value="false" />
              <label for="name" class="form-label">Status</label>  
            </div> 
          </div>
        </div>
        <div class="mt-3 text-end">
          <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </Form>
    </template>
  </Modal>

</template>