pipeline {
  agent any

  environment {
    IMAGE_NAME = 'cv-apache'
    CONTAINER_NAME = 'cv-apache'
    HOST_PORT = '8081'
    DOCKER_HOST = 'tcp://raspberry-docker:2375'
  }

  stages {
    stage('Descargar código') {
      steps {
        checkout scm
      }
    }

    stage('Validar PHP') {
      steps {
        sh 'docker run --rm -i php:8.3-cli php -l < index.php'
      }
    }

    stage('Desplegar en Apache') {
      steps {
        sh '''
          docker build -t ${IMAGE_NAME}:latest .
          docker rm -f ${CONTAINER_NAME} || true
          docker run -d \
            --name ${CONTAINER_NAME} \
            --restart unless-stopped \
            -p ${HOST_PORT}:80 \
            ${IMAGE_NAME}:latest
        '''
      }
    }
  }

  post {
    success {
      echo 'Despliegue completado en Apache: http://localhost:8081'
    }
  }
}
