<template>
    <div class="patient-container" style="width: 80vw">
        <div class="row justify-content-center button-patient">
            <div class="col-10 padding-col-zero">
                <h1 class="title-patient">Detail Patient</h1>
            </div>
        </div>

        <!-- search -->
        <div class="row justify-content-center search-patient">
            <div class="col-5">
                <div class="search">
                    <i class="fa fa-search"></i>
                    <input
                        type="text"
                        class="form-control"
                        placeholder="Have a question? Ask Now"
                    />
                    <button class="btn btn-primary">Search</button>
                </div>
            </div>
        </div>

        <!-- button -->
        <div class="row justify-content-center button-patient">
            <div class="col-9" style="padding: 0px">
                <button
                    @click="openModalAdd"
                    type="button"
                    class="btn btn-dark btn-tbl"
                    id="btn-add"
                >
                    Add new patient
                </button>
            </div>
        </div>

        <!-- Modal content add and edit -->
        <div class="modal" v-if="isOpenAdd">
            <div class="modal-content">
                <!-- Modal close button -->
                <span class="close" @click="closeModalAdd">&times;</span>

                <!-- Modal body content -->
                <div class="modal-body">
                    <h3>Add New Patient</h3>

                    <div class="input-div">
                        <!-- Form inputs -->
                        <div class="row justify-content-start">
                            <div class="col-3">
                                <label for="name" class="col-form-label"
                                    >Name:</label
                                >
                            </div>
                            <div class="col-9">
                                <input
                                    type="text"
                                    id="name"
                                    class="form-control"
                                    v-model="newPatient.name"
                                />
                            </div>
                        </div>

                        <div class="row justify-content-start">
                            <div class="col-3">
                                <label for="age" class="col-form-label"
                                    >Age:</label
                                >
                            </div>
                            <div class="col-9">
                                <input
                                    type="number"
                                    id="age"
                                    class="form-control"
                                    v-model="newPatient.age"
                                />
                            </div>
                        </div>

                        <div class="row justify-content-start">
                            <div class="col-3">
                                <label for="weight" class="col-form-label"
                                    >Weight:</label
                                >
                            </div>
                            <div class="col-9">
                                <input
                                    type="number"
                                    id="weight"
                                    class="form-control"
                                    v-model="newPatient.weight"
                                />
                            </div>
                        </div>

                        <div class="row justify-content-start">
                            <div class="col-3">
                                <label for="height" class="col-form-label"
                                    >Height:</label
                                >
                            </div>
                            <div class="col-9">
                                <input
                                    type="number"
                                    id="height"
                                    class="form-control"
                                    v-model="newPatient.height"
                                />
                            </div>
                        </div>
                    </div>
                    <!-- Submit button -->
                    <div
                        class="row"
                        style="padding-right: 60px; padding-left: 60px"
                    >
                        <button
                            @click="addPatient"
                            class="btn btn-primary col align-self-center"
                        >
                            Submit
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- table -->
        <div class="row justify-content-center table-content">
            <div class="table-patient col-9">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">ID</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Height</th>
                            <th class="text-center">Weight</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="patient in patients" :key="patient.id">
                            <td>{{ patient.id }}</td>
                            <td>{{ patient.name }}</td>
                            <td>{{ patient.height }}</td>
                            <td>{{ patient.weight }}</td>
                            <td>
                                <div
                                    class="row justify-content-center"
                                    style="margin: 0px"
                                >
                                    <button
                                        type="button"
                                        class="btn btn-dark btn-tbl col-3"
                                        id="btn-remove"
                                    >
                                        Delete
                                    </button>
                                    <button
                                        type="button"
                                        class="btn btn-dark btn-tbl col-3"
                                        id="btn-edit"
                                    >
                                        Edit
                                    </button>
                                    <div class="col-9 padding-col-zero"></div>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            patients: [],

            isOpenAdd: false,
            newPatient: {
                age: "",
                name: "",
                weight: "",
                height: "",
            },
        };
    },
    mounted() {
        this.getPatients();
    },
    methods: {
        //modal add
        openModalAdd() {
            this.isOpenAdd = true;
        },
        closeModalAdd() {
            this.isOpenAdd = false;
        },

        addPatient() {
            // Perform the logic to add the new patient using the data from `newPatient`
            console.log("Adding patient:", this.newPatient);

            axios
                .post(
                    "http://127.0.0.1:8000/api/patient/store",
                    this.newPatient
                )
                .then((response) => {
                    this.patients.push(response.data.data);
                    console.log("Response:", response.data);
                })
                .catch((error) => {
                    console.error("Error adding table value:", error);
                });

            // Reset the form
            this.newPatient = {
                age: "",
                name: "",
                weight: "",
                height: "",
            };

            // Close the modal
            this.isOpenAdd = false;
        },

        getPatients() {
            axios
                .get("http://127.0.0.1:8000/api/patient/get-all")
                .then((res) => {
                    this.patients = res.data;
                    console.log(this.patients);
                });
        },
    },
};
</script>

<style>
@import url("../css/patient.css");
</style>

<style scoped>
/* Modal styles */
.modal {
    display: block;
    position: fixed;
    z-index: 1;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    overflow: auto;
    background-color: rgba(0, 0, 0, 0.5);
}

.modal-content {
    background-color: white;
    margin: 15% auto;
    padding: 30px;
    border: 1px solid #888;
    width: 30%;
}

.close {
    color: #aaa;
    float: right;
    font-size: 28px;
    font-weight: bold;
    cursor: pointer;
}

.close:hover,
.close:focus {
    color: black;
    text-decoration: none;
    cursor: pointer;
}

/* input text */
.input-div {
    padding: 10px;
}

.input-div .row {
    margin-bottom: 15px;
}

/* .input-div .row div{
    margin-bottom: 15px;
} */

/* Other styles */
.btn-tbl {
    margin-right: 10px;
}
</style>
