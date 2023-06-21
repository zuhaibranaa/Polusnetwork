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
                    <template v-if="$page.props.auth.user.is_admin" #extra>
                        <primary-button @click="toggleAddPlanModal"><i class="fa fa-plus-circle"> </i> &nbsp;New Plan</primary-button>
                    </template>
                    <tr :key="ent.id" v-for="ent in this.$page.props.plans.data">
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                            <div>
                                <h2>{{ ent.name }}</h2>
                            </div>
                        </td>
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                            <div>
                                <h2>{{ ent.duration_days }} Days</h2>
                            </div>
                        </td>
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                            <div>
                                <h2>{{ ent.per_day_reward }} %</h2>
                            </div>
                        </td>
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                            <div>
                                <h2>{{ ent.staking_currency }}</h2>
                            </div>
                        </td>
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                            <div>
                                <h2>{{ ent.rewarding_currency }}</h2>
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
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right"
                        >
                            <button
                                @click="toggleEditPlanModal(ent)"
                                title="edit"
                                class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded"
                            >
                                <i class="fa fa-pen"></i>
                            </button>
                            <Link v-if="ent.status" :href="route('plans.destroy', ent.id)" method="delete">
                                <button
                                    title="deactivate"
                                    class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 rounded"
                                >
                                    <i class="fa fa-times"></i>
                                </button>
                            </Link>
                            <Link
                                v-if="!ent.status"
                                :href="route('plans.destroy', ent.id)"
                                method="delete"
                            >
                                <button
                                    title="activate"
                                    class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 rounded"
                                >
                                    <i class="fa fa-check"></i>
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
                <Modal
                    :showModal="showEditPlanModal"
                    :title="'Edit Plan'"
                    :success-text="'Save'"
                    :close-text="'Close'"
                    :submit-disabled="editPlanForm.processing"
                    @save="updatePLan"
                    @toggleModal="toggleEditPlanModal"
                >
                    <div class="mt-2">
                        <InputLabel
                            for="per-day-reward"
                            value="Per Day Reward"
                        />

                        <TextInput
                            id="per-day-reward"
                            type="number"
                            class="mt-1 block w-full"
                            v-model="editPlanForm.per_day_reward"
                        />

                        <InputError class="mt-2" :message="editPlanForm.errors.per_day_reward" />
                    </div>
                    <div class="mt-2">
                        <InputLabel
                            for="status"
                            value="Status"
                        />

                        <input type="checkbox"
                               id="status"
                               class="mt-1 form-checkbox border-0 rounded text-purple-700 ml-1 w-5 h-5 ease-linear transition-all duration-150"
                               v-model="editPlanForm.status"
                        /><span class="text-white content-center text-center"> &nbsp; Active</span>

                        <InputError class="mt-2" :message="editPlanForm.errors.status" />
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

export default {
    data: () => ({
        showAddPlanModal: false,
        showEditPlanModal: false,
        selectedPlan: null,
        formOptions: ['PLS', 'USDT', 'BRAIN'],
        addPlanForm: useForm({
            name: '',
            duration_days: 30,
            per_day_reward: null,
            staking_currency: 'PLS',
            rewarding_currency: 'PLS',
            status: true,
        }),
        editPlanForm: useForm({
            id: null,
            per_day_reward: null,
            status: true,
        }),
        images: { PLS, USDT, BRAIN },
        columns: [
            "Name",
            "Duration",
            "Per Day Reward",
            "Staking Token",
            "Rewarding Token",
            "Status",
            "Actions",
        ],
    }),
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
        updatePLan(){
            this.editPlanForm.put(route('plans.update',this.selectedPlan.id))
            this.editPlanForm.reset()
            this.toggleEditPlanModal()
        },
        toggleAddPlanModal(){
            this.showAddPlanModal =!this.showAddPlanModal
        },
        toggleEditPlanModal(plan = null){
            this.selectedPlan = plan;

            if(plan){
                this.editPlanForm.id = plan.id;
                this.editPlanForm.status = plan.status ? true: false;
                this.editPlanForm.per_day_reward = plan.per_day_reward;
            }
            this.showEditPlanModal =!this.showEditPlanModal;
        },
        getStatusText(status) {
            return status ? 'Active':'Inactive';
        },
    },
    components: {
        Checkbox,
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
