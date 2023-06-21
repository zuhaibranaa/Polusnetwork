<template>
    <Head title="Profile"/>

    <AuthenticatedLayout header="Staking Plans">
        <div class="pb-20 pt-11">
            <div class="flex flex-wrap mt-4" style="margin-top: 7rem">
                <card-table
                    :title="'Staking Plans'"
                    :columns="columns"
                    color="dark"
                >
                    <template #extra><span class="text-emerald-300">Note: </span><span class="">Locked Generated rewards will be unlocked after every 7 days!</span></template>

                    <tr :key="ent.id" v-for="ent in $page.props.plans.data">
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                            <div>
                                <h2>{{ ent.user.name }}</h2>
                            </div>
                        </td>
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                            <div>
                                <h2>{{ ent.plan.name }}</h2>
                            </div>
                        </td>
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                            <div>
                                <h2>{{ getTime(ent.subscription_date) }}</h2>
                            </div>
                        </td>
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                            <div>
                                <h2>{{ getTime(ent.expiry_date) }}</h2>
                            </div>
                        </td>
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                            <div>
                                <h2>{{ getStatusText(ent.status) }}</h2>
                            </div>
                        </td>
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                            <div>
                                <h2>{{ent.amount}}</h2>
                            </div>
                        </td>
                        <td
                            class="border-t-0 px-6 border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                            <div>
                                <h2>{{ent.generated_rewards}}</h2>
                            </div>
                        </td>
                        <td v-if="isAdmin"
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right"
                        >
                            <Link :href="route('stake.update', ent.id)" method="put">
                                <button
                                    title="release locked payments"
                                    class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded"
                                >
                                    <i class="fa fa-check"></i>
                                </button>
                            </Link>
                            <Link
                                :href="route('stake.destroy', ent.id)"
                                method="delete"
                            >
                                <button
                                    title="delete"
                                    class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 rounded"
                                >
                                    <i class="fa fa-trash"></i>
                                </button>
                            </Link>
                        </td>
                    </tr>
                </card-table>
                <Modal
                    :showModal="showAddPlanModal"
                    :title="'Add New Plan'"
                    :success-text="'Save'"
                    :close-text="'Close'"
                    :submit-disabled="addPlanForm.processing"
                    @save="submitPlan"
                    @toggleModal="toggleAddPlanModal"
                >
                    <div>
                        <InputLabel
                            for="name"
                            value="Name"
                        />

                        <TextInput
                            id="name"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="addPlanForm.name"
                        />

                        <InputError class="mt-2" :message="addPlanForm.errors.name" />
                    </div>
                    <div class="mt-2">
                        <InputLabel
                            for="duration_days"
                            value="Duration In Days"
                        />

                        <TextInput
                            id="duration_days"
                            type="number"
                            class="mt-1 block w-full"
                            v-model="addPlanForm.duration_days"
                        />

                        <InputError class="mt-2" :message="addPlanForm.errors.duration_days" />
                    </div>
                    <div class="mt-2">
                        <InputLabel
                            for="per-day-reward"
                            value="Per Day Reward"
                        />

                        <TextInput
                            id="per-day-reward"
                            type="number"
                            class="mt-1 block w-full"
                            v-model="addPlanForm.per_day_reward"
                        />

                        <InputError class="mt-2" :message="addPlanForm.errors.per_day_reward" />
                    </div>
                    <div class="mt-2">
                        <InputLabel
                            for="stake"
                            value="Staking Token"
                        />
                        <SelectInput
                            id="stake"
                            :value="addPlanForm.staking_currency"
                            v-model="addPlanForm.staking_currency"
                            v-on:valueSelect="onValueSelectStaking"
                            :data="formOptions"
                            :images="images"
                        />
                        <InputError :message="addPlanForm.errors.staking_currency" class="mt-2" />
                    </div>
                    <div class="mt-2">
                        <InputLabel
                            for="reward"
                            value="Rewarding Token"
                        />
                        <SelectInput
                            id="reward"
                            :value="addPlanForm.rewarding_currency"
                            v-model="addPlanForm.rewarding_currency"
                            v-on:valueSelect="onValueSelectReward"
                            :data="formOptions"
                            :images="images"
                        />
                        <InputError :message="addPlanForm.errors.rewarding_currency" class="mt-2" />
                    </div>
                    <div class="mt-2">
                        <InputLabel
                            for="status"
                            value="Status"
                        />

                        <input type="checkbox"
                            id="status"
                            class="mt-1 form-checkbox border-0 rounded text-purple-700 ml-1 w-5 h-5 ease-linear transition-all duration-150"
                            v-model="addPlanForm.status"
                        /><span class="text-white content-center text-center"> &nbsp; Active</span>

                        <InputError class="mt-2" :message="addPlanForm.errors.status" />
                    </div>
                </Modal>
                <pagination
                    class="mt-6 d-inline"
                    :style="{ alignContent: 'center' }"
                    :links="this.$page.props.plans.links"
                />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, useForm} from "@inertiajs/vue3";
