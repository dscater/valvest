<template>
    <div class="content-wrapper content_finanzas">
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
                                            @click="abreModal('nuevo')"
                                        >
                                            <i class="fa fa-plus"></i>
                                            AÑADIR NUEVO
                                        </button>
                                    </div>
                                    <div class="col-md-12 contenedor_tabla">
                                        <table
                                            class="table table-bordered table-striped"
                                        >
                                            <thead>
                                                <tr>
                                                    <th width="240px"></th>
                                                    <th
                                                        v-for="(
                                                            item, index
                                                        ) in oEmpresa.finanzas"
                                                        class="text-center"
                                                        :class="[
                                                            item.gestion ==
                                                            getAnioActual()
                                                                ? 'bg-primary'
                                                                : '',
                                                        ]"
                                                    >
                                                        <span
                                                            v-if="
                                                                item.gestion <
                                                                getAnioActual()
                                                            "
                                                            >AÑO PASADO</span
                                                        >
                                                        <span
                                                            v-if="
                                                                item.gestion >
                                                                getAnioActual()
                                                            "
                                                            >PREDICCIÓN</span
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
                                                        v-for="(
                                                            item, index
                                                        ) in oEmpresa.finanzas"
                                                    >
                                                        <div
                                                            class="input-group"
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
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                @change="
                                                                    actualizaColumna(
                                                                        'ganancia',
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                            />
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'ganancia_enviando',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-spinner fa-spin"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'ganancia_enviado',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-check text-success"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        COSTO DE LOS BIENES
                                                        VENDIDOS*
                                                    </td>

                                                    <td
                                                        v-for="(
                                                            item, index
                                                        ) in oEmpresa.finanzas"
                                                    >
                                                        <div
                                                            class="input-group"
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
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                @change="
                                                                    actualizaColumna(
                                                                        'costo_bienes_vendidos',
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                            />
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'costo_bienes_vendidos_enviando',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-spinner fa-spin"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'costo_bienes_vendidos_enviado',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-check text-success"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                        </div>
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
                                                        v-for="(
                                                            item, index
                                                        ) in oEmpresa.finanzas"
                                                    >
                                                        <div
                                                            class="input-group"
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
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                @change="
                                                                    actualizaColumna(
                                                                        'salarios',
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                            />
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'salarios_enviando',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-spinner fa-spin"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'salarios_enviado',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-check text-success"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                        </div>
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
                                                        v-for="(
                                                            item, index
                                                        ) in oEmpresa.finanzas"
                                                    >
                                                        <div
                                                            class="input-group"
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
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                @change="
                                                                    actualizaColumna(
                                                                        'otros_gastos_operativos',
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                            />
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'otros_gastos_operativos_enviando',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-spinner fa-spin"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'otros_gastos_operativos_enviado',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-check text-success"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="fila_automatica">
                                                    <td class="text-xs">
                                                        EBITDA
                                                    </td>

                                                    <td
                                                        v-for="(
                                                            item, index
                                                        ) in oEmpresa.finanzas"
                                                    >
                                                        <div
                                                            class="input-group"
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
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                @change="
                                                                    actualizaColumna(
                                                                        'ebitda',
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                :readonly="
                                                                    index > 0
                                                                "
                                                            />
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'ebitda_enviando',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-spinner fa-spin"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'ebitda_enviado',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-check text-success"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">D&A</td>

                                                    <td
                                                        v-for="(
                                                            item, index
                                                        ) in oEmpresa.finanzas"
                                                    >
                                                        <div
                                                            class="input-group"
                                                        >
                                                            <input
                                                                type="number"
                                                                class="form-control"
                                                                v-model="
                                                                    item.da
                                                                "
                                                                @keyup="
                                                                    actualizaColumna(
                                                                        'da',
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                @change="
                                                                    actualizaColumna(
                                                                        'da',
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                            />
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'da_enviando',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-spinner fa-spin"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'da_enviado',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-check text-success"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="fila_automatica">
                                                    <td class="text-xs">
                                                        EBIT
                                                    </td>

                                                    <td
                                                        v-for="(
                                                            item, index
                                                        ) in oEmpresa.finanzas"
                                                    >
                                                        <div
                                                            class="input-group"
                                                        >
                                                            <input
                                                                type="number"
                                                                class="form-control"
                                                                v-model="
                                                                    item.ebit
                                                                "
                                                                @keyup="
                                                                    actualizaColumna(
                                                                        'ebit',
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                @change="
                                                                    actualizaColumna(
                                                                        'ebit',
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                :readonly="
                                                                    index > 0
                                                                "
                                                            />
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'ebit_enviando',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-spinner fa-spin"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'ebit_enviado',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-check text-success"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        INTERÉS
                                                    </td>

                                                    <td
                                                        v-for="(
                                                            item, index
                                                        ) in oEmpresa.finanzas"
                                                    >
                                                        <div
                                                            class="input-group"
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
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                @change="
                                                                    actualizaColumna(
                                                                        'interes',
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                            />
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'interes_enviando',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-spinner fa-spin"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'interes_enviado',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-check text-success"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        IMPUESTOS
                                                    </td>

                                                    <td
                                                        v-for="(
                                                            item, index
                                                        ) in oEmpresa.finanzas"
                                                    >
                                                        <div
                                                            class="input-group"
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
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                @change="
                                                                    actualizaColumna(
                                                                        'impuestos',
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                            />
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'impuestos_enviando',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-spinner fa-spin"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'impuestos_enviado',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-check text-success"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="fila_automatica">
                                                    <td class="text-xs">
                                                        BENEFICIO NETO
                                                    </td>

                                                    <td
                                                        v-for="(
                                                            item, index
                                                        ) in oEmpresa.finanzas"
                                                    >
                                                        <div
                                                            class="input-group"
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
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                @change="
                                                                    actualizaColumna(
                                                                        'beneficio_neto',
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                :readonly="
                                                                    index > 0
                                                                "
                                                            />
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'beneficio_neto_enviando',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-spinner fa-spin"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'beneficio_neto_enviado',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-check text-success"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        CUENTAS POR COBRAR
                                                    </td>

                                                    <td
                                                        v-for="(
                                                            item, index
                                                        ) in oEmpresa.finanzas"
                                                    >
                                                        <div
                                                            class="input-group"
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
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                @change="
                                                                    actualizaColumna(
                                                                        'cuentas_cobrar',
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                            />
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'cuentas_cobrar_enviando',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-spinner fa-spin"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'cuentas_cobrar_enviado',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-check text-success"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        INVENTARIO
                                                    </td>

                                                    <td
                                                        v-for="(
                                                            item, index
                                                        ) in oEmpresa.finanzas"
                                                    >
                                                        <div
                                                            class="input-group"
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
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                @change="
                                                                    actualizaColumna(
                                                                        'inventario',
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                            />
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'inventario_enviando',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-spinner fa-spin"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'inventario_enviado',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-check text-success"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        CUENTAS POR PAGAR
                                                    </td>

                                                    <td
                                                        v-for="(
                                                            item, index
                                                        ) in oEmpresa.finanzas"
                                                    >
                                                        <div
                                                            class="input-group"
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
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                @change="
                                                                    actualizaColumna(
                                                                        'cuentas_pagar',
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                            />
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'cuentas_pagar_enviando',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-spinner fa-spin"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'cuentas_pagar_enviado',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-check text-success"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="fila_automatica">
                                                    <td class="text-xs">
                                                        CAPITAL DE TRABAJO
                                                    </td>

                                                    <td
                                                        v-for="(
                                                            item, index
                                                        ) in oEmpresa.finanzas"
                                                    >
                                                        <div
                                                            class="input-group"
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
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                @change="
                                                                    actualizaColumna(
                                                                        'capital_trabajo',
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                :readonly="
                                                                    index > 0
                                                                "
                                                            />
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'capital_trabajo_enviando',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-spinner fa-spin"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'capital_trabajo_enviado',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-check text-success"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="fila_automatica">
                                                    <td class="text-xs">
                                                        CAMBIO EN EL CAPITAL DE
                                                        TRABAJO
                                                    </td>

                                                    <td
                                                        v-for="(
                                                            item, index
                                                        ) in oEmpresa.finanzas"
                                                    >
                                                        <div
                                                            class="input-group"
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
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                @change="
                                                                    actualizaColumna(
                                                                        'cambio_capital_trabajo',
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                :readonly="
                                                                    index > 0
                                                                "
                                                            />
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'cambio_capital_trabajo_enviando',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-spinner fa-spin"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'cambio_capital_trabajo_enviado',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-check text-success"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        LOS GASTOS DE CAPITAL
                                                    </td>

                                                    <td
                                                        v-for="(
                                                            item, index
                                                        ) in oEmpresa.finanzas"
                                                    >
                                                        <div
                                                            class="input-group"
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
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                @change="
                                                                    actualizaColumna(
                                                                        'gastos_capital',
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                            />
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'gastos_capital_enviando',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-spinner fa-spin"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'gastos_capital_enviado',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-check text-success"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="text-xs">
                                                        DEUDA AL FINAL DEL AÑO
                                                    </td>

                                                    <td
                                                        v-for="(
                                                            item, index
                                                        ) in oEmpresa.finanzas"
                                                    >
                                                        <div
                                                            class="input-group"
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
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                @change="
                                                                    actualizaColumna(
                                                                        'deuda_final_anio',
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                            />
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'deuda_final_anio_enviando',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-spinner fa-spin"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'deuda_final_anio_enviado',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-check text-success"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="fila_automatica">
                                                    <td class="text-xs">
                                                        CAMBIO EN LA DEUDA
                                                        PENDIENTE
                                                    </td>

                                                    <td
                                                        v-for="(
                                                            item, index
                                                        ) in oEmpresa.finanzas"
                                                    >
                                                        <div
                                                            class="input-group"
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
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                @change="
                                                                    actualizaColumna(
                                                                        'cambio_deuda_pendiente',
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                :readonly="
                                                                    index > 0
                                                                "
                                                            />
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'cambio_deuda_pendiente_enviando',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-spinner fa-spin"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'cambio_deuda_pendiente_enviado',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-check text-success"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="fila_automatica">
                                                    <td class="text-xs">
                                                        FLUJO DE CAJA LIBRE A
                                                        CAPITAL
                                                    </td>

                                                    <td
                                                        v-for="(
                                                            item, index
                                                        ) in oEmpresa.finanzas"
                                                    >
                                                        <div
                                                            class="input-group"
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
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                @change="
                                                                    actualizaColumna(
                                                                        'flujo_caja_libre_capital',
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                :readonly="
                                                                    index > 0
                                                                "
                                                            />
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'flujo_caja_libre_capital_enviando',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-spinner fa-spin"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'flujo_caja_libre_capital_enviado',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-check text-success"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                        </div>
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
                                                        v-for="(
                                                            item, index
                                                        ) in oEmpresa.finanzas"
                                                    >
                                                        <div
                                                            class="input-group"
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
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                @change="
                                                                    actualizaColumna(
                                                                        'recaudacion_fondos_futura',
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                            />
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'recaudacion_fondos_futura_enviando',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-spinner fa-spin"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'recaudacion_fondos_futura_enviado',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-check text-success"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr class="fila_automatica">
                                                    <td class="text-xs">
                                                        FLUJO DE CAJA LIBRE
                                                    </td>

                                                    <td
                                                        v-for="(
                                                            item, index
                                                        ) in oEmpresa.finanzas"
                                                    >
                                                        <div
                                                            class="input-group"
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
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                @change="
                                                                    actualizaColumna(
                                                                        'flujo_caja_libre',
                                                                        index,
                                                                        item.id
                                                                    )
                                                                "
                                                                :readonly="
                                                                    index > 0
                                                                "
                                                            />
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'flujo_caja_libre_enviando',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-spinner fa-spin"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                            <div
                                                                class="input-group-append oculto"
                                                                :ref="
                                                                    refName(
                                                                        'flujo_caja_libre_enviado',
                                                                        index
                                                                    )
                                                                "
                                                            >
                                                                <span
                                                                    class="input-group-text"
                                                                    ><i
                                                                        class="fa fa-check text-success"
                                                                    ></i
                                                                ></span>
                                                            </div>
                                                        </div>
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
                                    <div
                                        class="col-md-12 mt-2"
                                        v-if="oEmpresa.finanzas.length > 0"
                                    >
                                        <router-link
                                            :to="{
                                                name: 'empresas.valoracion',
                                                params: {
                                                    id: this.oEmpresa.id,
                                                },
                                            }"
                                            class="btn btn-primary btn-lg btn-block"
                                            ><i class="fa fa-chart-line"></i> Ir
                                            a valoración</router-link
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
            intervalActualizaColumna: {},
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
        refName(col, index) {
            return col + index;
        },
        actualizaColumna(col, index, id) {
            let columna_actual = col + index;
            clearInterval(this.intervalActualizaColumna[columna_actual]);
            // MOSTRAR CARGNADO
            const nom_enviando_ref = this.refName(col + "_enviando", index);
            const nom_enviado_ref = this.refName(col + "_enviado", index);
            this.$refs[nom_enviando_ref][0].classList.remove("oculto");
            this.$refs[nom_enviado_ref][0].classList.add("oculto");
            // FIN MOSTRAR CARGANDO
            this.intervalActualizaColumna[columna_actual] = setTimeout(() => {
                let valor = this.oEmpresa.finanzas[index][col];
                axios
                    .post("/admin/finanzas/actualizaColumna/" + id, {
                        _method: "PUT",
                        col: col,
                        valor: valor,
                    })
                    .then((response) => {
                        // actualizar valores
                        this.oEmpresa.finanzas[index]["ebitda"] =
                            response.data.finanza.ebitda;
                        this.oEmpresa.finanzas[index]["ebit"] =
                            response.data.finanza.ebit;
                        this.oEmpresa.finanzas[index]["beneficio_neto"] =
                            response.data.finanza.beneficio_neto;
                        this.oEmpresa.finanzas[index]["capital_trabajo"] =
                            response.data.finanza.capital_trabajo;
                        this.oEmpresa.finanzas[index][
                            "cambio_capital_trabajo"
                        ] = response.data.finanza.cambio_capital_trabajo;
                        this.oEmpresa.finanzas[index][
                            "cambio_deuda_pendiente"
                        ] = response.data.finanza.cambio_deuda_pendiente;
                        this.oEmpresa.finanzas[index][
                            "flujo_caja_libre_capital"
                        ] = response.data.finanza.flujo_caja_libre_capital;
                        this.oEmpresa.finanzas[index]["flujo_caja_libre"] =
                            response.data.finanza.flujo_caja_libre;

                        // MOSTRAR ENVIO CORRECTO
                        this.$refs[nom_enviado_ref][0].classList.remove(
                            "oculto"
                        );
                        this.$refs[nom_enviando_ref][0].classList.add("oculto");
                        let self = this;
                        setTimeout(function () {
                            self.$refs[nom_enviado_ref][0].classList.add(
                                "oculto"
                            );
                        }, 1500);
                        // FIN MOSTRAR ENVIO CORRECTO
                    })
                    .catch((error) => {
                        this.$refs[nom_enviando_ref][0].classList.add("oculto");
                        this.$refs[nom_enviado_ref][0].classList.add("oculto");
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
            }, 800);
        },
    },
};
</script>
<style>
.content_finanzas tr td {
    padding: 2px;
    vertical-align: middle;
    min-width: 200px;
}

.content_finanzas tr td input {
    font-size: 0.95em;
    padding: 5px;
}

.content_finanzas tr.fila_automatica td input {
    background: rgb(153, 255, 216) !important;
}
.content_finanzas tr.fila_automatica {
    background: rgb(153, 255, 216) !important;
}

.content_finanzas .oculto {
    display: none;
}

.content_finanzas .contenedor_tabla {
    overflow: auto !important;
}
</style>
