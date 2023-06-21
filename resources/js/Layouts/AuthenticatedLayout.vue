<template>
    <div>
        <sidebar />
        <div class="relative md:ml-64">
            <admin-navbar :header="header" />
            <header-stats />
            <!-- v-if="route('dashboard') === $page.props.ziggy.location"
            /> -->
            <Alert class="mt-7 px-10" @close="onCloseAlert" v-if="showAlert" :alertKey="$page.props.flash" :message="$page.props.flash.message" :alert-type="$page.props.flash.type" />
            <div class="px-4 md:px-10 mx-auto w-full -m-24">
                <slot />
                <footer-admin />
            </div>
        </div>
    </div>
</template>
<script>
import AdminNavbar from "@/Components/Navbars/AdminNavbar.vue";
import Sidebar from "@/Components/Sidebar/Sidebar.vue";
import HeaderStats from "@/Components/Headers/HeaderStats.vue";
import FooterAdmin from "@/Components/Footers/FooterAdmin.vue";
import Alert from "@/Components/Alerts/Alert.vue";
export default {
    name: "admin-layout",
    components: {
        Alert,
        AdminNavbar,
        Sidebar,
        HeaderStats,
        FooterAdmin,
    },
    computed:{
        showAlert(){
            return !!this.$page.props.flash.message;
        }
    },
    methods:{
        onCloseAlert(){
            this.$page.props.flash.message = false
        }
    },
    props: {
        header: String,
    },
};
</script>
