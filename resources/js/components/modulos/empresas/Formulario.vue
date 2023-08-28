<template>
    <div class="row">
        <div class="col-md-12">
            <form>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div
                                class="card-header bg-primary text-md font-weight-bold"
                            >
                                <i class="fa fa-info-circle"></i> INFORMACIÓN DE
                                LA EMPRESA
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label
                                            :class="{
                                                'text-danger': errors.nombre,
                                            }"
                                            >Nombre de Empresa*</label
                                        >
                                        <el-input
                                            placeholder="Nombre de Empresa"
                                            :class="{
                                                'is-invalid': errors.nombre,
                                            }"
                                            v-model="oEmpresa.nombre"
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.nombre"
                                            v-text="errors.nombre[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label
                                            :class="{
                                                'text-danger':
                                                    errors.descripcion_actividad,
                                            }"
                                            >Descripción de la Actividad*</label
                                        >
                                        <el-input
                                            placeholder="Descripción de la Actividad"
                                            :class="{
                                                'is-invalid':
                                                    errors.descripcion_actividad,
                                            }"
                                            v-model="
                                                oEmpresa.descripcion_actividad
                                            "
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.descripcion_actividad"
                                            v-text="
                                                errors.descripcion_actividad[0]
                                            "
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label
                                            :class="{
                                                'text-danger': errors.web,
                                            }"
                                            >Sitio Web</label
                                        >
                                        <el-input
                                            placeholder="Sitio Web"
                                            :class="{
                                                'is-invalid': errors.web,
                                            }"
                                            v-model="oEmpresa.web"
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.web"
                                            v-text="errors.web[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label
                                            :class="{
                                                'text-danger': errors.correo,
                                            }"
                                            >Correo Electrónico*</label
                                        >
                                        <el-input
                                            placeholder="Correo Electrónico"
                                            :class="{
                                                'is-invalid': errors.correo,
                                            }"
                                            v-model="oEmpresa.correo"
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.correo"
                                            v-text="errors.correo[0]"
                                        ></span>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label
                                            :class="{
                                                'text-danger': errors.dir,
                                            }"
                                            >Dirección*</label
                                        >
                                        <el-input
                                            placeholder="Dirección"
                                            :class="{
                                                'is-invalid': errors.dir,
                                            }"
                                            v-model="oEmpresa.dir"
                                            clearable
                                        >
                                        </el-input>
                                        <span
                                            class="error invalid-feedback"
                                            v-if="errors.dir"
                                            v-text="errors.dir[0]"
                                        ></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-primary text-md font-weight-bold">
                    <i class="fa fa-list-alt"></i> ACCIONISTAS DE LA EMPRESA
                </div>
                <div class="card-body p-0">
                    <div class="row mt-2">
                        <div class="form-group mb-1 col-md-5">
                            <el-input
                                placeholder="Nombre Accionista"
                                v-model="oAccionista.nombre"
                                clearable
                            >
                            </el-input>
                        </div>
                        <div class="form-group mb-1 col-md-5">
                            <input
                                type="number"
                                class="form-control"
                                placeholder="Porcentaje"
                                v-model="oAccionista.porcentaje"
                            />
                        </div>
                        <div class="form-group mb-1 col-md-2">
                            <button
                                class="btn btn-outline-primary btn-block"
                                @click="addAccionista"
                            >
                                <i class="fa fa-plus"></i> AGREGAR
                            </button>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-12 contenedor_tabla">
                            <table
                                class="table table-striped tabla_responsive mb-0"
                            >
                                <thead>
                                    <tr>
                                        <th>Nro.</th>
                                        <th>Nombre Accionista</th>
                                        <th width="5px">Porcentaje</th>
                                        <th width="5px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template
                                        v-if="oEmpresa.accionistas?.length > 0"
                                    >
                                        <tr
                                            v-for="(
                                                item_accionista, index
                                            ) in oEmpresa.accionistas"
                                        >
                                            <td>{{ index + 1 }}</td>
                                            <td>
                                                {{ item_accionista.nombre }}
                                            </td>
                                            <td>
                                                {{ item_accionista.porcentaje }}
                                            </td>
                                            <td>
                                                <button
                                                    class="btn btn-sm btn-danger"
                                                    @click="
                                                        eliminaAccionista(
                                                            item_accionista.id,
                                                            index
                                                        )
                                                    "
                                                >
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </template>
                                    <template v-else>
                                        <tr>
                                            <td colspan="4">
                                                NO SE AGREGO NINGUN REGISTRO
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header bg-primary text-md font-weight-bold">
                    <i class="fa fa-list-alt"></i> COMPETIDORES DE LA EMPRESA
                </div>
                <div class="card-body p-0">
                    <div class="row mt-1">
                        <div class="form-group mb-1 col-md-5">
                            <el-input
                                placeholder="Nombre Empresa"
                                v-model="oCompetidor.nombre"
                                clearable
                            >
                            </el-input>
                        </div>
                        <div class="form-group mb-1 col-md-5">
                            <el-input
                                placeholder="URL Sitio Web"
                                v-model="oCompetidor.web"
                                clearable
                            >
                            </el-input>
                        </div>
                        <div class="form-group mb-1 col-md-2">
                            <button
                                class="btn btn-outline-primary btn-block"
                                @click="addCompetidor"
                            >
                                <i class="fa fa-plus"></i> AGREGAR
                            </button>
                        </div>
                    </div>
                    <div class="row mt-1">
                        <div class="col-md-12 contenedor_tabla">
                            <table
                                class="table table-striped tabla_responsive mb-0"
                            >
                                <thead>
                                    <tr>
                                        <th>Nro.</th>
                                        <th>Nombre Empresa</th>
                                        <th>URL Sitio Web</th>
                                        <th width="5px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template
                                        v-if="oEmpresa.competidores?.length > 0"
                                    >
                                        <tr
                                            v-for="(
                                                item_competidor, index
                                            ) in oEmpresa.competidores"
                                        >
                                            <td>{{ index + 1 }}</td>
                                            <td>
                                                {{ item_competidor.nombre }}
                                            </td>
                                            <td>{{ item_competidor.web }}</td>
                                            <td>
                                                <button
                                                    class="btn btn-sm btn-danger"
                                                    @click="
                                                        eliminaCompetidor(
                                                            item_competidor.id,
                                                            index
                                                        )
                                                    "
                                                >
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </template>
                                    <template v-else>
                                        <tr>
                                            <td colspan="4">
                                                NO SE AGREGO NINGUN REGISTRO
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <el-button
                        type="primary"
                        class="btn-primary bg-primary btn-block"
                        :loading="enviando"
                        @click="enviarFormulario()"
                        v-html="textoBoton"
                        :disabled="
                            oEmpresa.accionistas.length <= 0 ||
                            oEmpresa.competidores.length <= 0
                        "
                    ></el-button>
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
</template>

