<template>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Empresas - <span>Editar</span></h1>
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
                                    :empresa="oEmpresa"
                                    :accion="'edit'"
                                    @envioFormulario="recargaFormulario"
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
    props: ["id"],
    data() {
        return {
            fullscreenLoading: true,
            loadingWindow: Loading.service({
                fullscreen: this.fullscreenLoading,
            }),
            oEmpresa: {
                id: 0,
                nombre: "",
                descripcion_actividad: "",
                web: "",
                correo: "",
                dir: "",
                accionistas: [],
                competidores: [],
            },
        };
    },
    mounted() {
        this.getEmpresa();
        this.loadingWindow.close();
    },
    methods: {
        recargaFormulario() {
            location.reload();
        },
        getEmpresa() {
            axios.get("/admin/empresas/" + this.id).then((response) => {
                this.oEmpresa = response.data.empresa;
            });
        },
    },
};
</script>
<style></style>
