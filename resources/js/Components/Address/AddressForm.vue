<template>
    <SmallAddButton @clicked="displayAddress = !displayAddress" />
    <AddressModal
        :displayAddress="displayAddress"
        :customerId="customerId"
        :neighborhoods="neighborhoods"
        @close="displayAddress = false"
        @addressSaved="handleAddress"
    />
</template>

<script setup>
import { ref } from "vue";
import AddressModal from "./AddressModal.vue";
import SmallAddButton from "@/Components/SmallAddButton.vue";

const props = defineProps({ customerId: Number, neighborhoods: Array });
const displayAddress = ref(false);

const emit = defineEmits(["addressSaved"]);

function handleAddress(address) {
    emit("addressSaved", address);
    setTimeout(() => {
        displayAddress.value = false;
    }, 200);
}
</script>

<style lang="scss" scoped></style>
