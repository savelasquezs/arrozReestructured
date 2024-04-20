<template>
    <AppLayout>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 min-h-max">
                <div
                    class="text-white/60 bg-gray-700 overflow-hidden shadow-xl sm:rounded-lg"
                >
                    <PrimaryButton @click="ordersCount += 1">
                        <SmallAddButton />
                        Hacer pedido</PrimaryButton
                    >
                    <SidebarBase right show v-if="ordersCount > 0">
                        <Tab
                            :ordersCount="ordersCount"
                            :customers="customers"
                            :neighborhoods="neighborhoods"
                        />
                    </SidebarBase>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import Tab from "@/Components/Tab.vue";
import SidebarBase from "@/Layouts/Partials/Sidebar/SidebarBase.vue";
import PrimaryButton from "@/Components/PrimaryButton.vue";

import { watch, ref } from "vue";
import { provide } from "vue";
import SmallAddButton from "@/Components/SmallAddButton.vue";

const ordersCount = ref(0);

const props = defineProps({
    delivery_methods: Array,
    customer: Object,
    customers: Array,
    neighborhoods: Array,
});

provide("delivery_methods", props.delivery_methods);
</script>

<style lang="scss" scoped></style>
