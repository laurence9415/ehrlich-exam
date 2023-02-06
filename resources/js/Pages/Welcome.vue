<script setup>
import { Head, Link, router } from '@inertiajs/vue3';
import { computed, onMounted } from 'vue';
import AuthLayout from '@/Layouts/AuthLayout.vue';
import BaseAnchor from '@/Components/BaseAnchor.vue';

const props = defineProps({
    user: {
        type: Object,
        default: {}
    }
});

</script>

<template>

    <Head title="Welcome" />
    <AuthLayout>
        <div class="flex items-center justify-center p-8">
            <div class="flex flex-col gap-10 w-1/2">
                <p>Welcome to the weather forecast web application. Please login with your Github user to use the
                    application and view the weather in your city</p>

                <div v-if="!props.user">
                    <BaseAnchor href="/auth/redirect" :label="`Login`" />
                </div>
            </div>
        </div>
    </AuthLayout>

</template>
