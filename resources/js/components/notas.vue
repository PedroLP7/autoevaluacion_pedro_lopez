<template ">
    <div>
        AQUI VAN LAS NOTAS

    </div>
</template>
<script>
export default {
name : notas,
props :{
    usuari : Object

}

methods: {
    prueba(){
        console.log(usuari);
    }
},
created() {
    this.prueba();
},

}
</script>
<style >

</style>
