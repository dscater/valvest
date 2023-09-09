<template>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Empresas - <span>Valoración</span></h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body text-primary">
                                <div class="row">
                                    <div
                                        class="col-md-12"
                                        v-if="oEmpresa.cuestionario"
                                    >
                                        <h4 class="text-primary">
                                            {{ oEmpresa.nombre }}
                                        </h4>
                                        <p>
                                            Comenzó en Industria:
                                            {{
                                                oEmpresa.cuestionario
                                                    .array_cuestionario[33]
                                            }}
                                        </p>
                                        <p class="font-weight-bold">
                                            {{
                                                cuestionarioTextos[19][1][
                                                    oEmpresa.cuestionario
                                                        .array_cuestionario[19][0]
                                                ][
                                                    oEmpresa.cuestionario
                                                        .array_cuestionario[19][1]
                                                ]
                                            }}
                                        </p>
                                        <p>
                                            Actividad de negocios:
                                            <span class="font-weight-bold">{{
                                                oEmpresa.descripcion_actividad
                                            }}</span>
                                        </p>
                                        <p>
                                            Empleados:
                                            <span class="font-weight-bold">{{
                                                oEmpresa.cuestionario
                                                    .array_cuestionario[5]
                                            }}</span>
                                        </p>
                                        <p>
                                            Etapa:
                                            <span class="font-weight-bold">{{
                                                cuestionarioTextos[12][
                                                    oEmpresa.cuestionario
                                                        .array_cuestionario[12]
                                                ]
                                            }}</span>
                                        </p>
                                        <p>
                                            <span
                                                class="font-weight-bold"
                                                v-if="oEmpresa.primera_finanza"
                                                >Bs.
                                                {{
                                                    oEmpresa.primera_finanza
                                                        .ganancia
                                                }}</span
                                            >
                                        </p>
                                    </div>
                                    <div class="col-md-12" v-else>
                                        <h4 class="text-primary">
                                            {{ oEmpresa.nombre }}
                                        </h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" v-if="oEmpresa.valoracion">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <h4
                                        class="col-md-12 text-primary text-center"
                                    >
                                        Valoración previa al dinero
                                    </h4>
                                    <div
                                        class="col-md-12 text-center principal_1"
                                    >
                                        <div
                                            class="contenedor_fondos contenedor_1"
                                        >
                                            <div>Fondos:</div>
                                            <div
                                                class="font-weight-bold text-lg"
                                            >
                                                Bs.
                                                <span>{{
                                                    oEmpresa.valor_fondo_k
                                                }}</span>
                                            </div>
                                        </div>
                                        <div
                                            class="contenedor_montos contenedor_1"
                                        >
                                            <div>
                                                <span
                                                    class="font-weight-bold text-lg"
                                                    >Bs.
                                                    {{
                                                        oEmpresa.valoracion
                                                            ? oEmpresa
                                                                  .valoracion
                                                                  .valoracion_previa
                                                            : 0
                                                    }}</span
                                                >
                                            </div>
                                            <div>
                                                <img
                                                    src="/imgs/inferior.png"
                                                    alt="inferior"
                                                    height="40px"
                                                /><br />
                                                <span class="font-weight-bold"
                                                    >Límite bajo</span
                                                ><br />
                                                Bs.
                                                <span>{{
                                                    oEmpresa.valoracion
                                                        ? oEmpresa.valoracion
                                                              .limite_bajo
                                                        : 0
                                                }}</span>
                                            </div>
                                            <div>
                                                <img
                                                    src="/imgs/superior.png"
                                                    alt="inferior"
                                                    height="40px"
                                                /><br />
                                                <span class="font-weight-bold"
                                                    >Límite alto</span
                                                ><br />
                                                Bs.
                                                <span>{{
                                                    oEmpresa.valoracion
                                                        ? oEmpresa.valoracion
                                                              .limite_alto
                                                        : 0
                                                }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" v-if="oEmpresa.valoracion">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <h4
                                        class="col-md-12 text-primary text-center"
                                    >
                                        DCF
                                    </h4>
                                    <div
                                        class="col-md-8"
                                        id="container"
                                        style="height: 400px"
                                    ></div>
                                    <div class="col-md-4 text-lg">
                                        <div
                                            class="valuacion w-100 text-center bg-primary p-3"
                                        >
                                            <strong>Valuación:</strong>
                                            <p class="mb-0">
                                                <strong
                                                    v-text="
                                                        'Bs. ' +
                                                        parseFloat(
                                                            oEmpresa.valoracion
                                                                ?.valuacion
                                                        ).toFixed(2)
                                                    "
                                                ></strong>
                                            </p>
                                        </div>
                                        <div
                                            class="ebitda w-100 text-center bg-cyan text-white p-3"
                                        >
                                            <p class="text-white mb-0">
                                                Último EBITDA:
                                                <strong
                                                    v-text="
                                                        'Bs. ' +
                                                        parseFloat(
                                                            oEmpresa.valoracion
                                                                ?.ultimo_ebitda
                                                        ).toFixed(2)
                                                    "
                                                ></strong>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-0 mb-4">
                        <router-link
                            :to="{ name: 'empresas.index' }"
                            class="btn btn-default btn-lg btn-block"
                            ><i class="fa fa-list"></i> Volver a
                            empresas</router-link
                        >
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>
<script>
import infoCuestionario from "./infoCuestionario.js";
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
                valoracion: null,
            },
            oValoracion: {
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
            cuestionarioTextos: infoCuestionario,
        };
    },
    watch: {
        oEmpresa(newVal, oldVal) {
            if (newVal.valoracion) {
                this.oValoracion = newVal.valoracion;
                this.accion = "edit";
            }
        },
    },
    computed: {
        textoBoton() {
            if (this.oEmpresa.valoracion) {
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
                this.valoracionEmpresa();
            });
        },
        valoracionEmpresa() {
            axios
                .post("/admin/valoracions/empresa/" + this.oEmpresa.id, {
                    fondos: this.oEmpresa.valor_fondo,
                })
                .then((response) => {
                    this.oEmpresa.valoracion = response.data.valoracion;
                    this.setValoracionUser();
                    Highcharts.chart("container", {
                        chart: {
                            type: "column",
                        },
                        title: {
                            text: "DCF",
                        },
                        subtitle: {
                            text: "(Flujo de Fondos Descontados)",
                        },
                        xAxis: {
                            categories: response.data.categories,
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: "%",
                            },
                        },
                        tooltip: {
                            pointFormat:
                                '<span style="color:{series.color}">{series.name}</span>: <b>{point.y:.2f}%</b><br/>',
                            shared: true,
                        },
                        plotOptions: {
                            column: {
                                stacking: "percent",
                                dataLabels: {
                                    enabled: true,
                                    format: "{y:.2f}%",
                                },
                            },
                        },
                        series: response.data.data,
                    });
                })
                .catch((error) => {
                    this.enviando = false;
                    if (this.accion == "edit") {
                        this.textoBtn = "Actualizar";
                    } else {
                        this.textoBtn = "Registrar";
                    }
                    if (error.response) {
                        if (error.response.status === 422) {
                            this.errors = error.response.data.errors;
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
                                timer: 4000,
                            });
                        }
                    }
                });
        },
        setValoracionUser() {
            axios.post(
                "/admin/valoracions/valoracion_user/" + this.oEmpresa.id
            );
        },
        enviarFormulario() {
            this.enviando = true;
            try {
                this.textoBtn = "Enviando...";
                let url = "/admin/valoracions";
                this.oValoracion.empresa_id = this.oEmpresa.id;
                if (this.accion == "edit") {
                    url = "/admin/valoracions/" + this.oEmpresa.valoracion.id;
                    this.oValoracion["_method"] = "PUT";
                }
                axios
                    .post(url, this.oValoracion)
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
<style>
.principal_1 {
    display: flex;
    justify-content: center;
    align-items: center;
}

.contenedor_1 {
    display: inline-flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    margin: 0px 40px;
}

.contenedor_fondos {
    border: solid 2px var(--primary);
    border-radius: 50%;
    height: 180px;
    width: 180px;
    font-size: 1.2em;
}

@media (max-width: 800px) {
    .principal_1 {
        flex-direction: column;
    }
    .contenedor_1 {
        display: flex;
        margin: 0px 10px;
    }
    .contenedor_1:last-child {
        margin-top: 20px;
    }
}
</style>
