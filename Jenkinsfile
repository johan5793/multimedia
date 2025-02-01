pipeline {
    agent any  // Usa cualquier agente disponible

    stages {
        stage('Checkout') {
            steps {
                git branch: 'main', url: 'https://github.com/TU-USUARIO/TU-REPO.git'
            }
        }

        stage('Instalar Dependencias') {
            steps {
                sh 'npm install'
            }
        }

        stage('Ejecutar Pruebas') {
            steps {
                sh 'npm test'
            }
        }

        stage('Construir Imagen Docker') {
            steps {
                sh 'docker build -t mi-aplicacion .'
            }
        }

        stage('Desplegar en Producción') {
            steps {
                sh 'docker run -d -p 80:3000 mi-aplicacion'
            }
        }
    }
}
