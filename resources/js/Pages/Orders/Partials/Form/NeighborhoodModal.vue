<template>
    <DialogModal :show="displayNeiborhood" @close="handleClose">
        <template #title> Barrio</template>

        <template #content>
            <form @submit.prevent="handleSubmit">
                <div v-if="form.errors.name" class="text-red-500">
                    {{ form.errors.name }}
                </div>
                <TextInput v-model="form.name" title="Nombre" />
                <div v-if="form.errors.shipping_value" class="text-red-500">
                    {{ form.errors.shipping_value }}
                </div>
                <TextInput
                    v-model="form.shipping_value"
                    title="Valor del domicilio"
                />
                <div class="mt-10 flex gap-5 justify-end">
                    <PrimaryButton
                        v-if="form.name?.length > 3"
                        :disabled="form.processing"
                        >Aceptar</PrimaryButton
                    >
                    <SecondaryButton @click="handleClose">
                        Cancelar
                    </SecondaryButton>
                </div>
            </form>
        </template>
    </DialogModal>
</template>

<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DialogModal from "@/Components/DialogModal.vue";
import TextInput from "@/Components/TextInput.vue";
import { useForm } from "@inertiajs/vue3";
import { watch, computed } from "vue";

const props = defineProps({ displayNeiborhood: Boolean });

const emit = defineEmits(["neighSaved", "close"]);

const form = useForm({
    name: null,
    shipping_value: null,
});

function handleSubmit() {
    form.post("/barrios", {
        onSuccess: () => {
            emit("neighSaved", form.name);
            form.reset();
        },
        onError: (errors) => {
            console.log(errors);
        },
    });
}

function handleClose() {
    form.reset();
    emit("close");
}
</script>

<style lang="scss" scoped></style>
