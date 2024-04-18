<template>
    <SmallAddButton @clicked="displayCustomer = !displayCustomer" />
    <CustomerModal
        :displayCustomer="displayCustomer"
        :neighborhoods="neighborhoods"
        @customerSaved="handleCustomer"
        @close="displayCustomer = false"
    />
</template>

<script setup>
import { ref } from "vue";
import SmallAddButton from "@/Components/SmallAddButton.vue";
import CustomerModal from "./CustomerModal.vue";

const props = defineProps({ neighborhoods: Array });
const displayCustomer = ref(false);

function handleCustomer() {}

const emit = defineEmits(["addressSaved"]);
</script>

<style lang="scss" scoped></style>
