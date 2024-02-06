<script>
import PrimaryButton from '@/Components/PrimaryButton.vue';
import AppLayout from '@/Layouts/AppLayout.vue';

export default {
    // Properties returned from data() become reactive state
    // and will be exposed on `this`.
    data() {
        return {
            count: 0,
            users: [],
        };
    },
    // Methods are functions that mutate state and trigger updates.
    // They can be bound as event handlers in templates.
    methods: {
        increment() {
          this.count++;
        },
        gobyebye() {
          //:href=
          route('users.destroy', 1);
          console.log("tonight!");
        },
        getMessageWithAxios() {
            axios.get('/api/users/get').then(response => {
              console.log(response.data);
            });
        },
    },
    // Lifecycle hooks are called at different stages
    // of a component's lifecycle.
    // This function will be called when the component is mounted.
    mounted() {
        console.log(`The initial count is ${this.count}.`),
        axios.get('/api/users/get/1').then(response => {
            this.users = response.data;
            console.log(response.data);
            this.$router.push({ path: '/about' });
        });
    },
    components: { PrimaryButton, AppLayout }
}
</script>

<template>
  
  <AppLayout>
    <PrimaryButton @click="gobyebye">oli2</PrimaryButton>
    <button @click="getMessageWithAxios">Count is: {{ count }}</button>
    <PrimaryButton>olis</PrimaryButton>

    <p>
    <!-- use the router-link component for navigation. -->
    <!-- specify the link by passing the `to` prop. -->
    <!-- `<router-link>` will render an `<a>` tag with the correct `href` attribute -->
    <router-link to="/">Go to Home</router-link>
    <router-link to="/about">Go to About</router-link>
    </p>
    <!-- route outlet -->
    <!-- component matched by the route will render here -->
    <router-view></router-view>

  </AppLayout>

</template>