<script setup>
import { onMounted, ref } from "vue";
import { Popover } from "bootstrap";
const props = defineProps({
  content: {
      required: false,
      default: '',
    },
    title: {
      default: '',
    },
    trigger: {
      default: 'click',
    },
    delay: {
      default: 0,
    },
    html: {
      default: false,
    },
});
let elementRef = ref(null);
onMounted(() => {
   // pass bootstrap popover options from props
    var options = props
    new Popover(elementRef.value,options)
  });
</script>

<template>
<span ref="elementRef">
    <slot />
</span>

</template>