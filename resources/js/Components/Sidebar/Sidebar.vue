<template>
    <nav
        class="md:left-0 md:block md:fixed md:top-0 md:bottom-0 md:overflow-y-auto md:flex-row md:flex-nowrap md:overflow-hidden shadow-xl bg-blueGray-800 flex flex-wrap items-center justify-between relative md:w-64 z-2 py-4 px-6"
    >
        <div
            class="md:flex-col md:items-stretch md:min-h-full md:flex-nowrap px-0 flex flex-wrap items-center justify-between w-full mx-auto"
        >
            <!-- Toggler -->
            <button
                class="cursor-pointer text-black opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-blueGray-700 rounded border border-solid border-transparent"
                type="button"
                v-on:click="toggleCollapseShow('bg-blueGray-700 m-2 py-3 px-6')"
            >
                <i class="text-white fas fa-bars"></i>
            </button>
            <!-- Brand -->
            <Link
                class="md:block text-left md:pb-2 text-purple-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                :href="route('home')"
            >
                    <img style="width: 7rem" :src="logolandscape">
            </Link>
            <!-- User -->
            <ul class="md:hidden items-center flex flex-wrap list-none">
                <li class="inline-block relative">
                    <user-dropdown/>
                </li>
            </ul>
            <!-- Collapse -->
            <div
                class="md:flex md:flex-col md:items-stretch md:opacity-100 md:relative md:mt-4 md:shadow-none shadow absolute top-0 left-0 right-0 z-4 overflow-y-auto overflow-x-hidden h-auto items-center flex-1 rounded"
                v-bind:class="collapseShow"
            >
                <!-- Collapse header -->
                <div
                    class="md:min-w-full md:hidden block pb-4 mb-4 border-b border-solid border-purple-200"
                >
                    <div class="flex flex-wrap">
                        <div class="w-6/12">
                            <Link
                                class="md:block text-left md:pb-2 text-purple-600 mr-0 inline-block whitespace-nowrap text-sm uppercase font-bold p-4 px-0"
                                href="/"
                            >
                                <img style="width: 7rem" :src="logolandscape">
                            </Link>
                        </div>
                        <div class="w-6/12 flex justify-end">
                            <button
                                type="button"
                                class="cursor-pointer text-purple-600 opacity-50 md:hidden px-3 py-1 text-xl leading-none bg-blueGray-600 rounded border border-solid border-transparent"
                                v-on:click="toggleCollapseShow('hidden')"
                            >
                                <i class="text-white fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <ul class="md:flex-col md:min-w-full flex flex-col list-none">
                    <li class="items-center">
                        <Link
                            :href="route('dashboard')"
                            class="text-xs uppercase py-3 font-bold block"
                            :class="getActiveRouteCss(route('dashboard'))[0]"
                        >
                            <i
                                class="fas fa-tv mr-2 text-sm"
                                :class="getActiveRouteCss(route('dashboard'))[1]"
                            ></i>
                            Dashboard
                        </Link>
                    </li>

                    <li class="items-center">
                        <Link
                            :href="route('profile.edit')"
                            class="text-xs uppercase py-3 font-bold block"
                            :class="getActiveRouteCss(route('profile.edit'))[0]"
                        >
                            <i
                                class="fas fa-user-circle mr-2 text-sm"
                                :class="getActiveRouteCss(route('profile.edit'))[1]"
                            ></i>
                            Profile
                        </Link>
                    </li>


                    <li class="items-center">
                        <Link :href="route('deposit.create')"
                              class="text-xs uppercase py-3 font-bold block"
                              :class="getActiveRouteCss(route('deposit.create'))[0]"
                        >
                            <i
                                class="fas fa-cash-register mr-2 text-sm"
                                :class="getActiveRouteCss(route('deposit.create'))[1]"
                            ></i>
                            Deposit USDT
                        </Link>
                    </li>

                    <li class="items-center">
                        <Link :href="route('deposit.index')"
                              class="text-xs uppercase py-3 font-bold block"
                              :class="getActiveRouteCss(route('deposit.index'))[0]"
                        >
                            <i
                                class="fas fa-money-check-alt mr-2 text-sm"
                                :class="getActiveRouteCss(route('deposit.index'))[1]"
                            ></i>
                            {{ isAdmin ? 'All Deposits' : 'My Deposits' }}
                        </Link>
                    </li>

                    <li class="items-center">
                        <Link :href="route('withdraw.create')"
                              class="text-xs uppercase py-3 font-bold block"
                              :class="getActiveRouteCss(route('withdraw.create'))[0]"
                        >
                            <i
                                class="fas fa-money-bill mr-2 text-sm"
                                :class="getActiveRouteCss(route('withdraw.create'))[1]"
                            ></i>
                            Withdraw USDT
                        </Link>
                    </li>

                    <li class="items-center">
                        <Link :href="route('withdraw.index')"
                              class="text-xs uppercase py-3 font-bold block"
                              :class="getActiveRouteCss(route('withdraw.index'))[0]"
                        >
                            <i
                                class="fas fa-credit-card mr-2 text-sm"
                                :class="getActiveRouteCss(route('withdraw.index'))[1]"
                            ></i>
                            {{ isAdmin ? 'All Withdrawals' : 'My Withdrawals' }}
                        </Link>
                    </li>

                    <li class="items-center">
                        <Link
                            :href="route('stake.create')"
                            class="text-xs uppercase py-3 font-bold block"
                            :class="getActiveRouteCss(route('stake.create'))[0]"
                        >
                            <i
                                class="fas fa-handshake mr-2 text-sm"
                                :class="getActiveRouteCss(route('stake.create'))[1]"
                            ></i>
                            Stake PLS
                        </Link>
                    </li>
                    <li class="items-center">
                        <Link
                            :href="route('stake.index')"
                            class="text-xs uppercase py-3 font-bold block"
                            :class="getActiveRouteCss(route('stake.index'))[0]"
                        >
                            <i
                                class="fas fa-handshake mr-2 text-sm"
                                :class="getActiveRouteCss(route('stake.index'))[1]"
                            ></i>
                            {{ isAdmin ? 'All Staking' : 'My Staking' }}
                        </Link>
                    </li>
                    <li class="items-center">
                        <Link
                            :href="route('swap.index')"
                            class="text-xs uppercase py-3 font-bold block"
                            :class="getActiveRouteCss(route('swap.index'))[0]"
                        >
                            <i
                                class="fas fa-recycle mr-2 text-sm"
                                :class="getActiveRouteCss(route('swap.index'))[1]"
                            ></i>
                            Swap
                        </Link>
                    </li>
                    <li v-if="isAdmin" class="items-center">
                        <Link
                            :href="route('users.index')"
                            class="text-xs uppercase py-3 font-bold block"
                            :class="getActiveRouteCss(route('users.index'))[0]"
                        >
                            <i
                                class="fa fa-user mr-2 text-sm"
                                :class="getActiveRouteCss(route('users.index'))[1]"
                            ></i>
                            Users
                        </Link>
                    </li>
                    <li v-if="isAdmin" class="items-center">
                        <Link
                            :href="route('plans.index')"
                            class="text-xs uppercase py-3 font-bold block"
                            :class="getActiveRouteCss(route('plans.index'))[0]"
                        >
                            <i
                                class="fa fa-brain mr-2 text-sm"
                                :class="getActiveRouteCss(route('plans.index'))[1]"
                            ></i>
                            Plans
                        </Link>
                    </li>
                    <li v-if="isAdmin" class="items-center">
                        <Link
                            :href="route('settings.index')"
                            class="text-xs uppercase py-3 font-bold block"
                            :class="getActiveRouteCss(route('settings.index'))[0]"
                        >
                            <i
                                class="fas fa-wrench mr-2 text-sm"
                                :class="getActiveRouteCss(route('settings.index'))[1]"
                            ></i>
                            Settings
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</template>
); }

<script>
import UserDropdown from "@/Components/Dropdowns/UserDropdown.vue";
import {Link} from "@inertiajs/vue3";
import USDT from '@/assets/img/usdt.png'
import PLS from '@/assets/img/pls_white.png'
import BRAIN from '@/assets/img/brain_white.png'
import logolandscape from '@/assets/img/logo-landscape.svg';

export default {
    data: () => ({
        collapseShow: "hidden",
        USDT,
        PLS,
        BRAIN,
        logolandscape
    }),
    computed: {
        isAdmin() {
            return Boolean(this.$page.props.auth.user.is_admin)
        },
        settings() {
            let set = []
            this.$page.props.settings.forEach(setting => {
                set[setting.name] = setting.value
            })
            console.log(set)
            return set
        }
    },
    methods: {
        getActiveRouteCss(path) {
            return [this.$page.props.ziggy.location === path ? 'text-purple-500 hover:text-purple-600' : 'text-white hover:text-purple-200',
                this.$page.props.ziggy.location === path
                    ? 'opacity-75'
                    : 'text-purple-300',
            ];
        },
        toggleCollapseShow: function (classes) {
            this.collapseShow = classes;
        },
    },
    components: {
        Link,
        UserDropdown,
    },
};
</script>
