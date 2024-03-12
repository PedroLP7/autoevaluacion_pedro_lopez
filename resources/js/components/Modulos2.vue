<template >
    <div>
        usuario: {{usuari.nom_usuari}}
        <!-- modulos : {{ usuari.moduls }} -->
        <div>
            <div class="mt-3" v-for="modul in usuari.moduls" :key="modul.id">
               <button class="btn btn-primary">{{modul.codi+' ' + modul.sigles +' ' +modul.nom}}</button>
            </div>
        </div>

    </div>
</template>
<script>


export default {
    name: "Modulos2",
    props :{
        usuari : Object

    },
    data() {
        return {


        };
    },
    created() {

    }



}
</script>
<style >

</style>
