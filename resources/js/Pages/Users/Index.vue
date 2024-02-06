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
            });
    },
    components: { PrimaryButton, AppLayout }
}
</script>

<template>
  
  <AppLayout>
    <PrimaryButton>oli2</PrimaryButton>
    <button @click="getMessageWithAxios">Count is: {{ count }}</button>
    <PrimaryButton>olis</PrimaryButton>
  </AppLayout>

</template>