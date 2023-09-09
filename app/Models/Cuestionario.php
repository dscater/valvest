<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuestionario extends Model
{
    use HasFactory;
    protected $fillable = [
        "empresa_id",
        "cuestionario",
    ];

    protected $appends = ["array_cuestionario"];

    public function getArrayCuestionarioAttribute()
    {
        $array = self::stringToArray($this->cuestionario);
        return $array;
    }

    public function empresa()
    {
        return $this->belongsTo(Empresa::class, 'empresa_id');
    }

    public static function stringToArray($inputString)
    {
        $parts = explode('|', $inputString);
        $result = [];

        foreach ($parts as $part) {
            $innerParts = explode(';', $part);
            if (count($innerParts) > 1) {
                $result[] = $innerParts;
            } else {
                $result[] = $part;
            }
        }

        return $result;
    }

    public static function infoCuestionario()
    {
        return [
            [], //campo abierto 1
            [], //campo abierto 2
            [], //campo abierto 3
            ["<25", "25-34", "35-45", ">45"], // 4
            [
                "Esta es la primera experiencia empresarial para todos nosotros",
                "Sí, al menos uno de nosotros fundó una empresa anteriormente",
                "Sí, y al menos uno de nosotros vendió con éxito una empresa",
            ], // 5
            [], //campo abierto 6
            [
                "Menos de 1 año",
                "Entre 1 y 2 años",
                "Entre 3 y 5 años",
                "Mas de 5 años",
            ], // 7
            [], //campo abierto 8
            [
                "No",
                "Al menos uno de nosotros ha realizado estudios relacionados con los negocios",
                "Al menos uno de nosotros tiene experiencia laboral",
                "Al menos uno de nosotros ha sido empleado como gerente de nivel medio (por ejemplo, gerente de producto, gerente de ventas)",
                "Al menos uno de nosotros ha sido empleado como gerente de primer nivel (vicepresidente y puestos superiores) o ha ocupado un puesto similar en su propia empresa que tenía más de 50 empleados",
            ], // 9
            [
                "No",
                "No, pero los subcontratamos a todos",
                "Tenemos algunas de las capacidades técnicas y subcontratamos el resto",
                "Tenemos la mayoría de las capacidades técnicas y subcontratamos el resto",
                "Sí",
            ], //10
            ["Si", "No"], //11
            ["Negocio a Clientes", "Empresa a Empresa"], //12
            [
                "Etapa de idea : trabajando en el plan de negocios y probando los supuestos iniciales de solución de problemas",
                "Etapa de desarrollo : construcción del producto y establecimiento de operaciones",
                "Etapa de inicio : activo con ingresos anuales de hasta $ 200000",
                "Etapa de expansión : operaciones de escalado, con ingresos anuales superiores a $ 200000",
                "Etapa de crecimiento : un negocio considerable con un crecimiento sólido, probado y repetible",
                "Etapa de madurez : un negocio rentable con un crecimiento predecible alineado con la industria",
            ], //13
            [], //campo abierto 14
            [
                "Sí",
                "Podemos contar con asesores externos, pero aún no están organizados en un directorio",
                "No",
            ], //15
            [], //campo abierto 16
            [
                "Amigos y familia",
                "Recaudación de fondos",
                "Incubadora / aceleradora",
                "Ángel de negocios",
                "Capitalista de riesgo",
            ], //17
            [
                "No pensamos en estrategias de salida hasta ahora",
                "Consideramos algunas oportunidades de salida",
                "Tenemos múltiples oportunidades de salida",
                "Empresas activas en el mercado ya han demostrado interés en comprarnos",
                "Las grandes empresas demostraron un gran interés y voluntad de comprometerse con la adquisición",
            ], //18
            [], // campo abierto 19
            [
                [
                    "Energía – Combustible Fósiles",
                    "Energía Renovable",
                    "Uranio",
                    "Productos Químicos",
                    "Recursos Minerales",
                    "Recursos Aplicados",
                    "Bienes Industriales",
                    "Servicios Industriales y Comerciales",
                    "Conglomerados Industriales",
                    "Transporte",
                    "Automóviles y Autopartes",
                    "Productos de Consumo Cíclicos",
                    "Servicios de Consumo Cíclicos",
                    "Minoristas",
                    "Alimentos y Bebidas",
                    "Productos y Servicios Personales y del Hogar",
                    "Venta AI por Menor de Alimentos y Medicamentos",
                    "Servicios Bancarios y de Inversión",
                    "Seguro",
                    "Bienes Raíces",
                    "Inversiones Colectivas",
                    "Sociedad de Cartera",
                    "Servicios de Atención Médica",
                    "Farmacéutica e Investigación Médica",
                    "Equipo de Tecnología",
                    "Software y Servicios TI",
                    "Servicios de Telecomunicaciones",
                    "Utilidades",
                ],
                [
                    [
                        "Carbón",
                        "Petróleo y Gas Integrado",
                        "Exploración y Producción de Petróleo y Gas",
                        "Perforación de Petróleo y Gas",
                        "Servicios y Equipos Relacionados con el Petróleo",
                        "Servicios de Transporte de Petróleo y Gas",
                    ],
                    [
                        "Equipos y Servicios de Energía Renovable",
                        "Combustibles Renovables",
                    ],
                    ["Uranio"],
                    [
                        "Productos Químicos Básicos",
                        "Químicos Agriculturales",
                        "Productos Químicos Especiales",
                        "Productos Químicos Diversificados",
                    ],
                    [
                        "Metales y Minerales Preciosos Distintos del Oro",
                        "Acero",
                        "Aluminio",
                        "Especialidad en Minería y Metales",
                        "Oro",
                        "Servicios y Equipos de Apoyo a la Minería",
                        "Minería Diversificada",
                        "Materiales de Construcción",
                    ],
                    [
                        "Productos Forestales y de Madera",
                        "Productos de Papel",
                        "Envases y Embalajes que no sean de Papel",
                        "Embalajes de Papel",
                    ],
                    [
                        "Aeroespacial",
                        "Maquinaría y Equipos Industriales",
                        "Maquinaría Pesada y Vehículos",
                        "Componentes y Equipos Eléctricos",
                        "Construcción Naval",
                    ],
                    [
                        "Ingeniería en Construcción",
                        "Mayoristas de Bienes Industriales Diversificados",
                        "Servicios Ambientales y Equipos",
                        "Servicios de Imprenta Comercial",
                        "Servicios de Empleo",
                        "Servicios de Apoyo Empresarial",
                        "Suministros de Apoyo Empresarial",
                        "Servicios Profesionales de Información",
                    ],
                    ["Conglomerados Industriales"],
                    [
                        "Courier, Postal, Flete Aéreo y Logística Terrestre",
                        "Transporte Marítimo y Logística",
                        "Flete Terrestre y Logística",
                        "Aerolíneas",
                        "Transporte de Pasajeros, Terrestre y Marítimo",
                        "Operadores y Servicios Aeroportuarios",
                        "Servicios Portuarios Marítimos",
                        "Carreteras y Vías Férreas",
                    ],
                    [
                        "Fabricantes de Automóviles y Camiones",
                        "Piezas de Automóviles, Camiones y Motocicletas",
                        "Neumáticos y Productos de Caucho",
                    ],
                    [
                        "Textiles y Marroquinería",
                        "Ropa y Accesorios",
                        "Calzado",
                        "Construcción de Viviendas",
                        "Suministros y Accesorios de Construcción",
                        "Electrodomésticos, Herramientas y Artículos Para el Hogar",
                        "Muebles Para el Hogar",
                        "Juguetes y Productos para Niños",
                        "Productos Recreativos",
                    ],
                    [
                        "Hoteles, Moteles y Líneas de Cruceros",
                        "Restaurantes y Bares",
                        "Casinos y Juegos",
                        "Ocio y Recreación",
                        "Marketing Publicitario",
                        "Radiodifusión",
                        "Producción de Entretenimiento",
                        "Publicación de Consumo",
                    ],
                    [
                        "Grandes Almacenes",
                        "Tiendas de Descuento",
                        "Minoristas de Vehículos, Repuestos y Servicios",
                        "Minoristas de Productos y Servicios de Mejoras para el Hogar",
                        "Minoristas de Muebles para el Hogar",
                        "Minoristas de Ropa y Accesorios",
                        "Minoristas de Computación y Electrónica",
                        "Minoristas de Especialidades Misceláneas",
                    ],
                    [
                        "Cerveceros",
                        "Destilerías y Bodegas",
                        "Bebidas no Alcohólicas",
                        "Pesca y Agricultura",
                        "Procesamiento de Alimentos",
                        "Tabaco",
                    ],
                    [
                        "Productos Domésticos",
                        "Productos Personales",
                        "Servicios Personales",
                    ],
                    [
                        "Minoristas de medicamentos",
                        "Venta al por Menor y Distribución de Alimentos",
                    ],
                    [
                        "Bancos",
                        "Préstamos al Consumo",
                        "Servicios Financieros Corporativos",
                        "Servicios de Corretaje y Banca de Inversión",
                        "Gestión de Inversiones y Operadores de Fondos",
                        "Servicios de Inversión Diversificados",
                        "Operadores de mercados Financieros y de Materias Primas y Proveedores de Servicios",
                    ],
                    [
                        "Corredores y Seguros Multilínea",
                        "Seguro de Propiedad y Accidentes",
                        "Seguro de Vida y Salud",
                        "Reaseguro",
                    ],
                    [
                        "Alquiler, Desarrollo y Operaciones Inmobiliarias",
                        "Servicios Inmobiliarios",
                        "REITs Diversificados",
                        "Rentas Comerciales",
                        "Fondos de Inversión Residenciales",
                        "Reits Especializados",
                    ],
                    [
                        "Fondos de Inversión del reino Unido",
                        "Los Fondos de Inversión",
                        "Fondos Cerrados",
                        "Los Fondos Negociados en Bolsa",
                        "Fondos de la Pensión",
                        "Fondos de Seguro",
                    ],
                    ["Sociedades de Cartera de Inversión"],
                    [
                        "Tecnología y Equipos Médicos Avanzados",
                        "Equipos Médicos, Suministros y Distribución",
                        "Instalaciones y Servicios de Salud",
                        "Cuidado de la Salud Administrado",
                    ],
                    ["Productos Farmacéuticos", "Biotecnología e Investigación Médica"],
                    [
                        "Semiconductores",
                        "Equipos y Pruebas de Semiconductores",
                        "Comunicaciones y redes",
                        "Equipos Electrónicos y Partes",
                        "Equipo de Oficina",
                        "Hardware de la Computadora",
                        "Teléfonos y Dispositivos Portátiles",
                        "Electrónica del Hogar",
                    ],
                    ["Servicios de TI y Consultoría", "Software", "Servicios en Línea"],
                    [
                        "Servicios Integrados de Telecomunicaciones",
                        "Servicios de telecomunicaciones Inalámbricas",
                    ],
                    [
                        "Utilidades Eléctricas",
                        "Productores de Energía Independientes",
                        "Servicios Públicos de Gas Natural",
                        "Agua y Servicios Relacionados",
                        "Utilidades Multilínea",
                    ],
                ],
            ], //20
            [
                "Planificación: el proceso de despliegue aún no ha comenzado",
                "Prototipo: tenemos la primera versión del producto (alfa o beta) para fines de prueba/exhibición, pero no está lista para el mercado",
                "MVP: tenemos un producto mínimo viable (con las características suficientes para satisfacer a los primeros clientes) lanzado al mercado",
                "Mercado: se ofrece al mercado la versión completa del producto",
            ], //21
            [
                "No, todavía estamos en etapa de prueba",
                "Sí, la demanda ha sido validada por nuestros principales competidores",
                "Sí, la demanda ha sido ampliamente probada y validada",
            ], //22
            [], //campo abierto 23
            [], //campo abierto 24
            ["Muy bajo", "Bajo", "Modesto", "Alto", "Muy alto"], //25
            [
                "Dominado por un solo jugador",
                "Dominado por varios jugadores",
                "Muchos jugadores pequeños",
                "Algunos jugadores pequeños",
                "Océano azul (competencia insignificante)",
            ], //26
            ["Excelente", "Bien", "Débil"], //27
            [
                "Comparable",
                "Comparable, pero innovamos en términos de propuesta de marketing/PVU",
                "Comparable, pero radicalmente innovador en términos de ejecución (por ejemplo, costos, fabricación, etc.)",
                "Los productos actuales resuelven las mismas necesidades con una solución no comparable",
            ], //28
            [
                "La competencia en el exterior ya está establecida",
                "La competencia en el exterior es cada vez mayor pero los mercados exteriores son aún más pequeños que el de nuestro país",
                "La competencia en el extranjero aún no está desarrollada",
            ], //29
            [
                "Somos una empresa local: la expansión internacional no es una opción para nosotros",
                "La expansión internacional supone grandes retos para nosotros",
                "Estamos considerando la internacionalización, pero nuestro enfoque ahora está en el mercado local",
                "Ya tenemos plan de expansión internacional",
                "Nuestro principal foco estratégico ya es global",
            ], //30
            [
                "Principalmente negativo",
                "Bastante negativo",
                "Bastante positivo",
                "Principalmente positivo",
                "Todo positivo",
            ], //31
            [
                "Todavía por probar o en proceso de prueba",
                "Baja retención: el modelo de negocio requiere tiempo para desarrollar una mayor retención",
                "Retención promedio: ya en buen nivel y puede mejorarse aún más",
                "Alta retención: alto nivel de lealtad ya desarrollado con los clientes",
            ], //32
            [
                "Ningún socio contactado hasta ahora",
                "Los identificamos y contactamos",
                "Acuerdos informales ya en vigor",
                "Contratos firmados",
                "Contratos firmados y sirviendo grandes volúmenes",
            ], //33
            [], //campo abierto 34
            ["Si", "No"], // 35
            [], //campo abierto 36
            ["Si", "No"], //37
            [
                "Marcas y/o nombres de dominio",
                "Derechos de autor",
                "Patente",
                "Otro",
                "Ninguno o no aplicable",
            ], //38
            [
                "No aplica",
                "IP pendiente de aprobación",
                "Protección de la propiedad intelectual asegurada a nivel regional",
                "Protección IP asegurada a nivel global",
            ], //39
            [
                "Fundador",
                "Empleado del departamento de finanzas/administración",
                "Empleado de otro departamento",
                "Consultor y/o asesor externo",
                "Accionista actual sin cargo operativo",
                "Inversor/comprador interesado",
                "Otro",
            ], //40
            [
                "Recaudación de fondos",
                "Vendiendo la empresa",
                "Venta de parte de las acciones",
                "Planificación y estrategia",
                "Informes de accionistas",
                "Informes y cumplimiento de impuestos",
                "Otro",
            ], //41
            ["Si", "No"], //42
        ];
    }
}
