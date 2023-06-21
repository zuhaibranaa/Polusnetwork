<template>
    <nav
        class="top-0 absolute z-5 w-full flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg"
    >
        <div
            class="container px-4 mx-auto flex flex-wrap items-center justify-between"
        >
            <div
                class="w-full relative flex justify-between lg:w-auto lg:static lg:block lg:justify-start"
            >
                <Link
                    class="text-purple-300 text-lg font-bold leading-relaxed inline-block mr-4 py-2 whitespace-nowrap uppercase"
                    href="/"
                >
                    <div class="flex flex-row justify-center">
                        <img style="width: 10rem" :src="logolandscape">
                    </div>
                </Link>
                <button
                    class="cursor-pointer text-xl leading-none px-3 py-1 border border-solid border-transparent rounded bg-transparent block lg:hidden outline-none focus:outline-none"
                    type="button"
                    v-on:click="setNavbarOpen"
                >
                    <i class="text-white fas fa-bars"></i>
                </button>
            </div>
            <div
                class="lg:flex flex-grow items-center bg-white lg:bg-opacity-0 lg:shadow-none"
                :class="[navbarOpen ? 'block rounded shadow-lg' : 'hidden']"
                id="example-navbar-warning"
            >
                <ul class="flex flex-col lg:flex-row list-none lg:ml-auto">
                    <li
                        v-if="$page.props.auth.user ? false : true"
                        class="flex items-center"
                    >
                        <Link
                            class="lg:text-purple-400 lg:hover:text-purple-600 text-purple-400 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                            :href="route('login')"
                        >
                            Login
                        </Link>
                    </li>
                    <li
                        v-if="$page.props.auth.user ? false : true"
                        class="flex items-center"
                    >
                        <Link
                            class="lg:text-purple-400 lg:hover:text-purple-600 text-purple-400 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
                            :href="route('register')"
                        >
                            Sign Up
                        </Link>
                    </li>
                    <li
                        v-if="$page.props.auth.user ? true : false"
                        class="flex items-center"
                    >
                        <PagesDropdown />
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
<script>
import PagesDropdown from "@/Components/Dropdowns/PagesDropdown.vue";
import PLS from '@/assets/img/pls_white.png'
import { Link } from "@inertiajs/vue3";
import logolandscape from '@/assets/img/logo-landscape.svg';
export default {
    data() {
        return {
            navbarOpen: false,
            PLS,
            logolandscape,
        };
    },
    methods: {
        setNavbarOpen: function () {
            this.navbarOpen = !this.navbarOpen;
        },
    },
    components: {
        PagesDropdown,
        Link,
    },
};
</script>
