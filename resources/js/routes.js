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
        {
            path: "/empresas/cuestionario/:id",
            name: "empresas.cuestionario",
            component: require("./components/modulos/empresas/Cuestionario.vue")
                .default,
            props: true,
        },
        {
            path: "/empresas/fondos/:id",
            name: "empresas.fondos",
            component: require("./components/modulos/empresas/Fondos.vue")
                .default,
            props: true,
        },
        {
            path: "/empresas/finanzas/:id",
            name: "empresas.finanzas",
            component: require("./components/modulos/empresas/Finanzas.vue")
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
            path: "/reportes/valoracion",
            name: "reportes.valoracion",
            component:
                require("./components/modulos/reportes/valoracion.vue")
                    .default,
            props: true,
        },
        {
            path: "/reportes/g_valoracion",
            name: "reportes.g_valoracion",
            component:
                require("./components/modulos/reportes/g_valoracion.vue")
                    .default,
            props: true,
        },
        {
            path: "/reportes/valoracion_users",
            name: "reportes.valoracion_users",
            component:
                require("./components/modulos/reportes/valoracion_users.vue")
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
