<template>
    <div class="login-page registro">
        <div class="login-box">
            <!-- /.login-logo -->
            <div class="card border border-primary">
                <!-- <div class="card-header text-center">
                    <img :src="logo" alt="Logo" />
                    <router-link :to="{ name: 'login' }" class="h1 text-white"
                        ><b v-text="empresa"></b
                    ></router-link>
                </div> -->
                <div class="card-body">
                    <p class="login-box-msg text-white font-weight-bold">
                        FORMULARIO DE REGISTRO
                    </p>

                    <form>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger': errors.nombre,
                                    }"
                                    >Nombre*</label
                                >
                                <el-input
                                    placeholder="Nombre"
                                    :class="{ 'is-invalid': errors.nombre }"
                                    v-model="form_registro.nombre"
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
                                        'text-danger': errors.paterno,
                                    }"
                                    >Ap. Paterno*</label
                                >

                                <el-input
                                    placeholder="Ap. Paterno"
                                    :class="{ 'is-invalid': errors.paterno }"
                                    v-model="form_registro.paterno"
                                    clearable
                                >
                                </el-input>
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.paterno"
                                    v-text="errors.paterno[0]"
                                ></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger': errors.materno,
                                    }"
                                    >Ap. Materno</label
                                >
                                <el-input
                                    placeholder="Ap. Materno"
                                    :class="{ 'is-invalid': errors.materno }"
                                    v-model="form_registro.materno"
                                    clearable
                                >
                                </el-input>
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.materno"
                                    v-text="errors.materno[0]"
                                ></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger': errors.ci,
                                    }"
                                    >C.I.*</label
                                >
                                <el-input
                                    placeholder="Número de C.I."
                                    :class="{ 'is-invalid': errors.ci }"
                                    v-model="form_registro.ci"
                                    clearable
                                >
                                </el-input>
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.ci"
                                    v-text="errors.ci[0]"
                                ></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger': errors.ci_exp,
                                    }"
                                    >Expedido*</label
                                >
                                <el-select
                                    class="w-100 d-block"
                                    :class="{
                                        'is-invalid': errors.ci_exp,
                                    }"
                                    v-model="form_registro.ci_exp"
                                    clearable
                                >
                                    <el-option
                                        v-for="(item, index) in listExpedido"
                                        :key="index"
                                        :value="item.value"
                                        :label="item.label"
                                    >
                                    </el-option>
                                </el-select>
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.ci_exp"
                                    v-text="errors.ci_exp[0]"
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
                                    :class="{ 'is-invalid': errors.dir }"
                                    v-model="form_registro.dir"
                                    clearable
                                >
                                </el-input>
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.dir"
                                    v-text="errors.dir[0]"
                                ></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger': errors.correo,
                                    }"
                                    >Correo*</label
                                >
                                <el-input
                                    placeholder="Correo"
                                    :class="{ 'is-invalid': errors.correo }"
                                    v-model="form_registro.correo"
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
                                        'text-danger': errors.fono,
                                    }"
                                    >Teléfono/Celular*</label
                                >
                                <b-form-tags
                                    input-id="tags-basic"
                                    placeholder="Teléfono/Celular"
                                    :class="{ 'is-invalid': errors.fono }"
                                    v-model="form_registro.fono"
                                    addButtonText="Añadir"
                                    separator=" ,;"
                                    remove-on-delete
                                ></b-form-tags>
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.fono"
                                    v-text="errors.fono[0]"
                                ></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger': errors.tipo,
                                    }"
                                    >Tipo de Usuario*</label
                                >
                                <el-input
                                    :class="{
                                        'is-invalid': errors.tipo,
                                    }"
                                    v-model="form_registro.tipo"
                                    clearable
                                    readonly
                                >
                                </el-input>
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.tipo"
                                    v-text="errors.tipo[0]"
                                ></span>
                            </div>
                            <div class="form-group col-md-6">
                                <label
                                    :class="{
                                        'text-danger': errors.foto,
                                    }"
                                    >Foto</label
                                >
                                <input
                                    type="file"
                                    class="form-control"
                                    :class="{
                                        'is-invalid': errors.foto,
                                    }"
                                    ref="input_file"
                                    @change="cargaImagen"
                                />
                                <span
                                    class="error invalid-feedback"
                                    v-if="errors.foto"
                                    v-text="errors.foto[0]"
                                ></span>
                            </div>
                        </div>

                        <div class="row">
                            <!-- /.col -->
                            <div class="col-md-6 form-group">
                                <button
                                    type="button"
                                    class="btn btn-primary btn-block btn-flat font-weight-bold"
                                    @click.prevent="registro()"
                                    v-loading.fullscreen.lock="
                                        fullscreenLoading
                                    "
                                >
                                    Enviar formulario
                                </button>
                            </div>
                            <div class="col-md-6 form-group">
                                <a
                                    href="/"
                                    class="btn btn-default btn-block btn-flat font-weight-bold"
                                    v-loading.fullscreen.lock="
                                        fullscreenLoading
                                    "
                                >
                                    Volver
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        empresa: { String, default: "Nombre Empresa" },
        logo: {
            String,
            default:
                "https://www.logodesign.net/logo/eye-and-house-5806ld.png?size=2&industry=All",
        },
        configuracion: {
            String,
            default: "",
        },
    },
    data() {
        return {
            form_registro: {
                id: 0,
                nombre: "",
                paterno: "",
                materno: "",
                ci: "",
                ci_exp: "",
                dir: "",
                correo: "",
                fono: [],
                tipo: "",
                foto: null,
                acceso: 0,
            },
            listExpedido: [
                { value: "LP", label: "La Paz" },
                { value: "CB", label: "Cochabamba" },
                { value: "SC", label: "Santa Cruz" },
                { value: "CH", label: "Chuquisaca" },
                { value: "OR", label: "Oruro" },
                { value: "PT", label: "Potosi" },
                { value: "TJ", label: "Tarija" },
                { value: "PD", label: "Pando" },
                { value: "BN", label: "Beni" },
            ],
            errors: [],
            fullscreenLoading: false,
        };
    },
    methods: {
        registro() {
            this.fullscreenLoading = true;
            axios
                .post("/login", {
                    usuario: this.usuario,
                    password: this.password,
                })
                .then((res) => {
                    let user = res.data.user;
                    setTimeout(() => {
                        this.obtienePermisos(user);
                    }, 50);
                })
                .catch((error) => {
                    this.error = true;
                    this.password = "";
                    this.fullscreenLoading = false;
                    console.log(error.response);
                    if (error.response.data.message) {
                        Swal.fire({
                            icon: "error",
                            title: "Error",
                            html: error.response.data.message,
                            showConfirmButton: false,
                            timer: 4000,
                        });
                    }
                });
        },
        cargaImagen(e) {
            this.usuario.foto = e.target.files[0];
        },
        obtienePermisos(user) {
            axios.get("/admin/usuarios/getPermisos/" + user.id).then((res) => {
                this.error = false;
                this.$router.push({ name: "inicio" });
                localStorage.setItem("configuracion", this.configuracion);
                localStorage.setItem("permisos", JSON.stringify(res.data));
                localStorage.setItem("user", JSON.stringify(user));
                location.reload();
            });
        },
    },
};
</script>

<style>
.login-page {
    background: #00000081;
}

.login-page .card {
    border-radius: 0px;
    box-shadow: 0px 0px 1px 1px var(--primary);
    background: var(--transparente);
}
.login-page .card-header {
    border-bottom: solid 1px var(--primary);
}

.login-page.registro .login-box {
    min-width: 70%;
}
.login-page.registro .login-box form label {
    color: white;
}
@media screen (max-width: 800px) {
    .login-page.registro .login-box {
        min-width: 95%;
    }
}
</style>
