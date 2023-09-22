<script setup>
import { onMounted, ref } from "vue";
import { Modal } from "bootstrap";
defineProps({
  title: {
    type: String,
    default: "Modal title",
  },
});
let modalEle = ref(null);
let thisModalObj = null;
const emit = defineEmits(['onClose'])
onMounted(() => {
  thisModalObj = new Modal(modalEle.value);
});
function _show() {
  thisModalObj.show();
}

function _hide() {
  emit('onClose');
  thisModalObj.hide();
}
defineExpose({ show: _show, hide: _hide });
</script>

<template>
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="" aria-hidden="true" ref="modalEle" data-bs-backdrop="static">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">{{ title }}</h5>
          <button type="button" class="btn-close" @click="_hide()"></button>
        </div>
        <div class="modal-body">
          <slot name="body" />
        </div>
      </div>
    </div>
  </div>
</template>