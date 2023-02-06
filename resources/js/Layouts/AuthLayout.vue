<script setup>
import { Link, router } from '@inertiajs/vue3';
import BaseAnchor from '@/Components/BaseAnchor.vue';
const navLinks = [

]

const logout = () => {
    router.post(`/logout`)
}
</script>

<template>
    <div class="flex flex-col h-screen">
        <header>
            <h1>Weather Forecash</h1>

            <div class="flex gap-5">
                <template v-if="$page.props.auth.user">
                    <Link :href="route(link.route)" v-for="link in navLinks">{{ link.label }}</Link>
                    <BaseAnchor href="#" @click="logout" :label="`Logout`" />
                </template>
            </div>
        </header>
        <main>
            <slot />
        </main>
    </div>
</template>

<style>
header {
    height: 80px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0px 20px;
    border-bottom: 2px solid;
}

main {
    flex-grow: 1;
    padding: 0px 20px;
}
</style>
