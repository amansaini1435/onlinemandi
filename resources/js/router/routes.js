import { createRouter, createWebHistory } from "vue-router";
import DashboardLayout from "../layout/AdminLayout/DashboardLayout.vue";
import Users from "../views/Users/index.vue";
import userDetails from "../views/Users/userDetails.vue"
import Settings from "../views/Settings/index.vue";
import States from "../views/States/index.vue";
import Products from "../views/Products/index.vue";
import StateCities from '../views/States/StateCities.vue'
import Seller from '../views/Seller/index.vue'
import edit from '../views/Users/edit.vue'

const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: "/",
            name: "dashboard",
            component: DashboardLayout,
        },
        {
            path: "/users",
            name: "users",
            component: Users,
        },
        {
            path: "/users/userDetails",
            name: "userDetails",
            component: userDetails,
        },
        {
            path: "/users/edit/:id",
            name: "edit",
            component: edit,
        },
        {
            path: "/settings",
            name: "setting",
            component: Settings,
        },
        {
            path: "/states",
            name: "state",
            component: States,
        },
        {
            path: "/states/StateCities/:id",
            name: "StateCities",
            component: StateCities,
        },
       
        {
            path: "/products",
            name: "product",
            component: Products,
        },
        {
            path: "/seller",
            name: "seller",
            component: Seller,
        },
       
    ],
});
export default router;
