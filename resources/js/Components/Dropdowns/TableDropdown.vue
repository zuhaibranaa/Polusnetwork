<template>
    <div>
        <a
            class="text-purple-500 py-1 px-3"
            ref="btnDropdownRef"
            v-on:click="toggleDropdown($event)"
        >
            <i class="fas fa-ellipsis-v"></i>
        </a>
        <div
            ref="popoverDropdownRef"
            class="bg-white text-base z-5 float-left py-2 list-none text-left rounded shadow-lg min-w-48"
            v-bind:class="{
                hidden: !dropdownPopoverShow,
                block: dropdownPopoverShow,
            }"
        >
            <a
                href="javascript:void(0);"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-purple-700"
            >
                Action
            </a>
            <a
                href="javascript:void(0);"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-purple-700"
            >
                Another action
            </a>
            <a
                href="javascript:void(0);"
                class="text-sm py-2 px-4 font-normal block w-full whitespace-nowrap bg-transparent text-purple-700"
            >
                Something else here
            </a>
        </div>
    </div>
</template>
<script>
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
                        placement: "bottom-start",
                    }
                );
            }
        },
    },
};
</script>
