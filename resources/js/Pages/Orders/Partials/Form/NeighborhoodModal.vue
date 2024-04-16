<template>
    <DialogModal :show="displayNeiborhood" @close="displayNeiborhood = false">
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
                <PrimaryButton
                    v-if="form.name?.length > 3"
                    :disabled="form.processing"
                    >Aceptar</PrimaryButton
                >
            </form>
        </template>

        <template #footer>
            <SecondaryButton @click="displayNeiborhood = false">
                Cancelar
            </SecondaryButton>
        </template>
    </DialogModal>
</template>

<script setup>
import PrimaryButton from "@/Components/PrimaryButton.vue";
import SecondaryButton from "@/Components/SecondaryButton.vue";
import DialogModal from "@/Components/DialogModal.vue";
import TextInput from "@/Components/TextInput.vue";
import { useForm } from "@inertiajs/vue3";

const props = defineProps({ displayNeiborhood: Boolean });

const emit = defineEmits(["neighSaved"]);

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
</script>

<style lang="scss" scoped></style>
