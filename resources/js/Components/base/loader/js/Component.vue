<template>
  <transition ref="root" :name="transition">
    <div tabindex="0" class="vld-overlay is-active" :class="{ 'is-full-page': isFullPage }" v-show="isActive"
      :aria-busy="isActive" aria-label="Loading" :style="{ zIndex }">
      <div class="vld-background" @click.prevent="cancel" :style="bgStyle"></div>
      <div class="vld-icon">
        <slot name="before" />
        <slot name="default">

          <svg :width="width" :heigh="height" :stroke="color" viewBox="0 0 200 200" :color="color" fill="none"
            xmlns="http://www.w3.org/2000/svg">
            <defs>
              <linearGradient id="spinner-secondHalf">
                <stop offset="0%" stop-opacity="0" stop-color="currentColor" />
                <stop offset="100%" stop-opacity="0.5" stop-color="currentColor" />
              </linearGradient>
              <linearGradient id="spinner-firstHalf">
                <stop offset="0%" stop-opacity="1" stop-color="currentColor" />
                <stop offset="100%" stop-opacity="0.3" stop-color="currentColor" />
              </linearGradient>
            </defs>

            <g stroke-width="10">
              <path stroke="url(#spinner-secondHalf)" d="M 4 100 A 96 96 0 0 1 196 100" />
              <path stroke="url(#spinner-firstHalf)" d="M 196 100 A 96 96 0 0 1 4 100" />

              <!-- 1deg extra path to have the round end cap -->
              <path stroke="currentColor" stroke-linecap="round" d="M 4 100 A 96 96 0 0 1 4 98" />
            </g>

            <animateTransform from="0 0 0" to="360 0 0" attributeName="transform" type="rotate" repeatCount="indefinite"
              dur="700ms" />
          </svg>
        </slot>
        <slot name="after" />
      </div>
    </div>
  </transition>
</template>

<script>
import { defineComponent, render } from 'vue';
import { MayBeHTMLElement, removeElement } from './helpers.js'
import trapFocusMixin from './trapFocusMixin.js';

export default defineComponent({
  name: 'vue-loading',
  mixins: [trapFocusMixin],
  props: {
    active: Boolean,
    programmatic: Boolean,
    container: [Object, Function, MayBeHTMLElement],
    isFullPage: {
      type: Boolean,
      default: true
    },
    enforceFocus: {
      type: Boolean,
      default: true
    },
    lockScroll: {
      type: Boolean,
      default: false
    },
    transition: {
      type: String,
      default: 'fade'
    },
    color: {
      type: String,
      default: '#ffa600'
    },
    blur: {
      type: String,
      default: '2px'
    },
    opacity: Number,

    height: {
      type: Number,
      default: 64
    },
    width: {
      type: Number,
      default: 64
    },
    zIndex: Number,
    loader: {
      type: String,
      default: 'spinner'
    }
  },
  emits: ['hide', 'update:active'],
  data() {
    return {
      // Don't mutate the prop
      isActive: this.active
    }
  },
  mounted() {
    document.addEventListener('keyup', this.keyPress)
  },
  methods: {

    /**
     * Hide and destroy component if it's programmatic.
     */
    hide() {
      this.$emit('hide');
      this.$emit('update:active', false);

      if (this.programmatic) {
        this.isActive = false;

        // Timeout for the animation complete before destroying
        setTimeout(() => {
          const parent = this.$refs.root.parentElement;
          // unmount the component
          render(null, parent);
          removeElement(parent)
        }, 150)
      }
    },
    disableScroll() {
      if (this.isFullPage && this.lockScroll) {
        document.body.classList.add('vld-shown');
      }
    },
    enableScroll() {
      if (this.isFullPage && this.lockScroll) {
        document.body.classList.remove('vld-shown');
      }
    },
  },
  watch: {
    active(value) {
      this.isActive = value
    },
    isActive(value) {
      if (value) {
        this.disableScroll();
      } else {
        this.enableScroll()
      }
    }
  },
  computed: {
    bgStyle() {
      return {
        background: '#a7a797',
        opacity: 0.4,
        backdropFilter: `blur(${this.blur})`
      }
    }
  },
  beforeUnmount() {
    document.removeEventListener('keyup', this.keyPress);
  },
})
</script>
