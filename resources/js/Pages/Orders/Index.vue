<template>
    <div class="p-8 bg-gray-100 min-h-screen">
        <DataTable :orders="orders" />
    </div>
</template>

<script setup>
import DataTable from "@/Components/DataTable.vue";
const props = defineProps({ orders: Array });
console.log(props.orders[0]);
</script>

<style lang="scss" scoped></style>
