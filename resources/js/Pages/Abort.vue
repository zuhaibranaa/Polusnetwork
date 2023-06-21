<template>
    <Link class="bg-purple-600 text-white active:bg-purple-400 text-sm font-bold uppercase px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 w-full ease-linear transition-all duration-150" :href="route('home')"><i class="fa fa-home"/>Go Home</Link>
    <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center sm:pt-0">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="flex items-center pt-8 sm:justify-start sm:pt-0">
                <div class="px-4 text-lg text-gray-500 border-r border-gray-400 tracking-wider">
                    {{$page.props.code}}
                </div>

                <div class="ml-4 text-lg text-gray-500 uppercase tracking-wider">
                    {{$page.props.message}}
                </div>
            </div>
        </div>
    </div>
</template>
<script setup>
import {Link} from "@inertiajs/vue3";
</script>
