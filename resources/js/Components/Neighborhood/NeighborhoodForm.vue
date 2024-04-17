<template>
    <div class="flex gap-2">
        <Dropdown
            :options="neighborhoods"
            title="Barrios"
            v-model="neighborhood_selected"
        />
        <SmallAddButton @clicked="displayNeiborhood = !displayNeiborhood" />

        <NeighborhoodModal
            :displayNeiborhood="displayNeiborhood"
            @neighSaved="updateNeighborhood"
            @close="displayNeiborhood = !displayNeiborhood"
        />
    </div>
</template>

<script setup>
import NeighborhoodModal from "@/Pages/Orders/Partials/Form/NeighborhoodModal.vue";
import SmallAddButton from "@/Components/SmallAddButton.vue";
import Dropdown from "@/Components/Dropdown.vue";
import { useVModel } from "@vueuse/core";
import { ref } from "vue";

const emit = defineEmits(["update:modelValue"]);

const props = defineProps({ modelValue: String, neighborhoods: Array });

const neighborhood_selected = useVModel(props, "modelValue", emit);

const displayNeiborhood = ref(false);
function updateNeighborhood(name) {
    console.log(name);
    neighborhood_selected.value = name;
    displayNeiborhood.value = false;
}
</script>

<style lang="scss" scoped></style>
