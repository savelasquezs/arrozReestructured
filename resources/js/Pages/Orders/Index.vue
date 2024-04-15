<template>
    <AppLayout>
        <div
            class="text-white/60 bg-gray-700 overflow-hidden shadow-xl sm:rounded-lg p-10"
        >
            <DataTable :orders="orders.data" />
        </div>
    </AppLayout>
</template>

<script setup>
import DataTable from "@/Components/DataTable.vue";
import AppLayout from "@/Layouts/AppLayout.vue";
const props = defineProps({ orders: Object });
console.log(props.orders.data[0]);
</script>

<style lang="scss" scoped></style>
