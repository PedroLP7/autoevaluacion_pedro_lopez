import './bootstrap';
import * as bootstrap from 'bootstrap';
import{createApp} from 'vue'
import usuari from './components/Usuari.vue'
import alumnos from './components/alumnos.vue'


createApp(usuari).mount('#usuari');
import Moduls from './components/Moduls.vue';
createApp(Moduls).mount('#modulos');


createApp(alumnos).mount('#alumnos');





// Moduls.vue
// import autoeva from './components/autoevaluacion.vue';


// createApp(autoeva).mount('#autoeva');
