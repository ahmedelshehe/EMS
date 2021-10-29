<template>
      <div class="container">
    <div class="card">
        <div class="card-header">
            <h6>Employees System</h6>
        </div>
        <div class="card-body">
            <div class="row">

                <div class="col">
                    <div class="card">
                        <div class="card-header">Employees List</div>
                        <div class="card-body">
                            
                            <form class="form-inline m-2">
                                <input id="search" name="search" v-model="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                                
                                <router-link class="btn btn-dark ml-3" :to="{name :'EmployeeCreate'}">Create</router-link>
                                <div class="form-group card-body"> 
                                    <label for="department" class="mr-3">Select A Department</label>
                                        <select class="form-control" v-model="selectedDeprtment" placeholder="Department" type="text" name="department" id="department" >
                                            <option :key="department.id" :value="department.id" v-for="department in departments">{{department.name}}</option>
                                        </select>
                
                                </div>
                            </form>
                            
                            <table class="table table-hover " >
                                <thead>
                                    <tr>
                                      <th scope="col">#</th>
                                      <th scope="col">First Name</th>
                                      <th scope="col">Middle Name</th>
                                      <th scope="col">Last Name</th>
                                      <th scope="col">Department</th>
                                      <th scope="col">Edit</th>
                                      <th scope="col">Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <tr v-for="employee in employees" :key="employee.id">
                                      <th scope="row">{{employee.id}}</th>
                                      <td>{{employee.first_name}}</td>
                                      <td>{{employee.middle_name}}</td>
                                      <td>{{employee.last_name}}</td>
                                      <td>{{employee.department.name}}</td>
                                      <td>
                                          <router-link
                                        :to="{
                                            name: 'EmployeeEdit',
                                            params: { id: employee.id }
                                        }"
                                        class="btn btn-success"
                                        ><i class="far fa-edit"></i></router-link
                                        >
                                        
                                      </td>
                                      <td>
                                          <button type="submit" class="btn btn-primary" @click="deleteEmployee(employee.id)">
                                             <i class="fas fa-trash-alt"></i>
                                         </button>
                                      </td>
                                    </tr>
                                   
                                    
                                </tbody> 
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
    
</div>

</template>

<script>
export default {
 data(){
    return {
        employees :[],
        search: null,
            selectedDeprtment: null,
            departments: []
        }
 },
 watch: {
        search() {
            this.getEmployees();
        },
        selectedDeprtment() {
            this.getEmployees();
        }
    },
    created() {
        this.getEmployees();
        this.getDepartments();
    },
    methods: {
        getEmployees() {
            axios
                .get("/api/employees", {
                    params: {
                        search: this.search,
                        department_id: this.selectedDeprtment
                    }
                })
                .then(res => {
                    this.employees = res.data.data;
                })
                .catch(error => {
                    console.log(error);
                });
        },
     deleteEmployee(id){
         axios
         .delete("api/employees/"+id)
         .then(res =>{
             this.getEmployees(),
            this.$toasted.success('Employee Deleted Successfully').goAway(2000);
         })
     },
     getDepartments() {
            axios
                .get("/api/employees/departments")
                .then(res => {
                    this.departments = res.data;
                })
                .catch(error => {
                    console.log(console.error);
                });
        },
 }
}
</script>

<style>

</style>