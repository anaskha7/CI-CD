# Reflexion

## 1. Que he aprendido con este proyecto?

He aprendido a montar un flujo CI/CD completo para una web sencilla: Jenkins se ejecuta en Docker, lee el repositorio de GitHub, construye una imagen Docker y despliega automaticamente el CV en la Raspberry Pi.

## 2. Que problemas he encontrado?

Los puntos mas delicados han sido conectar Jenkins con GitHub, dar permisos para usar Docker desde el contenedor de Jenkins y comprobar que el dominio de Cloudflare apunta correctamente a la Raspberry Pi.

## 3. Que mejoraria en el futuro?

Mejoraria el pipeline anadiendo tests automaticos, control de versiones para las imagenes Docker, rollback si falla el despliegue y monitorizacion basica del servicio publicado por HTTPS.
