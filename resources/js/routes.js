import Vue from "vue";
import Router from "vue-router";

Vue.use(Router);

export default new Router({
    routes: [
        // INICIO
        {
            path: "/",
            name: "inicio",
            component: require("./components/Inicio.vue").default,
        },

        // LOGIN
        {
            path: "/login",
            name: "login",
            component: require("./Auth.vue").default,
        },

        // Usuarios
        {
            path: "/usuarios/perfil/:id",
            name: "usuarios.perfil",
            component: require("./components/modulos/usuarios/perfil.vue")
                .default,
            props: true,
        },
        {
            path: "/usuarios",
            name: "usuarios.index",
            component: require("./components/modulos/usuarios/index.vue")
                .default,
        },

        // Empresas
        {
            path: "/empresas",
            name: "empresas.index",
            component: require("./components/modulos/empresas/index.vue")
                .default,
        },
        {
            path: "/empresas/create",
            name: "empresas.create",
            component: require("./components/modulos/empresas/create.vue")
                .default,
        },
        {
            path: "/empresas/edit/:id",
            name: "empresas.edit",
            component: require("./components/modulos/empresas/edit.vue")
                .default,
            props: true,
        },

        // Configuración
        {
            path: "/configuracion",
            name: "configuracion",
            component: require("./components/modulos/configuracion/index.vue")
                .default,
            props: true,
        },

        // Reportes
        {
            path: "/reportes/usuarios",
            name: "reportes.usuarios",
            component: require("./components/modulos/reportes/usuarios.vue")
                .default,
            props: true,
        },
        {
            path: "/reportes/proteccion_personal",
            name: "reportes.proteccion_personal",
            component:
                require("./components/modulos/reportes/proteccion_personal.vue")
                    .default,
            props: true,
        },
        {
            path: "/reportes/g_proteccion_personal",
            name: "reportes.g_proteccion_personal",
            component:
                require("./components/modulos/reportes/g_proteccion_personal.vue")
                    .default,
            props: true,
        },

        // PÁGINA NO ENCONTRADA
        {
            path: "*",
            component: require("./components/modulos/errors/404.vue").default,
        },
    ],
    mode: "history",
    linkActiveClass: "active open",
});
