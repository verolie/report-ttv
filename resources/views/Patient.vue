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
                <button @click="openModal" type="button" class="btn btn-dark btn-tbl" id="btn-add">
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

        <!-- Modal content -->
        <div class="modal" v-if="isOpen">
            <div class="modal-content">
            <!-- Modal close button -->
            <span class="close" @click="closeModal">&times;</span>

            <!-- Modal body content -->
            <div class="modal-body">
                <h3>Add New Patient</h3>

                <!-- Form inputs -->
                <div>
                    <label for="name">Name:</label>
                    <input type="text" id="name" v-model="newPatient.name" />
                </div>

                <div>
                    <label for="weight">Weight:</label>
                    <input type="number" id="weight" v-model="newPatient.weight" />
                </div>

                <div>
                    <label for="height">Height:</label>
                    <input type="number" id="height" v-model="newPatient.height" />
                </div>

                <!-- Submit button -->
                <button @click="addPatient" class="btn btn-primary">Submit</button>
                </div>
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
export default {
  data() {
    return {
      isOpen: false,
      newPatient: {
        name: '',
        weight: '',
        height: ''
      }
    };
  },
  methods: {
    openModal() {
      this.isOpen = true;
    },
    closeModal() {
      this.isOpen = false;
    },
    addPatient() {
      // Perform the logic to add the new patient using the data from `newPatient`
      console.log('Adding patient:', this.newPatient);

      // Reset the form
      this.newPatient = {
        name: '',
        weight: '',
        height: ''
      };

      // Close the modal
      this.isOpen = false;
    }
  }
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
  padding: 20px;
  border: 1px solid #888;
  width: 80%;
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

/* Other styles */
.btn-tbl {
  margin-right: 10px;
}
</style>