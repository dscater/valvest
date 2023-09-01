<template>
    <div
        class="modal fade"
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
                                NUEVA PREDICCIÓN
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
                                    class="form-control"
                                    :class="{
                                        'is-invalid': errors.ebitda,
                                    }"
                                    v-model="finanza.ebitda"
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
                                    class="form-control"
                                    :class="{
                                        'is-invalid': errors.ebit,
                                    }"
                                    v-model="finanza.ebit"
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
                                    class="form-control"
                                    :class="{
                                        'is-invalid': errors.beneficio_neto,
                                    }"
                                    v-model="finanza.beneficio_neto"
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
                                    class="form-control"
                                    :class="{
                                        'is-invalid':
                                            errors.cambio_capital_trabajo,
                                    }"
                                    v-model="finanza.cambio_capital_trabajo"
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
                                    class="form-control"
                                    :class="{
                                        'is-invalid':
                                            errors.cambio_deuda_pendiente,
                                    }"
                                    v-model="finanza.cambio_deuda_pendiente"
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
                                    class="form-control"
                                    :class="{
                                        'is-invalid':
                                            errors.flujo_caja_libre_capital,
                                    }"
                                    v-model="finanza.flujo_caja_libre_capital"
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
                                    class="form-control"
                                    :class="{
                                        'is-invalid': errors.flujo_caja_libre,
                                    }"
                                    v-model="finanza.flujo_caja_libre"
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
            }
            if (newVal.finanzas.length == 0) {
                console.log("asdasd");
                this.finanza.gestion = this.getAnioActual();
                console.log(this.finanza);
                console.log("BB");
            } else {
                this.finanza.gestion =
                    parseInt(
                        newVal.finanzas[newVal.finanzas.length - 1].gestion
                    ) + 1;
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
                            this.oEmpresa.finanzas.push(res.data.nueva_finanza);
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
        cargaImagen(e) {
            this.finanza.foto = e.target.files[0];
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
        getMedias() {},
    },
};
</script>

<style></style>
