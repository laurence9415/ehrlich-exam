<script setup>
import { Head, Link } from '@inertiajs/vue3';
import AuthLayout from '@/Layouts/AuthLayout.vue';
import moment from 'moment'
import BaseLink from '@/Components/BaseLink.vue';

const props = defineProps({
    location: {
        type: Object,
        default: {}
    },
    current: {
        type: Object,
        default: {}
    },
})

</script>

<template>

    <Head title="Weather" />
    <AuthLayout>
        <div class="flex items-center justify-center p-8 text-center">
            <div class="flex items-end flex-col">
                <table class="border-collapse border border-slate-400">
                    <thead>
                        <tr>
                            <th class="border border-black">Date</th>
                            <th class="border border-black">Temp(F)</th>
                            <th class="border border-black hidden md:table-cell">Description</th>
                            <th class="border border-black hidden md:table-cell">Pressure</th>
                            <th class="border border-black hidden md:table-cell">Humidity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="border border-black">{{
                                moment(location.localtime).format('MM/DD/Y')
                            }}</td>
                            <td class="border border-black">{{ current.temp_f }}</td>
                            <td class="border border-black hidden md:table-cell">{{ current.condition.text }}</td>
                            <td class="border border-black hidden md:table-cell">{{ current.pressure_mb }}</td>
                            <td class="border border-black hidden md:table-cell">{{ current.humidity }}</td>
                        </tr>
                    </tbody>
                </table>

                <div class="pt-8">
                    <BaseLink :href="route('home')">Back</BaseLink>
                </div>
            </div>
        </div>
    </AuthLayout>

</template>

<style>
table thead tr th {
    width: 150px;
}
</style>
