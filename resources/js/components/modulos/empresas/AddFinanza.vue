<template>
    <div
        class="modal fade content_add_finanza"
        :class="{ show: bModal }"
        id="modal-default"
        aria-modal="true"
        role="dialog"
    >
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title" v-text="tituloModal"></h4>
                    <button
                        type="button"
                        class="close"
                        data-dismiss="modal"
                        aria-label="Close"
                        @click="cierraModal"
                    >
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row" v-if="empresa.finanzas.length == 0">
                            <div
                                class="col-md-12 alert alert-primary font-weight-bold text-center"
                            >
                                INICIALIZACIÓN DE FINANZAS
                            </div>
                        </div>
                        <div class="row" v-else>
                            <div
                                class="col-md-12 alert alert-primary font-weight-bold text-center"
                            >
                                NUEVA VALORACIÓN/PREDICCIÓN
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger': errors.gestion,
                                    }"
                                    >GESTION*</label
                                >
                                <input
                                    placeholder="GESTION"
                                    type="number"
                                    class="form-control"
                                    :class="{ 'is-invalid': errors.gestion }"
                                    v-model="finanza.gestion"
                                    :readonly="empresa.finanzas.length > 0"
                                />
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.gestion"
                                    v-text="errors.gestion[0]"
                                ></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger': errors.ganancia,
                                    }"
                                    >GANANCIA*</label
                                >
                                <input
                                    placeholder="GANANCIA"
                                    type="number"
                                    class="form-control"
                                    :class="{ 'is-invalid': errors.ganancia }"
                                    v-model="finanza.ganancia"
                                    :readonly="empresa.finanzas.length > 0"
                                    @change="calculaEBITDA"
                                    @keyup="calculaEBITDA"
                                />
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.ganancia"
                                    v-text="errors.ganancia[0]"
                                ></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger':
                                            errors.costo_bienes_vendidos,
                                    }"
                                    >COSTO DE LOS BIENES VENDIDOS*</label
                                >
                                <input
                                    placeholder="COSTO DE LOS BIENES VENDIDOS"
                                    type="number"
                                    class="form-control"
                                    :class="{
                                        'is-invalid':
                                            errors.costo_bienes_vendidos,
                                    }"
                                    v-model="finanza.costo_bienes_vendidos"
                                    :readonly="empresa.finanzas.length > 0"
                                    @change="calculaEBITDA"
                                    @keyup="calculaEBITDA"
                                />
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.costo_bienes_vendidos"
                                    v-text="errors.costo_bienes_vendidos[0]"
                                ></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger': errors.salarios,
                                    }"
                                    >SALARIOS<br /><small
                                        >Incluidos los salarios de los
                                        contratistas</small
                                    ></label
                                >
                                <input
                                    placeholder="SALARIOS"
                                    type="number"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': errors.salarios,
                                    }"
                                    v-model="finanza.salarios"
                                    :readonly="empresa.finanzas.length > 0"
                                    @change="calculaEBITDA"
                                    @keyup="calculaEBITDA"
                                />
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.salarios"
                                    v-text="errors.salarios[0]"
                                ></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger':
                                            errors.otros_gastos_operativos,
                                    }"
                                >
                                    OTROS GASTOS OPERATIVOS<br /><small
                                        >Comerciales Generales y
                                        Administrativos</small
                                    ></label
                                >
                                <input
                                    placeholder=" OTROS GASTOS OPERATIVOS"
                                    type="number"
                                    class="form-control"
                                    :class="{
                                        'is-invalid':
                                            errors.otros_gastos_operativos,
                                    }"
                                    v-model="finanza.otros_gastos_operativos"
                                    :readonly="empresa.finanzas.length > 0"
                                    @change="calculaEBITDA"
                                    @keyup="calculaEBITDA"
                                />
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.otros_gastos_operativos"
                                    v-text="errors.otros_gastos_operativos[0]"
                                ></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger': errors.ebitda,
                                    }"
                                    >EBITDA*</label
                                >
                                <input
                                    placeholder="EBITDA"
                                    type="number"
                                    class="form-control automatico"
                                    :class="{
                                        'is-invalid': errors.ebitda,
                                    }"
                                    v-model="finanza.ebitda"
                                    readonly
                                    @change="calculaEBIT()"
                                    @keyup="calculaEBIT()"
                                />
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.ebitda"
                                    v-text="errors.ebitda[0]"
                                ></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger': errors.da,
                                    }"
                                    >D&A</label
                                >
                                <input
                                    placeholder="D&A"
                                    type="number"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': errors.da,
                                    }"
                                    v-model="finanza.da"
                                    :readonly="empresa.finanzas.length > 0"
                                    @change="
                                        calculaEBIT();
                                        calculaFlujoCajaLibre();
                                    "
                                    @keyup="
                                        calculaEBIT();
                                        calculaFlujoCajaLibre();
                                    "
                                />
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.da"
                                    v-text="errors.da[0]"
                                ></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger': errors.ebit,
                                    }"
                                    >EBIT</label
                                >
                                <input
                                    placeholder="EBIT"
                                    type="number"
                                    class="form-control automatico"
                                    :class="{
                                        'is-invalid': errors.ebit,
                                    }"
                                    v-model="finanza.ebit"
                                    readonly
                                    @change="calculaBeneficioNeto"
                                    @keyup="calculaBeneficioNeto"
                                />
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.ebit"
                                    v-text="errors.ebit[0]"
                                ></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger': errors.interes,
                                    }"
                                    >INTERÉS</label
                                >
                                <input
                                    placeholder="INTERÉS"
                                    type="number"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': errors.interes,
                                    }"
                                    v-model="finanza.interes"
                                    :readonly="empresa.finanzas.length > 0"
                                    @change="calculaBeneficioNeto"
                                    @keyup="calculaBeneficioNeto"
                                />
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.interes"
                                    v-text="errors.interes[0]"
                                ></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger': errors.impuestos,
                                    }"
                                    >IMPUESTOS</label
                                >
                                <input
                                    placeholder="IMPUESTOS"
                                    type="number"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': errors.impuestos,
                                    }"
                                    v-model="finanza.impuestos"
                                    :readonly="empresa.finanzas.length > 0"
                                    @change="calculaBeneficioNeto"
                                    @keyup="calculaBeneficioNeto"
                                />
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.impuestos"
                                    v-text="errors.impuestos[0]"
                                ></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger': errors.beneficio_neto,
                                    }"
                                    >BENEFICIO NETO</label
                                >
                                <input
                                    placeholder="BENEFICIO NETO"
                                    type="number"
                                    class="form-control automatico"
                                    :class="{
                                        'is-invalid': errors.beneficio_neto,
                                    }"
                                    v-model="finanza.beneficio_neto"
                                    readonly
                                    @change="calculaFlujoCajaLibre()"
                                    @keyup="calculaFlujoCajaLibre()"
                                />
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.beneficio_neto"
                                    v-text="errors.beneficio_neto[0]"
                                ></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger': errors.cuentas_cobrar,
                                    }"
                                    >CUENTAS POR COBRAR</label
                                >
                                <input
                                    placeholder="CUENTAS POR COBRAR"
                                    type="number"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': errors.cuentas_cobrar,
                                    }"
                                    v-model="finanza.cuentas_cobrar"
                                    :readonly="empresa.finanzas.length > 0"
                                    @change="calculaCapitalTrabajo"
                                    @keyup="calculaCapitalTrabajo"
                                />
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.cuentas_cobrar"
                                    v-text="errors.cuentas_cobrar[0]"
                                ></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger': errors.inventario,
                                    }"
                                    >INVENTARIO</label
                                >
                                <input
                                    placeholder="INVENTARIO"
                                    type="number"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': errors.inventario,
                                    }"
                                    v-model="finanza.inventario"
                                    :readonly="empresa.finanzas.length > 0"
                                    @change="calculaCapitalTrabajo"
                                    @keyup="calculaCapitalTrabajo"
                                />
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.inventario"
                                    v-text="errors.inventario[0]"
                                ></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger': errors.cuentas_pagar,
                                    }"
                                    >CUENTAS POR PAGAR</label
                                >
                                <input
                                    placeholder="CUENTAS POR PAGAR"
                                    type="number"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': errors.cuentas_pagar,
                                    }"
                                    v-model="finanza.cuentas_pagar"
                                    :readonly="empresa.finanzas.length > 0"
                                    @change="calculaCapitalTrabajo"
                                    @keyup="calculaCapitalTrabajo"
                                />
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.cuentas_pagar"
                                    v-text="errors.cuentas_pagar[0]"
                                ></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger': errors.capital_trabajo,
                                    }"
                                    >CAPITAL DE TRABAJO</label
                                >
                                <input
                                    placeholder="CAPITAL DE TRABAJO"
                                    type="number"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': errors.capital_trabajo,
                                    }"
                                    v-model="finanza.capital_trabajo"
                                    :readonly="empresa.finanzas.length > 0"
                                    @change="calculaCambioCapitalTrabajo"
                                    @keyup="calculaCambioCapitalTrabajo"
                                />
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.capital_trabajo"
                                    v-text="errors.capital_trabajo[0]"
                                ></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger':
                                            errors.cambio_capital_trabajo,
                                    }"
                                    >CAMBIO EN EL CAPITAL DE TRABAJO</label
                                >
                                <input
                                    placeholder="CAMBIO EN EL CAPITAL DE TRABAJO"
                                    type="number"
                                    class="form-control automatico"
                                    :class="{
                                        'is-invalid':
                                            errors.cambio_capital_trabajo,
                                    }"
                                    v-model="finanza.cambio_capital_trabajo"
                                    readonly
                                    @change="calculaFlujoCajaLibre()"
                                    @keyup="calculaFlujoCajaLibre()"
                                />
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.cambio_capital_trabajo"
                                    v-text="errors.cambio_capital_trabajo[0]"
                                ></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger': errors.gastos_capital,
                                    }"
                                    >LOS GASTOS DE CAPITAL</label
                                >
                                <input
                                    placeholder="LOS GASTOS DE CAPITAL"
                                    type="number"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': errors.gastos_capital,
                                    }"
                                    v-model="finanza.gastos_capital"
                                    :readonly="empresa.finanzas.length > 0"
                                    @change="calculaFlujoCajaLibre()"
                                    @keyup="calculaFlujoCajaLibre()"
                                />
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.gastos_capital"
                                    v-text="errors.gastos_capital[0]"
                                ></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger': errors.deuda_final_anio,
                                    }"
                                    >DEUDA AL FINAL DEL AÑO</label
                                >
                                <input
                                    placeholder="DEUDA AL FINAL DEL AÑO"
                                    type="number"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': errors.deuda_final_anio,
                                    }"
                                    v-model="finanza.deuda_final_anio"
                                    :readonly="empresa.finanzas.length > 0"
                                    @change="calculaCambioDeudaPendiente"
                                    @keyup="calculaCambioDeudaPendiente"
                                />
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.deuda_final_anio"
                                    v-text="errors.deuda_final_anio[0]"
                                ></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger':
                                            errors.cambio_deuda_pendiente,
                                    }"
                                    >CAMBIO EN LA DEUDA PENDIENTE</label
                                >
                                <input
                                    placeholder="CAMBIO EN LA DEUDA PENDIENTE"
                                    type="number"
                                    class="form-control automatico"
                                    :class="{
                                        'is-invalid':
                                            errors.cambio_deuda_pendiente,
                                    }"
                                    v-model="finanza.cambio_deuda_pendiente"
                                    readonly
                                    @change="calculaFlujoCajaLibre()"
                                    @keyup="calculaFlujoCajaLibre()"
                                />
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.cambio_deuda_pendiente"
                                    v-text="errors.cambio_deuda_pendiente[0]"
                                ></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger':
                                            errors.flujo_caja_libre_capital,
                                    }"
                                    >FLUJO DE CAJA LIBRE A CAPITAL</label
                                >
                                <input
                                    placeholder="FLUJO DE CAJA LIBRE A CAPITAL"
                                    type="number"
                                    class="form-control automatico"
                                    :class="{
                                        'is-invalid':
                                            errors.flujo_caja_libre_capital,
                                    }"
                                    v-model="finanza.flujo_caja_libre_capital"
                                    readonly
                                    @change="calculaFlujoCajaLibre()"
                                    @keyup="calculaFlujoCajaLibre()"
                                />
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.flujo_caja_libre_capital"
                                    v-text="errors.flujo_caja_libre_capital[0]"
                                ></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger':
                                            errors.recaudacion_fondos_futura,
                                    }"
                                    >RECAUDACIÓN DE FONDOS FUTURA<br /><small
                                        >Excluyendo la ronda de financiación
                                        actual</small
                                    ></label
                                >
                                <input
                                    placeholder="RECAUDACIÓN DE FONDOS FUTURA"
                                    type="number"
                                    class="form-control"
                                    :class="{
                                        'is-invalid':
                                            errors.recaudacion_fondos_futura,
                                    }"
                                    v-model="finanza.recaudacion_fondos_futura"
                                    :readonly="empresa.finanzas.length > 0"
                                    @change="calculaFlujoCajaLibre()"
                                    @keyup="calculaFlujoCajaLibre()"
                                />
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.recaudacion_fondos_futura"
                                    v-text="errors.recaudacion_fondos_futura[0]"
                                ></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger': errors.flujo_caja_libre,
                                    }"
                                    >FLUJO DE CAJA LIBRE*</label
                                >
                                <input
                                    placeholder="FLUJO DE CAJA LIBRE"
                                    type="number"
                                    class="form-control automatico"
                                    :class="{
                                        'is-invalid': errors.flujo_caja_libre,
                                    }"
                                    v-model="finanza.flujo_caja_libre"
                                    readonly
                                />
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.flujo_caja_libre"
                                    v-text="errors.flujo_caja_libre[0]"
                                ></span>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-between">
                    <button
                        type="button"
                        class="btn btn-default"
                        data-dismiss="modal"
                        @click="cierraModal"
                    >
                        Cerrar
                    </button>
                    <el-button
                        type="primary"
                        class="bg-primary"
                        :loading="enviando"
                        @click="setRegistroModal()"
                        >{{ textoBoton }}</el-button
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        muestra_modal: {
            type: Boolean,
            default: false,
        },
        accion: {
            type: String,
            default: "nuevo",
        },
        empresa: {
            type: Object,
            default: {
                id: 0,
                nombre: "",
                descripcion_actividad: "",
                web: "",
                correo: "",
                dir: "",
                finanzas: [],
            },
        },
        finanza: {
            type: Object,
            default: {
                id: 0,
                gestion: 0,
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
        },
    },
    watch: {
        empresa(newVal, oldVal) {
            if (newVal.id != 0) {
                this.finanza.empresa_id = newVal.id;
                this.getAnioAnterior();
            }
            if (newVal.finanzas.length == 0) {
                this.finanza.gestion = this.getAnioActual();
            } else {
                this.finanza.gestion =
                    parseInt(
                        newVal.finanzas[newVal.finanzas.length - 1].gestion
                    ) + 1;

                this.getMedias();
            }
        },
        finanza(newVal) {
            if (newVal.id == 0) {
                this.limpiaFinanza();
            }
        },
        muestra_modal: function (newVal, oldVal) {
            this.errors = [];
            if (newVal) {
                this.bModal = true;
                if (this.empresa.id != 0 && this.empresa.finanzas.length > 0) {
                    this.getAnioAnterior();
                    this.getMedias();
                }
            } else {
                this.bModal = false;
            }
        },
    },
    computed: {
        tituloModal() {
            if (this.accion == "nuevo") {
                return "NUEVO REGISTRO FINANZA";
            } else {
                return "MODIFICAR REGISTRO FINANZA";
            }
        },
        textoBoton() {
            if (this.accion == "nuevo") {
                return "Agregar registro";
            } else {
                return "Actualizar registro";
            }
        },
    },
    data() {
        return {
            user: JSON.parse(localStorage.getItem("user")),
            bModal: this.muestra_modal,
            enviando: false,
            listCajas: [],
            errors: [],
            oFinanzaAnterior: {
                id: 0,
                gestion: 0,
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
        };
    },
    mounted() {
        this.bModal = this.muestra_modal;
        this.getCajas();
    },
    methods: {
        getCajas() {
            axios.get("/admin/cajas").then((response) => {
                this.listCajas = response.data.cajas;
            });
        },
        setRegistroModal() {
            try {
                this.textoBtn = "Enviando...";
                let url = "/admin/finanzas";

                axios
                    .post(url, this.finanza)
                    .then((res) => {
                        this.enviando = false;
                        if (res.data.sw) {
                            Swal.fire({
                                icon: "success",
                                title: res.data.msj,
                                showConfirmButton: false,
                                timer: 2000,
                            });
                            this.$emit("envioModal");
                            this.errors = [];
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
                            this.textoBtn = "Actualizar registro";
                        } else {
                            this.textoBtn = "Registrar registro";
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
        // Dialog/modal
        cierraModal() {
            this.bModal = false;
            this.$emit("close");
        },
        limpiaFinanza() {
            this.finanza = {
                id: 0,
                empresa_id: 0,
                gestion: 0,
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
            };
        },
        calculaEBITDA() {
            this.finanza.ebitda =
                parseFloat(this.finanza.ganancia ? this.finanza.ganancia : 0) -
                parseFloat(
                    this.finanza.costo_bienes_vendidos
                        ? this.finanza.costo_bienes_vendidos
                        : 0
                ) -
                parseFloat(this.finanza.salarios ? this.finanza.salarios : 0) -
                parseFloat(
                    this.finanza.otros_gastos_operativos
                        ? this.finanza.otros_gastos_operativos
                        : 0
                );
            this.finanza.ebitda = parseFloat(this.finanza.ebitda).toFixed(2);
            this.calculaEBIT();
        },
        calculaEBIT() {
            this.finanza.ebit =
                parseFloat(this.finanza.ebitda ? this.finanza.ebitda : 0) -
                parseFloat(this.finanza.da ? this.finanza.da : 0);
            this.finanza.ebit = parseFloat(this.finanza.ebit).toFixed(2);
            this.calculaBeneficioNeto();
        },
        calculaBeneficioNeto() {
            this.finanza.beneficio_neto =
                parseFloat(this.finanza.ebit ? this.finanza.ebit : 0) -
                parseFloat(this.finanza.interes ? this.finanza.interes : 0) -
                parseFloat(this.finanza.impuestos ? this.finanza.impuestos : 0);
            this.finanza.beneficio_neto = parseFloat(
                this.finanza.beneficio_neto
            ).toFixed(2);
            this.calculaFlujoCajaLibreCapital();
        },
        calculaCapitalTrabajo() {
            this.finanza.capital_trabajo =
                parseFloat(
                    this.finanza.cuentas_cobrar
                        ? this.finanza.cuentas_cobrar
                        : 0
                ) +
                parseFloat(
                    this.finanza.inventario ? this.finanza.inventario : 0
                ) -
                parseFloat(
                    this.finanza.cuentas_pagar ? this.finanza.cuentas_pagar : 0
                );
            this.finanza.capital_trabajo = parseFloat(
                this.finanza.capital_trabajo
            ).toFixed(2);
        },
        calculaCambioCapitalTrabajo() {
            if (this.oFinanzaAnterior.id != 0) {
                this.finanza.cambio_capital_trabajo =
                    parseFloat(
                        this.finanza.capital_trabajo
                            ? this.finanza.capital_trabajo
                            : 0
                    ) -
                    parseFloat(
                        this.oFinanzaAnterior.capital_trabajo
                            ? this.oFinanzaAnterior.capital_trabajo
                            : 0
                    );
                this.finanza.cambio_capital_trabajo = parseFloat(
                    this.finanza.cambio_capital_trabajo
                ).toFixed(2);
            }
        },
        calculaCambioDeudaPendiente() {
            if (this.oFinanzaAnterior.id != 0) {
                this.finanza.cambio_deuda_pendiente =
                    parseFloat(
                        this.finanza.deuda_final_anio
                            ? this.finanza.deuda_final_anio
                            : 0
                    ) -
                    parseFloat(
                        this.oFinanzaAnterior.deuda_final_anio
                            ? this.oFinanzaAnterior.deuda_final_anio
                            : 0
                    );
                this.finanza.cambio_deuda_pendiente = parseFloat(
                    this.finanza.cambio_deuda_pendiente
                ).toFixed(2);
            }
            this.calculaFlujoCajaLibreCapital();
        },
        calculaFlujoCajaLibreCapital() {
            this.finanza.flujo_caja_libre_capital =
                parseFloat(
                    this.finanza.beneficio_neto
                        ? this.finanza.beneficio_neto
                        : 0
                ) +
                parseFloat(this.finanza.da ? this.finanza.da : 0) -
                parseFloat(
                    this.finanza.cambio_capital_trabajo
                        ? this.finanza.cambio_capital_trabajo
                        : 0
                ) -
                parseFloat(
                    this.finanza.gastos_capital
                        ? this.finanza.gastos_capital
                        : 0
                ) +
                parseFloat(
                    this.finanza.cambio_deuda_pendiente
                        ? this.finanza.cambio_deuda_pendiente
                        : 0
                );
            this.finanza.flujo_caja_libre_capital = parseFloat(
                this.finanza.flujo_caja_libre_capital
            ).toFixed(2);
            this.calculaFlujoCajaLibre();
        },
        calculaFlujoCajaLibre() {
            this.finanza.flujo_caja_libre =
                parseFloat(
                    this.finanza.flujo_caja_libre_capital
                        ? this.finanza.flujo_caja_libre_capital
                        : 0
                ) +
                parseFloat(
                    this.finanza.recaudacion_fondos_futura
                        ? this.finanza.recaudacion_fondos_futura
                        : 0
                );
            this.finanza.flujo_caja_libre = parseFloat(
                this.finanza.flujo_caja_libre
            ).toFixed(2);
        },
        // FUNCIONES PARA NUEVAS COLUMNAS
        getAnioAnterior() {
            axios
                .get("/admin/finanzas/getAnioAnterior/" + this.empresa.id)
                .then((response) => {
                    this.oFinanzaAnterior = response.data;
                    this.calculaCambioCapitalTrabajo();
                    this.calculaCambioDeudaPendiente();
                });
        },
        getMedias() {
            axios
                .get("/admin/finanzas/getMedias/" + this.empresa.id)
                .then((response) => {
                    this.finanza.ganancia = response.data.ganancia;
                    this.finanza.costo_bienes_vendidos =
                        response.data.costo_bienes_vendidos;
                    this.finanza.salarios = response.data.salarios;
                    this.finanza.otros_gastos_operativos =
                        response.data.otros_gastos_operativos;
                    this.finanza.ebitda = response.data.ebitda;
                    this.finanza.da = response.data.da;
                    this.finanza.ebit = response.data.ebit;
                    this.finanza.interes = response.data.interes;
                    this.finanza.impuestos = response.data.impuestos;
                    this.finanza.beneficio_neto = response.data.beneficio_neto;
                    this.finanza.cuentas_cobrar = response.data.cuentas_cobrar;
                    this.finanza.inventario = response.data.inventario;
                    this.finanza.cuentas_pagar = response.data.cuentas_pagar;
                    this.finanza.capital_trabajo =
                        response.data.capital_trabajo;
                    this.finanza.cambio_capital_trabajo =
                        response.data.cambio_capital_trabajo;
                    this.finanza.gastos_capital = response.data.gastos_capital;
                    this.finanza.deuda_final_anio =
                        response.data.deuda_final_anio;
                    this.finanza.cambio_deuda_pendiente =
                        response.data.cambio_deuda_pendiente;
                    this.finanza.flujo_caja_libre_capital =
                        response.data.flujo_caja_libre_capital;
                    this.finanza.recaudacion_fondos_futura =
                        response.data.recaudacion_fondos_futura;
                    this.finanza.flujo_caja_libre =
                        response.data.flujo_caja_libre;

                    this.calculaEBITDA();
                    this.calculaEBIT();
                    this.calculaBeneficioNeto();
                    this.calculaCapitalTrabajo();
                    this.calculaCambioCapitalTrabajo();
                    this.calculaCambioDeudaPendiente();
                    this.calculaFlujoCajaLibreCapital();
                    this.calculaFlujoCajaLibre();
                });
        },
    },
};
</script>

<style>
.content_add_finanza .form-control.automatico {
    background: rgb(153, 255, 216);
}
</style>
