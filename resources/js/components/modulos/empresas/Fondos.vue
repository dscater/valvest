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
                                                            v-model="
                                                                oFondo.producto
                                                            "
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
                                                            v-model="
                                                                oFondo.p_producto
                                                            "
                                                            @change="
                                                                sumaPorcentaje
                                                            "
                                                            @keyup="
                                                                sumaPorcentaje
                                                            "
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
                                                    Creación y comunicación del
                                                    valor del producto para
                                                    clientes, socios y la
                                                    sociedad en general
                                                </p>
                                                <div class="row">
                                                    <div
                                                        class="col-md-8 input-group"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            v-model="
                                                                oFondo.venta_marketing
                                                            "
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
                                                            v-model="
                                                                oFondo.p_venta_marketing
                                                            "
                                                            @change="
                                                                sumaPorcentaje
                                                            "
                                                            @keyup="
                                                                sumaPorcentaje
                                                            "
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
                                                Inventario
                                            </div>
                                            <div class="card-body">
                                                <p>
                                                    Materia prima acumulada para
                                                    la producción y productos
                                                    terminados antes de las
                                                    ventas
                                                </p>
                                                <div class="row">
                                                    <div
                                                        class="col-md-8 input-group"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            v-model="
                                                                oFondo.inventario
                                                            "
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
                                                            v-model="
                                                                oFondo.p_inventario
                                                            "
                                                            @change="
                                                                sumaPorcentaje
                                                            "
                                                            @keyup="
                                                                sumaPorcentaje
                                                            "
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
                                                Operaciones
                                            </div>
                                            <div class="card-body">
                                                <p>
                                                    Actividades diarias para
                                                    administrar una empresa en
                                                    curso (por ejemplo:
                                                    ubicación, adquisiciones,
                                                    procesos)
                                                </p>
                                                <div class="row">
                                                    <div
                                                        class="col-md-8 input-group"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            v-model="
                                                                oFondo.operacion
                                                            "
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
                                                            v-model="
                                                                oFondo.p_operacion
                                                            "
                                                            @change="
                                                                sumaPorcentaje
                                                            "
                                                            @keyup="
                                                                sumaPorcentaje
                                                            "
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
                                                Los gastos de capital
                                            </div>
                                            <div class="card-body">
                                                <p>
                                                    Adquisición de activos
                                                    tangibles e intangibles
                                                    (compra de equipos,
                                                    inmuebles, marcas, patentes)
                                                </p>
                                                <div class="row">
                                                    <div
                                                        class="col-md-8 input-group"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            v-model="
                                                                oFondo.gastos
                                                            "
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
                                                            v-model="
                                                                oFondo.p_gastos
                                                            "
                                                            @change="
                                                                sumaPorcentaje
                                                            "
                                                            @keyup="
                                                                sumaPorcentaje
                                                            "
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
                                                Otros
                                            </div>
                                            <div class="card-body">
                                                <p>
                                                    Cualquier otra actividad no
                                                    incluida en las descritas
                                                    anteriormente
                                                </p>
                                                <div class="row">
                                                    <div
                                                        class="col-md-8 input-group"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            v-model="
                                                                oFondo.otros
                                                            "
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
                                                            v-model="
                                                                oFondo.p_otros
                                                            "
                                                            @change="
                                                                sumaPorcentaje
                                                            "
                                                            @keyup="
                                                                sumaPorcentaje
                                                            "
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
                                        <p
                                            class="w-100 text-center"
                                            :class="[
                                                total_porcentaje == 100
                                                    ? 'text-green'
                                                    : 'text-danger',
                                            ]"
                                        >
                                            <strong>Porcentaje: </strong>
                                            <span
                                                v-text="total_porcentaje"
                                            ></span>
                                            %
                                        </p>
                                        <p
                                            v-if="total_porcentaje != 100"
                                            class="w-100 text-center font-weight-bold alert alert-danger"
                                        >
                                            El porcentaje debe ser igual a 100%
                                        </p>
                                    </div>
                                    <div class="col-md-12">
                                        <el-button
                                            type="primary"
                                            class="btn-primary bg-primary btn-block"
                                            :loading="enviando"
                                            @click="enviarFormulario()"
                                            v-html="textoBoton"
                                            :disabled="
                                                total_porcentaje == 100
                                                    ? false
                                                    : true
                                            "
                                        >
                                        </el-button>
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
            oFondo: {
                empresa_id: 0,
                producto: 0,
                p_producto: 0,
                venta_marketing: 0,
                p_venta_marketing: 0,
                inventario: 0,
                p_inventario: 0,
                operacion: 0,
                p_operacion: 0,
                gastos: 0,
                p_gastos: 0,
                otros: 0,
                p_otros: 0,
            },
            total_porcentaje: 0,
            esperando: 0,
            enviando: false,
            accion: "nuevo",
        };
    },
    watch: {
        oEmpresa(newVal, oldVal) {
            if (newVal.fondo) {
                this.oFondo = newVal.fondo;
                this.sumaPorcentaje();
                this.accion = "edit";
            }
        },
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
                this.oFondo.empresa_id = this.oEmpresa.id;
                if (this.accion == "edit") {
                    url = "/admin/fondos/" + this.oEmpresa.fondo.id;
                    this.oFondo["_method"] = "PUT";
                }
                axios
                    .post(url, this.oFondo)
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
        sumaPorcentaje() {
            this.total_porcentaje =
                parseFloat(
                    this.oFondo.p_producto ? this.oFondo.p_producto : 0
                ) +
                parseFloat(
                    this.oFondo.p_venta_marketing
                        ? this.oFondo.p_venta_marketing
                        : 0
                ) +
                parseFloat(
                    this.oFondo.p_inventario ? this.oFondo.p_inventario : 0
                ) +
                parseFloat(
                    this.oFondo.p_operacion ? this.oFondo.p_operacion : 0
                ) +
                parseFloat(this.oFondo.p_gastos ? this.oFondo.p_gastos : 0) +
                parseFloat(this.oFondo.p_otros ? this.oFondo.p_otros : 0);
        },
    },
};
</script>
<style></style>
