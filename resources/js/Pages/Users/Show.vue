<template>
    <div class="row mt-2">
        <div class="col-4" style="display: flex; align-items: center; flex-direction: column;">
            <img src="/vectors/user.svg" class="pt-5 w-75" />
        </div>

        <div class="col-8" style="text-align: left;">
            <form>
                <fieldset disabled style="text-align: left;">
                <legend>User's Info</legend>
                <div class="mb-3">
                    <label for="nameInput" class="form-label">Name</label>
                    <input type="text" name="name" id="nameInput" class="form-control" placeholder="Write your name"
                    :value="user.name">
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
            <router-link :to="{name: 'edit', params: { id: user.id }}">
                <button type="button" class="bg-dark btn btn-dark">Edit</button>
            </router-link>
        </div>
  </div>
</template>

<script>
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
        }
    },

    mounted() {
        this.index(this.id)
    },
}
</script>