<template>
<div class="col">
    <form @submit.prevent="updateEmployee()" >
        
        <div class="card">
            <div class="card-header">Update Employee</div>
            <div class="form-group card-body"> 
                <input class="form-control" v-model="form.first_name" placeholder="First Name" type="text" name="name" id="name">
            </div>
            <div class="form-group card-body"> 
                <input class="form-control" v-model="form.middle_name" placeholder="Middle Name" type="text" name="name" id="name">
            </div>
            <div class="form-group card-body"> 
                <input class="form-control" v-model="form.last_name" placeholder="Last Name " type="text" name="name" id="name">
            </div>
            <div class="form-group card-body"> 
                <input class="form-control" v-model="form.address" placeholder="Address " type="text" name="address" id="address">
            </div>
            
            <div class="form-group card-body"> 
                <input class="form-control" v-model="form.zip_code" placeholder="Zip Code " type="number" name="zipcode" id="zipcode">
            </div>
            <div class="form-group card-body"> 
                <label for="country">Select a Country</label>
                <select v-model="form.country_id" @change="getStates()"
                 class="form-control" placeholder="Country Code" type="text" name="country" id="country"  aria-label="Select Country">
                    <option v-for="country in countries" :key="country.id" :value="country.id">{{country.name}}</option>
                </select>
            </div>
            <div class="form-group card-body"> 
                <label for="state">Select a State</label>
                <select v-model="form.state_id" @change="getCities()"
                 class="form-control" placeholder="State " type="text" name="state" id="state"  aria-label="Select State">
                    <option v-for="state in states" :key="state.id" :value="state.id">{{state.name}}</option>
                </select>
            </div>
            <div class="form-group card-body"> 
                <label for="city">Select A City</label>
                <select v-model="form.city_id" class="form-control" placeholder="City" type="text" name="city" id="city" >
                    <option :value="city.id" v-for="city in cities" :key="city.id" >{{city.name}}</option>
                </select>
            </div>
            <div class="form-group card-body"> 
                <label for="department">Select A Department</label>
                <select class="form-control" v-model="form.department_id" placeholder="Department" type="text" name="department" id="department " >
                    <option :key="department.id" :value="department.id" v-for="department in departments">{{department.name}}</option>
                </select>
                
            </div>
            <div class="form-group card-body"> 
                <datepicker bootstrap-styling v-model="form.date_hired"   placeholder="Date Hired "></datepicker>
            </div>
            <div class="form-group card-body"> 
                <datepicker bootstrap-styling v-model="form.birthdate"   placeholder="BirthDate "></datepicker>
            </div>
            
            <button type="submit" class="btn btn-danger mb-2">Update Employee</button>
        </div>
        
    </form>
</div>
</template>
<script>
import Datepicker from 'vuejs-datepicker';
import moment from "moment";
export default {
  components: {
    Datepicker
  },
  created(){
      this.getCountries();
      this.getDepartments();
      this.getEmployee();
  },
  data(){
     return { countries: [],
      states: [],
      cities:[],
      departments:[],
      form: {
                first_name: "",
                last_name: "",
                middle_name: "",
                address: "",
                country_id: "",
                state_id: "",
                department_id: "",
                city_id: "",
                zip_code: "",
                birthdate: null,
                date_hired: null
            }
     }
  },
  methods:{
      getCountries() {
            axios
                .get("/api/employees/countries")
                .then(res => {
                    this.countries = res.data;
                })
                .catch(error => {
                    console.log(console.error);
                });
        },
        getStates(){
            axios
            .get("/api/employees/"+this.form.country_id+"/states")
            .then(res=>{
                this.states=res.data;
            })
            .catch(err=>{
                console.log(err);
            });
        },
        getCities(){
            axios
            .get("/api/employees/"+this.form.state_id+"/cities")
            .then(res=>{
                this.cities=res.data;
            })
            .catch(err=>{
                console.log(err);
            });
        },
        getDepartments(){
            axios
                .get("/api/employees/departments")
                .then(res => {
                    this.departments = res.data;
                })
                .catch(error => {
                    console.log(console.error);
                });
        },
        updateEmployee(){
            axios
            .put("/api/employees/"+this.$route.params.id,{
                first_name:this.form.first_name,
                middle_name:this.form.middle_name,
                last_name:this.form.last_name,
                address:this.form.address,
                zip_code:this.form.zip_code,
                birthdate:this.format_date(this.form.date_hired),
                date_hired:this.format_date(this.form.date_hired),
                country_id:this.form.country_id,
                state_id:this.form.state_id,
                city_id:this.form.city_id,
                department_id:this.form.department_id

            }).then(res=>{
                this.$router.push({ name: "EmployeeIndex" });
                this.$toasted.success('Employee Updated Successfully').goAway(2000);
            }).catch(err=>{
                this.$toasted.success(err);
            })
        },
        format_date(value) {
            if (value) {
                return moment(String(value)).format("YYYYMMDD");
            }
        },
        getEmployee() {
            axios
                .get("/api/employees/" + this.$route.params.id)
                .then(res => {
                    this.form = res.data.data;
                    this.getStates();
                    this.getCities();
                })
                .catch(error => {
                    console.log(console.error);
                });
        }
  }

}
</script>
