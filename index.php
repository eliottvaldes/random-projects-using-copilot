<?php

# we need to call the autoloader
require __DIR__ . '/vendor/autoload.php';

?>
<!-- 
    Document  : index.html
    Created on : Jun 30, 2022, 02:15:08 AM
    Author     : Eliot Valdés | @eliottvaldes
    Description: This is the main page to show all projects developed in the repository.
 -->


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Just For Fun!</title>
    <!-- import link for bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- import vuejs link -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>
    <!-- implemnt fontawesome link -->
    <script src="https://kit.fontawesome.com/138878e8dd.js" crossorigin="anonymous"></script>

</head>

<body>
    <div class="container-fluid">
        <div class="container py-5" id="app">

            <div class="row text-center">
                <div class="col-md-12">
                    <div>
                        <div>
                            <div>

                                <!-- show a loader while si charging -->
                                <div v-if="fetchingMessages">
                                    <!-- create a loader -->
                                    <div class="d-flex justify-content-center">
                                        <div class="spinner-border" role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                    </div>
                                </div>
                                <!-- show error messages in case it exists -->
                                <div class="alert alert-danger p-3" role="alert" v-if="errors_msg.length">
                                    {{errors_msg}}
                                    <br> <br>
                                    <!-- buttom to reload the page -->
                                    <button class="btn btn-primary" @click="location.reload()">
                                        Reload
                                    </button>
                                    <br> <br>
                                    <p class="fst-italic">
                                        If the error persists, please contact the administrator.
                                        <a href="mailto:eliottvaldes@hotmail.com"></a>
                                    </p>

                                </div>
                                <!-- show all messages -->
                                <div class="" v-if="messages.length">
                                    <div v-for="{welcome, information, collaborators} in messages">
                                        <h1>
                                            <!-- show the data inside messages using vuejs-->
                                            <i class="fa-solid fa-code"></i> {{welcome}} <i class="fa-solid fa-code"></i>
                                        </h1>
                                        <hr class="my-3">
                                        <h4>
                                            {{information}} <i class="fa-solid fa-microchip"></i>
                                        </h4>
                                        <hr class="my-3">
                                        <h5 class="text-start">
                                            <i class="fa-solid fa-user-astronaut"></i> Contributors:
                                            <br><br>
                                            <div class="mb-3 text-start" v-for="{ID, name, email, position, country, phone, github} in collaborators">
                                                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                                    <div class="col col-sm-12 col-md-12 col-lg-6">
                                                        <p>
                                                            <button class="btn btn-primary text-start" type="button" data-bs-toggle="collapse" :data-bs-target="'#'+ID" aria-expanded="false" :aria-controls="ID">
                                                                {{name}} ~
                                                                {{position}}
                                                                <br>
                                                                View Details <i class="fa-solid fa-circle-info"></i>
                                                            </button>
                                                        </p>
                                                    </div>
                                                    <div class="col col-sm-12 col-md-12 col-lg-6">
                                                        <div class="collapse" :id="ID">
                                                            <div class="card card-body shadow p-3 mb-5 bg-body rounded">
                                                                <p class="card-title">
                                                                    <i class="fa-solid fa-id-card-clip"></i> CONTACT:
                                                                </p>
                                                                <p class="card-text">
                                                                    <br>
                                                                    <i class="fa-solid fa-envelope"></i> Email => <a :href="'mailto:'+email">{{email}}</a>
                                                                    <br>
                                                                    <i class="fa-brands fa-github"></i> Github => <a :href="github" target="_blank">{{github}}</a>
                                                                    <br>
                                                                    <i class="fa-solid fa-phone"></i> Phone => (+52) <a href="tel:">{{phone}}</a>
                                                                    <br>
                                                                    <i class="fa-solid fa-globe"></i> Country =>
                                                                    {{country}}
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </h5>

                                    </div>
                                </div>


                            </div>
                            <div class="py-3" id="projects-container">


                                <!-- show error messages in case it exists -->
                                <div class="alert alert-danger p-3" role="alert" v-if="errors_projects.length">
                                    {{errors_projects}}
                                    <br> <br>
                                    <!-- button to recall showAllProjects() -->
                                    <button class="btn btn-sm btn-primary" @click="showAllProjects()">
                                        Try again
                                    </button>
                                    <br><br>
                                    <p class="fst-italic"></p>
                                    If the error persists, please contact the administrator.
                                    <a href="mailto:eliottvaldes@hotmail.com"></a>
                                    </p>
                                </div>

                                <!-- buttons to hide | show projects-->
                                <div id="action-button-container">

                                    <hr class="my-3">

                                    <!-- button to show all projects -->
                                    <div v-if="!showProjects">
                                        <button class="btn btn-primary" @click="showAllProjects()">
                                            <i class="fa-solid fa-arrow-down"></i> Show projects
                                        </button>
                                    </div>
                                    <!-- button to hide projects -->
                                    <div v-else-if="!(errors_projects.length)">
                                        <button class="btn btn-primary" @click="hideAllProjects()">
                                            <i class="fa-solid fa-arrow-up"></i> Hide projects
                                        </button>
                                    </div>

                                    <br>

                                </div>

                                <!-- show all projects -->
                                <div id="projects-view" v-if="showProjects">

                                    <!-- show a loader while is charging -->
                                    <div v-if="fetchingProjects">
                                        <!-- create a loader -->
                                        <div class="d-flex justify-content-center">
                                            <div class="spinner-border" role="status">
                                                <span class="visually-hidden">Loading...</span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- in case projects show all -->
                                    <div class="album py-5 bg-light" v-if="projects.length && !fetchingProjects">

                                        <!-- card proyect container -->
                                        <div class="container">

                                            <!-- header information -->
                                            <h1 class="fw-light mb-5">
                                                <i class="fa-solid fa-vial"></i>
                                                Here you can find more info about our projects.
                                                <i class="fa-solid fa-vial"></i>
                                            </h1>

                                            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                                                <!-- create a card for each project -->
                                                <div class="col mb-2 text-start" v-for="{ID, name, description, url, gallery, language, language_icon, creator} in projects">
                                                    <div class="card shadow-sm" style="height: 100%;">
                                                        <img :src="gallery[0]" :alt="'Image of project ' + name" class="bd-placeholder-img card-img-top" width="100%" height="225">
                                                        <div class="card-body">
                                                            <p class="card-title">
                                                                {{name}}
                                                            </p>

                                                            <p class="card-text">
                                                                {{description}}
                                                            </p>
                                                            <div class="d-flex justify-content-between align-items-center">
                                                                <div class="btn-group">
                                                                    <a :href="url" target="_blank" class="btn btn-sm btn-outline-primary">
                                                                        App
                                                                    </a>
                                                                    <a href="https://github.com/eliottvaldes/random-projects-using-copilot" target="_blank" class="btn btn-sm btn-outline-primary">
                                                                        Code
                                                                    </a>
                                                                    <!-- <button type="button" class="btn btn-sm btn-outline-secondary">Edit</button> -->
                                                                </div>
                                                                <small class="text-muted">
                                                                    <i :class="'fa-brands fa-' + language_icon"></i>
                                                                </small>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                    </div>

                                    <!-- in case no exist any project and no error was catched -->
                                    <div v-else-if="!projects.length && !errors_projects.length && !fetchingProjects">
                                        <h1 class="my-3">
                                            <i class="fa-regular fa-face-sad-cry"></i>
                                            No projects found.
                                            <i class="fa-regular fa-face-sad-cry"></i>
                                        </h1>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <!-- bootstrap integration link -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>



    <!-- import axios link -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <!-- create our Vue App using id="app" -->
    <script>
        const Copilot_App = new Vue({
            el: "#app",
            data: {
                fetchingMessages: true,
                fetchingProjects: false,
                messages: [],
                showProjects: false,
                projects: [],
                errors_projects: [],
                errors_msg: []

            },
            mounted() {
                this.showMessages()
            },
            methods: {
                showMessages() {
                    // get all messajes from the API                    
                    axios.get("https://copilot-projects.herokuapp.com/api/v1/get-messages.php")
                        .then(response => {
                            this.messages = [response.data]
                        }).catch(error => {
                            this.errors_msg.push("error getting messages")
                            // this.errors_msg.push(error)
                        }).finally(() => {
                            this.fetchingMessages = false
                        })

                },
                showAllProjects() {
                    this.fetchingProjects = true
                    this.showProjects = true
                    this.clearErrorMessages('errors_projects');
                    this.getAllProjects()
                },
                hideAllProjects() {
                    this.showProjects = false
                    this.clearErrorMessages('errors_projects');
                },
                getAllProjects() {
                    // get all projects from the API
                    axios.get("https://copilot-projects.herokuapp.com/api/v1/get-projects.php")
                        .then(response => {
                            this.projects = response.data
                            console.log(this.projects)
                        }).catch(error => {
                            // TEMPORARY SOLUTION TO GET ALL PROJECTS WITHOUT ERRORS
                            this.errors_projects.push("there's an error getting the projects , it's not your fault :).")
                            // this.errors_projects.push(error)
                        }).finally(() => {
                            this.fetchingProjects = false
                        })
                },
                clearErrorMessages(typeOfError) {
                    if (typeOfError == 'errors_projects') {
                        this.errors_projects = []
                    } else {
                        this.errors_msg = []
                    }

                }
            }
        });
    </script>


</body>

</html>