<script>
export default {
    props: {
        accion: {
            type: String,
            default: "nuevo",
        },
        empresa: {
            type: Object,
            default() {
                return {
                    id: 0,
                    nombre: "",
                    descripcion_actividad: "",
                    web: "",
                    correo: "",
                    dir: "",
                    accionistas: [],
                    competidores: [],
                };
            },
        },
    },
    watch: {
        empresa(newVal, oldVal) {
            this.oEmpresa = newVal;
        },
    },
    computed: {
        textoBoton() {
            if (this.accion == "nuevo") {
                return '<i class="fa fa-save"></i> Registrar empresa';
            } else {
                return '<i class="fa fa-edit"></i> Actualizar empresa';
            }
        },
    },
    data() {
        return {
            user: JSON.parse(localStorage.getItem("user")),
            enviando: false,
            errors: [],
            oEmpresa: this.empresa,
            oAccionista: {
                id: 0,
                empresa_id: 0,
                nombre: "",
                porcentaje: 0,
            },
            oCompetidor: {
                id: 0,
                empresa_id: 0,
                nombre: "",
                web: "",
            },
            accionistas_eliminados: [],
            competidores_eliminados: [],
        };
    },
    mounted() {},
    methods: {
        // ENVIAR REGISTRO
        enviarFormulario() {
            this.enviando = true;
            try {
                this.textoBtn = "Enviando...";
                let url = "/admin/empresas";
                if (this.accion == "edit") {
                    url = "/admin/empresas/" + this.oEmpresa.id;
                    this.oEmpresa["_method"] = "PUT";
                    this.oEmpresa.accionistas_eliminados =
                        this.accionistas_eliminados;
                    this.oEmpresa.competidores_eliminados =
                        this.competidores_eliminados;
                }
                axios
                    .post(url, this.oEmpresa)
                    .then((res) => {
                        this.enviando = false;
                        if (res.data.sw) {
                            Swal.fire({
                                icon: "success",
                                title: res.data.msj,
                                showConfirmButton: false,
                                timer: 2000,
                            });
                            this.$emit("envioFormulario", res.data.empresa.id);
                            this.errors = [];
                            if (this.accion == "edit") {
                                this.textoBtn = "Actualizar empresa";
                            } else {
                                this.textoBtn = "Registrar empresa";
                            }
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
        addAccionista() {
            if (
                this.oAccionista.nombre.trim() != "" &&
                this.oAccionista.porcentaje > 0
            ) {
                this.oEmpresa.accionistas.push({
                    id: 0,
                    empresa_id: 0,
                    nombre: this.oAccionista.nombre,
                    porcentaje: this.oAccionista.porcentaje,
                });
                this.oAccionista = {
                    id: 0,
                    empresa_id: 0,
                    nombre: "",
                    porcentaje: 0,
                };
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    html: "Completa todos los campos",
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
        },
        addCompetidor() {
            if (
                this.oCompetidor.nombre.trim() != "" &&
                this.oCompetidor.web.trim() != ""
            ) {
                this.oEmpresa.competidores.push({
                    id: 0,
                    empresa_id: 0,
                    nombre: this.oCompetidor.nombre,
                    web: this.oCompetidor.web,
                });
                this.oCompetidor = {
                    id: 0,
                    empresa_id: 0,
                    nombre: "",
                    web: "",
                };
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    html: "Completa todos los campos",
                    showConfirmButton: false,
                    timer: 2000,
                });
            }
        },
        eliminaAccionista(id, index) {
            this.oEmpresa.accionistas.splice(index, 1);
            if (id != 0) {
                this.accionistas_eliminados.push(id);
            }
        },
        eliminaCompetidor(id, index) {
            this.oEmpresa.competidores.splice(index, 1);
            if (id != 0) {
                this.competidores_eliminados.push(id);
            }
        },
        fechaActual() {
            // crea un nuevo objeto `Date`
            var today = new Date();

            // `getDate()` devuelve el día del mes (del 1 al 31)
            var day = today.getDate();
            if (day < 10) {
                day = "0" + day;
            }
            // `getMonth()` devuelve el mes (de 0 a 11)
            var month = today.getMonth() + 1;
            if (month < 10) {
                month = "0" + month;
            }

            // `getFullYear()` devuelve el año completo
            var year = today.getFullYear();

            // muestra la fecha de hoy en formato `MM/DD/YYYY`
            return `${year}-${month}-${day}`;
        },
    },
};
</script>

<style>
.detalle_empresas tbody tr td {
    padding: 0px;
    vertical-align: middle;
}

.detalle_empresas tbody tr td:nth-child(1) {
    padding-left: 5px;
}

.contenedor_tabla {
    overflow: auto;
}

@media (max-width: 780px) {
    .tabla_responsive thead {
        display: none;
    }

    .tabla_responsive.table-striped tbody tr td,
    .tabla_responsive.table-bordered tbody tr td {
        display: block !important;
    }
    .tabla_responsive.table-striped tbody tr td:before,
    .tabla_responsive.table-bordered tbody tr td:before {
        content: attr(data-col);
        font-weight: bold;
    }

    .tabla_responsive.table-bordered tfoot tr td,
    .tabla_responsive.table-bordered tfoot tr th,
    .tabla_responsive.table-striped tfoot tr td,
    .tabla_responsive.table-striped tfoot tr th {
        display: block;
    }

    .tabla_responsive.table-bordered tfoot tr td.ocultar,
    .tabla_responsive.table-bordered tfoot tr th.ocultar,
    .tabla_responsive.table-striped tfoot tr td.ocultar,
    .tabla_responsive.table-striped tfoot tr th.ocultar {
        display: none !important;
    }

    .tabla_responsive.table-bordered tfoot tr td:before,
    .tabla_responsive.table-bordered tfoot tr th:before,
    .tabla_responsive.table-striped tfoot tr td:before,
    .tabla_responsive.table-striped tfoot tr th:before {
        content: attr(data-col);
        font-weight: bold;
    }
}
</style>
