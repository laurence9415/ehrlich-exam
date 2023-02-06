<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import AuthLayout from '@/Layouts/AuthLayout.vue';
import { ref } from 'vue';
import BaseLink from '@/Components/BaseLink.vue';

const city = ref('')

</script>

<template>

    <Head title="Home" />
    <AuthLayout>
        <div class="flex items-center justify-center p-8 text-center">
            <div>
                <div>
                    <h1>{{ $page.props.auth.user.name ?? 'N/A' }}</h1>
                    <a :href="$page.props.auth.user.github_profile" target="_blank">{{
                        $page.props.auth.user.github_profile
                    }}</a>
                </div>

                <div class="flex flex-col py-8 gap-5">
                    <input type="text" placeholder="City" v-model="city" style="border-radius: 50px;">
                    <span v-if="$page.props.flash.message">{{ $page.props.flash.message }}</span>
                    <BaseLink href="/weather" :data="{ city }">Display Weather</BaseLink>
                </div>
            </div>
        </div>
    </AuthLayout>

</template>
