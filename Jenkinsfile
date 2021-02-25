node {
    checkout scm

    docker.withRegistry('https://registry.hub.docker.com', 'Dockerhub') {

        def customImage = docker.build("apanisile/voteweb-app")

        /* Push the container to the custom Registry */
        customImage.push()
    }
}