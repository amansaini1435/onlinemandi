import { defineStore } from 'pinia'

export const useStore = defineStore({
  id: 'main',
  state: () => ({
    counter: 0,
    isSidebarClose: false,
    isLoading: false
  }),
  getters: {
    doubleCount: (state) => state.counter * 2
  },
  actions: {
    toggleSidebar() {
        this.isSidebarClose = !this.isSidebarClose
    },
    loading(action){
        this.isLoading = action
    }
  }
})
