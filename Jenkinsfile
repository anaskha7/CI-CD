pipeline {
  agent any

  environment {
    IMAGE_NAME = 'cv-web'
    CONTAINER_NAME = 'cv-web'
    HOST_PORT = '8081'
  }

  stages {
    stage('Checkout') {
      steps {
        checkout scm
      }
    }

    stage('Build Docker image') {
      steps {
        sh 'docker build -t ${IMAGE_NAME}:latest .'
      }
    }

    stage('Deploy') {
      steps {
        sh '''
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
      echo 'Despliegue completado: http://IP_RASPBERRY:8081'
    }
  }
}
