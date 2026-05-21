# CV con CI/CD

Proyecto de CV estatico desplegado con Docker, Jenkins, GitHub, Cloudflare e ImageKit.

## Tecnologias

- HTML y CSS
- Docker y Docker Compose
- Jenkins Pipeline
- GitHub Actions
- Cloudflare DNS/CDN
- ImageKit para optimizacion de imagenes

## Instalacion local

```bash
docker build -t cv-web .
docker run -d --name cv-web -p 8081:80 cv-web
```

Abrir:

```text
http://localhost:8081
```

## Jenkins en Docker simulando una Raspberry

Como no se usa una Raspberry real, `docker-compose.yml` crea dos contenedores:

- `jenkins`: servidor Jenkins.
- `raspberry-docker`: Docker-in-Docker que simula la Raspberry donde se despliega el CV.

Levantar el entorno:

```bash
docker compose up -d
```

Entrar en:

```text
http://localhost:8085
```

Obtener la contrasena inicial:

```bash
docker exec jenkins cat /var/jenkins_home/secrets/initialAdminPassword
```

Instalar los plugins recomendados y crear un usuario administrador.

## Pipeline CI/CD

El archivo `Jenkinsfile` define tres fases y usa `DOCKER_HOST=tcp://raspberry-docker:2375` para desplegar dentro del contenedor que simula la Raspberry:

1. `Checkout`: descarga el codigo desde GitHub.
2. `Build Docker image`: construye la imagen `cv-web`.
3. `Deploy`: sustituye el contenedor anterior y publica el CV en el puerto `8081`.

Crear en Jenkins un job de tipo `Pipeline` o `Multibranch Pipeline` y apuntarlo al repositorio de GitHub.

Para automatizar ejecuciones:

- Opcion local recomendada: activar `Poll SCM` en Jenkins con una expresion como `H/5 * * * *`.
- Opcion con webhook: usar un tunel publico, por ejemplo ngrok o Cloudflare Tunnel, hacia `http://localhost:8085/github-webhook/`.

Despues de hacer:

```bash
git add .
git commit -m "Add CI/CD CV deployment"
git push
```

Jenkins debe ejecutar el pipeline y desplegar automaticamente en:

```text
http://localhost:8081
```

## Cloudflare

1. Anadir el dominio en Cloudflare.
2. Cambiar los nameservers del registrador por los que indique Cloudflare.
3. Crear un registro DNS:
   - Tipo: `A`
   - Nombre: `@` o `cv`
   - IPv4: IP publica de la Raspberry Pi o del router
   - Proxy: nube naranja activada
4. Redirigir en el router los puertos necesarios hacia la Raspberry Pi.
5. Activar SSL/TLS en modo `Full` si el servidor tiene certificado o `Flexible` solo para pruebas.
6. Activar cache y optimizaciones: Auto Minify, Brotli y HTTP/2/HTTP/3 si estan disponibles.

## ImageKit

1. Subir la foto del CV a ImageKit.
2. Copiar la URL generada.
3. Sustituir en `index.html`:

```html
src="https://ik.imagekit.io/TU_IMAGEKIT_ID/cv/foto-cv.jpg?tr=f-webp,w-320,q-85"
```

Por la URL real de ImageKit.

Para verificarlo:

1. Abrir el CV en el navegador.
2. Abrir F12.
3. Ir a `Network`.
4. Filtrar por `Img`.
5. Comprobar que la imagen se sirve como `webp` en `Type` o en la cabecera `content-type`.

## GitHub Actions

El workflow `.github/workflows/deploy.yml` se ejecuta en cada push o pull request contra `main`.

Pasos del workflow:

1. Descarga el repositorio con `actions/checkout`.
2. Construye la imagen Docker.
3. Comprueba que existen los archivos principales del proyecto.

En este proyecto el despliegue automatico real lo hace Jenkins. GitHub Actions queda como validacion adicional del repositorio.

## Entrega

Incluir:

- URL del repositorio GitHub.
- Captura de Jenkins con el pipeline en verde.
- Captura de Cloudflare con DNS/proxy activo.
- URL del CV funcionando por HTTPS.
- `README.md` y `reflexion.md`.
