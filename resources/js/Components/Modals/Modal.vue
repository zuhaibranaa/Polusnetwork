<template>
    <Transition name="fade">
    <div v-if="showModal">
        <div
            class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex"
        >
            <div class="relative w-auto my-6 mx-auto max-w-sm">
                <!--content-->
                <div
                    class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-purple-900 outline-none focus:outline-none"
                >
                    <!--header-->
                    <div
                        class="flex items-start justify-between p-5 border-b border-solid border-emerald-100 rounded-t"
                    >
                        <h3 class="text-3xl text-emerald-400 font-semibold">
                            {{ title }}
                        </h3>
                        <button
                            class="p-1 ml-auto bg-transparent border-0 text-black opacity-5 float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                            @click="$emit('toggleModal')"
                        >
                            <span
                                class="bg-transparent text-black opacity-5 h-6 w-6 text-2xl block outline-none focus:outline-none"
                            >
                                ×
                            </span>
                        </button>
                    </div>
                    <!--body-->
                    <div class="relative p-6 flex-auto">
                        <slot />
                    </div>
                    <!--footer-->
                    <div
                        class="flex justify-between p-6 border-t border-solid border-emerald-100 rounded-b"
                    >
                        <button
                            class="inline-flex items-center py-2 bg-red-700 hover:bg-red-500 mx-2 px-4 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:text-blueGray-300 focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150"
                            type="button"
                            @click="$emit('toggleModal')"
                        >
                            <i v-if="closeIcon" :class="closeIcon">&nbsp;</i>{{ closeText }}
                        </button>
                        <PrimaryButton v-if="successText"
                            :disabled="submitDisabled"
                            @click="$emit('save')"
                        >
                            <i v-if="successIcon" :class="successIcon">&nbsp;</i>{{ successText }}
                        </PrimaryButton>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="opacity-25 fixed inset-0 z-40 bg-black"
        ></div>
    </div>
    </Transition>
</template>

<script>
import PrimaryButton from "@/Components/PrimaryButton.vue";

export default {
    name: "small-modal",
    components: { PrimaryButton },
    props: {
        submitDisabled: Boolean,
        showModal: Boolean,
        title: String,
        successText: String,
        successIcon: String,
        closeIcon: String,
        closeText: String,
    },
};
</script>
<style>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.9s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>
