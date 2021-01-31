import Vue from 'vue';
import VueRouter from 'vue-router';

import Home from '../views/Home.vue';
import About from '../views/About.vue';
import Login from '../views/Login.vue';
import Register from '../views/Register.vue';
import PatientView from '../views/PatientView.vue';
import DentistView from '../views/DentistView.vue';

import PatientDashboard from '../components/patient/PatientDashboard.vue';
import DentistDashboard from '../components/dentist/DentistDashboard.vue';
import DentistPublicProfile from '../views/DentistPublicProfile.vue';

Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    name: 'Home',
    component: Home,
  },
  {
    path: '/about',
    name: 'About',
    component: About,
  },
  {
    path: '/login',
    name: 'Login',
    component: Login,
  },
  {
    path: '/register',
    name: 'Register',
    component: Register,
  },
  {
    path: '/patient',
    component: PatientView,
    children: [
      {
        path: 'dashboard',
        component: PatientDashboard,
      },
      {
        name: 'dentist-profile',
        path: 'dentist/:dentistId',
        component: DentistPublicProfile,
      },
    ],
  },
  {
    path: '/dentist',
    component: DentistView,
    children: [
      {
        path: 'dashboard',
        component: DentistDashboard,
      },
    ],
  },
];

const router = new VueRouter({
  routes,
});

export default router;
