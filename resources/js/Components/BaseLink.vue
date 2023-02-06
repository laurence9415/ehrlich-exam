<script setup inheritAttrs="false">
import { Link } from '@inertiajs/vue3'
const props = defineProps({
    label: {
        type: String,
        default: ''
    }
})
</script>

<template>
    <Link v-bind="$attrs" class="py-2 px-4 border border-black base-anchor">
    <slot>{{ props.label }}</slot>
    </Link>
</template>

<style scoped>
.base-anchor {
    box-shadow: 2px 2px 2px;
}
</style>