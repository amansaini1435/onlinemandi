<template>
  <div>
    <input v-model="value" type="text" />
    <span>{{ errorMessage }}</span>
  </div>
</template>
<script setup>
import { defineProps, toRef } from 'vue';
import { useField } from 'vee-validate';
import * as yup from 'yup';
defineProps({
  name: String,
})
// make sure to convert the name prop to a ref to maintain its reactivity
// this way vee-validate can react to the field name changing
const nameRef = toRef(props, 'name');
const { errorMessage, value } = useField(nameRef);
</script>