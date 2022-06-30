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
    <title>Welcome!!</title>
    <!-- import link for bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- import vuejs link -->
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14"></script>

</head>

<body>
    <div class="container-fluid">
        <div class="container py-5" id="app">

            <div class="row text-center">
                <div class="col-md-12">
                    <div class="card shadow p-3 mb-5 bg-body rounded">
                        <div class="card-body">
                            <div class="card-header">

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
                                            {{welcome}}
                                        </h1>
                                        <hr class="my-3">
                                        <h4>
                                            {{information}}
                                        </h4>
                                        <hr class="my-3">
                                        <h5 class="text-start">
                                            Collabotaros:
                                            <br><br>
                                            <div class="mb-3 text-start" v-for="{ID, name, email, position, country, phone, github} in collaborators">
                                                <p>
                                                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse" :data-bs-target="'#'+ID" aria-expanded="false" :aria-controls="ID">
                                                        {{name}} - {{position}} <br>
                                                        View Details
                                                    </button>
                                                </p>
                                                <div class="collapse" :id="ID">
                                                    <div class="card card-body shadow-sm p-3 mb-5 bg-body rounded">
                                                        <div class="card-title">
                                                            CONTACT:
                                                        </div>
                                                        <br>
                                                        Email => <a :href="'mailto:'+email">{{email}}</a>
                                                        <br>
                                                        Github => <a :href="github" target="_blank">{{github}}</a>
                                                        <br>
                                                        Phone => (+52) <a href="tel:">{{phone}}</a>
                                                        <br>
                                                        Country => {{country}}
                                                    </div>
                                                </div>
                                            </div>
                                        </h5>

                                    </div>
                                </div>


                            </div>
                            <div class="card-text py-3" id="projects-container">


                                <!-- show error messages in case it exists -->
                                <div class="alert alert-danger p-3" role="alert" v-if="errors_projects.length">
                                    {{errors_projects}}
                                    <br> <br>
                                    <!-- button to recall showAllProjects() -->
                                    <button class="btn btn-sm btn-primary" @click="showAllProjects()">
                                        Try again
                                    </button>
                                    <br><br>
                                    <p class="fst-italic">
                                        If the error persists, please contact the administrator.
                                        <a href="mailto:eliottvaldes@hotmail.com"></a>
                                    </p>
                                </div>

                                <!-- buttons to hide | show prohects-->
                                <div id="action-button-container">

                                    <!-- button to show all projects -->
                                    <div v-if="!showProjects">
                                        <button class="btn btn-primary" @click="showAllProjects()">
                                            Show projects
                                        </button>
                                    </div>
                                    <!-- button to hide projects -->
                                    <div v-else-if="!errors_projects">
                                        <button class="btn btn-primary" @click="hideAllProjects()">
                                            Hide projects
                                        </button>
                                    </div>
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
                                    <div v-if="projects.length">
                                        {{projects}}
                                        <ul class="list-group">
                                            <li class="list-group-item" v-for="project in projects">
                                                {{project-ID}} -
                                                {{project.language}} -
                                                {{project.language_icon}}-
                                                {{project.name}} -
                                                {{project.description}} -
                                                {{project.url}} -
                                                {{project.image}} -
                                                {{project.creator}}
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- in case no exist any project and no error was catched -->
                                    <div v-if="!projects.length && !errors_projects.length">
                                        <h1>
                                            No projects found.
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
                    axios.get("https://copilot-projects.herokuapp.com/api/v1/get-messages.php").then(response => {
                        this.messages = [response.data]
                    }).catch(error => {
                        // TEMPORARY SOLUTION TO GET THE ERROR MESSAGE WITHOUT THE API
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
                    this.clearErrorMessages(errors_projects);
                },
                getAllProjects() {
                    // get all projects from the API
                    axios.get("/api/projects")
                        .then(response => {
                            this.projects = response.data
                        }).catch(error => {
                            // TEMPORARY SOLUTION TO GET ALL PROJECTS WITHOUT ERRORS
                            // this.errors_projects.push("there's an error getting the projects , it's not your fault :).")
                            // this.errors_projects.push(error)
                        }).finally(() => {
                            this.fetchingProjects = false
                        })
                    console.error(this.errors_projects)
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