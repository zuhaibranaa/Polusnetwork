<template>
    <Head title="Registered Users"/>

    <AuthenticatedLayout header="Registered Users">
        <div class="pt-11">
            <div class="flex flex-wrap mt-4" style="margin-top: 7rem">
                <card-table
                    :title="'Users Table'"
                    :columns="columns"
                    color="dark"
                >
                    <tr
                        :key="ent.id"
                        v-for="ent in this.$page.props.users.data"
                    >
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                            <div>
                                <div>
                                    <h2>{{ ent.id }}</h2>
                                </div>
                            </div>
                        </td>
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
                                <h2>{{ ent.email }}</h2>
                            </div>
                        </td>
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                            <div>
                                <h2>{{ ent.PLS }}</h2>
                            </div>
                        </td>
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                            <div>
                                <h2>{{ ent.USDT }}</h2>
                            </div>
                        </td>
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                            <div>
                                <h2>{{ ent.BRAIN }}</h2>
                            </div>
                        </td>
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                            <div>
                                <h2>{{ getDate(ent.created_at) }}</h2>
                            </div>
                        </td>
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4"
                        >
                            <div>
                                <h2>{{ getDate(ent.updated_at) }}</h2>
                            </div>
                        </td>
                        <td
                            class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4 text-right"
                        >
                                <button @click="selectUser(ent, 'edit')"
                                    title="refresh"
                                    class="bg-green-500 hover:bg-green-400 text-white font-bold py-2 px-4 rounded"
                                >
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button
                                    @click="selectUser(ent,'delete')"
                                    title="delete"
                                    class="bg-red-500 hover:bg-red-400 text-white font-bold py-2 px-4 rounded"
                                >
                                    <i class="fa fa-trash"></i>
                                </button>
                        </td>
                    </tr>
                </card-table>
                <Modal
                    :showModal="showEditUserModal"
                    :title="'Edit User'"
                    :success-text="'Save'"
                    :close-text="'Close'"
                    :submit-disabled="editForm.processing"
                    @save="updateUser"
                    @toggleModal="resetSelecteduser"
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
                            v-model="editForm.name"
                        />

                        <InputError class="mt-2" :message="editForm.errors.name" />
                    </div>
                    <div class="mt-2">
                        <InputLabel
                            for="email"
                            value="E-Mail"
                        />

                        <TextInput
                            id="email"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="editForm.email"
                        />

                        <InputError class="mt-2" :message="editForm.errors.name" />
                    </div>
                    <div class="mt-2">
                        <InputLabel
                            for="pls"
                            value="PLS Balance"
                        />

                        <TextInput
                            id="pls"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="editForm.PLS"
                        />

                        <InputError class="mt-2" :message="editForm.errors.PLS" />
                    </div>
                    <div class="mt-2">
                        <InputLabel
                            for="usdt"
                            value="USDT Balance"
                        />

                        <TextInput
                            id="usdt"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="editForm.USDT"
                        />

                        <InputError class="mt-2" :message="editForm.errors.USDT" />
                    </div>
                    <div class="mt-2">
                        <InputLabel
                            for="brain"
                            value="BRAIN Balance"
                        />

                        <TextInput
                            id="brain"
                            type="text"
                            class="mt-1 block w-full"
                            v-model="editForm.BRAIN"
                        />

                        <InputError class="mt-2" :message="editForm.errors.BRAIN" />
                    </div>
                </Modal>
                <Modal
                    :showModal="showDeleteUserModal"
                    :title="'Delete User'"
                    :success-text="'Delete'"
                    :close-text="'Close'"
                    :submit-disabled="deleteForm.processing"
                    @save="deleteUser"
                    @toggleModal="resetSelecteduser"
                >
                    <span class="text-emerald-100">Are You Sure You Want To Delete This User ?</span>
                </Modal>
                <pagination
                    class="mt-6 d-inline"
                    :style="{ alignContent: 'center' }"
                    :links="this.$page.props.users.links"
                />
            </div>
        </div>
    </AuthenticatedLayout>
</template>
<script>
import {useForm} from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import {Head} from "@inertiajs/vue3";
import DepositForm from "@/Components/Forms/DepositForm.vue";
import DepositStep2 from "@/Components/Forms/DepositStep2.vue";
import CardTable from "@/Components/Cards/CardTable2.vue";
import {Link} from "@inertiajs/vue3";
import Pagination from "@/Components/Pagination.vue";
import Modal from "@/Components/Modals/Modal.vue";
import InputLabel from "@/Components/InputLabel.vue";
import TextInput from "@/Components/TextInput.vue";
import InputError from "@/Components/InputError.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

export default {
    data: () => ({
        selectedUser: null,
        showEditUserModal: false,
        showDeleteUserModal: false,
        deleteForm: useForm({}),
        editForm: useForm({
            id: null,
            name: null,
            email: null,
            PLS: null,
            USDT: null,
            BRAIN: null,
        }),
        columns: [
            "ID",
            "Name",
            "Email",
            "PLS Balance",
            "USDT Balance",
            "BRAIN Balance",
            "Created at",
            "Last Updated",
            "Actions",
        ],
    }),
    methods: {
        updateUser(){
            this.editForm.put(route('users.update',this.editForm.id))
            this.resetSelecteduser()
            this.deleteForm.reset()
            this.editForm.reset()
        },
        deleteUser(){
            this.deleteForm.delete(route('users.destroy',this.selectedUser.id))
            this.resetSelecteduser()
            this.editForm.reset()
            this.deleteForm.reset()
        },
        selectUser(id, type){
            this.selectedUser = this.$page.props.users.data.find(user => {
                return user === id
            })
            this.editForm.id = this.selectedUser.id
            this.editForm.name = this.selectedUser.name
            this.editForm.email = this.selectedUser.email
            this.editForm.PLS = this.selectedUser.PLS
            this.editForm.USDT = this.selectedUser.USDT
            this.editForm.BRAIN = this.selectedUser.BRAIN
            if (type === 'edit') this.showEditUserModal = true
            else this.showDeleteUserModal = true
        },
        resetSelecteduser(){
            this.showEditUserModal = false
            this.showDeleteUserModal = false
            this.selectedUser = null
        },
        onSucces(res) {
            console.log(res);
        },
        getDate(date) {
            date = new Date(date);
            let options = { year: "numeric", month: "short", day: "numeric" };
            return date.toLocaleString('en-US', options)
        }
    },
    components: {
        PrimaryButton,
        Link,
        CardTable,
        AuthenticatedLayout,
        Head,
        DepositForm,
        DepositStep2,
        Pagination,
        InputLabel,
        TextInput,
        InputError,
        Modal
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
