<template>
<div>
    <alert :show.sync="showRight" placement="top-right" duration="3000" type="success" width="400px" dismissable>
      <span class="icon-ok-circled alert-icon-float-left"></span>
      <strong>Candidate Added!</strong>
      <p>You successfully read this important alert message.</p>
    </alert>

    <div class='row'>
        <div class="form-group col-xs-6">
            <label>First</label>
            <input type='text' class='form-control' v-model='first' placeholder='First Name'>
        </div>
        <div class="form-group col-xs-6">
            <label>Last</label>
            <input type='text' class='form-control' v-model='last' placeholder='Last Name'>
        </div>
    </div>

    <div class='row'>
        <div class='form-group col-xs-6'>
            <label>Email</label>
            <input type='text' class='form-control' v-model='email' placeholder='Email address'>
        </div>

        <div class='form-group col-xs-6'>
            <label>Phone <span class="label label-default">Optional</span></label>
            <input type='text' class='form-control' v-model='phone' placeholder='Phone number'>
        </div>
    </div>

    <div class='form-group'>
        <location-input :location="locationData"></location-input>
    </div>

    <div class='form-group'>
        <label>Linkedin profile <span class="label label-default">Optional</span></label>
        <input type='text' class='form-control' v-model='linkedin' placeholder='Linkedin profile full url'>
    </div>

    <div class='form-group'>
        <label>Portfolio <span class="label label-default">Optional</span></label>
        <input type='text' class='form-control' v-model='portfolio' placeholder='Portfolio'>
    </div>

    <button class='btn btn-default'>Cancel</button>

    <button class='btn btn-primary' v-on:click='submitForm'>{{buttontext}}</button>
</div>

</template>

<script>
import axios from 'axios';
import { alert } from 'vue-strap';

const blankDataObject = {
    first: '',
    last: '',
    email: '',
    phone: '',
    locationData: {
        place: {
            name: ''
        },
        types: [],
        restrictions: {'country': 'usa'}
    },
    linkedin: '',
    portfolio: '',
    showRight: false,
    successMessage: ''
};

export default {
    data() {
        return blankDataObject;
    },
    components: {
        alert
    },
    props: ['endpoint', 'buttontext'],
    methods: {
        submitForm(){
            var vm = this;
            var candidate = {
                first: this.first,
                last: this.last,
                email: this.email,
                phone: this.phone,
                latitude: this.locationData.place.geometry.location.lat(),
                longitude: this.locationData.place.geometry.location.lng(),
                linkedin: this.linkedin,
                portfolio: this.portfolio
            };

            console.log(candidate);
            
            axios.post(this.endpoint, candidate)
                .then((res, err)=>{
                    vm.first = '';
                    vm.last = '';
                    vm.email = '';
                    vm.phone = '';
                    vm.latitude = ''
                    vm.portfolio = '';
                    // don't know how to clear the locationInput field

                    // show alert
                    vm.successMessage = res.data;
                    vm.showRight = true;
                })
                .catch((err)=>{
                    console.error(err);
                })
        }
    }
}
</script>