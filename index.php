<?php
$name = 'Anas Kharbouch';
$role = 'Desarrollador web junior';
$imageUrl = 'https://ik.imagekit.io/demo/img/image1.jpeg?tr=f-webp,w-320,q-85';
?>
<!doctype html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="CV personal desplegado con CI/CD, Jenkins, Docker, Apache, PHP, Cloudflare e ImageKit." />
    <title>CV - <?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></title>
    <link rel="stylesheet" href="styles.css" />
  </head>
  <body>
    <main class="page">
      <section class="profile">
        <img
          class="profile__photo"
          src="<?php echo htmlspecialchars($imageUrl, ENT_QUOTES, 'UTF-8'); ?>"
          alt="Foto de perfil del CV"
          width="160"
          height="160"
        />
        <div>
          <p class="eyebrow">Curriculum Vitae</p>
          <h1><?php echo htmlspecialchars($name, ENT_QUOTES, 'UTF-8'); ?></h1>
          <p class="headline"><?php echo htmlspecialchars($role, ENT_QUOTES, 'UTF-8'); ?></p>
          <p class="summary">
            CV publicado con un flujo CI/CD: GitHub dispara Jenkins, Jenkins valida
            PHP y despliega la web en Apache dentro de una Raspberry simulada con Docker.
          </p>
        </div>
      </section>

      <section class="grid" aria-label="Información principal del CV">
        <article>
          <h2>Contacto</h2>
          <ul>
            <li>Email: tu-email@example.com</li>
            <li>GitHub: github.com/anaskha7</li>
            <li>Ubicación: España</li>
          </ul>
        </article>

        <article>
          <h2>Tecnologías</h2>
          <ul>
            <li>PHP, HTML y CSS</li>
            <li>Apache, Docker y Docker Compose</li>
            <li>Jenkins y GitHub Actions</li>
            <li>Cloudflare e ImageKit</li>
          </ul>
        </article>

        <article>
          <h2>Experiencia</h2>
          <p>
            Desarrollo y despliegue de una página de CV con automatización CI/CD,
            validación PHP, optimización de imágenes y entrega por HTTPS.
          </p>
        </article>

        <article>
          <h2>Formación</h2>
          <p>
            Proyecto práctico de integración continua, despliegue continuo,
            configuración DNS/CDN y optimización web.
          </p>
        </article>
      </section>
    </main>
  </body>
</html>
