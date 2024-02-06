<script setup>
    import AppHeader from '@/Components/AppHeader.vue';
</script>

<template>
    <AppHeader></AppHeader>

    <div class="container">
        <slot />
    </div>
</template>
