const lista_20_1 = [
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
];
const lista_20_2 = [
    [
        "Carbón",
        "Petróleo y Gas Integrado",
        "Exploración y Producción de Petróleo y Gas",
        "Perforación de Petróleo y Gas",
        "Servicios y Equipos Relacionados con el Petróleo",
        "Servicios de Transporte de Petróleo y Gas",
    ],
    ["Equipos y Servicios de Energía Renovable", "Combustibles Renovables"],
    ["Uranio"],
    [
        "Productos Químicos Básicos",
        "Químicos Agriculturales",
        "Productos Químicos Especiales",
        "Productos Químicos Diversificados",
    ],
    [
        "Metales y Minerales Preciosos Distintos del Oro.",
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
    ["Productos Domésticos", "Productos Personales", "Servicios Personales"],
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
];

export { lista_20_1, lista_20_2 };
