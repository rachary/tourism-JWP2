import { createRouter, createWebHistory } from "vue-router";


const router = createRouter({
    history: createWebHistory(),
    routes: [
        {
            path: '/',
            component: () => import('../layouts/app/AppIndexLayout.vue'),
            children: [
                {
                    path: '',
                    name: 'home',
                    component: () => import('../views/app/HomeView.vue')
                },
                {
                    path: 'destination',
                    name: 'destination',
                    component: () => import('../views/app/DestinationView.vue')
                },
                {
                    path: 'event',
                    name: 'event',
                    component: () => import('../views/app/EventView.vue')
                },
            ],
        },
        {
            path: '/dashboard',
            component: () => import('../layouts/dashboard/DashboardIndexLayout.vue'),
            children: [
                {
                    path: '',
                    name: 'dashboarduser',
                    component: () => import('../views/dashboard/UserView.vue')
                },
                {
                    path: 'destinasi',
                    name: 'dashboarddestination',
                    component: () => import('../views/dashboard/DestinationView.vue')
                },
                {
                    path: 'event',
                    name: 'dashboardevent',
                    component: () => import('../views/dashboard/EventView.vue')
                },
                {
                    path: 'app/destinasi',
                    name: 'appdestination',
                    component: () => import('../views/dashboard/AppDestinationView.vue')
                },
                {
                    path: 'app/event',
                    name: 'appevent',
                    component: () => import('../views/dashboard/AppEventView.vue')
                },
            ]
        },
        {
            path: '/login',
            name: 'login',
            component: () => import('../views/LoginView.vue')
        }
    ]
})

export default router;