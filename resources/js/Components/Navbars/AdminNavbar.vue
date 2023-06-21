<template>
    <!-- Navbar -->
    <nav class="relative flex flex-wrap items-center justify-between px-2 py-3 navbar-expand-lg bg-blueGray-500 mb-3">
        <div
            class="w-full mx-autp items-center flex justify-between md:flex-nowrap flex-wrap md:px-10 px-4"
        >
            <!-- Brand -->
            <Link
                class="text-white text-sm uppercase hidden lg:inline-block font-semibold"
                :href="$page.props.ziggy.location"
                as="a"
            >
                {{ header }}
            </Link>
            <!-- User -->
            <ul
                class="flex-col md:flex-row list-none items-center hidden md:flex"
            >
                <li class="text-sm uppercase hidden lg:inline-block mx-4">
                    <span class="inline-flex bg-purple-900 items-center px-4 py-2 border border-transparent rounded-md font-semibold text-lg text-emerald-100 uppercase tracking-widest hover:bg-purple-500 transition ease-in-out duration-150">
                        <i class="fa"><img :src="BRAIN" class="w-6"/></i> <span class="ml-4"> ${{settings.brain_value }}</span>
                    </span>
                </li>
                <li class="text-sm uppercase hidden lg:inline-block mx-4">
                    <span class="inline-flex bg-purple-900 items-center px-4 py-2 border border-transparent rounded-md font-semibold text-lg text-emerald-100 uppercase tracking-widest hover:bg-purple-500 transition ease-in-out duration-150">
                        <i class="fa"><img :src="PLS" class="w-6"/></i> <span class="ml-4"> ${{settings.pls_value }}</span>
                    </span>
                </li>
                <user-dropdown class="z-50" />
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</template>

<script>
import UserDropdown from "@/Components/Dropdowns/UserDropdown.vue";
import { Link } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";

import USDT from '@/assets/img/usdt.png'
import PLS from '@/assets/img/pls_white.png'
import BRAIN from '@/assets/img/brain_white.png'
export default {
    components: {
        PrimaryButton,
        UserDropdown,
        Link,
    },
    props: {
        header: String,
    },
    data:() => ({
        PLS,
        BRAIN,
        USDT
    }),
    computed:{
        settings(){
            let set = []
            this.$page.props.settings.forEach(setting => {
                set[setting.name] = setting.value
            })
            console.log(set)
            return set
        }
    }
};
</script>
