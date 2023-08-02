# Sistema 1. Sistema de Gestión de Eventos

La universidad de la región requiere que se desarrolle un sistema de información para el manejo de 
eventos académicos y ustedes han sido escogidos como los desarrolladores. La universidad les pide 
que el sistema cumpla las siguientes características funcionales que permitan al usuario:
- Registrar, consultar modificar y eliminar la información de cada evento, compuesta por: nombre 
del evento, un código de evento, dependencia que lo organiza (bienestar, coordinación 
académica, gestión del cambio), tipo de evento (simposium, congreso, curso, taller, foro, 
convención o seminario), fechas de los días en que se llevara a cabo, conferencistas que 
participan del evento, espacios físicos solicitados (biblioteca, auditorio, aula, externo) e 
implementos técnicos requeridos (videobeam, computadores, proyectores).
- Consultar los datos de los conferencistas a asignar a un evento, cada conferencista tendrá su
nombre, número de documento de identificación.
- Registrar la inscripción de participantes en cada evento de tal forma que para cada uno se 
almacene el código del evento en el que participará, su nombre, el número de documento de 
identificación, teléfono, dirección, el tipo de participante (estudiante, profesional, docente, otro).
- El día que se desarrolle el evento se deberá registrar la asistencia del mismo, para ello a través 
de la inscripción se confirma la asistencia guardando la fecha y hora de ingreso. El ingreso 
debe registrarse automáticamente a través de la lectura de su cedula. 
- Si en el registro llega una persona que no se haya inscrito, el sistema de validar si el evento 
aún tiene cupo y si lo tiene lo inscribe y registra su ingreso.
- Cuando el evento finaliza se diligencia una encuesta de satisfacción del evento por cada uno 
de los participantes. El modelo de encuesta se muestra a continuación:

imagen


Generar reportes por cada evento, (Todos los reportes deberán contener gráficos): 
✓ Listado de participantes al evento
✓ Listado de eventos realizados en un rango de fechas, mostrando el total de participantes, 
total de conferencias, espacios que se utilizaron e implementos técnicos.
✓ Escribir una palabra clave y a partir de ella mostrar los eventos que se han realizado del 
tema.
✓ Mostrar un reporte de los resultados de la encuesta de satisfacción de un evento 
determinado.
✓ Descargar un listado de los espacios físicos e implementos técnicos disponibles u 
ocupados.
✓ Otros reportes solicitados por el cliente.
El sistema deberá, además, distinguir tres tipos de usuarios:
• Administrador: Se encarga de gestionar la información de los eventos, conferencistas y 
generar los reportes.
• Participante: Es aquel a quien solo se le permite consultar los eventos programados en 
determinado periodo de tiempo e inscribirse a ellos.
• Almacén: Es la persona encargada de llevar un control de inventario de los implementos 
técnicos (código, nombre, descripción, estado) que hay en la universidad y de los espacios 
físicos (código, nombre, descripción, estado). 





