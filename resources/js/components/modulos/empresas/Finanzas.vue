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
                                        <button
                                            class="btn btn-outline-primary btn-sm btn-block btn-flat"
                                            @click="
                                                abreModal('nuevo');
                                            "
                                        >
                                            <i class="fa fa-plus"></i>
                                            AÑADIR NUEVO
                                        </button>
                                    </div>
                                    <div class="col-md-12">
                                        <table
                                            class="table table-bordered table-striped"
                                        >
                                            <thead>
                                                <tr>
                                                    <th width="240px"></th>
                                                    <th
                                                        v-for="item in oEmpresa.finanzas"
                                                        class="text-center"
                                                    >
                                                        <span
                                                            v-if="
                                                                item.gestion <
                                                                getAnioActual()
                                                            "
                                                            >AÑO PASADO</span
                                                        ><br />
                                                        1/{{ item.gestion }} -
                                                        12/{{ item.gestion }}
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="text-xs">
                                                        GANANCIA*
                                                    </td>
                                                    <td
                                                        v-for="item in oEmpresa.finanzas"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            v-model="
                                                                item.ganancia
                                                            "
                                                            @keyup="
                                                                actualizaColumna(
                                                                    'ganancia',
                                                                    item.id
                                                                )
                                                            "
                                                            @change="
                                                                actualizaColumna(
                                                                    'ganancia',
                                                                    item.id
                                                                )
                                                            "
                                                        />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        COSTO DE LOS BIENES
                                                        VENDIDOS*
                                                    </td>

                                                    <td
                                                        v-for="item in oEmpresa.finanzas"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            v-model="
                                                                item.costo_bienes_vendidos
                                                            "
                                                            @keyup="
                                                                actualizaColumna(
                                                                    'costo_bienes_vendidos',
                                                                    item.id
                                                                )
                                                            "
                                                            @change="
                                                                actualizaColumna(
                                                                    'costo_bienes_vendidos',
                                                                    item.id
                                                                )
                                                            "
                                                        />
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

                                                    <td
                                                        v-for="item in oEmpresa.finanzas"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            v-model="
                                                                item.salarios
                                                            "
                                                            @keyup="
                                                                actualizaColumna(
                                                                    'salarios',
                                                                    item.id
                                                                )
                                                            "
                                                            @change="
                                                                actualizaColumna(
                                                                    'salarios',
                                                                    item.id
                                                                )
                                                            "
                                                        />
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

                                                    <td
                                                        v-for="item in oEmpresa.finanzas"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            v-model="
                                                                item.otros_gastos_operativos
                                                            "
                                                            @keyup="
                                                                actualizaColumna(
                                                                    'otros_gastos_operativos',
                                                                    item.id
                                                                )
                                                            "
                                                            @change="
                                                                actualizaColumna(
                                                                    'otros_gastos_operativos',
                                                                    item.id
                                                                )
                                                            "
                                                        />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        EBITDA
                                                    </td>

                                                    <td
                                                        v-for="item in oEmpresa.finanzas"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            v-model="
                                                                item.ebitda
                                                            "
                                                            @keyup="
                                                                actualizaColumna(
                                                                    'ebitda',
                                                                    item.id
                                                                )
                                                            "
                                                            @change="
                                                                actualizaColumna(
                                                                    'ebitda',
                                                                    item.id
                                                                )
                                                            "
                                                        />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">D&A</td>

                                                    <td
                                                        v-for="item in oEmpresa.finanzas"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            v-model="item.da"
                                                            @keyup="
                                                                actualizaColumna(
                                                                    'da',
                                                                    item.id
                                                                )
                                                            "
                                                            @change="
                                                                actualizaColumna(
                                                                    'da',
                                                                    item.id
                                                                )
                                                            "
                                                        />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        EBIT
                                                    </td>

                                                    <td
                                                        v-for="item in oEmpresa.finanzas"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            v-model="item.ebit"
                                                            @keyup="
                                                                actualizaColumna(
                                                                    'ebit',
                                                                    item.id
                                                                )
                                                            "
                                                            @change="
                                                                actualizaColumna(
                                                                    'ebit',
                                                                    item.id
                                                                )
                                                            "
                                                        />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        INTERÉS
                                                    </td>

                                                    <td
                                                        v-for="item in oEmpresa.finanzas"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            v-model="
                                                                item.interes
                                                            "
                                                            @keyup="
                                                                actualizaColumna(
                                                                    'interes',
                                                                    item.id
                                                                )
                                                            "
                                                            @change="
                                                                actualizaColumna(
                                                                    'interes',
                                                                    item.id
                                                                )
                                                            "
                                                        />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        IMPUESTOS
                                                    </td>

                                                    <td
                                                        v-for="item in oEmpresa.finanzas"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            v-model="
                                                                item.impuestos
                                                            "
                                                            @keyup="
                                                                actualizaColumna(
                                                                    'impuestos',
                                                                    item.id
                                                                )
                                                            "
                                                            @change="
                                                                actualizaColumna(
                                                                    'impuestos',
                                                                    item.id
                                                                )
                                                            "
                                                        />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        BENEFICIO NETO
                                                    </td>

                                                    <td
                                                        v-for="item in oEmpresa.finanzas"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            v-model="
                                                                item.beneficio_neto
                                                            "
                                                            @keyup="
                                                                actualizaColumna(
                                                                    'beneficio_neto',
                                                                    item.id
                                                                )
                                                            "
                                                            @change="
                                                                actualizaColumna(
                                                                    'beneficio_neto',
                                                                    item.id
                                                                )
                                                            "
                                                        />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        CUENTAS POR COBRAR
                                                    </td>

                                                    <td
                                                        v-for="item in oEmpresa.finanzas"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            v-model="
                                                                item.cuentas_cobrar
                                                            "
                                                            @keyup="
                                                                actualizaColumna(
                                                                    'cuentas_cobrar',
                                                                    item.id
                                                                )
                                                            "
                                                            @change="
                                                                actualizaColumna(
                                                                    'cuentas_cobrar',
                                                                    item.id
                                                                )
                                                            "
                                                        />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        INVENTARIO
                                                    </td>

                                                    <td
                                                        v-for="item in oEmpresa.finanzas"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            v-model="
                                                                item.inventario
                                                            "
                                                            @keyup="
                                                                actualizaColumna(
                                                                    'inventario',
                                                                    item.id
                                                                )
                                                            "
                                                            @change="
                                                                actualizaColumna(
                                                                    'inventario',
                                                                    item.id
                                                                )
                                                            "
                                                        />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        CUENTAS POR PAGAR
                                                    </td>

                                                    <td
                                                        v-for="item in oEmpresa.finanzas"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            v-model="
                                                                item.cuentas_pagar
                                                            "
                                                            @keyup="
                                                                actualizaColumna(
                                                                    'cuentas_pagar',
                                                                    item.id
                                                                )
                                                            "
                                                            @change="
                                                                actualizaColumna(
                                                                    'cuentas_pagar',
                                                                    item.id
                                                                )
                                                            "
                                                        />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        CAPITAL DE TRABAJO
                                                    </td>

                                                    <td
                                                        v-for="item in oEmpresa.finanzas"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            v-model="
                                                                item.capital_trabajo
                                                            "
                                                            @keyup="
                                                                actualizaColumna(
                                                                    'capital_trabajo',
                                                                    item.id
                                                                )
                                                            "
                                                            @change="
                                                                actualizaColumna(
                                                                    'capital_trabajo',
                                                                    item.id
                                                                )
                                                            "
                                                        />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        CAMBIO EN EL CAPITAL DE
                                                        TRABAJO
                                                    </td>

                                                    <td
                                                        v-for="item in oEmpresa.finanzas"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            v-model="
                                                                item.cambio_capital_trabajo
                                                            "
                                                            @keyup="
                                                                actualizaColumna(
                                                                    'cambio_capital_trabajo',
                                                                    item.id
                                                                )
                                                            "
                                                            @change="
                                                                actualizaColumna(
                                                                    'cambio_capital_trabajo',
                                                                    item.id
                                                                )
                                                            "
                                                        />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        LOS GASTOS DE CAPITAL
                                                    </td>

                                                    <td
                                                        v-for="item in oEmpresa.finanzas"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            v-model="
                                                                item.gastos_capital
                                                            "
                                                            @keyup="
                                                                actualizaColumna(
                                                                    'gastos_capital',
                                                                    item.id
                                                                )
                                                            "
                                                            @change="
                                                                actualizaColumna(
                                                                    'gastos_capital',
                                                                    item.id
                                                                )
                                                            "
                                                        />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        DEUDA AL FINAL DEL AÑO
                                                    </td>

                                                    <td
                                                        v-for="item in oEmpresa.finanzas"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            v-model="
                                                                item.deuda_final_anio
                                                            "
                                                            @keyup="
                                                                actualizaColumna(
                                                                    'deuda_final_anio',
                                                                    item.id
                                                                )
                                                            "
                                                            @change="
                                                                actualizaColumna(
                                                                    'deuda_final_anio',
                                                                    item.id
                                                                )
                                                            "
                                                        />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        CAMBIO EN LA DEUDA
                                                        PENDIENTE
                                                    </td>

                                                    <td
                                                        v-for="item in oEmpresa.finanzas"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            v-model="
                                                                item.cambio_deuda_pendiente
                                                            "
                                                            @keyup="
                                                                actualizaColumna(
                                                                    'cambio_deuda_pendiente',
                                                                    item.id
                                                                )
                                                            "
                                                            @change="
                                                                actualizaColumna(
                                                                    'cambio_deuda_pendiente',
                                                                    item.id
                                                                )
                                                            "
                                                        />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        FLUJO DE CAJA LIBRE A
                                                        CAPITAL
                                                    </td>

                                                    <td
                                                        v-for="item in oEmpresa.finanzas"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            v-model="
                                                                item.flujo_caja_libre_capital
                                                            "
                                                            @keyup="
                                                                actualizaColumna(
                                                                    'flujo_caja_libre_capital',
                                                                    item.id
                                                                )
                                                            "
                                                            @change="
                                                                actualizaColumna(
                                                                    'flujo_caja_libre_capital',
                                                                    item.id
                                                                )
                                                            "
                                                        />
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

                                                    <td
                                                        v-for="item in oEmpresa.finanzas"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            v-model="
                                                                item.recaudacion_fondos_futura
                                                            "
                                                            @keyup="
                                                                actualizaColumna(
                                                                    'recaudacion_fondos_futura',
                                                                    item.id
                                                                )
                                                            "
                                                            @change="
                                                                actualizaColumna(
                                                                    'recaudacion_fondos_futura',
                                                                    item.id
                                                                )
                                                            "
                                                        />
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        FLUJO DE CAJA LIBRE
                                                    </td>

                                                    <td
                                                        v-for="item in oEmpresa.finanzas"
                                                    >
                                                        <input
                                                            type="number"
                                                            class="form-control"
                                                            v-model="
                                                                item.flujo_caja_libre
                                                            "
                                                            @keyup="
                                                                actualizaColumna(
                                                                    'flujo_caja_libre',
                                                                    item.id
                                                                )
                                                            "
                                                            @change="
                                                                actualizaColumna(
                                                                    'flujo_caja_libre',
                                                                    item.id
                                                                )
                                                            "
                                                        />
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-md-12">
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
        <AddFinanza
            :muestra_modal="muestra_modal"
            :accion="modal_accion"
            :finanza="oFinanza"
            :empresa="oEmpresa"
            @close="muestra_modal = false"
            @envioModal="getEmpresa"
        ></AddFinanza>
    </div>
</template>
<script>
import AddFinanza from "./AddFinanza.vue";
export default {
    components: {
        AddFinanza,
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
                finanzas: [],
            },
            oFinanza: {
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
            },
            total_porcentaje: 0,
            esperando: 0,
            enviando: false,
            accion: "nuevo",
            muestra_modal: false,
            modal_accion: "nuevo",
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
            this.muestra_modal = false;
            axios.get("/admin/empresas/" + this.id).then((response) => {
                this.oEmpresa = response.data.empresa;
            });
        },
        abreModal(tipo_accion = "nuevo", finanza = null) {
            this.muestra_modal = true;
            this.modal_accion = tipo_accion;
            if (finanza) {
                this.oFinanza = finanza;
            }
        },
        actualizaColumna(col, id) {},
    },
};
</script>
<style></style>
