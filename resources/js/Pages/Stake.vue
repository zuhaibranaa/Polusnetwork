<script>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head, useForm} from "@inertiajs/vue3";
import Card from "@/Components/Cards/Card.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import Modal from "@/Components/Modals/Modal.vue";
import TextInput from "@/Components/TextInput.vue";
import InputLabel from "@/Components/InputLabel.vue";
import InputError from "@/Components/InputError.vue";

export default {
    components: {
        InputError, InputLabel,
        TextInput,
        Modal,
        SecondaryButton,
        PrimaryButton,
        Card,
        AuthenticatedLayout,
        Head,
    },
    data: () => ({
        showCalculateModal: false,
        showStakeModal: false,
        selectedPlan: null,
        stakeIntoPlanForm: useForm({
            amount: 0,
            plan: null,
        }),
        calculationData: useForm({
            usdt: 0,
            pls: 0,
            days: 0,
            reward: 0,
            rewardusdt: 0,
        })
    }),
    methods: {
        getSpecifiedSetting(input) {
            return this.$page.props.settings.filter(el => {
                return el.name === input
            })[0].value
        },
        usdtChangeCalc() {
            let pls_value = this.getSpecifiedSetting('pls_value')
            this.calculationData.pls = this.calculationData.usdt / pls_value //form.from_value / pls_value
            if (this.selectedPlan.rewarding_currency === 'PLS') {
                this.calculationData.reward = (this.selectedPlan.per_day_reward / 100) * this.calculationData.days * this.calculationData.pls
                this.calculationData.rewardusdt = this.calculationData.reward * pls_value
            }
        },
        stakeIntoPlan() {
            this.stakeIntoPlanForm.post(route('stake.store'))
            this.clearSelection()
        },
        launchCalculateModal(plan) {
            this.showCalculateModal = true
            this.selectPlan(plan)
        },
        selectPlan(plan) {
            this.selectedPlan = plan
            this.stakeIntoPlanForm.plan = plan.id
        },
        launchStakeModal(plan) {
            this.showStakeModal = true
            this.selectPlan(plan)
        },
        clearSelection() {
            this.showStakeModal = false
            this.showCalculateModal = false
            this.selectedPlan = null
            this.calculationData.reset()
        },
        getTime(timestamp) {
            let datetime = new Date(timestamp);
            let options = {year: "numeric", month: "short", day: "numeric"};
            return datetime.toLocaleString("en-US", options);
        },
    }
}
</script>
<template>
    <Head title="Stake"/>

    <AuthenticatedLayout header="Stake">
        <div class="pt-10 mt-32">
            <div class="flex flex-wrap mt-4">
                <div v-for="plan in $page.props.plans.data" class="w-full xl:w-4/12 lg:w-6/12 md:w-6/12 sm:w-6/12 px-4">
                    <card>
                        <div
                            class="mx-auto align-middle bg-blueGray-800 py-4 rounded-full text-center text-2xl font-bold mt-5 rounded text-purple-300 hover:bg-purple-500 hover:text-white active:bg-purple-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            <i class="fa fa-handshake"></i> &nbsp;{{ plan.name }}
                        </div>
                        <div
                            class="mx-auto bg-blueGray-800 pb-2 rounded-pill text-start text-xl mt-5 rounded text-purple-300 hover:bg-purple-500 hover:text-white active:bg-purple-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition ease-in-out duration-150">
                            <div class="flex justify-between">
                                <i class="fa fa-clock py-2 px-2"> &nbsp; Duration</i>
                                <i class="fa py-2 px-2"> &nbsp;{{ plan.duration_days }} Days</i>
                            </div>
                            <div class="flex justify-between">
                                <i class="fa fa-money-check py-2 px-2"> &nbsp; Per Day Reward</i>
                                <i class="fa py-2 px-2"> &nbsp;{{ plan.per_day_reward }}%</i>
                            </div>
                            <div class="flex justify-between">
                                <i class="fa fa-minus py-2 px-2"> &nbsp; Staking</i>
                                <i class="fa py-2 px-2"> &nbsp;{{ plan.staking_currency }}</i>
                            </div>
                            <div class="flex justify-between">
                                <i class="fa fa-dollar-sign py-2 px-2"> &nbsp; Rewards</i>
                                <i class="fa py-2 px-2"> &nbsp;{{ plan.rewarding_currency }}</i>
                            </div>
                        </div>
                        <div class="flex justify-between flex-wrap sm:justify-between">
                            <PrimaryButton @click.prevent="launchCalculateModal(plan)" class="mt-4">
                                <i class="fa fa-calculator">&nbsp;</i>Calculate
                            </PrimaryButton>
                            <PrimaryButton @click.prevent="launchStakeModal(plan)" class="mt-4">
                                <i class="fa fa-handshake">&nbsp;</i>Stake
                            </PrimaryButton>
                        </div>
                    </card>
                </div>
            </div>
        </div>

        <Modal :show-modal="showStakeModal" :title="`Stake on ${selectedPlan?.name?? ''}`" success-text="Stake"
               success-icon="fa fa-handshake"
               close-text="Close" :submit-disabled="!Boolean(stakeIntoPlanForm.amount)" @toggle-modal="clearSelection"
               @save="stakeIntoPlan">
            <div>
                <InputLabel
                    for="currency"
                    :value="'Amount in ' + selectedPlan.staking_currency"
                />

                <text-input type="number"
                            id="currency"
                            v-model="stakeIntoPlanForm.amount"
                            class="text-xs text-white bg-purple-500 mt-1 block w-full"/>

                <InputError class="mt-2" :message="stakeIntoPlanForm.errors.amount"/>
            </div>
        </Modal>
        <Modal :show-modal="showCalculateModal" title="Calculate"
               close-text="Close" @toggle-modal="clearSelection">
            <div>
                <InputLabel
                    for="usdt"
                    value="Amount in USDT"
                />

                <div class="relative">
                    <text-input type="number"
                                id="usdt"
                                @input.prevent="usdtChangeCalc"
                                v-model="calculationData.usdt"
                                class="mt-1 pb-4 bg-purple-500 appearance-none text-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm sm:leading-5"/>
                    <p class="absolute text-xs text-white bottom-0 mx-4 px-3 select-none left-0 mb-1 ml-1">
                        {{ calculationData.pls }} PLS</p>
                </div>

                <!--                <InputError class="mt-2" :message="form.errors.name" />-->
            </div>
            <div>
                <input-label
                    for="days"
                    value="Number of Days"
                />

                <text-input id="days"
                            type="number"
                            @input.prevent="usdtChangeCalc"
                            v-model="calculationData.days"
                            class="text-xs text-white bg-purple-500 mt-1 block w-full"/>
            </div>
            <div>
                <input-label
                    for="reward"
                    value="ROI at Current Rates in USDT"
                />
                <div class="relative">
                    <text-input id="reward"
                                :disabled="true"
                                v-model="calculationData.rewardusdt"
                                type="number"
                                class="mt-1 pb-4 bg-purple-500 appearance-none text-white border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 block w-full sm:text-sm sm:leading-5"/>
                    <p class="absolute text-xs text-white bottom-0 mx-4 px-3 select-none left-0 mb-1 ml-1">
                        {{ calculationData.reward }} PLS</p>
                </div>
            </div>
        </Modal>
    </AuthenticatedLayout>
</template>
