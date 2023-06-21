<script>
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import TextInput from "@/Components/TextInput.vue";
import { useForm } from "@inertiajs/vue3";
import SelectInput from "@/Components/SelectInput.vue";
import PLS from "@/assets/img/pls.png";
import USDT from "@/assets/img/usdt.png";
import BRAIN from "@/assets/img/brain.png";
import { ref, watch } from "vue";
import Communicator from "@/Components/Communicator.vue";
export default {
    components: {
        PrimaryButton,
        TextInput,
        SelectInput,
        InputError,
        Communicator,
    },
    data: () => ({
        images: { PLS, USDT, BRAIN },
    }),
    methods: {
        onMouseOver(e) {
            if (e.target.className === "fa fa-arrow-down fa-2x mx-10")
                e.target.className = "fa fa-retweet fa-2x mx-10";
            else e.target.childNodes[1].className = "fa fa-retweet fa-2x mx-10";
        },
        onMouseOut(e) {
            if (e.target.className === "fa fa-retweet fa-2x mx-10")
                e.target.className = "fa fa-arrow-down fa-2x mx-10";
            else e.target.childNodes[1].className = "fa fa-arrow-down fa-2x mx-10";
        },
    },
};
</script>
<script setup>
const options = ref(["PLS", "USDT", "BRAIN"]);
const fromOptions = ref(["PLS", "BRAIN"]);
const toOptions = ref(["USDT"]);

const submitData = (e) => {
    form.post(route("swap.store"), {
        preserveScroll: true,
        onSuccess: (data) => {
            form.reset();
        },
        onError: () => {},
    });
};
const form = useForm({
    from: "PLS",
    to: "USDT",
    from_value: 0,
    to_value: 0,
});
const dataset = ref(0);
const datart = (data) => {
    data.forEach((element) => {
        dataset[element.name] = Number(element.value);
    });
};
const onValueSelectFrom = (value) => {
    form.from = value;
};

const onValueSelectTo = (value) => {
    form.to = value;
};
const swapFromAndTo = () => {
    if (form.from === "BRAIN") {
        if (form.to === "PLS") {
            form.from = "USDT";
        } else {
            form.from = "PLS";
        }
    }
    [form.from, form.to] = [form.to, form.from];
};
watch(
    () => form.from,
    (val) => {
        toOptions.value = options.value.filter((opt) => {
            return opt !== val && opt !== "BRAIN";
        });
    }
);
watch(
    () => form.from_value,
    (val) => {
        const { brain_value, pls_value } = dataset;
        switch (form.from) {
            case "PLS":
                if (form.to === "USDT") {
                    form.to_value = form.from_value * pls_value;
                }
                break;

            case "USDT":
                if (form.to === "PLS") {
                    form.to_value = form.from_value / pls_value;
                }
                break;

            default: // in Case Of Brain
                if (form.to === "PLS") {
                    form.to_value = (form.from_value * brain_value) / pls_value;
                } else if (form.to === "USDT") {
                    form.to_value = form.from_value * brain_value;
                }
                break;
        }
    }
);
watch(
    () => form.to,
    (val) => {
        fromOptions.value = options.value.filter((opt) => {
            return opt !== val;
        });
    }
);
</script>
<template>
    <communicator :data="$page.props.settings" @datart="datart" />
    <header>
        <h2 class="text-lg font-medium text-white">Swap</h2>

        <p class="mt-1 text-sm text-purple-300">
            You Can Swap Your Cash From This Page.
        </p>
    </header>

    <section>
        <form @submit.prevent="submitData" class="mt-6 space-y-6 m-14">
            <div>
                <SelectInput
                    id="type"
                    :value="form.from"
                    v-model="form.from"
                    v-on:valueSelect="onValueSelectFrom"
                    :data="fromOptions"
                    :images="images"
                />
                <InputError :message="form.errors.from" class="mt-2" />
            </div>

            <div>
                <TextInput
                    id="deposit_amount"
                    ref="deposit_amount"
                    v-model="form.from_value"
                    type="number"
                    step="0.1"
                    class="mt-1 block w-full"
                />

                <InputError :message="form.errors.from_value" class="mt-2" />
            </div>
            <PrimaryButton
                @mouseover="onMouseOver"
                @mouseout="onMouseOut"
                @click.prevent="swapFromAndTo"
                class="align-middle px-12 w-full rounded-full mt-10"
                ><i class="fa fa-arrow-down fa-2x mx-10" style="color: #ffffff"></i
            ></PrimaryButton>
            <div>
                <SelectInput
                    id="type"
                    :value="form.to"
                    v-model="form.to"
                    v-on:valueSelect="onValueSelectTo"
                    :data="toOptions"
                    :images="images"
                />
                <InputError :message="form.errors.to" class="mt-2" />
            </div>

            <div>
                <TextInput
                    id="target"
                    ref="target"
                    type="text"
                    v-model="form.to_value"
                    disabled
                    class="mt-1 block w-full"
                />
            </div>

            <div class="flex items-center gap-4">
                <PrimaryButton
                    :disabled="form.processing || form.from_value === 0"
                    >Swap</PrimaryButton
                >

                <Transition
                    enter-from-class="opacity-0"
                    leave-to-class="opacity-0"
                    class="transition ease-in-out"
                >
                    <p
                        v-if="form.recentlySuccessful"
                        class="text-sm text-gray-600"
                    >
                        Saved.
                    </p>
                </Transition>
            </div>
        </form>
    </section>
</template>
