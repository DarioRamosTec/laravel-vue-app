<template>
    <div class="row">
        <div class="col-10">
            <p class="fs-2 pb-1">
                <slot></slot>
            </p>
            <p class="fs-6">
                <slot name="body"></slot>
            </p>
        </div>
        <div class="col-2 d-flex align-items-center justify-content-center">
            <img @click="add()" src="/vectors/add.svg" class="w-25">
        </div>
    </div>
</template>

<script>

export default {
    props: {
        add : Function,
    }
}

</script>