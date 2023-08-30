<template>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Empresas - <span>Finanzas</span></h1>
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
                                        <table
                                            class="table table-bordered table-striped"
                                        >
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th width="35px">
                                                        <button
                                                            class="btn btn-outline-primary btn-sm btn-block btn-flat"
                                                        >
                                                            <i
                                                                class="fa fa-plus"
                                                            ></i>
                                                            AÑADIR NUEVO
                                                        </button>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-xs">
                                                        GANANCIA*
                                                    </td>
                                                    <td rowspan="21"></td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        COSTO DE LOS BIENES
                                                        VENDIDOS*
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        SALARIOS<br /><small
                                                            >Incluidos los
                                                            salarios de los
                                                            contratistas</small
                                                        >
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        OTROS GASTOS
                                                        OPERATIVOS<br /><small
                                                            >Comerciales
                                                            Generales y
                                                            Administrativos</small
                                                        >
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        EBITDA
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">D&A</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        EBIT
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        INTERÉS
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        IMPUESTOS
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        BENEFICIO NETO
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        CUENTAS POR COBRAR
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        INVENTARIO
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        CUENTAS POR PAGAR
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        CAPITAL DE TRABAJO
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        CAMBIO EN EL CAPITAL DE
                                                        TRABAJO
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        LOS GASTOS DE CAPITAL
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        DEUDA AL FINAL DEL AÑO
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        CAMBIO EN LA DEUDA
                                                        PENDIENTE
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        FLUJO DE CAJA LIBRE A
                                                        CAPITAL
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        RECAUDACIÓN DE FONDOS
                                                        FUTURA<br /><small
                                                            >Excluyendo la ronda
                                                            de financiación
                                                            actual</small
                                                        >
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        FLUJO DE CAJA LIBRE
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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
                finanzas: [],
            },
            oFinanza: {
                empresa_id: 0,
                ganancia: 0,
                costo_bienes_vendidos: 0,
                salarios: 0,
                otros_gastos_operativos: 0,
                ebitda: 0,
                da: 0,
                ebit: 0,
                interes: 0,
                impuestos: 0,
                beneficio_neto: 0,
                cuentas_cobrar: 0,
                inventario: 0,
                cuentas_pagar: 0,
                capital_trabajo: 0,
                cambio_capital_trabajo: 0,
                gastos_capital: 0,
                deuda_final_anio: 0,
                cambio_deuda_pendiente: 0,
                flujo_caja_libre_capital: 0,
                recaudacion_fondos_futura: 0,
                flujo_caja_libre: 0,
            },
            total_porcentaje: 0,
            esperando: 0,
            enviando: false,
            accion: "nuevo",
        };
    },
    watch: {
        oEmpresa(newVal, oldVal) {
            if (newVal.finanza) {
                this.oFinanza = newVal.finanza;
                this.sumaPorcentaje();
                this.accion = "edit";
            }
        },
    },
    computed: {
        textoBoton() {
            if (this.oEmpresa.finanza) {
                return '<i class="fa fa-edit"></i> ACTUALIZAR FINANZAS';
            } else {
                return '<i class="fa fa-save"></i> REGISTRAR FINANZAS';
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
                let url = "/admin/finanzas";
                this.oFinanza.empresa_id = this.oEmpresa.id;
                if (this.accion == "edit") {
                    url = "/admin/finanzas/" + this.oEmpresa.finanza.id;
                    this.oFinanza["_method"] = "PUT";
                }
                axios
                    .post(url, this.oFinanza)
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
                    this.oFinanza.p_producto ? this.oFinanza.p_producto : 0
                ) +
                parseFloat(
                    this.oFinanza.p_venta_marketing
                        ? this.oFinanza.p_venta_marketing
                        : 0
                ) +
                parseFloat(
                    this.oFinanza.p_inventario ? this.oFinanza.p_inventario : 0
                ) +
                parseFloat(
                    this.oFinanza.p_operacion ? this.oFinanza.p_operacion : 0
                ) +
                parseFloat(
                    this.oFinanza.p_gastos ? this.oFinanza.p_gastos : 0
                ) +
                parseFloat(this.oFinanza.p_otros ? this.oFinanza.p_otros : 0);
        },
    },
};
</script>
<style></style>