import DepositForm from "@/Components/Forms/DepositForm.vue";
import DepositStep2 from "@/Components/Forms/DepositStep2.vue";
import CardTable from "@/Components/Cards/CardTable2.vue";
import {Link} from "@inertiajs/vue3";
import Pagination from "@/Components/Pagination.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import Modal from "@/Components/Modals/Modal.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import InputLabel from "@/Components/InputLabel.vue";
import Checkbox from "@/Components/Checkbox.vue";
import PLS from "@/assets/img/pls.png";
import USDT from "@/assets/img/usdt.png";
import BRAIN from "@/assets/img/brain.png";
import SelectInput from "@/Components/SelectInput.vue";
import Toggle from '@vueform/toggle'
export default {
    data: () => ({
        showAddPlanModal: false,
        formOptions: ['PLS', 'USDT', 'BRAIN'],
        addPlanForm: useForm({
            name: '',
            duration_days: 30,
            per_day_reward: null,
            staking_currency: 'PLS',
            rewarding_currency: 'PLS',
            status: true,
        }),
        images: { PLS, USDT, BRAIN },
        columns: [
            "User Name",
            "Plan Name",
            "Subscription Date",
            "Expiry Date",
            "Status",
            "Amount",
            ["fa-lock","Gen. Rewards"],
        ],
    }),
    mounted() {
        if (this.isAdmin){
            this.columns.push("Actions");
        }
    },
    computed: {
        isAdmin(){
            return this.$page.props.auth.user.is_admin;
        }
    },
    methods: {
        onValueSelectStaking(value){
            this.addPlanForm.staking_currency = value
        },
        onValueSelectReward(value){
            this.addPlanForm.rewarding_currency = value
        },
        getTime(timestamp) {
            let datetime = new Date(timestamp);
            let options = {year: "numeric", month: "short", day: "numeric"};
            return datetime.toLocaleString("en-US", options);
        },
        submitPlan(){
            this.addPlanForm.post(route('plans.store'))
            this.addPlanForm.reset()
            this.toggleAddPlanModal()
        },
        toggleAddPlanModal(){
            this.showAddPlanModal =!this.showAddPlanModal
        },
        getStatusText(status) {
            return status ? 'Active':'Inactive';
        },
    },
    components: {
        Checkbox,
        Toggle,
        InputLabel, InputError, TextInput, Modal,
        PrimaryButton,
        Pagination,
        Link,
        CardTable,
        AuthenticatedLayout,
        Head,
        SelectInput,
        DepositForm,
        DepositStep2,
    },
};
</script>
<style scoped>
h2 {
    font-size: 20px;
    font-weight: bold;
    color: #63eea3;
    font-family: Menlo, Monaco, Consolas, Liberation Mono, Courier New,
    monospace;
}

button {
    margin-inline: 0.3rem;
}
</style>
