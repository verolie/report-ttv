<template>
    <div class="patient-container" style="width: 80vw">
        <div class="row justify-content-center button-patient">
            <div class="col-10 padding-col-zero">
                <h1 class="title-patient">Detail Patient</h1>
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
                <span class="close" @click="closeModalAdd">&times;</span>

                <div class="modal-body">
                    <h3>Add New Patient</h3>

                    <div class="input-div">
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
                            <th class="text-center">Age</th>
                            <th class="text-center">Height</th>
                            <th class="text-center">Weight</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="patient in patients" :key="patient.id">
                            <td>{{ patient.id }}</td>
                            <td>{{ patient.name }}</td>
                            <td>{{ patient.age }}</td>
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
                                        @click="openModalDel(patient.id)"
                                    >
                                        Delete
                                    </button>
                                    <button
                                        type="button"
                                        class="btn btn-dark btn-tbl col-3"
                                        id="btn-edit"
                                        @click="
                                            openModalEdit(
                                                patient.id,
                                                patient.name,
                                                patient.age,
                                                patient.height,
                                                patient.weight
                                            )
                                        "
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

        <!-- delete form -->
        <div class="modal" v-if="isOpenDel">
            <div class="modal-content">
                <span class="close" @click="closeModalDel">&times;</span>

                <div class="modal-body">
                    <p style="text-align: center">
                        Are you sure want to delete {{ this.idPatient }} ?
                    </p>
                    <!-- Submit button -->
                    <div
                        class="row"
                        style="padding-right: 60px; padding-left: 60px"
                    >
                        <button
                            @click="deletePatient(this.idPatient)"
                            class="btn btn-primary col align-self-center"
                        >
                            Confirm
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal content edit -->
    <div class="modal" v-if="isOpenEdit">
        <div class="modal-content">
            <span class="close" @click="closeModalEdit">&times;</span>

            <div class="modal-body">
                <h3>Edit Patient {{ this.editPatient.id }}</h3>

                <div class="input-div">
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
                                v-model="this.editPatient.name"
                            />
                        </div>
                    </div>

                    <div class="row justify-content-start">
                        <div class="col-3">
                            <label for="age" class="col-form-label">Age:</label>
                        </div>
                        <div class="col-9">
                            <input
                                type="number"
                                id="age"
                                class="form-control"
                                v-model="this.editPatient.age"
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
                                v-model="this.editPatient.weight"
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
                                v-model="this.editPatient.height"
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
                        @click="editPatientFunc"
                        class="btn btn-primary col align-self-center"
                    >
                        Submit
                    </button>
                </div>
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

            idPatient: "",

            isOpenAdd: false,
            newPatient: {
                age: "",
                name: "",
                weight: "",
                height: "",
            },

            isOpenDel: false,

            isOpenEdit: false,
            editPatient: {
                id: "",
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

        //modal remove
        openModalDel(id) {
            this.isOpenDel = true;
            this.idPatient = id;
        },
        closeModalDel() {
            this.isOpenDel = false;
        },

        //delete patient
        deletePatient(idPat) {
            console.log("Patient delete:", idPat);

            let delPatient = {
                id: idPat,
            };

            console.log("Patient request:", delPatient);

            axios
                .post("http://127.0.0.1:8000/api/patient/delete", delPatient)
                .then((response) => {
                    console.log("Patient delete:", response.data);
                    this.patients = this.patients.filter(
                        (patient) => patient.id != idPat
                    );

                    delPatient = {
                        id: "",
                    };

                    this.closeModalDel();
                })
                .catch((error) => {
                    console.error("Error deleting patient:", error);
                });
        },

        //modal edit
        openModalEdit(id, name, age, height, weight) {
            this.isOpenEdit = true;
            this.editPatient = {
                id: id,
                age: age,
                name: name,
                weight: weight,
                height: height,
            };
        },

        closeModalEdit() {
            this.isOpenEdit = false;
            this.editPatient = {
                id: "",
                age: "",
                name: "",
                weight: "",
                height: "",
            };
        },

        //edit patient
        editPatientFunc() {
            // Perform the logic to add the new patient using the data from `newPatient`
            console.log("Adding patient:", this.newPatient);

            axios
                .post(
                    "http://127.0.0.1:8000/api/patient/update",
                    this.editPatient
                )
                .then((response) => {
                    const index = this.patients.findIndex(
                        (patient) => patient.id == this.editPatient.id
                    );

                    console.log(index)

                    this.patients.splice(index, 1, response.data.data);
                    console.log("Response:", response.data);
                })
                .catch((error) => {
                    console.error("Error adding table value:", error);
                    this.newPatient = {
                        age: "",
                        name: "",
                        weight: "",
                        height: "",
                    };
                });

            // Reset the form
            this.newPatient = {
                age: "",
                name: "",
                weight: "",
                height: "",
            };

            // Close the modal
            this.isOpenEdit = false;
        },

        //get patients
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
