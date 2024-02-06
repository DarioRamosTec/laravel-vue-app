<template>
    <div class="row mt-2">
        <div class="col-4" style="display: flex; align-items: center; flex-direction: column;">
            <img src="/vectors/user.svg" class="pt-5 w-75" />
        </div>

        <div class="col-8" style="text-align: left;">
            <form>
                <fieldset style="text-align: left;">
                <legend>Edit User's Info</legend>
                <div class="mb-3">
                    <label for="nameInput" class="form-label">Name</label>
                    <input type="text" name="name" id="nameInput" class="form-control" placeholder="Write your name"
                    :value="user.name">
                    <div id="nameFeedback" class="invalid-feedback">
                        
                    </div>
                    <div class="valid-feedback">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="lastNameInput" class="form-label">Last Name</label>
                    <input type="text" name="last_name" id="lastNameInput" class="form-control" placeholder="Write your last name"
                    :value="user.last_name">
                </div>
                <div class="mb-3">
                    <label for="emailInput" class="form-label">Email</label>
                    <input type="text" name="email" id="emailInput" class="form-control" placeholder="Write your email"
                    :value="user.email">
                </div>
                <div class="mb-3">
                    <label for="titleInput" class="form-label">Degree</label>
                    <input type="text" name="title" id="titleInput" class="form-control" placeholder="Write your degree"
                    :value="user.degree">
                </div>
                <div class="mb-3">
                    <label for="departmentInput" class="form-label">Department</label>
                    <input type="text" name="department" id="departmentInput" class="form-control" placeholder="Write your department"
                    :value="user.department">
                </div>
                </fieldset>
            </form>
            <button type="button" @click="update(user.id)" class="bg-dark btn btn-dark">Save</button>
        </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
    name:'user',

    data() {
        return {
            user: {},
            id: this.$route.params.id,
        };
    },

    methods: {
        async index(id) {
            axios.get(`/api/users/${id}`).then(response => {
                this.user = response.data.data;
            }).catch(error=> {
                this.$router.push({ name: '404'})
            });
        },
        async update(id) {
            axios.put(`/api/users/${id}`).then(response => {
                console.log(response)
                //this.$router.push({ name: 'show', params: {id: id}})
            }).catch(error=> {
                console.log(error)
            });
        }
    },

    mounted() {
        this.index(this.id)
    },
}
</script>