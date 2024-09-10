<?php
session_start();

    if(isset($_COOKIE['nombre_usu']) || isset($_SESSION['name'])){
        $title = "Accesibilidad Solicitud Album P&I";
        require_once("cabecera.php");
        require_once("menuPri.php");
    }else{
        $title = "Resultados de Busqueda Album P&I";
                require_once("cabecera.php");
                require_once("menuPubli.php");
    }
?>

    <main>
        <section class="margen-mensj">
            <h2>Declaración de Accesibilidad</h2>

            <article>
                <h3>Introducción a la accesibilidad</h3>
                <p>La accesibilidad es el grado en el que todas las personas pueden percibir,
                    comprender y navegar por la información contenida en un documento digital
                    independientemente de sus capacidades técnicas, cognitivas o físicas.</p>
            </article>

            <article>
                <h3>Situación de cumplimiento</h3>
                <p>Este sitio web es parcialmente conforme con el nivel AA de las Pautas de
                    Accesibilidad para el contenido Web en su versión 2.1, debido a las excepciones
                    y a la falta de conformidad de los aspectos que se indican a continuación.</p>
            </article>

            <article>
                <h3>Contenido accesible</h3>
                <ul>
                    <li>La página posee un etiquetado con el siguiente orden: Head,
                        Body(header,main,footer). Gracias a esto el usuario puede guiarse de
                        forma más fácil a su búsqueda, debido a que su buscador encontrará
                        más rápido información bien estructurada.</li>
                    <li>Se posee también una amplia descripción de las imagenes de nuestro servidor.
                        Esto para aquellas personas que no puedan apreciar bien la foto y se puedan
                        guiar mejor leyendo el texto alternativo.</li>
                    <li>Existen distintos modos de estilo en la propia página web, esto para que
                        dependiendo de las condiciones(gustos, condiciones físicas, etc..) de nuestros internautas puedan elegir que
                        estilo les conviene más. Así como, se ha intentado tener el correcto uso de
                        colores para el agrado del usuario y para que pueda guiarse sin problema por nuestra
                        página.
                    </li>
                </ul>
            </article>

            <article>
                <h3>Contenido opcional</h3>
                    <h4>Atajos de teclado</h4>
                    <p>Estando en <strong>Firefox</strong>, pulsando la tecla "Alt" podrás acceder
                    al menú de la página donde, en el apartado <strong>Ver->Estilo de página</strong>, tendrás la opción
                    de elegir el estilo que más te convenga.</p>
            </article>

            <article>
                <h3>Tamaño del texto</h3>
                <p>El diseño accesible de esta web permite que el usuario pueda escoger el tamaño de texto que necesite.
                    Esta acción puede llevarse a cabo de diferentes maneras según el navegador que se utilice.
                    Una forma de modificar el tamaño de texto en ordenadores Windows es utilizar la combinación de teclas CTRL
                    y + para aumentar el tamaño del texto, y CTRL y - para reducirlo. En ordenadores MAC se utiliza la
                    combinación CMD y + para aumentar y CMD y - para reducir el tamaño del texto.
                    Además, existe un estilo el cual hace que la letra sea más grande para su mejor comprensión, y su forma
                    de acceder es igual a la antes mencionada en <strong>Atajos de teclado</strong>.</p>
            </article>
        </section>

        <div class="copy">
            &copy;
            <a class="url" href="http://deadsoul999.byethost16.com/index.html"></a>
        </div>

    </main>

<?php
require_once("footer.php");
?>