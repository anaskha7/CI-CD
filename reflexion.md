# Reflexion

## 1. Que he aprendido con este proyecto?

He aprendido a montar un flujo CI/CD completo para una web sencilla: Jenkins se ejecuta en Docker, lee el repositorio de GitHub, construye una imagen Docker y despliega automaticamente el CV en un contenedor Docker-in-Docker que simula una Raspberry Pi.

## 2. Que problemas he encontrado?

Los puntos mas delicados han sido conectar Jenkins con GitHub, dar permisos para usar Docker desde el contenedor de Jenkins y separar Jenkins del contenedor que simula la Raspberry para que el despliegue sea parecido a un servidor real.

## 3. Que mejoraria en el futuro?

Mejoraria el pipeline anadiendo tests automaticos, control de versiones para las imagenes Docker, rollback si falla el despliegue y monitorizacion basica del servicio publicado por HTTPS.
