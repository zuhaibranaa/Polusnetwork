<template>
    <footer
        class="pb-6"
        :class="[
            absolute ? 'absolute w-full bottom-0 bg-purple-800' : 'relative',
        ]"
    >
        <div class="container mx-auto px-4">
            <hr class="mb-6 border-b-1 border-purple-600" />
            <div
                class="flex flex-wrap items-center md:justify-between justify-center"
            >
                <div class="w-full md:w-4/12 px-4">
                    <div
                        class="text-sm text-purple-500 font-semibold py-1 text-center md:text-left"
                    >
                        Copyright © {{ date }}
                        <Link
                            :href="route('home')"
                            class="text-white hover:text-purple-300 text-sm font-semibold py-1"
                        >
                            Polus Network
                        </Link>
                    </div>
                </div>
                <div class="w-full md:w-8/12 px-4">
                    <ul
                        class="flex flex-wrap list-none md:justify-end justify-center"
                    >
                        <li>
                            <a
                                href="#"
                                class="text-white hover:text-purple-300 text-sm font-semibold block py-1 px-3"
                            >
                                Polus Network
                            </a>
                        </li>
                        <li>
                            <a
                                href="#"
                                class="text-white hover:text-purple-300 text-sm font-semibold block py-1 px-3"
                            >
                                About Us
                            </a>
                        </li>
                        <li>
                            <a
                                href="#"
                                class="text-white hover:text-purple-300 text-sm font-semibold block py-1 px-3"
                            >
                                Blog
                            </a>
                        </li>
                        <li>
                            <a
                                href="#"
                                class="text-white hover:text-purple-300 text-sm font-semibold block py-1 px-3"
                            >
                                MIT License
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
import { useAttrs } from "vue";
defineProps({
    absolute: {
        type: Boolean,
        default: false,
    },
});
useAttrs({
    date: new Date().getFullYear(),
});
</script>
