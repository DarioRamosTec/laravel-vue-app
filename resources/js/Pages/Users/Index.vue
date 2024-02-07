<template>

    <TitleTable :add="this.goCreate">
       <template #default>
            User's table.
       </template>
       <template v-slot:body>            
            Here is the user's table.
       </template> 
    </TitleTable>

    <AppTable></AppTable>
</template>

<script>
import AppTable from '@/Components/AppTable.vue';
import TitleTable from '@/Components/TitleTable.vue';

export default {
    // Properties returned from data() become reactive state
    // and will be exposed on `this`.
    data() {
        return {
            users: [],
        };
    },
    // Methods are functions that mutate state and trigger updates.
    // They can be bound as event handlers in templates.
    methods: {
        goCreate() {
            this.$router.push({name: 'create'})
        }
    },
    // Lifecycle hooks are called at different stages
    // of a component's lifecycle.
    // This function will be called when the component is mounted.
    mounted() {

    },
    components: { AppTable, TitleTable }
}
</script>