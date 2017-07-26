import AppCompoment from './components/App.vue';
import VueRouter from 'vue-router';
import routerMap from './router.map';
// import Auth from './services/auth';
import store from '../js/store';

const router = new VueRouter();

router.map(routerMap);

router.beforeEach(({to, next}) => {
    if(to.auth && !store.state.check){
        return router.go({name: 'auth.login'});
    }
    next();
});

router.start({
    components: {
        'app': AppCompoment
    }
},'body');
