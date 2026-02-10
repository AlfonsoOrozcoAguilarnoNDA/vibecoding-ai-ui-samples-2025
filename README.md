# vibecoding-ai-ui-samples-2025
### Pruebas que hice en mayo 2025 al 30 julio 2025

Este repositorio es el resultado de un experimento de vibecoding realizado en mayo 2025 /julio 2025
**Enfocado a empresas medianas LATAM 2026** 

## Justificación del Proyecto

En 2022 heredé un sistema legacy desarrollado en PHP 7.x con una interfaz basada en AdminLTE que contenía miles de archivos. Durante los años siguientes, logré migrar a una versión híbrida propia que funcionaba adecuadamente para las necesidades del negocio. Sin embargo, en mayo de 2025 surgió un problema inesperado: dos usuarios reportaron dificultades de usabilidad porque el panel de perfil, ubicado en el lado izquierdo de la interfaz, ocupaba demasiado ancho de pantalla en sus monitores configurados a 800x600 píxeles.

Este incidente me llevó a replantear completamente el diseño de la interfaz de usuario. Pero hubo una complicación:

El cliente me pidió cometer un delito, y me retiré el 3 de junio 2025. Quité el requisito del perfil, y seguí refinando las pruebas que hice.

No vas a ver aqui pruebas completas ni al ganador que fue claude. Claude lo incorporé en mi diseño de producción, así que está cubierto por NDA. El Ganador fue Claude y el finalista fue Cohere

Las alucinaciones de las IA fueron interesantes. Algunas cosas se ven bien, con iconos buenos. Otras colores impresionantes. Finalmente consolidé las ideas en varias plantillas, pero el material aquí presentado representa las soluciones de Cohere que fueron curadas y refinadas, incorporando elementos visuales de otras IAs. Hay dos versiones de Cohere. La segunda fue porque le dije que tenía un usuario daltónico, y me dio algo impresionante sobre su producto original.

En la medida de lo posible el nombre del archivo indica la IA que generó el contenido.

## Cual era la situación ?
Entre el 12 de mayo y el 30 de julio de 2025, realicé un proceso exhaustivo de exploración utilizando múltiples modelos de IA generativa para obtener datos de ejemplo, propuestas de diseño y soluciones alternativas. Durante este período, experimenté con diversas herramientas incluyendo Claude, Cohere, Mistral y Gemini, solicitando mockups, estructuras de datos, y componentes de interfaz que pudieran resolver el problema de espacio sin comprometer la funcionalidad.

Para el sistema en producción, la solución que realmente funcionó provino de Claude, cuyo código integré directamente en el proyecto principal y que por razones de propiedad intelectual no se incluye en este repositorio. Sin embargo, Cohere quedó como finalista en este proceso de evaluación, y es precisamente ese material el que se documenta aquí. Tras dejar ese puesto laboral el 3 de junio de 2025, continué refinando las pantallas consolidadas, incorporando imágenes e ideas de las diferentes propuestas generadas durante el período de experimentación.

Es importante aclarar que en este repositorio no se encontrarán artefactos de Mistral o incluso Claude, no porque estas herramientas no hayan sido útiles, sino porque el material aquí presentado representa principalmente las soluciones de Cohere y Gemini que fueron refinadas y consolidadas. La de Gemini que muestro aquí no cumple el 10% pero es plenamente funcional. A esa le hice ajuste de un color azul para simplificar MI visualización em las pruebas. Hay que recordar que Gemini mostraba datos muy diferentes de una semana a otra con el mismo PROMPT. Además, durante el proceso de rediseño en julio de 2025, determiné que en varias pantallas el requisito del perfil lateral ya no era necesario, por lo que en algunos casos fue eliminado completamente de la interfaz, simplificando aún más la experiencia de usuario.

## Prompt Original

Para que el experimento sea replicable, este fue el comando enviado a todas las LLMs:

INICIA PROMPT

PROMPT MAYO 2025 dado a varias IA
Necesito hacer una interfaz grafica en formato bootstrap 4 para php 7.x y 8x,
con barra de menus fija, footer fijo y scroll horizontal por algunas pantallas.
Se espera usar unos 300 pixels para el lado izquierdo usar un perfil de usuario
que pueda moverse a izquierda o derecha con un botón, y el espacio resultante
debe ser un div donde pueda poner contenido, que pienso poner botones tipo
interfaz metro, de windows 8, con un icono de font awesome, un texto y un
numero en esquina superior. ejemplo, usuarios, palabra usuarios y numero 43.
Se espera filas de 4 mosaicos que se adapten porque a veces entro en celular.

