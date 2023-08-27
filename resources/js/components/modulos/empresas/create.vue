<template>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Empresas - <span>Nuevo</span></h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <Formulario
                                    @envioFormulario="listaEmpresas"
                                ></Formulario>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
import Formulario from "./Formulario.vue";
export default {
    components: {
        Formulario,
    },
    data() {
        return {};
    },
    mounted() {},
    methods: {
        listaEmpresas() {
            this.$router.push({
                name: "empresas.index",
            });
        },
    },
};
</script>
<style></style>
