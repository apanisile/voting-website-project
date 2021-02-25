pipeline {
    agent {
        docker { image 'nginx:latest' }
    }
    stages {
        stage('Test') {
            steps {
                sh 'echo "Successful!"'
            }
        }
    }
}