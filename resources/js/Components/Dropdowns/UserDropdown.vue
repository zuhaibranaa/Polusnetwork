<template>
    <div>
        <a
            class="text-purple-700 block"
            ref="btnDropdownRef"
            v-on:click="toggleDropdown($event)"
        >
            <div class="items-center flex">
                <span
                    class="w-12 h-12 text-sm text-white bg-purple-900 inline-flex items-center justify-center rounded-full"
                >
                    <b
                        :key="item"
                        v-for="item in String($page.props.auth.user.name).split(
                            ' '
                        )"
                        >{{ item[0] }}</b
                    >
                </span>
            </div>
        </a>
        <div
            ref="popoverDropdownRef"
            class="bg-white text-base z-6 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
            v-bind:class="{
                hidden: !dropdownPopoverShow,
                block: dropdownPopoverShow,
            }"
        >

            <span
                class="inline-flex items-center px-2 py-2 border border-transparent font-semibold text-sm text-purple-700 uppercase tracking-widest transition ease-in-out duration-150">
                        <i class="fa"><img :src="BRAIN" class="w-4"/></i> <span class="ml-1"> ${{
                    settings.brain_value
                }}</span>
            </span>
            <span
                class="inline-flex items-center px-2 py-2 border border-transparent font-semibold text-sm text-purple-700 uppercase tracking-widest transition ease-in-out duration-150">
                        <i class="fa"><img :src="PLS" class="w-4"/></i> <span class="ml-1"> ${{
                    settings.pls_value
                }}</span>
            </span>
            <Link
                :href="route('profile.edit')"
                as="a"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-purple-700"
            >
                <i class="fas fa-user" />
                {{ String($page.props.auth.user.name).toUpperCase() }}
            </Link>

            <a
                @click="toggleChilds"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-purple-700"
            >
                <i class="fa fa-money-check" /> Wallet
                <i
                    :class="
                        showChilds ? 'fa fa-chevron-up' : 'fa fa-chevron-down'
                    "
                />
            </a>
            <span
                v-if="showChilds"
                class="text-sm ml-4 mt-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-purple-700"
            >
                <i class="fa"><img style="width: 20px" :src="USDT" /></i>
                <span class="ml-5 font-bold align-top">{{
                    $page.props.auth.user.USDT
                }}</span>
            </span>
            <span
                v-if="showChilds"
                class="text-sm ml-4 mt-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-purple-700"
            >
                <i class="fa"><img style="width: 20px" :src="PLS" /></i>
                <span class="ml-5 font-bold align-top">{{
                    $page.props.auth.user.PLS
                }}</span>
            </span>
            <span
                v-if="showChilds"
                class="text-sm ml-4 mt-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-purple-700"
            >
                <i class="fa"><img style="width: 20px" :src="BRAIN" /></i>
                <span class="ml-5 font-bold align-top">{{
                    $page.props.auth.user.BRAIN
                }}</span>
            </span>
            <div class="h-0 my-2 border border-solid border-purple-100" />
            <Link
                :href="route('logout')"
                method="post"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-purple-700"
            >
                <i class="fas fa-sign-out-alt" /> Logout
            </Link>
        </div>
    </div>
</template>

<script>
import { createPopper } from "@popperjs/core";
import image from "@/assets/img/team-1-800x800.jpg";
import { Link } from "@inertiajs/vue3";
import USDT from "@/assets/img/usdt.png";
import PLS from "@/assets/img/pls.png";
import BRAIN from "@/assets/img/brain.png";

export default {
    components: {
        Link,
    },
    data() {
        return {
            dropdownPopoverShow: false,
            image: image,
            showChilds: false,
            PLS,
            USDT,
            BRAIN,
        };
    },
    methods: {
        toggleChilds() {
            this.showChilds = !this.showChilds;
        },
        toggleDropdown(event) {
            event.preventDefault();
            if (this.dropdownPopoverShow) {
                this.dropdownPopoverShow = false;
            } else {
                this.dropdownPopoverShow = true;
                createPopper(
                    this.$refs.btnDropdownRef,
                    this.$refs.popoverDropdownRef,
                    {
                        placement: "bottom-start",
                    }
                );
            }
        },
    },
    computed: {
        settings() {
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
