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
                    component: () => import('../views/app/DestinationView.vue'),
                },
                {
                    path: 'destination/:id',
                    name: 'destinationdetail',
                    component: () => import('../views/app/DestinationDetailView.vue'),
                },
                {
                    path: 'event',
                    name: 'event',
                    component: () => import('../views/app/EventView.vue')
                },
                {
                    path: 'event/:id',
                    name: 'eventdetail',
                    component: () => import('../views/app/EventDetailView.vue')
                },
            ],
        },
        {
            path: '/dashboard',
            component: () => import('../layouts/dashboard/DashboardIndexLayout.vue'),
            meta: { requiresAuth: true },
            children: [
                {
                    path: '',
                    name: 'dashboarddestination',
                    component: () => import('../views/dashboard/DestinationView.vue')
                },
                {
                    path: 'user',
                    name: 'dashboarduser',
                    component: () => import('../views/dashboard/UserView.vue')
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

router.beforeEach((to, from, next) => {
    const username = localStorage.getItem('username');
    if (to.path === '/login') {
        if (username) {
            next('/dashboard');
        } else {
            next();
        }
    } else if (to.matched.some(record => record.meta.requiresAuth)) {
        if (!username) {
            next('/login');
        } else {
            next();
        }
    } else {
        next();
    }
})
export default router;