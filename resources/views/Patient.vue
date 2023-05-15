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
            <div class="col-9 padding-col-zero">
                <button @click="() => TogglePopup('buttonTrigger')" type="button" class="btn btn-dark btn-tbl" id="btn-add">
                    Add
                </button>
                <button
                    type="button"
                    class="btn btn-dark btn-tbl"
                    id="btn-remove"
                >
                    Delete
                </button>
                <button
                    type="button"
                    class="btn btn-dark btn-tbl"
                    id="btn-edit"
                >
                    Edit
                </button>
            </div>
        </div>

        <!-- FfORM -->


        <!-- table -->
        <div class="row justify-content-center table-content">
            <div class="table-patient col-9">
                <table class="table">
                    <thead class="thead-dark">
                        <tr>
                            <th class="text-center">id</th>
                            <th class="text-center">Name</th>
                            <th class="text-center">Age</th>
                            <th class="text-center">Weight</th>
                            <th class="text-center">Height</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th class="text-center" scope="row">1</th>
                            <td>Mark</td>
                            <td>20</td>
                            <td>50</td>
                            <td>180</td>
                            <td>
                                <input
                                    type="checkbox"
                                    name="active[]"
                                    value="1"
                                />
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center" scope="row">2</th>
                            <td>Mark</td>
                            <td>20</td>
                            <td>50</td>
                            <td>180</td>
                            <td>
                                <input
                                    type="checkbox"
                                    name="active[]"
                                    value="2"
                                />
                            </td>
                        </tr>
                        <tr>
                            <th class="text-center" scope="row">3</th>
                            <td>Mark</td>
                            <td>20</td>
                            <td>50</td>
                            <td>180</td>
                            <td>
                                <input
                                    type="checkbox"
                                    name="active[]"
                                    value="1"
                                />
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>



<script>
import { ref } from 'vue';
// import PopupForm from "../js/components/Form-patient.vue";


// const btnAdd = document.getElementById("btn-add");
// const btnRemove = document.getElementById("btn-remove");
// const btnEdit = document.getElementById("btn-edit");


export default {
    setup () {
    
    }
}
</script>

<style>
  @import url("../css/patient.css");
</style>
