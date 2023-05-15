<template>
    <div class="patient-container" style="width: 80vw">
        <div class="row justify-content-center button-patient">
            <div class="col-10 padding-col-zero">
                <h1 class="title-patient">Report Patient</h1>
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
                    Add new report
                </button>
            </div>
        </div>

        <!-- Modal content add and edit -->
        <div class="modal" v-if="isOpenAdd">
            <div class="modal-content">
                <span class="close" @click="closeModalAdd">&times;</span>

                <div class="modal-body">
                    <h3>Add New Report</h3>

                    <div class="input-div">
                        <div class="row justify-content-start">
                            <div class="col-3">
                                <label for="name" class="col-form-label"
                                    >Patient ID:</label
                                >
                            </div>
                            <div class="col-9">
                                <input
                                    type="number"
                                    id="patient_id"
                                    class="form-control"
                                    v-model="newReport.patient_id"
                                />
                            </div>
                        </div>

                        <div class="row justify-content-start">
                            <div class="col-3">
                                <label for="age" class="col-form-label"
                                    >Tekanan darah:</label
                                >
                            </div>
                            <div class="col-9">
                                <input
                                    type="number"
                                    id="age"
                                    class="form-control"
                                    v-model="newReport.tekanan_darah"
                                />
                            </div>
                        </div>

                        <div class="row justify-content-start">
                            <div class="col-3">
                                <label for="weight" class="col-form-label"
                                    >Denyut nadi:</label
                                >
                            </div>
                            <div class="col-9">
                                <input
                                    type="number"
                                    id="weight"
                                    class="form-control"
                                    v-model="newReport.denyut_nadi"
                                />
                            </div>
                        </div>

                        <div class="row justify-content-start">
                            <div class="col-3">
                                <label for="height" class="col-form-label"
                                    >Laju pernapasan:</label
                                >
                            </div>
                            <div class="col-9">
                                <input
                                    type="number"
                                    id="height"
                                    class="form-control"
                                    v-model="newReport.laju_pernapasan"
                                />
                            </div>
                        </div>

                        <div class="row justify-content-start">
                            <div class="col-3">
                                <label for="height" class="col-form-label"
                                    >Suhu tubuh:</label
                                >
                            </div>
                            <div class="col-9">
                                <input
                                    type="number"
                                    id="height"
                                    class="form-control"
                                    v-model="newReport.suhu_tubuh"
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
                            <th class="text-center">Tekanan Darah</th>
                            <th class="text-center">Denyut Nadi</th>
                            <th class="text-center">Laju Pernapasan</th>
                            <th class="text-center">Suhu Tubuh</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="report in reports" :key="report.id">
                            <td>{{ report.id }}</td>
                            <td>{{ report.name }}</td>
                            <td>{{ report.tekanan_darah }}</td>
                            <td>{{ report.denyut_nadi }}</td>
                            <td>{{ report.laju_pernapasan }}</td>
                            <td>{{ report.suhu_tubuh }}</td>
                            <td>
                                <div
                                    class="row justify-content-center"
                                    style="margin: 0px"
                                >
                                    <button
                                        type="button"
                                        class="btn btn-dark btn-tbl col-4"
                                        id="btn-remove"
                                        @click="openModalDel(report.id)"
                                    >
                                        Delete
                                    </button>
                                    <button
                                        type="button"
                                        class="btn btn-dark btn-tbl col-4"
                                        id="btn-edit"
                                        @click="
                                            openModalEdit(
                                                report.id,
                                                report.patient_id,
                                                report.tekanan_darah,
                                                report.denyut_nadi,
                                                report.laju_pernapasan,
                                                report.suhu_tubuh
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
                        Are you sure want to delete {{ this.idReport }} ?
                    </p>
                    <!-- Submit button -->
                    <div
                        class="row"
                        style="padding-right: 60px; padding-left: 60px"
                    >
                        <button
                            @click="deletePatient(this.idReport)"
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
                <h3>Edit Report {{ this.editReport.id }}</h3>

                <div class="input-div">
                    <div class="row justify-content-start">
                        <div class="col-3">
                            <label for="name" class="col-form-label"
                                >ID Patient:</label
                            >
                        </div>
                        <div class="col-9">
                            <input
                                type="text"
                                id="name"
                                class="form-control"
                                v-model="this.editReport.patient_id"
                            />
                        </div>
                    </div>

                    <div class="row justify-content-start">
                        <div class="col-3">
                            <label for="tekanan_darah" class="col-form-label"
                                >Tekanan darah:</label
                            >
                        </div>
                        <div class="col-9">
                            <input
                                type="number"
                                id="age"
                                class="form-control"
                                v-model="this.editReport.tekanan_darah"
                            />
                        </div>
                    </div>

                    <div class="row justify-content-start">
                        <div class="col-3">
                            <label for="denyut_nadi" class="col-form-label"
                                >Denyut nadi:</label
                            >
                        </div>
                        <div class="col-9">
                            <input
                                type="number"
                                id="weight"
                                class="form-control"
                                v-model="this.editReport.denyut_nadi"
                            />
                        </div>
                    </div>

                    <div class="row justify-content-start">
                        <div class="col-3">
                            <label for="height" class="col-form-label"
                                >Laju Pernapasan:</label
                            >
                        </div>
                        <div class="col-9">
                            <input
                                type="number"
                                id="height"
                                class="form-control"
                                v-model="this.editReport.laju_pernapasan"
                            />
                        </div>
                    </div>

                    <div class="row justify-content-start">
                        <div class="col-3">
                            <label for="height" class="col-form-label"
                                >Suhu tubuh:</label
                            >
                        </div>
                        <div class="col-9">
                            <input
                                type="number"
                                id="height"
                                class="form-control"
                                v-model="this.editReport.suhu_tubuh"
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
            reports: [],

            idReport: "",

            isOpenAdd: false,
            newReport: {
                patient_id: "",
                tekanan_darah: "",
                denyut_nadi: "",
                laju_pernapasan: "",
                suhu_tubuh: "",
            },

            isOpenDel: false,

            isOpenEdit: false,
            editReport: {
                id: "",
                patient_id: "",
                tekanan_darah: "",
                denyut_nadi: "",
                laju_pernapasan: "",
                suhu_tubuh: "",
            },
        };
    },
    mounted() {
        this.getReport();
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
            // Perform the logic to add the new patient using the data from `newReport`
            console.log("Adding patient:", this.newReport);

            axios
                .post("http://127.0.0.1:8000/api/report/store", this.newReport)
                .then((response) => {
                    this.reports.push(response.data.data);
                    console.log("Response:", response.data);
                })
                .catch((error) => {
                    console.error("Error adding table value:", error);
                });

            // Reset the form
            this.newReport = {
                patient_id: "",
                tekanan_darah: "",
                denyut_nadi: "",
                laju_pernapasan: "",
                suhu_tubuh: "",
            };

            // Close the modal
            this.isOpenAdd = false;
        },

        //modal remove
        openModalDel(id) {
            this.isOpenDel = true;
            this.idReport = id;
        },
        closeModalDel() {
            this.isOpenDel = false;
        },

        //delete patient
        deletePatient(idRep) {
            let delReport = {
                id: idRep,
            };

            console.log("Report request:", delReport);

            axios
                .post("http://127.0.0.1:8000/api/report/delete", delReport)
                .then((response) => {
                    console.log("Report delete:", response.data);
                    this.reports = this.reports.filter(
                        (report) => report.id != idRep
                    );

                    delReport = {
                        id: "",
                    };

                    this.closeModalDel();
                })
                .catch((error) => {
                    console.error("Error deleting patient:", error);
                });
        },

        //modal edit
        openModalEdit(
            id,
            patient_id,
            tekanan_darah,
            denyut_nadi,
            laju_pernapasan,
            suhu_tubuh
        ) {
            this.isOpenEdit = true;
            this.editReport = {
                id: id,
                patient_id: patient_id,
                tekanan_darah: tekanan_darah,
                denyut_nadi: denyut_nadi,
                laju_pernapasan: laju_pernapasan,
                suhu_tubuh: suhu_tubuh,
            };
        },

        closeModalEdit() {
            this.isOpenEdit = false;
            this.editReport = {
                id: "",
                patient_id: "",
                tekanan_darah: "",
                denyut_nadi: "",
                laju_pernapasan: "",
                suhu_tubuh: "",
            };
        },

        //edit patient
        editPatientFunc() {
            // Perform the logic to add the new patient using the data from `newReport`
            console.log("Adding patient:", this.editReport);

            let data = this.editReport;
            axios
                .post(
                    "http://127.0.0.1:8000/api/report/update",
                    this.editReport
                )
                .then((response) => {

                    console.log(data)
                    const foundItem = this.reports.findIndex(
                        
                        (report) => report.id == data.id

                    );

                    console.log(foundItem)

                    this.reports.splice(foundItem, 1, response.data.data);
                    console.log("Response:", response.data);

                })
                .catch((error) => {
                    console.error("Error adding table value:", error);
                    this.editReport = {
                        id: "",
                        patient_id: "",
                        tekanan_darah: "",
                        denyut_nadi: "",
                        laju_pernapasan: "",
                        suhu_tubuh: "",
                    };
                });

            // Reset the form
            this.editReport = {
                id: "",
                patient_id: "",
                tekanan_darah: "",
                denyut_nadi: "",
                laju_pernapasan: "",
                suhu_tubuh: "",
            };

            // Close the modal
            this.isOpenEdit = false;
        },

        //get report
        getReport() {
            axios
                .get("http://127.0.0.1:8000/api/report/get-all")
                .then((res) => {
                    this.reports = res.data;
                    console.log(this.reports);
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
