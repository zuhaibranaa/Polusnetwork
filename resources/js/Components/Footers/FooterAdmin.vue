<template>
    <footer class="block pt-32">
        <div class="container mx-auto px-4">
            <hr class="mb-4 border-b-1 border-purple-200" />
            <div
                class="flex flex-wrap items-center md:justify-between justify-center"
            >
                <div class="w-full md:w-4/12 px-4">
                    <div
                        class="text-sm text-emerald-200 font-semibold py-1 text-center md:text-left"
                    >
                        Copyright © {{ date }}
                        <a
                            :href="route('home')"
                            class="text-emerald-500 hover:text-white text-sm font-semibold py-1"
                        >
                            Polus Network
                        </a>
                    </div>
                </div>
                <div class="w-full md:w-8/12 px-4">
                    <ul
                        class="flex flex-wrap list-none md:justify-end justify-center"
                    >
                        <li>
                            <a
                                href="#"
                                class="text-emerald-200 hover:text-emerald-500 text-sm font-semibold block py-1 px-3"
                            >
                                Polus Network
                            </a>
                        </li>
                        <li>
                            <a
                                href="#"
                                class="text-emerald-200 hover:text-emerald-500 text-sm font-semibold block py-1 px-3"
                            >
                                About Us
                            </a>
                        </li>
                        <li>
                            <a
                                href="#"
                                class="text-emerald-200 hover:text-emerald-500 text-sm font-semibold block py-1 px-3"
                            >
                                Blog
                            </a>
                        </li>
                        <li>
                            <a
                                href="#"
                                class="text-emerald-200 hover:text-emerald-500 text-sm font-semibold block py-1 px-3"
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
<script>
export default {
    data() {
        return {
            date: new Date().getFullYear(),
        };
    },
};
</script>
