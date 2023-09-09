<template>
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Empresas - <span>Cuestionario</span></h1>
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
                                <div
                                    class="row"
                                    v-show="
                                        listRespuestas[19] !== undefined &&
                                        listRespuestas[19][0] !== undefined &&
                                        listRespuestas[19][1] !== undefined
                                    "
                                >
                                    <!-- EQUIPO -->
                                    <h4 class="font-weight-bold">EQUIPO</h4>
                                    <!-- 1 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >1. ¿Cuántos fundadores tiene la
                                            empresa?</label
                                        >
                                        <input
                                            type="number"
                                            class="form-control"
                                            v-model="listRespuestas[0]"
                                        />
                                    </div>
                                    <!-- 2 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >2. ¿Cuánto invirtieron los
                                            fundadores en la empresa en términos
                                            de capital colectivo hasta el
                                            momento?</label
                                        >
                                        <input
                                            type="number"
                                            class="form-control"
                                            v-model="listRespuestas[1]"
                                        />
                                    </div>
                                    <!-- 3 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >3. ¿La mayoría de los fundadores
                                            están involucrados en otras empresas
                                            u ocupaciones?</label
                                        >
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[2]"
                                                name="r3"
                                                value="0"
                                                id="r3_1"
                                            />
                                            <label
                                                for="r3_1"
                                                class="custom-control-label"
                                                >Sí, vemos a la empresa como un
                                                proyecto paralelo a nuestra
                                                ocupación actual</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[2]"
                                                name="r3"
                                                value="1"
                                                id="r3_2"
                                            />
                                            <label
                                                for="r3_2"
                                                class="custom-control-label"
                                                >Sí, pero estamos comprometidos
                                                a tiempo parcial de forma
                                                continua</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[2]"
                                                name="r3"
                                                value="2"
                                                id="r3_3"
                                            />
                                            <label
                                                for="r3_3"
                                                class="custom-control-label"
                                                >Sí, pero estamos comprometidos
                                                a tiempo parcial de manera
                                                continua y planeamos
                                                comprometernos a tiempo completo
                                                una vez que la estructura
                                                organizativa de la empresa esté
                                                en pleno funcionamiento</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[2]"
                                                name="r3"
                                                value="3"
                                                id="r3_4"
                                            />
                                            <label
                                                for="r3_4"
                                                class="custom-control-label"
                                                >No, estamos comprometidos a
                                                tiempo completo</label
                                            >
                                        </div>
                                    </div>
                                    <!-- 4 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >4. ¿Cuál es la edad promedio de los
                                            fundadores?</label
                                        >
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[3]"
                                                name="r4"
                                                value="0"
                                                id="r4_1"
                                            />
                                            <label
                                                for="r4_1"
                                                class="custom-control-label"
                                                v-text="'<25'"
                                            ></label>
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[3]"
                                                name="r4"
                                                value="1"
                                                id="r4_2"
                                            />
                                            <label
                                                for="r4_2"
                                                class="custom-control-label"
                                                >25-34</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[3]"
                                                name="r4"
                                                value="2"
                                                id="r4_3"
                                            />
                                            <label
                                                for="r4_3"
                                                class="custom-control-label"
                                                >35-45</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[3]"
                                                name="r4"
                                                value="3"
                                                id="r4_4"
                                            />
                                            <label
                                                for="r4_4"
                                                class="custom-control-label"
                                                v-text="'>45'"
                                            ></label>
                                        </div>
                                    </div>
                                    <!-- 5 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >5. ¿Alguno de los fundadores tiene
                                            experiencia empresarial
                                            previa?</label
                                        >
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[4]"
                                                name="r5"
                                                value="0"
                                                id="r5_1"
                                            />
                                            <label
                                                for="r5_1"
                                                class="custom-control-label"
                                                >Esta es la primera experiencia
                                                empresarial para todos
                                                nosotros</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[4]"
                                                name="r5"
                                                value="1"
                                                id="r5_2"
                                            />
                                            <label
                                                for="r5_2"
                                                class="custom-control-label"
                                                >Sí, al menos uno de nosotros
                                                fundó una empresa
                                                anteriormente</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[4]"
                                                name="r5"
                                                value="2"
                                                id="r5_3"
                                            />
                                            <label
                                                for="r5_3"
                                                class="custom-control-label"
                                                >Sí, y al menos uno de nosotros
                                                vendió con éxito una
                                                empresa</label
                                            >
                                        </div>
                                    </div>
                                    <!-- 6 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >6. ¿Cuántos empleados trabajan para
                                            la empresa? (excluyendo fundadores,
                                            pasantes y autónomos)</label
                                        >
                                        <input
                                            type="number"
                                            class="form-control"
                                            v-model="listRespuestas[5]"
                                        />
                                    </div>
                                    <!-- 7 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >7. ¿Cuánto tiempo han trabajado (o
                                            estudiado) juntos los miembros del
                                            equipo central?</label
                                        >
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[6]"
                                                name="r7"
                                                value="0"
                                                id="r7_1"
                                            />
                                            <label
                                                for="r7_1"
                                                class="custom-control-label"
                                                >Menos de 1 año</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[6]"
                                                name="r7"
                                                value="1"
                                                id="r7_2"
                                            />
                                            <label
                                                for="r7_2"
                                                class="custom-control-label"
                                                >Entre 1 y 2 años</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[6]"
                                                name="r7"
                                                value="2"
                                                id="r7_3"
                                            />
                                            <label
                                                for="r7_3"
                                                class="custom-control-label"
                                                >Entre 3 y 5 años</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[6]"
                                                name="r7"
                                                value="3"
                                                id="r7_4"
                                            />
                                            <label
                                                for="r7_4"
                                                class="custom-control-label"
                                                >Mas de 5 años</label
                                            >
                                        </div>
                                    </div>
                                    <!-- 8 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >8. ¿Cuántos años de experiencia
                                            relevante en la industria tiene el
                                            equipo central en conjunto?</label
                                        >
                                        <input
                                            type="number"
                                            class="form-control"
                                            v-model="listRespuestas[7]"
                                        />
                                    </div>
                                    <!-- 9 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >9. ¿Algún miembro del equipo
                                            central tiene antecedentes
                                            comerciales y gerenciales?</label
                                        >
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[8]"
                                                name="r9"
                                                value="0"
                                                id="r9_1"
                                            />
                                            <label
                                                for="r9_1"
                                                class="custom-control-label"
                                                >No</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[8]"
                                                name="r9"
                                                value="1"
                                                id="r9_2"
                                            />
                                            <label
                                                for="r9_2"
                                                class="custom-control-label"
                                                >Al menos uno de nosotros ha
                                                realizado estudios relacionados
                                                con los negocios</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[8]"
                                                name="r9"
                                                value="2"
                                                id="r9_3"
                                            />
                                            <label
                                                for="r9_3"
                                                class="custom-control-label"
                                                >Al menos uno de nosotros tiene
                                                experiencia laboral</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[8]"
                                                name="r9"
                                                value="3"
                                                id="r9_4"
                                            />
                                            <label
                                                for="r9_4"
                                                class="custom-control-label"
                                                >Al menos uno de nosotros ha
                                                sido empleado como gerente de
                                                nivel medio (por ejemplo,
                                                gerente de producto, gerente de
                                                ventas)</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[8]"
                                                name="r9"
                                                value="4"
                                                id="r9_5"
                                            />
                                            <label
                                                for="r9_5"
                                                class="custom-control-label"
                                                >Al menos uno de nosotros ha
                                                sido empleado como gerente de
                                                primer nivel (vicepresidente y
                                                puestos superiores) o ha ocupado
                                                un puesto similar en su propia
                                                empresa que tenía más de 50
                                                empleados</label
                                            >
                                        </div>
                                    </div>
                                    <!-- 10 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >10. ¿El equipo central tiene todas
                                            las habilidades técnicas
                                            principales? (por ejemplo,
                                            desarrollo web para servicios en
                                            línea)</label
                                        >
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[9]"
                                                name="r10"
                                                value="0"
                                                id="r10_1"
                                            />
                                            <label
                                                for="r10_1"
                                                class="custom-control-label"
                                                >No</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[9]"
                                                name="r10"
                                                value="1"
                                                id="r10_2"
                                            />
                                            <label
                                                for="r10_2"
                                                class="custom-control-label"
                                                >No, pero los subcontratamos a
                                                todos</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[9]"
                                                name="r10"
                                                value="2"
                                                id="r10_3"
                                            />
                                            <label
                                                for="r10_3"
                                                class="custom-control-label"
                                                >Tenemos algunas de las
                                                capacidades técnicas y
                                                subcontratamos el resto</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[9]"
                                                name="r10"
                                                value="3"
                                                id="r10_4"
                                            />
                                            <label
                                                for="r10_4"
                                                class="custom-control-label"
                                                >Tenemos la mayoría de las
                                                capacidades técnicas y
                                                subcontratamos el resto</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[9]"
                                                name="r10"
                                                value="4"
                                                id="r10_5"
                                            />
                                            <label
                                                for="r10_5"
                                                class="custom-control-label"
                                                >Sí</label
                                            >
                                        </div>
                                    </div>
                                    <!-- MODELO DE NEGOCIO -->
                                    <h4 class="font-weight-bold">
                                        MODELO DE NEGOCIO
                                    </h4>
                                    <!-- 11 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >11. ¿Es el negocio
                                            escalable?</label
                                        >
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[10]"
                                                name="r11"
                                                value="0"
                                                id="r11_1"
                                            />
                                            <label
                                                for="r11_1"
                                                class="custom-control-label"
                                                >Si</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[10]"
                                                name="r11"
                                                value="1"
                                                id="r11_2"
                                            />
                                            <label
                                                for="r11_2"
                                                class="custom-control-label"
                                                >No</label
                                            >
                                        </div>
                                    </div>
                                    <!-- 12 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >12. El principal modelo de negocio
                                            de la empresa es:</label
                                        >
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[11]"
                                                name="r12"
                                                value="0"
                                                id="r12_1"
                                            />
                                            <label
                                                for="r12_1"
                                                class="custom-control-label"
                                                >Negocio a Clientes</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[11]"
                                                name="r12"
                                                value="1"
                                                id="r12_2"
                                            />
                                            <label
                                                for="r12_2"
                                                class="custom-control-label"
                                                >Empresa a Empresa</label
                                            >
                                        </div>
                                    </div>
                                    <!-- 13 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >13. El principal modelo de negocio
                                            de la empresa es:</label
                                        >
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[12]"
                                                name="r13"
                                                value="0"
                                                id="r13_1"
                                            />
                                            <label
                                                for="r13_1"
                                                class="custom-control-label"
                                                >Etapa de idea : trabajando en
                                                el plan de negocios y probando
                                                los supuestos iniciales de
                                                solución de problemas</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[12]"
                                                name="r13"
                                                value="1"
                                                id="r13_2"
                                            />
                                            <label
                                                for="r13_2"
                                                class="custom-control-label"
                                                >Etapa de desarrollo :
                                                construcción del producto y
                                                establecimiento de
                                                operaciones</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[12]"
                                                name="r13"
                                                value="2"
                                                id="r13_3"
                                            />
                                            <label
                                                for="r13_3"
                                                class="custom-control-label"
                                                >Etapa de inicio : activo con
                                                ingresos anuales de hasta $
                                                200000</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[12]"
                                                name="r13"
                                                value="3"
                                                id="r13_4"
                                            />
                                            <label
                                                for="r13_4"
                                                class="custom-control-label"
                                                >Etapa de expansión :
                                                operaciones de escalado, con
                                                ingresos anuales superiores a $
                                                200000</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[12]"
                                                name="r13"
                                                value="4"
                                                id="r13_5"
                                            />
                                            <label
                                                for="r13_5"
                                                class="custom-control-label"
                                                >Etapa de crecimiento : un
                                                negocio considerable con un
                                                crecimiento sólido, probado y
                                                repetible</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[12]"
                                                name="r13"
                                                value="5"
                                                id="r13_6"
                                            />
                                            <label
                                                for="r13_6"
                                                class="custom-control-label"
                                                >Etapa de madurez : un negocio
                                                rentable con un crecimiento
                                                predecible alineado con la
                                                industria</label
                                            >
                                        </div>
                                    </div>
                                    <!-- 14 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >14. ¿Es la empresa un punto de
                                            equilibrio sostenible?</label
                                        >
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[13]"
                                                name="r14"
                                                value="0"
                                                id="r14_1"
                                            />
                                            <label
                                                for="r14_1"
                                                class="custom-control-label"
                                                >Si</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[13]"
                                                name="r14"
                                                value="1"
                                                id="r14_2"
                                            />
                                            <label
                                                for="r14_2"
                                                class="custom-control-label"
                                                >No</label
                                            >
                                        </div>
                                    </div>
                                    <!-- 15 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >15. ¿La empresa cuenta con un
                                            consejo de asesores?</label
                                        >
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[14]"
                                                name="r15"
                                                value="0"
                                                id="r15_1"
                                            />
                                            <label
                                                for="r15_1"
                                                class="custom-control-label"
                                                >Si</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[14]"
                                                name="r15"
                                                value="1"
                                                id="r15_2"
                                            />
                                            <label
                                                for="r15_2"
                                                class="custom-control-label"
                                                >Podemos contar con asesores
                                                externos, pero aún no están
                                                organizados en un
                                                directorio</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[14]"
                                                name="r15"
                                                value="2"
                                                id="r15_3"
                                            />
                                            <label
                                                for="r15_3"
                                                class="custom-control-label"
                                                >No</label
                                            >
                                        </div>
                                    </div>
                                    <!-- 16 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >16. ¿Cuántos son los asesores? (Si
                                            eligió la respuesta anterior de
                                            asesores externos)</label
                                        >
                                        <input
                                            class="form-control"
                                            type="number"
                                            v-model="listRespuestas[15]"
                                        />
                                    </div>
                                    <!-- 17 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >17. Indique cuál, en su caso, de
                                            las siguientes entidades es
                                            accionista de la sociedad</label
                                        >
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[16]"
                                                name="r17"
                                                value="0"
                                                id="r17_1"
                                            />
                                            <label
                                                for="r17_1"
                                                class="custom-control-label"
                                                >Amigos y familia</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[16]"
                                                name="r17"
                                                value="1"
                                                id="r17_2"
                                            />
                                            <label
                                                for="r17_2"
                                                class="custom-control-label"
                                                >Recaudación de fondos</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[16]"
                                                name="r17"
                                                value="2"
                                                id="r17_3"
                                            />
                                            <label
                                                for="r17_3"
                                                class="custom-control-label"
                                                >Incubadora / aceleradora</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[16]"
                                                name="r17"
                                                value="3"
                                                id="r17_4"
                                            />
                                            <label
                                                for="r17_4"
                                                class="custom-control-label"
                                                >Ángel de negocios</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[16]"
                                                name="r17"
                                                value="4"
                                                id="r17_5"
                                            />
                                            <label
                                                for="r17_5"
                                                class="custom-control-label"
                                                >Capitalista de riesgo</label
                                            >
                                        </div>
                                    </div>
                                    <!-- 18 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >18. ¿La empresa ofrece valiosas
                                            estrategias de salida a los
                                            inversores?</label
                                        >
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[17]"
                                                name="r18"
                                                value="0"
                                                id="r18_1"
                                            />
                                            <label
                                                for="r18_1"
                                                class="custom-control-label"
                                                >No pensamos en estrategias de
                                                salida hasta ahora</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[17]"
                                                name="r18"
                                                value="1"
                                                id="r18_2"
                                            />
                                            <label
                                                for="r18_2"
                                                class="custom-control-label"
                                                >Consideramos algunas
                                                oportunidades de salida</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[17]"
                                                name="r18"
                                                value="2"
                                                id="r18_3"
                                            />
                                            <label
                                                for="r18_3"
                                                class="custom-control-label"
                                                >Tenemos múltiples oportunidades
                                                de salida</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[17]"
                                                name="r18"
                                                value="3"
                                                id="r18_4"
                                            />
                                            <label
                                                for="r18_4"
                                                class="custom-control-label"
                                                >Empresas activas en el mercado
                                                ya han demostrado interés en
                                                comprarnos</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[17]"
                                                name="r18"
                                                value="4"
                                                id="r18_5"
                                            />
                                            <label
                                                for="r18_5"
                                                class="custom-control-label"
                                                >Las grandes empresas
                                                demostraron un gran interés y
                                                voluntad de comprometerse con la
                                                adquisición.</label
                                            >
                                        </div>
                                    </div>
                                    <!-- PRODUCTO Y MERCADO -->
                                    <h4 class="font-weight-bold">
                                        PRODUCTO Y MERCADO
                                    </h4>
                                    <!-- 19 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >19. ¿En qué país tiene su sede la
                                            empresa?</label
                                        >
                                        <el-select
                                            class="w-100"
                                            v-model="listRespuestas[18]"
                                            filterable
                                        >
                                            <el-option
                                                v-for="item in listPaises"
                                                :key="item"
                                                :value="item"
                                                :label="item"
                                            >
                                            </el-option>
                                        </el-select>
                                    </div>
                                    <!-- 20 -->
                                    <div class="col-md-12 form-group">
                                        <label for="">20. Industria</label>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <el-select
                                                    class="w-100"
                                                    v-model="
                                                        listRespuestas[19][0]
                                                    "
                                                    filterable
                                                >
                                                    <el-option
                                                        v-for="(
                                                            item, index
                                                        ) in listado20_1"
                                                        :key="index"
                                                        :value="index"
                                                        :label="item"
                                                    >
                                                    </el-option>
                                                </el-select>
                                            </div>
                                            <div class="col-md-6">
                                                <el-select
                                                    class="w-100"
                                                    v-model="
                                                        listRespuestas[19][1]
                                                    "
                                                    filterable
                                                >
                                                    <el-option
                                                        v-for="(
                                                            item, index
                                                        ) in listado20_2[
                                                            listRespuestas[19][0]
                                                        ]"
                                                        :key="index"
                                                        :value="index"
                                                        :label="item"
                                                    >
                                                    </el-option>
                                                </el-select>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- 21 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >21. ¿Cómo definiría la etapa de
                                            despliegue del
                                            producto/servicio?</label
                                        >
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[20]"
                                                name="r21"
                                                value="0"
                                                id="r21_1"
                                            />
                                            <label
                                                for="r21_1"
                                                class="custom-control-label"
                                                >Planificación: el proceso de
                                                despliegue aún no ha
                                                comenzado</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[20]"
                                                name="r21"
                                                value="1"
                                                id="r21_2"
                                            />
                                            <label
                                                for="r21_2"
                                                class="custom-control-label"
                                                >Prototipo: tenemos la primera
                                                versión del producto (alfa o
                                                beta) para fines de
                                                prueba/exhibición, pero no está
                                                lista para el mercado</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[20]"
                                                name="r21"
                                                value="2"
                                                id="r21_3"
                                            />
                                            <label
                                                for="r21_3"
                                                class="custom-control-label"
                                                >MVP: tenemos un producto mínimo
                                                viable (con las características
                                                suficientes para satisfacer a
                                                los primeros clientes) lanzado
                                                al mercado</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[20]"
                                                name="r21"
                                                value="3"
                                                id="r21_4"
                                            />
                                            <label
                                                for="r21_4"
                                                class="custom-control-label"
                                                >Mercado: se ofrece al mercado
                                                la versión completa del
                                                producto</label
                                            >
                                        </div>
                                    </div>
                                    <!-- 22 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >22. ¿Se ha probado la demanda del
                                            producto/servicio propuesto?
                                        </label>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[21]"
                                                name="r22"
                                                value="0"
                                                id="r22_1"
                                            />
                                            <label
                                                for="r22_1"
                                                class="custom-control-label"
                                                >No, todavía estamos en etapa de
                                                prueba</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[21]"
                                                name="r22"
                                                value="1"
                                                id="r22_2"
                                            />
                                            <label
                                                for="r22_2"
                                                class="custom-control-label"
                                                >Sí, la demanda ha sido validada
                                                por nuestros principales
                                                competidores</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[21]"
                                                name="r22"
                                                value="2"
                                                id="r22_3"
                                            />
                                            <label
                                                for="r22_3"
                                                class="custom-control-label"
                                                >Sí, la demanda ha sido
                                                ampliamente probada y
                                                validada</label
                                            >
                                        </div>
                                    </div>
                                    <!-- 23 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >23. ¿Cuál es el tamaño actual de su
                                            mercado total direccionable (TAM) ,
                                            en términos monetarios?</label
                                        >
                                        <input
                                            class="form-control"
                                            type="number"
                                            v-model="listRespuestas[22]"
                                        />
                                    </div>
                                    <!-- 24 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >24. ¿Cuál es la tasa de crecimiento
                                            anual de este mercado?
                                            (Porcentaje)</label
                                        >
                                        <input
                                            class="form-control"
                                            type="number"
                                            v-model="listRespuestas[23]"
                                        />
                                    </div>
                                    <!-- 25 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >25. ¿Qué tan altas son las barreras
                                            de entrada del mercado al que se
                                            dirige la empresa para los
                                            competidores potenciales?
                                        </label>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[24]"
                                                name="r25"
                                                value="0"
                                                id="r25_1"
                                            />
                                            <label
                                                for="r25_1"
                                                class="custom-control-label"
                                                >Muy bajo</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[24]"
                                                name="r25"
                                                value="1"
                                                id="r25_2"
                                            />
                                            <label
                                                for="r25_2"
                                                class="custom-control-label"
                                                >Bajo</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[24]"
                                                name="r25"
                                                value="2"
                                                id="r25_3"
                                            />
                                            <label
                                                for="r25_3"
                                                class="custom-control-label"
                                                >Modesto</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[24]"
                                                name="r25"
                                                value="3"
                                                id="r25_4"
                                            />
                                            <label
                                                for="r25_4"
                                                class="custom-control-label"
                                                >Alto</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[24]"
                                                name="r25"
                                                value="4"
                                                id="r25_5"
                                            />
                                            <label
                                                for="r25_5"
                                                class="custom-control-label"
                                                >Muy alto</label
                                            >
                                        </div>
                                    </div>
                                    <!-- 26 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >26. ¿Cómo definiría el nivel de
                                            competencia en su mercado objetivo?
                                        </label>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[25]"
                                                name="r26"
                                                value="0"
                                                id="r26_1"
                                            />
                                            <label
                                                for="r26_1"
                                                class="custom-control-label"
                                                >Dominado por un solo
                                                jugador</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[25]"
                                                name="r26"
                                                value="1"
                                                id="r26_2"
                                            />
                                            <label
                                                for="r26_2"
                                                class="custom-control-label"
                                                >Dominado por varios
                                                jugadores</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[25]"
                                                name="r26"
                                                value="2"
                                                id="r26_3"
                                            />
                                            <label
                                                for="r26_3"
                                                class="custom-control-label"
                                                >Muchos jugadores
                                                pequeños</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[25]"
                                                name="r26"
                                                value="3"
                                                id="r26_4"
                                            />
                                            <label
                                                for="r26_4"
                                                class="custom-control-label"
                                                >Algunos jugadores
                                                pequeños</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[25]"
                                                name="r26"
                                                value="4"
                                                id="r26_5"
                                            />
                                            <label
                                                for="r26_5"
                                                class="custom-control-label"
                                                >Océano azul (competencia
                                                insignificante)
                                            </label>
                                        </div>
                                    </div>
                                    <!-- 27 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >27. Los productos/servicios
                                            competitivos existentes son:
                                        </label>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[26]"
                                                name="r27"
                                                value="0"
                                                id="r27_1"
                                            />
                                            <label
                                                for="r27_1"
                                                class="custom-control-label"
                                                >Excelente</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[26]"
                                                name="r27"
                                                value="1"
                                                id="r27_2"
                                            />
                                            <label
                                                for="r27_2"
                                                class="custom-control-label"
                                                >Bien</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[26]"
                                                name="r27"
                                                value="2"
                                                id="r27_3"
                                            />
                                            <label
                                                for="r27_3"
                                                class="custom-control-label"
                                                >Débil</label
                                            >
                                        </div>
                                    </div>
                                    <!-- 28 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >28. ¿Cómo definiría su producto en
                                            comparación con los de los
                                            competidores existentes?
                                        </label>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[27]"
                                                name="r28"
                                                value="0"
                                                id="r28_1"
                                            />
                                            <label
                                                for="r28_1"
                                                class="custom-control-label"
                                                >Comparable</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[27]"
                                                name="r28"
                                                value="1"
                                                id="r28_2"
                                            />
                                            <label
                                                for="r28_2"
                                                class="custom-control-label"
                                                >Comparable, pero innovamos en
                                                términos de propuesta de
                                                marketing/PVU</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[27]"
                                                name="r28"
                                                value="2"
                                                id="r28_3"
                                            />
                                            <label
                                                for="r28_3"
                                                class="custom-control-label"
                                                >Comparable, pero radicalmente
                                                innovador en términos de
                                                ejecución (por ejemplo, costos,
                                                fabricación, etc.)</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[27]"
                                                name="r28"
                                                value="3"
                                                id="r28_4"
                                            />
                                            <label
                                                for="r27_4"
                                                class="custom-control-label"
                                                >Los productos actuales
                                                resuelven las mismas necesidades
                                                con una solución no
                                                comparable</label
                                            >
                                        </div>
                                    </div>
                                    <!-- 29 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >29. ¿Cómo te relacionas con la
                                            competencia internacional?
                                        </label>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[28]"
                                                name="r29"
                                                value="0"
                                                id="r29_1"
                                            />
                                            <label
                                                for="r29_1"
                                                class="custom-control-label"
                                                >La competencia en el exterior
                                                ya está establecida</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[28]"
                                                name="r29"
                                                value="1"
                                                id="r29_2"
                                            />
                                            <label
                                                for="r29_2"
                                                class="custom-control-label"
                                                >La competencia en el exterior
                                                es cada vez mayor pero los
                                                mercados exteriores son aún más
                                                pequeños que el de nuestro
                                                país</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[28]"
                                                name="r29"
                                                value="2"
                                                id="r29_3"
                                            />
                                            <label
                                                for="r29_3"
                                                class="custom-control-label"
                                                >La competencia en el extranjero
                                                aún no está desarrollada</label
                                            >
                                        </div>
                                    </div>
                                    <!-- 30 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >30. ¿Planean expansión
                                            internacional?
                                        </label>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[29]"
                                                name="r30"
                                                value="0"
                                                id="r30_1"
                                            />
                                            <label
                                                for="r30_1"
                                                class="custom-control-label"
                                                >Somos una empresa local: la
                                                expansión internacional no es
                                                una opción para nosotros</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[29]"
                                                name="r30"
                                                value="1"
                                                id="r30_2"
                                            />
                                            <label
                                                for="r30_2"
                                                class="custom-control-label"
                                                >La expansión internacional
                                                supone grandes retos para
                                                nosotros</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[29]"
                                                name="r30"
                                                value="2"
                                                id="r30_3"
                                            />
                                            <label
                                                for="r30_3"
                                                class="custom-control-label"
                                                >Estamos considerando la
                                                internacionalización, pero
                                                nuestro enfoque ahora está en el
                                                mercado local</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[29]"
                                                name="r30"
                                                value="3"
                                                id="r30_4"
                                            />
                                            <label
                                                for="r30_4"
                                                class="custom-control-label"
                                                >Ya tenemos plan de expansión
                                                internacional</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[29]"
                                                name="r30"
                                                value="4"
                                                id="r30_5"
                                            />
                                            <label
                                                for="r30_5"
                                                class="custom-control-label"
                                                >Nuestro principal foco
                                                estratégico ya es global</label
                                            >
                                        </div>
                                    </div>
                                    <!-- 31 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >31. ¿Cómo es la tendencia promedio
                                            de los comentarios recibidos hasta
                                            ahora de los primeros
                                            usuarios/expertos de la industria?
                                        </label>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[30]"
                                                name="r31"
                                                value="0"
                                                id="r31_1"
                                            />
                                            <label
                                                for="r31_1"
                                                class="custom-control-label"
                                                >Principalmente negativo</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[30]"
                                                name="r31"
                                                value="1"
                                                id="r31_2"
                                            />
                                            <label
                                                for="r31_2"
                                                class="custom-control-label"
                                                >Bastante negativo</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[30]"
                                                name="r31"
                                                value="2"
                                                id="r31_3"
                                            />
                                            <label
                                                for="r31_3"
                                                class="custom-control-label"
                                                >Bastante positivo</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[30]"
                                                name="r31"
                                                value="3"
                                                id="r31_4"
                                            />
                                            <label
                                                for="r31_4"
                                                class="custom-control-label"
                                                >Principalmente positivo</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[30]"
                                                name="r31"
                                                value="4"
                                                id="r31_5"
                                            />
                                            <label
                                                for="r31_5"
                                                class="custom-control-label"
                                                >Todo positivo</label
                                            >
                                        </div>
                                    </div>
                                    <!-- 32 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >32. ¿Cómo definiría el grado de
                                            fidelización de sus clientes?
                                        </label>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[31]"
                                                name="r32"
                                                value="0"
                                                id="r32_1"
                                            />
                                            <label
                                                for="r32_1"
                                                class="custom-control-label"
                                                >Todavía por probar o en proceso
                                                de prueba</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[31]"
                                                name="r32"
                                                value="1"
                                                id="r32_2"
                                            />
                                            <label
                                                for="r32_2"
                                                class="custom-control-label"
                                                >Baja retención: el modelo de
                                                negocio requiere tiempo para
                                                desarrollar una mayor
                                                retención</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[31]"
                                                name="r32"
                                                value="2"
                                                id="r32_3"
                                            />
                                            <label
                                                for="r32_3"
                                                class="custom-control-label"
                                                >Retención promedio: ya en buen
                                                nivel y puede mejorarse aún
                                                más</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[31]"
                                                name="r32"
                                                value="3"
                                                id="r32_4"
                                            />
                                            <label
                                                for="r32_4"
                                                class="custom-control-label"
                                                >Alta retención: alto nivel de
                                                lealtad ya desarrollado con los
                                                clientes
                                            </label>
                                        </div>
                                    </div>
                                    <!-- 33 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >33. ¿Qué tan sólidas son las
                                            relaciones con socios estratégicos
                                            clave (incluidos distribuidores,
                                            proveedores)?
                                        </label>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[32]"
                                                name="r33"
                                                value="0"
                                                id="r33_1"
                                            />
                                            <label
                                                for="r33_1"
                                                class="custom-control-label"
                                                >Ningún socio contactado hasta
                                                ahora</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[32]"
                                                name="r33"
                                                value="1"
                                                id="r33_2"
                                            />
                                            <label
                                                for="r33_2"
                                                class="custom-control-label"
                                                >Los identificamos y
                                                contactamos</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[32]"
                                                name="r33"
                                                value="2"
                                                id="r33_3"
                                            />
                                            <label
                                                for="r33_3"
                                                class="custom-control-label"
                                                >Acuerdos informales ya en
                                                vigor</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[32]"
                                                name="r33"
                                                value="3"
                                                id="r33_4"
                                            />
                                            <label
                                                for="r33_4"
                                                class="custom-control-label"
                                                >Contratos firmados
                                            </label>
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[32]"
                                                name="r33"
                                                value="4"
                                                id="r33_5"
                                            />
                                            <label
                                                for="r33_5"
                                                class="custom-control-label"
                                                >Contratos firmados y sirviendo
                                                grandes volúmenes
                                            </label>
                                        </div>
                                    </div>
                                    <!-- PROPIEDAD INTELECTUAL Y LEGAL -->
                                    <h4 class="font-weight-bold">
                                        PROPIEDAD INTELECTUAL Y LEGAL
                                    </h4>
                                    <!-- 34 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >34. ¿Cuándo se inició la empresa?
                                            (Año)</label
                                        >
                                        <input
                                            class="form-control"
                                            type="number"
                                            v-model="listRespuestas[33]"
                                        />
                                    </div>
                                    <!-- 35 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >35. ¿Se ha constituido una entidad
                                            legal?</label
                                        >
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[34]"
                                                name="r35"
                                                value="0"
                                                id="r35_1"
                                            />
                                            <label
                                                for="r35_1"
                                                class="custom-control-label"
                                                >Si</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[34]"
                                                name="r35"
                                                value="1"
                                                id="r35_2"
                                            />
                                            <label
                                                for="r35_2"
                                                class="custom-control-label"
                                                >No</label
                                            >
                                        </div>
                                    </div>
                                    <!-- 36 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >36. Año de incorporación (Si la
                                            respuesta anterior es Si)</label
                                        >
                                        <input
                                            class="form-control"
                                            type="number"
                                            v-model="listRespuestas[35]"
                                        />
                                    </div>
                                    <!-- 37 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >37. ¿La empresa y sus fundadores ya
                                            pueden contar con el apoyo de
                                            asesores legales externos?</label
                                        >
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[36]"
                                                name="r37"
                                                value="0"
                                                id="r37_1"
                                            />
                                            <label
                                                for="r37_1"
                                                class="custom-control-label"
                                                >Si</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[36]"
                                                name="r37"
                                                value="1"
                                                id="r37_2"
                                            />
                                            <label
                                                for="r37_2"
                                                class="custom-control-label"
                                                >No</label
                                            >
                                        </div>
                                    </div>
                                    <!-- 38 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >38. ¿Qué tipo de Propiedad
                                            Intelectual (PI) se aplica al
                                            producto/servicio?
                                        </label>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[37]"
                                                name="r38"
                                                value="0"
                                                id="r38_1"
                                            />
                                            <label
                                                for="r38_1"
                                                class="custom-control-label"
                                                >Marcas y/o nombres de
                                                dominio</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[37]"
                                                name="r38"
                                                value="1"
                                                id="r38_2"
                                            />
                                            <label
                                                for="r38_2"
                                                class="custom-control-label"
                                                >Derechos de autor</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[37]"
                                                name="r38"
                                                value="2"
                                                id="r38_3"
                                            />
                                            <label
                                                for="r38_3"
                                                class="custom-control-label"
                                                >Patente</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[37]"
                                                name="r38"
                                                value="3"
                                                id="r38_4"
                                            />
                                            <label
                                                for="r38_4"
                                                class="custom-control-label"
                                                >Otro
                                            </label>
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[37]"
                                                name="r38"
                                                value="4"
                                                id="r38_5"
                                            />
                                            <label
                                                for="r38_5"
                                                class="custom-control-label"
                                                >Ninguno o no aplicable
                                            </label>
                                        </div>
                                    </div>
                                    <!-- 39 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >39. ¿Cómo definiría la etapa actual
                                            de desarrollo de su PI?
                                        </label>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[38]"
                                                name="r39"
                                                value="0"
                                                id="r39_1"
                                            />
                                            <label
                                                for="r39_1"
                                                class="custom-control-label"
                                                >No aplica</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[38]"
                                                name="r39"
                                                value="1"
                                                id="r39_2"
                                            />
                                            <label
                                                for="r39_2"
                                                class="custom-control-label"
                                                >IP pendiente de
                                                aprobación</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[38]"
                                                name="r39"
                                                value="2"
                                                id="r39_3"
                                            />
                                            <label
                                                for="r39_3"
                                                class="custom-control-label"
                                                >Patente</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[38]"
                                                name="r39"
                                                value="3"
                                                id="r39_4"
                                            />
                                            <label
                                                for="r39_4"
                                                class="custom-control-label"
                                                >Protección de la propiedad
                                                intelectual asegurada a nivel
                                                regional
                                            </label>
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[38]"
                                                name="r39"
                                                value="4"
                                                id="r39_5"
                                            />
                                            <label
                                                for="r39_5"
                                                class="custom-control-label"
                                                >Protección IP asegurada a nivel
                                                global
                                            </label>
                                        </div>
                                    </div>
                                    <!-- OTROS -->
                                    <h4 class="font-weight-bold">OTROS</h4>
                                    <!-- 40 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >1. ¿Cuál es su relación con la
                                            empresa que se está valorando?
                                        </label>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[39]"
                                                name="r40"
                                                value="0"
                                                id="r40_1"
                                            />
                                            <label
                                                for="r40_1"
                                                class="custom-control-label"
                                                >Fundador</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[39]"
                                                name="r40"
                                                value="1"
                                                id="r40_2"
                                            />
                                            <label
                                                for="r40_2"
                                                class="custom-control-label"
                                                >Empleado del departamento de
                                                finanzas/administración</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[39]"
                                                name="r40"
                                                value="2"
                                                id="r40_3"
                                            />
                                            <label
                                                for="r40_3"
                                                class="custom-control-label"
                                                >Empleado de otro
                                                departamento</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[39]"
                                                name="r40"
                                                value="3"
                                                id="r40_4"
                                            />
                                            <label
                                                for="r40_4"
                                                class="custom-control-label"
                                                >Consultor y/o asesor externo
                                            </label>
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[39]"
                                                name="r40"
                                                value="4"
                                                id="r40_5"
                                            />
                                            <label
                                                for="r40_5"
                                                class="custom-control-label"
                                                >Accionista actual sin cargo
                                                operativo
                                            </label>
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[39]"
                                                name="r40"
                                                value="5"
                                                id="r40_6"
                                            />
                                            <label
                                                for="r40_6"
                                                class="custom-control-label"
                                                >Inversor/comprador interesado
                                            </label>
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[39]"
                                                name="r40"
                                                value="6"
                                                id="r40_7"
                                            />
                                            <label
                                                for="r40_7"
                                                class="custom-control-label"
                                                >Otro
                                            </label>
                                        </div>
                                    </div>
                                    <!-- 41 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >2. El propósito de mi valoración
                                            es:
                                        </label>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[40]"
                                                name="r41"
                                                value="0"
                                                id="r41_1"
                                            />
                                            <label
                                                for="r41_1"
                                                class="custom-control-label"
                                                >Recaudación de fondos</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[40]"
                                                name="r41"
                                                value="1"
                                                id="r41_2"
                                            />
                                            <label
                                                for="r41_2"
                                                class="custom-control-label"
                                                >Vendiendo la empresa</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[40]"
                                                name="r41"
                                                value="2"
                                                id="r41_3"
                                            />
                                            <label
                                                for="r41_3"
                                                class="custom-control-label"
                                                >Venta de parte de las
                                                acciones</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[40]"
                                                name="r41"
                                                value="3"
                                                id="r41_4"
                                            />
                                            <label
                                                for="r41_4"
                                                class="custom-control-label"
                                                >Planificación y estrategia
                                            </label>
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[40]"
                                                name="r41"
                                                value="4"
                                                id="r41_5"
                                            />
                                            <label
                                                for="r41_5"
                                                class="custom-control-label"
                                                >Informes de accionistas
                                            </label>
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[40]"
                                                name="r41"
                                                value="5"
                                                id="r41_6"
                                            />
                                            <label
                                                for="r41_6"
                                                class="custom-control-label"
                                                >Informes y cumplimiento de
                                                impuestos
                                            </label>
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[40]"
                                                name="r41"
                                                value="6"
                                                id="r41_7"
                                            />
                                            <label
                                                for="r41_7"
                                                class="custom-control-label"
                                                >Otro
                                            </label>
                                        </div>
                                    </div>
                                    <!-- 42 -->
                                    <div class="col-md-12 form-group">
                                        <label for=""
                                            >3. ¿El capital de la empresa se
                                            negocia en una cadena de
                                            bloques?</label
                                        >
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[41]"
                                                name="r42"
                                                value="0"
                                                id="r42_1"
                                            />
                                            <label
                                                for="r42_1"
                                                class="custom-control-label"
                                                >Si</label
                                            >
                                        </div>
                                        <div
                                            class="custom-control custom-radio"
                                        >
                                            <input
                                                class="custom-control-input"
                                                type="radio"
                                                v-model="listRespuestas[41]"
                                                name="r42"
                                                value="1"
                                                id="r42_2"
                                            />
                                            <label
                                                for="r42_2"
                                                class="custom-control-label"
                                                >No</label
                                            >
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
import { lista_20_1, lista_20_2 } from "./Listas.js";
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
            },
            listPaises: [],
            listRespuestas: [
                "",
                "",
                0,
                0,
                0,
                "",
                0,
                "",
                0,
                0,
                0,
                0,
                0,
                0,
                0,
                "",
                0,
                0,
                "",
                [0, 0],
                0,
                0,
                "",
                "",
                0,
                0,
                0,
                0,
                0,
                0,
                0,
                0,
                0,
                "",
                0,
                "",
                0,
                0,
                0,
                0,
                0,
                0,
            ],
            listado20_1: [],
            listado20_2: [],
            esperando: 0,
            enviando: false,
            accion: "nuevo",
        };
    },
    watch: {
        oEmpresa(newVal, oldVal) {
            if (newVal.cuestionario) {
                this.accion = "edit";
                let cuestionario_empresa = this.parseStringToArray(
                    newVal.cuestionario.cuestionario
                );

                this.listRespuestas = cuestionario_empresa;
                console.log(this.listRespuestas);
            }
        },
    },
    computed: {
        textoBoton() {
            if (this.oEmpresa.cuestionario) {
                return '<i class="fa fa-edit"></i> ACTUALIZAR CUESTIONARIO';
            } else {
                return '<i class="fa fa-save"></i> REGISTRAR CUESTIONARIO';
            }
        },
    },
    mounted() {
        this.getEmpresa();
        this.loadingWindow.close();
        this.listado20_1 = lista_20_1;
        this.listado20_2 = lista_20_2;
        this.getPaises();
    },
    methods: {
        recargaFormulario() {
            location.reload();
        },
        getPaises() {
            axios
                .get("https://restcountries.com/v3.1/all")
                .then((response) => {
                    const countries = response.data.map(
                        (country) => country.name.common
                    );
                    const sortedCountries = countries.sort(); // Ordenar alfabéticamente
                    this.listPaises = countries;
                })
                .catch((error) => {
                    console.error("Error:", error);
                });
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
                let url = "/admin/cuestionarios";
                let data = {
                    empresa_id: this.oEmpresa.id,
                    cuestionario: this.listRespuestas,
                };
                if (this.accion == "edit") {
                    url =
                        "/admin/cuestionarios/" + this.oEmpresa.cuestionario.id;
                    data["_method"] = "PUT";
                }
                axios
                    .post(url, data)
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
                            if (!data["_method"]) {
                                this.$router.push({
                                    name: "empresas.fondos",
                                    params: {
                                        id: this.oEmpresa.id,
                                    },
                                });
                            } else {
                                this.recargaFormulario();
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
        parseStringToArray(input) {
            const parts = input.split("|");
            const result = [];

            for (const part of parts) {
                if (part.includes(";")) {
                    result.push(part.split(";").map((item) => parseInt(item)));
                } else {
                    result.push(part);
                }
            }

            return result;
        },
    },
};
</script>
<style></style>
