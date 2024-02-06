<template>
    <div class="table-responsive">
        <table class="table table-striped custom-table">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Last Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Degree</th>
                    <th scope="col">Department</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody v-if="users.length > 0">
                <tr v-for="(user, key) in users" :key="key" scope="row">
                    <td>
                        <router-link :to='{name:"show",params:{id:user.id}}' class="text-decoration-none">
                            {{ user.name }}
                        </router-link>
                    </td>
                    <td>
                        {{ user.last_name }}
                    </td>
                    <td>
                        {{ user.email }}
                    </td>
                    <td>
                        {{ user.degree }}
                    </td>
                    <td>
                        {{ user.department }}
                    </td>
                    <td>
                        <button type="button" class="pt-1">
                            <router-link :to='{name:"edit", params:{id:user.id}}'>
                                <img src="/vectors/edit.svg" />
                            </router-link>
                        </button>
                    </td>
                    <td>
                        <button type="button" @click="destroy(user.id)">
                            <img src="/vectors/destroy.svg" />
                        </button>
                    </td>
                </tr>
            </tbody>
            <tbody v-else>
                <tr>
                    <td colspan="4">Nothing :c.</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    name:"users",

    data(){
        return {
            users:[]
        }
    },
    mounted(){
        this.index()
    },
    methods:{
        async index() {
            axios.get('/api/users').then(response => {
                this.users = response.data.data;
            }).catch(error=> {
                console.log(error)
            });
        },
        async destroy(id) {
            if(confirm("Are you sure of your action?")){
                axios.delete(`/api/users/${id}`).then(response => {
                    this.index()
                }).catch(error=>{
                    this.$router.push({ name: '404' });
                    console.log(error)
                });
            }
        }
    }
}
</script>