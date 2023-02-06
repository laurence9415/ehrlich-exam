<script setup inheritAttrs="false">
const props = defineProps({
    label: {
        type: String,
        default: ''
    }
})
</script>

<template>
    <a v-bind="$attrs" class="py-2 px-4 border border-black base-anchor">
        <slot>{{ props.label }}</slot>
    </a>
</template>

<style scoped>
.base-anchor {
    box-shadow: 2px 2px 2px;
}
</style>