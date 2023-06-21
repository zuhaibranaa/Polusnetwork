<template>
    <div
        class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow-lg rounded"
        :class="[color === 'light' ? 'bg-white' : 'bg-purple-900 text-white']"
    >
        <div class="rounded-t mb-0 px-4 py-3 border-0">
            <div class="flex flex-wrap items-center">
                <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                    <h3
                        class="font-semibold text-lg"
                        :class="[
                            color === 'light'
                                ? 'text-purple-700'
                                : 'text-purple-300',
                        ]"
                    >
                        {{ title }}
                        <div class="float-right">
                            <slot name="extra"/>
                        </div>
                    </h3>
                </div>
            </div>
        </div>
        <div class="block w-full overflow-x-auto">
            <!-- Projects table -->
            <table class="items-center w-full bg-transparent border-collapse">
                <thead>
                    <tr>
                        <th v-for="col in columns"
                            class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left"
                            :class="getCssClass(color)"
                        >
                            <span v-if="typeof col === 'object'"><i :class="'fa '+col[0]"></i> &nbsp; {{ col[1] }}</span>
                            <span v-else>{{col}}</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <slot />
                </tbody>
            </table>
        </div>
    </div>
</template>
<script>
import TableDropdown from "@/Components/Dropdowns/TableDropdown.vue";

import bootstrap from "@/assets/img/bootstrap.jpg";
import angular from "@/assets/img/angular.jpg";
import sketch from "@/assets/img/sketch.jpg";
import react from "@/assets/img/react.jpg";
import vue from "@/assets/img/react.jpg";

import team1 from "@/assets/img/team-1-800x800.jpg";
import team2 from "@/assets/img/team-2-800x800.jpg";
import team3 from "@/assets/img/team-3-800x800.jpg";
import team4 from "@/assets/img/team-4-470x470.png";

export default {
    data() {
        return {
            bootstrap,
            angular,
            sketch,
            react,
            vue,
            team1,
            team2,
            team3,
            team4,
        };
    },
    components: {
        TableDropdown,
    },
    methods:{
        getCssClass(color) {
            return color === 'light'
                    ? 'bg-purple-50 text-black border-purple-100'
                    : 'bg-purple-700 text-white border-white-700';
        }
    },
    props: {
        color: {
            default: "light",
            validator: function (value) {
                // The value must match one of these strings
                return ["light", "dark"].indexOf(value) !== -1;
            },
        },
        columns: Array,
        title: String,
    },
};
</script>
