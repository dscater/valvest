<template>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Empresas</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-3">
                                        <router-link
                                            v-if="
                                                permisos.includes(
                                                    'empresas.create'
                                                )
                                            "
                                            class="btn btn-primary btn-flat btn-block"
                                            :to="{
                                                name: 'empresas.create',
                                            }"
                                        >
                                            <i class="fa fa-plus"></i>
                                            Nuevo
                                        </router-link>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <b-col lg="10" class="my-1">
                                        <b-form-group
                                            label="Buscar"
                                            label-for="filter-input"
                                            label-cols-sm="3"
                                            label-align-sm="right"
                                            label-size="sm"
                                            class="mb-0"
                                        >
                                            <b-input-group size="sm">
                                                <b-form-input
                                                    id="filter-input"
                                                    v-model="filter"
                                                    type="search"
                                                    placeholder="Buscar"
                                                ></b-form-input>

                                                <b-input-group-append>
                                                    <b-button
                                                        class="bg-lightblue"
                                                        variant="primary"
                                                        :disabled="!filter"
                                                        @click="filter = ''"
                                                        >Borrar</b-button
                                                    >
                                                </b-input-group-append>
                                            </b-input-group>
                                        </b-form-group>
                                    </b-col>
                                    <div class="col-md-12">
                                        <b-overlay
                                            :show="showOverlay"
                                            rounded="sm"
                                        >
                                            <b-table
                                                :fields="fields"
                                                :items="listRegistros"
                                                show-empty
                                                stacked="md"
                                                responsive
                                                :current-page="currentPage"
                                                :per-page="perPage"
                                                @filtered="onFiltered"
                                                empty-text="Sin resultados"
                                                empty-filtered-text="Sin resultados"
                                                :filter="filter"
                                            >
                                                <template #cell(mas)="row">
                                                    <b-button
                                                        variant="primary"
                                                        size="sm"
                                                        @click="
                                                            row.toggleDetails
                                                        "
                                                    >
                                                        {{
                                                            row.detailsShowing
                                                                ? "Ocultar"
                                                                : "Mostrar"
                                                        }}
                                                        Detalles
                                                    </b-button>
                                                </template>

                                                <template #row-details="row">
                                                    <b-card>
                                                        <b-row class="mb-2">
                                                            <b-col
                                                                cols="12"
                                                                class="text-sm"
                                                            >
                                                                <table
                                                                    class="table w-100 table-bordered"
                                                                >
                                                                    <thead>
                                                                        <tr>
                                                                            <th width="10px">
                                                                                Nro.
                                                                            </th>
                                                                            <th>
                                                                                Nombre
                                                                                Accionista
                                                                            </th>
                                                                            <th>
                                                                                Porcentaje
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr
                                                                            v-for="(
                                                                                item,
                                                                                index
                                                                            ) in row
                                                                                .item
                                                                                .accionistas"
                                                                        >
                                                                            <td>
                                                                                {{
                                                                                    index +
                                                                                    1
                                                                                }}
                                                                            </td>
                                                                            <td>
                                                                                {{
                                                                                    item.nombre
                                                                                }}
                                                                            </td>
                                                                            <td>
                                                                                {{
                                                                                    item.porcentaje
                                                                                }}
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </b-col>
                                                            <b-col
                                                                cols="12"
                                                                class="text-sm"
                                                            >
                                                                <table
                                                                    class="table w-100 table-bordered"
                                                                >
                                                                    <thead>
                                                                        <tr>
                                                                            <th width="10px">
                                                                                Nro.
                                                                            </th>
                                                                            <th>
                                                                                Nombre
                                                                                Empresa
                                                                            </th>
                                                                            <th>
                                                                                URL
                                                                                Web
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr
                                                                            v-for="(
                                                                                item,
                                                                                index
                                                                            ) in row
                                                                                .item
                                                                                .competidores"
                                                                        >
                                                                            <td>
                                                                                {{
                                                                                    index +
                                                                                    1
                                                                                }}
                                                                            </td>
                                                                            <td>
                                                                                {{
                                                                                    item.nombre
                                                                                }}
                                                                            </td>
                                                                            <td>
                                                                                {{
                                                                                    item.web
                                                                                }}
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </b-col>
                                                        </b-row>

                                                        <b-button
                                                            size="sm"
                                                            variant="primary"
                                                            @click="
                                                                row.toggleDetails
                                                            "
                                                            >Ocultar</b-button
                                                        >
                                                    </b-card>
                                                </template>

                                                <template
                                                    #cell(fecha_registro)="row"
                                                >
                                                    {{
                                                        formatoFecha(
                                                            row.item
                                                                .fecha_registro
                                                        )
                                                    }}
                                                </template>

                                                <template #cell(accion)="row">
                                                    <div
                                                        class="row justify-content-center flex-column"
                                                    >
                                                        <b-button
                                                            size="sm"
                                                            pill
                                                            variant="outline-warning"
                                                            class="btn-flat mb-1"
                                                            title="Editar registro"
                                                            @click="
                                                                editarRegistro(
                                                                    row.item
                                                                )
                                                            "
                                                        >
                                                            <i
                                                                class="fa fa-edit"
                                                            ></i>
                                                        </b-button>

                                                        <b-button
                                                            v-if="
                                                                permisos.includes(
                                                                    'empresas.destroy'
                                                                )
                                                            "
                                                            size="sm"
                                                            pill
                                                            variant="outline-danger"
                                                            class="btn-flat"
                                                            title="Eliminar registro"
                                                            @click="
                                                                eliminaEmpresa(
                                                                    row.item.id,
                                                                    row.item
                                                                        .cliente
                                                                        .nombre +
                                                                        ' <br/>Con fecha ' +
                                                                        formatoFecha(
                                                                            row
                                                                                .item
                                                                                .fecha_registro
                                                                        )
                                                                )
                                                            "
                                                        >
                                                            <i
                                                                class="fa fa-trash"
                                                            ></i>
                                                        </b-button>
                                                    </div>
                                                </template>
                                            </b-table>
                                        </b-overlay>
                                        <div class="row">
                                            <b-col
                                                sm="6"
                                                md="2"
                                                class="ml-auto my-1"
                                            >
                                                <b-form-select
                                                    align="right"
                                                    id="per-page-select"
                                                    v-model="perPage"
                                                    :options="pageOptions"
                                                    size="sm"
                                                ></b-form-select>
                                            </b-col>
                                            <b-col
                                                sm="6"
                                                md="2"
                                                class="my-1 mr-auto"
                                                v-if="perPage"
                                            >
                                                <b-pagination
                                                    v-model="currentPage"
                                                    :total-rows="totalRows"
                                                    :per-page="perPage"
                                                    align="left"
                                                ></b-pagination>
                                            </b-col>
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
            permisos: localStorage.getItem("permisos"),
            search: "",
            listRegistros: [],
            showOverlay: false,
            fields: [
                {
                    key: "id",
                    label: "Nro.",
                    sortable: true,
                },
                {
                    key: "nombre",
                    label: "Nombre",
                    sortable: true,
                },
                {
                    key: "descripcion_actividad",
                    label: "Descripción actividad",
                    sortable: true,
                },
                { key: "web", label: "Sitio Web", sortable: true },
                { key: "correo", label: "Correo electrónico", sortable: true },
                { key: "dir", label: "Dirección", sortable: true },
                { key: "mas", label: "Ver mas" },
                {
                    key: "fecha_registro",
                    label: "Fecha de registro",
                    sortable: true,
                },
                { key: "accion", label: "Acción" },
            ],
            loading: true,
            fullscreenLoading: true,
            loadingWindow: Loading.service({
                fullscreen: this.fullscreenLoading,
            }),
            currentPage: 1,
            perPage: 5,
            pageOptions: [
                { value: 5, text: "Mostrar 5 Registros" },
                { value: 10, text: "Mostrar 10 Registros" },
                { value: 25, text: "Mostrar 25 Registros" },
                { value: 50, text: "Mostrar 50 Registros" },
                { value: 100, text: "Mostrar 100 Registros" },
                { value: this.totalRows, text: "Mostrar Todo" },
            ],
            totalRows: 10,
            filter: null,
        };
    },
    mounted() {
        this.loadingWindow.close();
        this.getEmpresas();
    },
    methods: {
        // Seleccionar Opciones de Tabla
        editarRegistro(item) {
            this.$router.push({
                name: "empresas.edit",
                params: {
                    id: item.id,
                },
            });
        },

        // Listar Empresas
        getEmpresas() {
            this.showOverlay = true;
            this.muestra_modal = false;
            let url = "/admin/empresas";
            if (this.pagina != 0) {
                url += "?page=" + this.pagina;
            }
            axios
                .get(url, {
                    params: { per_page: this.per_page },
                })
                .then((res) => {
                    this.showOverlay = false;
                    this.listRegistros = res.data.empresas;
                    this.totalRows = res.data.total;
                });
        },
        eliminaEmpresa(id, descripcion) {
            Swal.fire({
                title: "¿Quierés eliminar este registro?",
                html: `<strong>${descripcion}</strong>`,
                showCancelButton: true,
                confirmButtonColor: "#149FDA",
                confirmButtonText: "Si, eliminar",
                cancelButtonText: "No, cancelar",
                denyButtonText: `No, cancelar`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    axios
                        .post("/admin/empresas/" + id, {
                            _method: "DELETE",
                        })
                        .then((res) => {
                            this.getEmpresas();
                            this.filter = "";
                            Swal.fire({
                                icon: "success",
                                title: res.data.msj,
                                showConfirmButton: false,
                                timer: 1500,
                            });
                        })
                        .catch((error) => {
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
                }
            });
        },
        onFiltered(filteredItems) {
            // Trigger pagination to update the number of buttons/pages due to filtering
            this.totalRows = filteredItems.length;
            this.currentPage = 1;
        },
        formatoFecha(date) {
            return this.$moment(String(date)).format("DD/MM/YYYY");
        },
        generaReporte(id) {
            let config = {
                responseType: "blob",
            };
            axios
                .post("/admin/empresas/pdf/" + id, null, config)
                .then((res) => {
                    this.errors = [];
                    this.enviando = false;
                    let pdfBlob = new Blob([res.data], {
                        type: "application/pdf",
                    });
                    let urlReporte = URL.createObjectURL(pdfBlob);
                    window.open(urlReporte);
                })
                .catch(async (error) => {
                    let responseObj = await error.response.data.text();
                    responseObj = JSON.parse(responseObj);
                    this.enviando = false;
                    if (error.response) {
                        if (error.response.status == 422)
                            this.errors = responseObj.errors;
                    }
                });
        },
    },
};
</script>

<style></style>
