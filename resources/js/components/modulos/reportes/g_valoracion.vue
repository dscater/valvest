<template>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-8">
                        <h1>Reportes - Gráfico Valoración</h1>
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
                                <div class="ml-auto mr-auto col-md-5">
                                    <form>
                                        <div class="row">
                                            <div class="form-group col-md-12">
                                                <label
                                                    :class="{
                                                        'text-danger':
                                                            errors.empresa_id,
                                                    }"
                                                    >Seleccione*</label
                                                >
                                                <el-select
                                                    v-model="
                                                        oReporte.empresa_id
                                                    "
                                                    filterable
                                                    placeholder="Seleccione"
                                                    class="d-block"
                                                    :class="{
                                                        'is-invalid':
                                                            errors.empresa_id,
                                                    }"
                                                >
                                                    <el-option
                                                        v-for="item in listEmpresas"
                                                        :key="item.id"
                                                        :value="item.id"
                                                        :label="item.nombre"
                                                    >
                                                    </el-option>
                                                </el-select>
                                                <span
                                                    class="error invalid-feedback"
                                                    v-if="errors.empresa_id"
                                                    v-text="
                                                        errors.empresa_id[0]
                                                    "
                                                ></span>
                                            </div>
                                        </div>
                                    </form>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <el-button
                                                type="primary"
                                                class="bg-primary w-full"
                                                :loading="enviando"
                                                @click="generaReporte()"
                                                >{{ textoBtn }}</el-button
                                            >
                                        </div>
                                        <div class="col-md-12">
                                            <el-button
                                                type="default"
                                                class="w-full mt-1"
                                                @click="limpiarFormulario()"
                                                >Reiniciar</el-button
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12" v-show="oEmpresa.valoracion">
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
                                                    oEmpresa.fondo
                                                        ? oEmpresa.fondo
                                                              .total_fondos_txt
                                                        : "Sin Registro Fondos"
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
                    <div class="col-md-12" v-show="oEmpresa.valoracion">
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
                </div>
            </div>
        </section>
    </div>
</template>

<script>
export default {
    data() {
        return {
            loadingWindow: Loading.service({
                fullscreen: this.fullscreenLoading,
            }),
            errors: [],
            oReporte: {
                empresa_id: "",
            },
            aFechas: [],
            enviando: false,
            textoBtn: "Generar Reporte",
            listEmpresas: [],
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
            errors: [],
        };
    },
    mounted() {
        this.loadingWindow.close();
        this.getEmpresas();
    },
    methods: {
        limpiarFormulario() {
            this.oReporte.filtro = "Todos";
        },
        getEmpresas() {
            axios.get("/admin/empresas").then((response) => {
                this.listEmpresas = response.data.empresas;
            });
        },
        generaReporte() {
            this.enviando = true;
            axios
                .post(
                    "/admin/valoracions/empresa/" + this.oReporte.empresa_id,
                    {
                        fondos: this.oEmpresa.valor_fondo,
                    }
                )
                .then((response) => {
                    this.errors = [];
                    this.enviando = false;
                    this.oEmpresa = response.data.empresa;
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
                    this.oEmpresa = {
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
                    };
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
        obtieneFechas() {
            this.oReporte.fecha_ini = this.aFechas[0];
            this.oReporte.fecha_fin = this.aFechas[1];
        },
        setValoracionUser() {
            axios.post(
                "/admin/valoracions/valoracion_user/" + this.oEmpresa.id
            );
        },
    },
};
</script>

<style></style>
