<template>
    <div class="row mt-2">
        <div class="col-4" style="display: flex; align-items: center; flex-direction: column;">
            <img src="/vectors/user.svg" class="pt-5 w-75" />
        </div>

        <div class="col-8" style="text-align: left;">
            <form @submit.prevent="storeUser()">
                <fieldset style="text-align: left;">
                <legend>Store user's info</legend>
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" :class="checkActive(errors.name)" id="name" v-model="form.name" class="form-control" placeholder="Write your name">
                    <div class="invalid-feedback">
                        <ul v-for="(error, key) in errors.name" :key="key">
                            <li>{{ error }}</li>
                        </ul>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" :class="checkActive(errors.last_name)" id="last_name" v-model="form.last_name" class="form-control" placeholder="Write your last name">
                    <div class="invalid-feedback">
                        <ul v-for="(error, key) in errors.last_name" :key="key">
                            <li>{{ error }}</li>
                        </ul>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" :class="checkActive(errors.email)" id="email" v-model="form.email" class="form-control" placeholder="Write your email">
                    <div class="invalid-feedback">
                        <ul v-for="(error, key) in errors.email" :key="key">
                            <li>{{ error }}</li>
                        </ul>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="degree" class="form-label">Degree</label>
                    <input type="text" name="degree" :class="checkActive(errors.degree)" id="degree" v-model="form.degree" class="form-control" placeholder="Write your degree">
                    <div class="invalid-feedback">
                        <ul v-for="(error, key) in errors.degree" :key="key">
                            <li>{{ error }}</li>
                        </ul>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="department" class="form-label">Department</label>
                    <input type="text" name="department" :class="checkActive(errors.department)" id="department" v-model="form.department" class="form-control" placeholder="Write your department">
                    <div class="invalid-feedback">
                        <ul v-for="(error, key) in errors.department" :key="key">
                            <li>{{ error }}</li>
                        </ul>
                    </div>
                </div>
                </fieldset>
                <button class="bg-dark btn btn-dark">Save</button>
            </form>
        </div>
  </div>
</template>


<script>

export default {
    data() {
        return {
            form: {
                name: '',
                last_name: '',
                email: '',
                degree: '',
                department: ''
            },
            errors: {
            }
        }
    },
    methods: {
        storeUser() {
            axios.post('/api/users/', this.form).then(response => {
                console.log(response)
                var id = response.data.data.id
                this.$router.push({ name: "show", params: {id: id} })
            }).catch(error => {
                this.errors = error.response.data.errors
                console.log(error)
            });
        },
        checkActive(data) {
            return {
                'is-invalid': data && data.length > 0
            }
        }
    },
    computed: {
        
    }
}

</script>