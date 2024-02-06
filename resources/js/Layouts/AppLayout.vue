<script setup>
    import AppHeader from '@/Components/AppHeader.vue';
    import AppFooter from '@/Components/AppFooter.vue';
</script>

<template>
    <AppHeader></AppHeader>

    <div class="container">
        <slot />
    </div>

    <AppFooter></AppFooter>
</template>
