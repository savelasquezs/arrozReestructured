<template>
    <AppLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 min-h-max">
                <div
                    class="text-white/60 bg-gray-700 overflow-hidden shadow-xl sm:rounded-lg"
                >
                    <SidebarBase right>
                        <OrderForm
                            class="min-w-96 p-3 bg-slate-700"
                            :customers="customers"
                            :neighborhoods="neighborhoods"
                        ></OrderForm>
                    </SidebarBase>
                    <Tab />
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import OrderForm from "./Partials/Form/index.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
import SidebarBase from "@/Layouts/Partials/Sidebar/SidebarBase.vue";
import Tab from "@/Components/Tab.vue";
import { watch, ref } from "vue";
import { provide } from "vue";

const props = defineProps({
    delivery_methods: Array,
    customer: Object,
    customers: Array,
    neighborhoods: Array,
});

provide("delivery_methods", props.delivery_methods);
</script>

<style lang="scss" scoped></style>
