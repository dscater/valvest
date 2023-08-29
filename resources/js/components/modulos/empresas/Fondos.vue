<template>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Empresas - <span>Fondos</span></h1>
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-primary">
                                                Producto e I+D
                                            </div>
                                            <div class="card-body">
                                                <p>
                                                    Creación de innovación y
                                                    mejora de productos o
                                                    procesos
                                                </p>
                                                <div class="row">
                                                    <div
                                                        class="col-md-8 input-group"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                        />
                                                        <div
                                                            class="input-group-append"
                                                        >
                                                            <span
                                                                class="input-group-text"
                                                                id="basic-addon2"
                                                                >Bs.</span
                                                            >
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-md-4 input-group"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                        />
                                                        <div
                                                            class="input-group-append"
                                                        >
                                                            <span
                                                                class="input-group-text"
                                                                id="basic-addon2"
                                                                >%</span
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-header bg-primary">
                                                Ventas y marketing
                                            </div>
                                            <div class="card-body">
                                                <p>
                                                    Creación y comunicación del valor del producto para clientes, socios y la sociedad en general
                                                </p>
                                                <div class="row">
                                                    <div
                                                        class="col-md-8 input-group"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                        />
                                                        <div
                                                            class="input-group-append"
                                                        >
                                                            <span
                                                                class="input-group-text"
                                                                id="basic-addon2"
                                                                >Bs.</span
                                                            >
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-md-4 input-group"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                        />
                                                        <div
                                                            class="input-group-append"
                                                        >
                                                            <span
                                                                class="input-group-text"
                                                                id="basic-addon2"
                                                                >%</span
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <!-- <el-button
                                            type="primary"
                                            class="btn-primary bg-primary btn-block"
                                            :loading="enviando"
                                            @click="enviarFormulario()"
                                            v-html="textoBoton"
                                        >
                                        </el-button> -->
                                        <router-link
                                            :to="{ name: 'empresas.index' }"
                                            class="btn btn-default btn-lg btn-block"
                                            ><i class="fa fa-list"></i> Volver a
                                            empresas</router-link
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
export default {
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
                cuestionario: null,
                fondo: null,
            },
            esperando: 0,
            enviando: false,
            accion: "nuevo",
        };
    },
    watch: {
        oEmpresa(newVal, oldVal) {},
    },
    computed: {
        textoBoton() {
            if (this.oEmpresa.fondo) {
                return '<i class="fa fa-edit"></i> ACTUALIZAR FONDOS';
            } else {
                return '<i class="fa fa-save"></i> REGISTRAR FONDOS';
            }
        },
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
        enviarFormulario() {
            this.enviando = true;
            try {
                this.textoBtn = "Enviando...";
                let url = "/admin/fondos";
                let data = {};
                if (this.accion == "edit") {
                    url = "/admin/fondos/" + this.oEmpresa.fondo.id;
                    data["_method"] = "PUT";
                }
                axios
                    .post(url, data)
                    .then((res) => {
                        this.enviando = false;
                        if (res.data.sw) {
                            Swal.fire({
                                icon: "success",
                                title: res.data.msj,
                                showConfirmButton: false,
                                timer: 2000,
                            });
                            this.errors = [];
                            this.recargaFormulario();
                        } else {
                            Swal.fire({
                                icon: "info",
                                title: "Atención",
                                html: res.data.msj,
                                showConfirmButton: false,
                                timer: 2000,
                            });
                        }
                    })
                    .catch((error) => {
                        this.enviando = false;
                        if (this.accion == "edit") {
                            this.textoBtn = "Actualizar empresa";
                        } else {
                            this.textoBtn = "Registrar empresa";
                        }
                        if (error.response) {
                            if (error.response.status === 422) {
                                let mensaje = `<ul class="text-left">`;
                                this.errors = error.response.data.errors;
                                for (const field in this.errors) {
                                    if (this.errors.hasOwnProperty(field)) {
                                        const index = field.split(".")[1]; // Obtenemos el índice del campo del nombre
                                        const errorMessage =
                                            this.errors[field][0]; // Tomamos el primer mensaje de error
                                        mensaje += `<li>${errorMessage}</li>`;
                                    }
                                }
                                mensaje += `</ul>`;
                                Swal.fire({
                                    icon: "error",
                                    title: "Error",
                                    html: mensaje,
                                    showConfirmButton: true,
                                    confirmButtonColor: "#28315c",
                                    confirmButtonText: "Aceptar",
                                });
                            }
                            if (
                                error.response.status === 420 ||
                                error.response.status === 419 ||
                                error.response.status === 401
                            ) {
                                window.location = "/";
                            }
                            if (error.response.status === 500) {
                                Swal.fire({
                                    icon: "error",
                                    title: "Error",
                                    html: error.response.data.message,
                                    showConfirmButton: false,
                                    timer: 2000,
                                });
                            }
                        }
                    });
            } catch (e) {
                this.enviando = false;
                console.log(e);
            }
        },
    },
};
</script>
<style></style>
