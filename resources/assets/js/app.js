
require('./bootstrap');

window.Vue = require('vue');
import Vuex from 'vuex';
Vue.use(Vuex);



//VUEX

const store = new Vuex.Store({
    state:{
        item:{}
    },
    mutations:{
        setItem(state,obj){
            state.item = obj;
        }
    }
});



Vue.component('topo', require('./components/Topo.vue'));
Vue.component('painel', require('./components/Painel.vue'));
Vue.component('caixa', require('./components/Caixa.vue'));
Vue.component('pagina', require('./components/Pagina.vue'));
Vue.component('tabela-lista', require('./components/TabelaLista.vue'));
Vue.component('migalhas', require('./components/Migalhas.vue'));
Vue.component('modal', require('./components/modal/Modal.vue'));
Vue.component('modallink', require('./components/modal/ModalLink.vue'));
Vue.component('formulario', require('./components/Formulario.vue'));

const app = new Vue({
    el: '#app',
    store
});