Pon por favor un menu con dropdown texto prueba 1 prueba dos
y prueba 3, con iconos en el texto de menu, y un boton rojo en en lado derecho
superior que diga salir.

Nuevas necesidades: 1 ) Cuenta en segundos con centesimas de segundo el tiempo
desde que inicia hasta que termina, y que vaya en el footer (ej 2.03s) 2 )
Borra caché en headers, y considera como default UTF8

Genera el script php por favor. Gracias


FIN DE PROMPT

---

## Contenido del Repositorio

Este repositorio contiene los artefactos generados por Cohere y otros que cumplieron con estos requisitos técnicos y que sirvieron como referencia durante el proceso de desarrollo y refinamiento de la interfaz final, y después de mi salida, como material de trabajo posterior.

Hay archivos sueltos de pruebas secundarias que conservé. Ejemplo, Pantallas de menú, login y de versiones de mosaico pero no interfaz metro.

## ⚖️ Sobre la Licencia
He elegido la **Licencia MIT** por su simplicidad. Es lo más cercano a una "Creative Commons" para código: haz lo que quieras con él, solo mantén el crédito del autor. 

* **¿Por qué no LGPL 2.1?** Aunque es una gran licencia para proteger mejoras (obligando a compartir los cambios del archivo), para este experimento buscaba la mínima fricción posible. La MIT es "Plug & Play", igual que la filosofía del proyecto.

## ✍️ Acerca del Autor
Este proyecto forma parte de una serie de artículos en **[vibecodingmexico.com](https://vibecodingmexico.com)**. Mi enfoque no es la programación de laboratorio, sino la **Programación Real**: aquella que sobrevive a servidores compartidos, bloqueos de oficina y conexiones de una sola rayita de señal.

Mi nombre es Alfonso Orozco Aguilar, soy mexicano, programo desde 1991 para comer, y no tengo cuenta de Linkedin para disminuir superficie de ataque. Llevo trabajando desde que tengo memoria como devops / programador senior, y en 2026 estoy por terminar la licenciatura de contaduria. En el sitio esta mi perfil de facebook.

[Perfil de Facebook de Alfonso Orozco Aguilar](https://www.facebook.com/alfonso.orozcoaguilar)

## 🛠️ ¿Por qué cPanel y PHP?
Elegimos **cPanel** porque es el estándar de la industria desde hace 25 años y el ambiente más fácil de replicar para cualquier profesional. 
* **Versión de PHP:** Asumimos un entorno moderno de **PHP 8.4**, pero por su naturaleza procedural, el código es confiable en cualquier hospedaje compartido con **PHP 7.x** o superior. Tu respaldo es como un "Tupperware" que puedes cambiar de refrigerador sin problemas.

---

## 📂 Guía de Archivos (Los Especímenes)

* **`cohere.php`**: La versión finalista de Cohere, Ia chat bot llm no muy conocida.
* **`cohere2.php`**: Alimenté cohere.php y le dije que lo pensara para un usuario daltónico
* **`gemini2025.php`**: La versión de gemini 2025 muy buena pero le fallo el requerimiento de ocultar. Se puso un color azul por legibilidad.
* **`claudelogin.php`**: Una pantalla de login hecha por claude, de alta calidad.
* **`samsung.php`**: En medio de las pruebas un usuario adulto mayor tuvo problemas con una fuente en su celular samsung. Cumplió el objetivo pero por mi salida no se implementó en sistema respectivo y se quedó solo en mi propio servidor.

Se suben pantallas de ejemplo en png aunque no se ven todos los efectos por ser estáticos

Iré subiendo más archivos una vez verifique no implican NDA.

---

## 🖼️ Evidencia Visual
Las imágenes de las interfaces generadas se encuentran en la carpeta del repositorio para su consulta. Verás la diferencia de calidad.

## 🚀 Requisitos Mínimos
1. Un dominio y hospedaje php 7.x Hospedaje compartido con PHP 7.x o superior y acceso a MySQL/MariaDB.
