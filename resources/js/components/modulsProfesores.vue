<template>





<div> HOLA ESTO ES DE PRUEBA</div>






</template>

<script>
import axios from 'axios';




export default {
components: {

},
name: 'modulsProfesores',
data() {
    return {
        modulos: [],

        messageError: '',
        isError: false,

        modulo : {},
    };
},
methods: {

selectModulos() {
const me = this;

axios.get('usuaris/'+ me.usuari)


    .then(response => {
        me.modulos = response.data;

    })
    .catch(error => {
        me.isError = true;
        me.messageError = error.response.data.error;
        console.error(error.response.data.error);
    });



},


},
created() {
    this.selectUsuario();

},
};
</script>


<style>




</style>
