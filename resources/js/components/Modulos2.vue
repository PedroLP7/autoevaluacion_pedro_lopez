<template >
    <div>
        usuario: {{usuari.nom_usuari}}
        <!-- modulos : {{ usuari.moduls }} -->




        <div v-for="nota in nota.criteris_avaluacio">
            {{ nota.pivot.nota }}


        </div>

        <div v-for="resultats in modul.resultats_aprenentatge">
        <!-- {{ resultats.descripcio }} -->
        <div v-for="criteris in resultats.criteris_avaluacio">
          {{ criteris.id }}  {{criteris.descripcio}}

        </div>


    </div>

    </div>

</template>
<script>


export default {
    name: "Modulos2",
    props :{
        usuari : Object,
        nota : Object,
        modul : Object

    },
    data() {
        return {


        };
    },
    methods:{


    },
    created() {

    }



}
</script>
<style >

</style>
