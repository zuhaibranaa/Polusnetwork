<template>
    <div class="z-50">
        <a
            class="lg:text-white lg:hover:text-purple-200 text-purple-700 px-3 py-4 lg:py-2 flex items-center text-xs uppercase font-bold"
            ref="btnDropdownRef"
            v-on:click="toggleDropdown($event)"
        >
            {{ $page.props.auth.user.name }}
        </a>
        <div
            ref="popoverDropdownRef"
            class="bg-white text-base z-5 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
            v-bind:class="{
                hidden: !dropdownPopoverShow,
                block: dropdownPopoverShow,
            }"
        >
            <Link
                :href="route('dashboard')"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-purple-700"
            >
                Dashboard
            </Link>
            <Link
                :href="route('profile.edit')"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-purple-700"
            >
                Profile
            </Link>
            <div class="h-0 mx-4 my-2 border border-solid border-purple-100" />
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
import { Link } from "@inertiajs/vue3";
import { createPopper } from "@popperjs/core";

export default {
    data() {
        return {
            dropdownPopoverShow: false,
        };
    },
    methods: {
        toggleDropdown: function (event) {
            event.preventDefault();
            if (this.dropdownPopoverShow) {
                this.dropdownPopoverShow = false;
            } else {
                this.dropdownPopoverShow = true;
                createPopper(
                    this.$refs.btnDropdownRef,
                    this.$refs.popoverDropdownRef,
                    {
                        placement: "auto",
                    }
                );
            }
        },
    },
    components: { Link },
};
</script>
