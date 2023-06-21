<template>
    <Head title="Dashboard" />
    <authenticated-layout header="Dashboard">
        <div>
            <div class="flex flex-wrap mt-4">
                <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4">
                    <card-line-chart />
                </div>
                <div class="w-full xl:w-4/12 px-4">
                    <card-bar-chart />
                </div>
            </div>
            <div class="flex flex-wrap mt-4">
                <div class="w-full xl:w-8/12 mb-12 xl:mb-0 px-4">
<!--                    <card-page-visits />-->
                </div>
                <div class="w-full xl:w-4/12 px-4">
<!--                    <card-social-traffic />-->
                </div>
            </div>
        </div>
    </authenticated-layout>
</template>
<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import CardLineChart from "@/Components/Cards/CardLineChart.vue";
import CardBarChart from "@/Components/Cards/CardBarChart.vue";
import CardPageVisits from "@/Components/Cards/CardPageVisits.vue";
import CardSocialTraffic from "@/Components/Cards/CardSocialTraffic.vue";
import {Head} from "@inertiajs/vue3";
</script>
