<template>
    <div class="row mt-2">
        <div class="col-4" style="display: flex; align-items: center; flex-direction: column;">
            <img src="/vectors/user.svg" class="pt-5 w-75" />
        </div>

        <div class="col-8" style="text-align: left;">
            <form @submit.prevent="submit">
                <fieldset style="text-align: left;">
                <legend>Edit User's Info</legend>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" id="name" v-model="form.name" @change="form.validate('name')" class="form-control" placeholder="Write your name"
                    >
                    <div v-if="form.invalid('name')">
                        {{ form.errors.name }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" id="last_name" v-model="form.last_name" @change="form.validate('last_name')" class="form-control" placeholder="Write your last name"
                    >
                    <div v-if="form.invalid('last_name')">
                        {{ form.errors.last_name }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" v-model="form.email" @change="form.validate('email')" class="form-control" placeholder="Write your email"
                    >
                    <span v-if="form.valid('email')">
                        ✅
                    </span>
                </div>
                <div class="mb-3">
                    <label for="degree" class="form-label">Degree</label>
                    <input type="text" name="degree" id="degree" v-model="form.degree" @change="form.validate('degree')" class="form-control" placeholder="Write your degree"
                    >
                    <div v-if="form.invalid('degree')">
                        {{ form.errors.degree }}
                    </div>
                </div>
                <div class="mb-3">
                    <label for="department" class="form-label">Department</label>
                    <input type="text" name="department" id="department" v-model="form.department" @change="form.validate('department')" class="form-control" placeholder="Write your department"
                    >
                    <div v-if="form.invalid('department')">
                        {{ form.errors.department }}
                    </div>
                </div>
                </fieldset>
                <button :disabled="form.processing" class="bg-dark btn btn-dark">Save</button>
            </form>
        </div>
  </div>
</template>

<script setup>
import { useForm } from 'laravel-precognition-vue';

const user = {}
const id = 1;

// Make a request for a user with a given ID
// axios.get(`/api/users/${id}`).then(response => {
//     user = response.data.data;
// }).catch(error=> {
//     
// });

const form = useForm('put', 'api/users/1', {
    name: 'user.name',
    last_name: 'user.last_name',
    email: 'user.email',
    degree: 'user.degree',
    department: 'user.department',
});
 
form.setValidationTimeout(3000);

const submit = () => form.submit()
    .then(response => {
        form.reset();
 
        alert('User created.');
    })
    .catch(error => {
        alert('An error occurred.');
    });

</script>